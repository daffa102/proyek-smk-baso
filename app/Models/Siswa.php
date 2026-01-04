<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';

    protected $fillable = [
        'nama',
        'nis',
        'kelas_id',
        'user_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'siswa_mapel');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
