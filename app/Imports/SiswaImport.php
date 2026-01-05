<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class SiswaImport implements ToCollection
{
    private $kelasCache = [];
    private $errors = [];
    private $successCount = 0;

    public function collection(Collection $rows)
    {
        // Find the actual header row
        $headerRowIndex = $this->findHeaderRow($rows);
        $headerRow = $rows[$headerRowIndex];
        
        // Debug: Log which row was detected as header
        Log::info("Header row detected at index: $headerRowIndex");
        Log::info("Header row content: " . json_encode($headerRow->toArray()));
        
        // Detect column positions from header
        $columnMap = $this->detectColumns($headerRow);
        
        if (!$columnMap) {
            throw new \Exception("Tidak dapat mendeteksi kolom Nama, NIS, dan Kelas. Pastikan file Excel memiliki header yang jelas.");
        }
        
        // Skip all rows up to and including the header
        $dataRows = $rows->slice($headerRowIndex + 1);
        
        foreach ($dataRows as $index => $row) {
            try {
                // Skip completely empty rows
                if ($row->filter()->isEmpty()) {
                    continue;
                }

                // Get values based on detected column positions
                $nama = isset($row[$columnMap['nama']]) ? trim($row[$columnMap['nama']]) : null;
                $nis = isset($row[$columnMap['nis']]) ? trim($row[$columnMap['nis']]) : null;
                $kelasName = isset($row[$columnMap['kelas']]) ? trim($row[$columnMap['kelas']]) : null;

                // Skip rows that look like headers
                if ($this->looksLikeHeader($nama, $nis, $kelasName)) {
                    continue;
                }

                // Validate required fields
                if (empty($nama) || empty($nis) || empty($kelasName)) {
                    continue; // Silently skip incomplete rows
                }

                // Find or cache kelas
                if (!isset($this->kelasCache[$kelasName])) {
                    $kelas = Kelas::where('nama_kelas', $kelasName)->first();
                    if (!$kelas) {
                        $this->errors[] = "Baris " . ($index + $headerRowIndex + 2) . ": Kelas '$kelasName' tidak ditemukan (Nama: $nama)";
                        continue;
                    }
                    $this->kelasCache[$kelasName] = $kelas->id;
                }

                // Check if NIS already exists
                if (Siswa::where('nis', $nis)->exists()) {
                    $this->errors[] = "Baris " . ($index + $headerRowIndex + 2) . ": NIS '$nis' sudah terdaftar (Nama: $nama)";
                    continue;
                }

                // Create siswa
                Siswa::create([
                    'nama' => $nama,
                    'nis' => $nis,
                    'kelas_id' => $this->kelasCache[$kelasName],
                ]);

                $this->successCount++;

            } catch (\Exception $e) {
                $this->errors[] = "Baris " . ($index + $headerRowIndex + 2) . ": " . $e->getMessage();
            }
        }

        // Throw exception with summary
        if ($this->successCount == 0 && !empty($this->errors)) {
            $errorMessage = "Import gagal! Tidak ada data yang berhasil diimport.\n\n";
            $errorMessage .= "Errors:\n" . implode("\n", array_slice($this->errors, 0, 5));
            if (count($this->errors) > 5) {
                $errorMessage .= "\n... dan " . (count($this->errors) - 5) . " error lainnya";
            }
            throw new \Exception($errorMessage);
        } elseif (!empty($this->errors)) {
            $errorMessage = "Import selesai dengan " . $this->successCount . " data berhasil.\n\n";
            $errorMessage .= "Errors:\n" . implode("\n", array_slice($this->errors, 0, 3));
            if (count($this->errors) > 3) {
                $errorMessage .= "\n... dan " . (count($this->errors) - 3) . " error lainnya";
            }
            throw new \Exception($errorMessage);
        }
    }

    private function findHeaderRow(Collection $rows)
    {
        // Look for row containing column names (case insensitive)
        foreach ($rows as $index => $row) {
            // Skip completely empty rows
            if ($row->filter()->isEmpty()) {
                continue;
            }
            
            $rowString = strtolower(implode(' ', $row->toArray()));
            
            // Look for common header patterns
            if (str_contains($rowString, 'nama') && 
                (str_contains($rowString, 'nis') || str_contains($rowString, 'nisn'))) {
                return $index;
            }
            
            // Alternative: look for "lengkap" (from "NAMA LENGKAP")
            if (str_contains($rowString, 'lengkap') || str_contains($rowString, 'nisn')) {
                return $index;
            }
        }
        
        // If not found, try to find first row with multiple non-empty cells
        foreach ($rows as $index => $row) {
            $nonEmptyCount = $row->filter(function($cell) {
                return !empty(trim($cell));
            })->count();
            
            if ($nonEmptyCount >= 3) {
                return $index;
            }
        }
        
        return 0; // Default to first row if not found
    }

    private function detectColumns($headerRow)
    {
        $columnMap = [
            'nama' => null,
            'nis' => null,
            'kelas' => null
        ];

        foreach ($headerRow as $index => $header) {
            $cleanHeader = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', (string)$header));
            
            // Detect Nama column - including "NAMA LENGKAP"
            if (in_array($cleanHeader, ['nama', 'namasiswa', 'namalengkap', 'name', 'namasantri'])) {
                $columnMap['nama'] = $index;
            }
            
            // Detect NIS/NISN column (not NIK!)
            if (in_array($cleanHeader, ['nis', 'nisn', 'nomorinduk', 'nomorinduksiswa', 'nomorinduksiswanasional'])) {
                $columnMap['nis'] = $index;
            }
            
            // Detect Kelas column - including "KELAS SAAT INI"
            if (in_array($cleanHeader, ['kelas', 'namakelas', 'rombel', 'rombongan', 'kls', 'tingkat', 'tingkatkelas', 'kelassaatini', 'kelassekarang'])) {
                $columnMap['kelas'] = $index;
            }
        }

        // Return null if any required column is not found
        if ($columnMap['nama'] === null || $columnMap['nis'] === null || $columnMap['kelas'] === null) {
            // Debug: show what we found
            $foundColumns = [];
            foreach ($headerRow as $idx => $col) {
                $foundColumns[] = "[$idx] = " . trim($col);
            }
            
            $missing = [];
            if ($columnMap['nama'] === null) $missing[] = 'Nama/Nama Lengkap';
            if ($columnMap['nis'] === null) $missing[] = 'NIS/NISN';
            if ($columnMap['kelas'] === null) $missing[] = 'Kelas';
            
            throw new \Exception(
                "Kolom tidak ditemukan: " . implode(', ', $missing) . "\n\n" .
                "Kolom yang terdeteksi:\n" . implode("\n", array_slice($foundColumns, 0, 10))
            );
        }

        return $columnMap;
    }

    private function looksLikeHeader($nama, $nis, $kelas)
    {
        // Check if this looks like a header row
        $combined = strtolower($nama . ' ' . $nis . ' ' . $kelas);
        
        $headerKeywords = ['nama', 'nis', 'nisn', 'kelas', 'no', 'nomor', 'tahun', 'pelajaran', 'awal'];
        
        foreach ($headerKeywords as $keyword) {
            if (str_contains($combined, $keyword)) {
                return true;
            }
        }
        
        return false;
    }

    public function getSuccessCount()
    {
        return $this->successCount;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
