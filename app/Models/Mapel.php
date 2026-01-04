<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapels';

    protected $fillable = [
        'nama_mapel',
        'tahun_ajaran',
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_mapel');
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_mapel');
    }
}
