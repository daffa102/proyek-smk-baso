<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';

    protected $fillable = [
        'user_id',
        'kelas_id',
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
