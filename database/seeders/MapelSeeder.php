<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapelList = [
            // Mata Pelajaran Umum
            ['nama_mapel' => 'Bahasa Indonesia', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Bahasa Inggris', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Matematika', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Pendidikan Pancasila', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Pendidikan Agama Islam', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Pendidikan Jasmani dan Kesehatan', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Sejarah Indonesia', 'tahun_ajaran' => '2024/2025'],
            
            // Mata Pelajaran Jurusan TKJ
            ['nama_mapel' => 'Jaringan Komputer', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Sistem Operasi', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Administrasi Infrastruktur Jaringan', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Keamanan Jaringan', 'tahun_ajaran' => '2024/2025'],
            
            // Mata Pelajaran Jurusan RPL
            ['nama_mapel' => 'Pemrograman Dasar', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Basis Data', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Pemrograman Web', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Pemrograman Berorientasi Objek', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Pemrograman Mobile', 'tahun_ajaran' => '2024/2025'],
            
            // Mata Pelajaran Jurusan AKL
            ['nama_mapel' => 'Akuntansi Dasar', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Praktikum Akuntansi Perusahaan Jasa', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Praktikum Akuntansi Perusahaan Dagang', 'tahun_ajaran' => '2024/2025'],
            ['nama_mapel' => 'Komputer Akuntansi', 'tahun_ajaran' => '2024/2025'],
        ];

        foreach ($mapelList as $mapel) {
            Mapel::create($mapel);
        }
    }
}
