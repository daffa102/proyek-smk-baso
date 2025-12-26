<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensis';

    protected $fillable = [
        'siswa_id',
        'mapel_id',
        'kelas_id',
        'tanggal',
        'status',
    ];

    public function siswa() { return $this->belongsTo(Siswa::class); }
    public function guru() { return $this->belongsTo(User::class, 'guru_id'); }
    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function mapel() { return $this->belongsTo(Mapel::class); }
}
