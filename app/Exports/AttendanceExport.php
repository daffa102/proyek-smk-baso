<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromCollection, WithHeadings, WithMapping
{
    protected $month;
    protected $year;
    protected $kelas_id;
    protected $mapel_id;

    public function __construct($month, $year, $kelas_id = null, $mapel_id = null)
    {
        $this->month = $month;
        $this->year = $year;
        $this->kelas_id = $kelas_id;
        $this->mapel_id = $mapel_id;
    }

    public function collection()
    {
        return Absensi::query()
            ->whereMonth('tanggal', $this->month)
            ->whereYear('tanggal', $this->year)
            ->when($this->kelas_id, fn($q) => $q->where('kelas_id', $this->kelas_id))
            ->when($this->mapel_id, fn($q) => $q->where('mapel_id', $this->mapel_id))
            ->with(['siswa', 'kelas', 'mapel'])
            ->orderBy('tanggal', 'asc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Siswa',
            'Kelas',
            'Mata Pelajaran',
            'Status',
            'Keterangan',
        ];
    }

    public function map($row): array
    {
        return [
            $row->tanggal,
            $row->siswa->nama,
            $row->kelas->nama_kelas ?? '-',
            $row->mapel->nama_mapel ?? '-',
            strtoupper($row->status),
            $row->keterangan ?: '-',
        ];
    }
}
