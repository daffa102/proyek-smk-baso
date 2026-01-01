<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@smk.ac.id',
            'password' => Hash::make('password'),
            'nip' => '1234567890',
            'role' => 'admin',
        ]);

        // Guru-guru
        $guruList = [
            [
                'name' => 'Drs. Ahmad Syahid, M.Pd',
                'email' => 'ahmad.syahid@smk.ac.id',
                'nip' => '1971082119981011001',
                'role' => 'guru',
            ],
            [
                'name' => 'Siti Nurhaliza, S.Pd',
                'email' => 'siti.nurhaliza@smk.ac.id',
                'nip' => '1985051220071012001',
                'role' => 'guru',
            ],
            [
                'name' => 'Budi Santoso, S.T, M.T',
                'email' => 'budi.santoso@smk.ac.id',
                'nip' => '1980032520061021002',
                'role' => 'guru',
            ],
            [
                'name' => 'Dewi Lestari, S.Kom',
                'email' => 'dewi.lestari@smk.ac.id',
                'nip' => '1988091520101012003',
                'role' => 'guru',
            ],
            [
                'name' => 'Agus Wahyudi, S.Pd',
                'email' => 'agus.wahyudi@smk.ac.id',
                'nip' => '1975061820001011004',
                'role' => 'guru',
            ],
            [
                'name' => 'Rina Marlina, S.Pd',
                'email' => 'rina.marlina@smk.ac.id',
                'nip' => '1990032120121012005',
                'role' => 'guru',
            ],
            [
                'name' => 'Hendra Gunawan, S.T',
                'email' => 'hendra.gunawan@smk.ac.id',
                'nip' => '1983071520081021006',
                'role' => 'guru',
            ],
            [
                'name' => 'Maya Sari, S.E',
                'email' => 'maya.sari@smk.ac.id',
                'nip' => '1987042820091012007',
                'role' => 'guru',
            ],
            [
                'name' => 'Rizki Pratama, S.Kom',
                'email' => 'rizki.pratama@smk.ac.id',
                'nip' => '1992081220141021008',
                'role' => 'guru',
            ],
            [
                'name' => 'Fitri Handayani, S.Pd.I',
                'email' => 'fitri.handayani@smk.ac.id',
                'nip' => '1989102520111012009',
                'role' => 'guru',
            ],
            [
                'name' => 'Doni Setiawan, S.Pd',
                'email' => 'doni.setiawan@smk.ac.id',
                'nip' => '1981050820051011010',
                'role' => 'guru',
            ],
            [
                'name' => 'Nur Azizah, S.Pd',
                'email' => 'nur.azizah@smk.ac.id',
                'nip' => '1993121520151012011',
                'role' => 'guru',
            ],
            [
                'name' => 'Irfan Hakim, S.T, M.T',
                'email' => 'irfan.hakim@smk.ac.id',
                'nip' => '1984093020081021012',
                'role' => 'guru',
            ],
            [
                'name' => 'Lilis Suryani, S.E, M.M',
                'email' => 'lilis.suryani@smk.ac.id',
                'nip' => '1986022520091012013',
                'role' => 'guru',
            ],
            [
                'name' => 'Bambang Supriyanto, S.Pd',
                'email' => 'bambang.supriyanto@smk.ac.id',
                'nip' => '1978111520021011014',
                'role' => 'guru',
            ],
        ];

        foreach ($guruList as $guru) {
            User::create([
                'name' => $guru['name'],
                'email' => $guru['email'],
                'password' => Hash::make('password'), // password default
                'nip' => $guru['nip'],
                'role' => $guru['role'],
            ]);
        }
    }
}
