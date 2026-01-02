<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;


class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensis';

    protected $fillable = [
        'siswa_id',
        'guru_id',
        'mapel_id',
        'kelas_id',
        'tanggal',
        'status',
        'keterangan',
    ];

    /**
     * Mencatat absensi secara aman (update jika sudah ada, create jika belum).
     * Mencegah data ganda untuk siswa, mapel, dan tanggal yang sama.
     */
    public static function catat(array $data)
    {
        return self::updateOrCreate(
            [
                'siswa_id' => $data['siswa_id'],
                'mapel_id' => $data['mapel_id'],
                'tanggal'  => $data['tanggal'] ?? now()->format('Y-m-d'),
            ],
            [
                'guru_id'    => $data['guru_id'] ?? Auth::id(),
                'kelas_id'   => $data['kelas_id'],
                'status'     => $data['status'],
                'keterangan' => $data['keterangan'] ?? null,
            ]
        );
    }


    public function siswa() { return $this->belongsTo(Siswa::class); }
    public function guru() { return $this->belongsTo(User::class, 'guru_id'); }
    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function mapel() { return $this->belongsTo(Mapel::class); }
}
