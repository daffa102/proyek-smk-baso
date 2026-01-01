<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasIds = Kelas::pluck('id')->toArray();
        
        if (empty($kelasIds)) {
            $this->command->warn('Tidak ada kelas yang tersedia. Jalankan KelasSeeder terlebih dahulu.');
            return;
        }

        // Daftar nama-nama siswa
        $namaDepan = [
            'Ahmad', 'Andi', 'Budi', 'Deni', 'Eko', 'Fajar', 'Galih', 'Hadi', 'Indra', 'Joko',
            'Siti', 'Dewi', 'Rina', 'Maya', 'Lina', 'Fitri', 'Ratna', 'Wati', 'Ani', 'Nurul',
            'Muhammad', 'Abdul', 'Rizki', 'Rudi', 'Dimas', 'Arif', 'Bayu', 'Candra', 'Dedy', 'Farhan',
            'Ayu', 'Bella', 'Citra', 'Diah', 'Elsa', 'Fina', 'Gita', 'Hana', 'Intan', 'Jasmine'
        ];

        $namaBelakang = [
            'Pratama', 'Santoso', 'Wijaya', 'Setiawan', 'Kurniawan', 'Gunawan', 'Rahman', 'Hidayat', 'Suhendra', 'Permana',
            'Lestari', 'Rahayu', 'Utami', 'Wulandari', 'Anggraini', 'Safitri', 'Puspita', 'Maharani', 'Handayani', 'Agustina',
            'Saputra', 'Putra', 'Firmansyah', 'Ramadhan', 'Hakim', 'Maulana', 'Fadillah', 'Nurdiansyah', 'Syahputra', 'Irawan',
            'Putri', 'Azzahra', 'Zahra', 'Alifah', 'Nur', 'Cahya', 'Indah', 'Melati', 'Syifa', 'Aulia'
        ];

        // Generate 200 siswa (sekitar 11 siswa per kelas)
        $siswaCount = 200;
        $currentYear = date('Y');
        
        for ($i = 1; $i <= $siswaCount; $i++) {
            // Generate nama acak
            $nama = $namaDepan[array_rand($namaDepan)] . ' ' . $namaBelakang[array_rand($namaBelakang)];
            
            // Generate NIS dengan format: tahun_masuk + kelas_index + nomor_urut
            // Contoh: 2024 01 001 => siswa masuk 2024, kelas pertama, nomor urut 001
            $kelasIndex = ($i % count($kelasIds));
            $nomorUrut = str_pad($i, 3, '0', STR_PAD_LEFT);
            $nis = $currentYear . str_pad($kelasIndex + 1, 2, '0', STR_PAD_LEFT) . $nomorUrut;
            
            // Assign ke kelas secara merata
            $kelasId = $kelasIds[$kelasIndex];
            
            Siswa::create([
                'nama' => $nama,
                'nis' => $nis,
                'kelas_id' => $kelasId,
            ]);
        }
    }
}
