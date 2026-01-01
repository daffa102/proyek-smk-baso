<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder dalam urutan yang benar
        // 1. Kelas harus dibuat terlebih dahulu karena Siswa memiliki foreign key ke Kelas
        // 2. Guru dan Mapel bisa dibuat dalam urutan apapun karena tidak ada dependency
        // 3. Murid/Siswa harus dibuat setelah Kelas
        
        $this->call([
            GuruSeeder::class,    // Seed guru (termasuk admin)
            KelasSeeder::class,   // Seed kelas
            MapelSeeder::class,   // Seed mata pelajaran
            MuridSeeder::class,   // Seed murid/siswa (memerlukan kelas sudah ada)
        ]);
    }
}
