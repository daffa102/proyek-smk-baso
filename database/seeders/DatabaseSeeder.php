<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear existing data (optional, comment out if you want to keep existing data)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        \App\Models\Kelas::truncate();
        \App\Models\Mapel::truncate();
        \App\Models\Siswa::truncate();
        DB::table('kelas_mapel')->truncate();
        DB::table('siswa_mapel')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create admin user
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@smk.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'nip' => '123456789',
        ]);

        // Create guru users
        $guru1 = User::create([
            'name' => 'Pak Budi',
            'email' => 'budi@smk.com',
            'password' => bcrypt('password'),
            'role' => 'guru',
            'nip' => '987654321',
        ]);

        $guru2 = User::create([
            'name' => 'Bu Siti',
            'email' => 'siti@smk.com',
            'password' => bcrypt('password'),
            'role' => 'guru',
            'nip' => '456789123',
        ]);

        // Create kelas
        $kelas10A = \App\Models\Kelas::create(['nama_kelas' => 'X RPL A']);
        $kelas10B = \App\Models\Kelas::create(['nama_kelas' => 'X RPL B']);
        $kelas11A = \App\Models\Kelas::create(['nama_kelas' => 'XI RPL A']);

        // Create mapel
        $matematika = \App\Models\Mapel::create([
            'nama_mapel' => 'Matematika',
            'tahun_ajaran' => '2024/2025',
        ]);

        $pemrograman = \App\Models\Mapel::create([
            'nama_mapel' => 'Pemrograman Web',
            'tahun_ajaran' => '2024/2025',
        ]);

        $basis_data = \App\Models\Mapel::create([
            'nama_mapel' => 'Basis Data',
            'tahun_ajaran' => '2024/2025',
        ]);

        $inggris = \App\Models\Mapel::create([
            'nama_mapel' => 'Bahasa Inggris',
            'tahun_ajaran' => '2024/2025',
        ]);

        // Assign mapel to kelas (one kelas has many mapel)
        // Kelas X RPL A has Matematika, Pemrograman Web, and Bahasa Inggris
        $kelas10A->mapels()->attach([$matematika->id, $pemrograman->id, $inggris->id]);
        
        // Kelas X RPL B has Matematika, Basis Data, and Bahasa Inggris
        $kelas10B->mapels()->attach([$matematika->id, $basis_data->id, $inggris->id]);
        
        // Kelas XI RPL A has all subjects
        $kelas11A->mapels()->attach([$matematika->id, $pemrograman->id, $basis_data->id, $inggris->id]);

        // Create student users and siswa data
        $studentUser1 = User::create([
            'name' => 'Ahmad Rizki',
            'email' => 'ahmad@student.smk.com',
            'password' => bcrypt('password'),
            'role' => 'siswa',
        ]);

        $siswa1 = \App\Models\Siswa::create([
            'nama' => 'Ahmad Rizki',
            'nis' => '2024001',
            'kelas_id' => $kelas10A->id,
            'user_id' => $studentUser1->id,
        ]);

        // Assign mapel to siswa (based on their kelas)
        $siswa1->mapels()->attach([$matematika->id, $pemrograman->id, $inggris->id]);

        $studentUser2 = User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@student.smk.com',
            'password' => bcrypt('password'),
            'role' => 'siswa',
        ]);

        $siswa2 = \App\Models\Siswa::create([
            'nama' => 'Siti Nurhaliza',
            'nis' => '2024002',
            'kelas_id' => $kelas10B->id,
            'user_id' => $studentUser2->id,
        ]);

        $siswa2->mapels()->attach([$matematika->id, $basis_data->id, $inggris->id]);

        $studentUser3 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budis@student.smk.com',
            'password' => bcrypt('password'),
            'role' => 'siswa',
        ]);

        $siswa3 = \App\Models\Siswa::create([
            'nama' => 'Budi Santoso',
            'nis' => '2023001',
            'kelas_id' => $kelas11A->id,
            'user_id' => $studentUser3->id,
        ]);

        $siswa3->mapels()->attach([$matematika->id, $pemrograman->id, $basis_data->id, $inggris->id]);

        // Create some siswa without user accounts (students who haven't registered yet)
        $siswa4 = \App\Models\Siswa::create([
            'nama' => 'Rina Wati',
            'nis' => '2024003',
            'kelas_id' => $kelas10A->id,
            'user_id' => null,
        ]);
        $siswa4->mapels()->attach([$matematika->id, $pemrograman->id, $inggris->id]);

        $siswa5 = \App\Models\Siswa::create([
            'nama' => 'Andi Setiawan',
            'nis' => '2024004',
            'kelas_id' => $kelas10B->id,
            'user_id' => null,
        ]);
        $siswa5->mapels()->attach([$matematika->id, $basis_data->id, $inggris->id]);

        echo "Database seeded successfully!\n";
        echo "Login credentials:\n";
        echo "- Admin: admin@smk.com / password\n";
        echo "- Guru: budi@smk.com / password, siti@smk.com / password\n";
        echo "- Siswa: ahmad@student.smk.com / password, siti@student.smk.com / password, budis@student.smk.com / password\n";
    }
}
