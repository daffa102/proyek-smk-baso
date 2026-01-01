<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasList = [
            // Kelas X
            'X TKJ 1',
            'X TKJ 2',
            'X RPL 1',
            'X RPL 2',
            'X AKL 1',
            'X AKL 2',
            
            // Kelas XI
            'XI TKJ 1',
            'XI TKJ 2',
            'XI RPL 1',
            'XI RPL 2',
            'XI AKL 1',
            'XI AKL 2',
            
            // Kelas XII
            'XII TKJ 1',
            'XII TKJ 2',
            'XII RPL 1',
            'XII RPL 2',
            'XII AKL 1',
            'XII AKL 2',
        ];

        foreach ($kelasList as $namaKelas) {
            Kelas::create([
                'nama_kelas' => $namaKelas,
            ]);
        }
    }
}
