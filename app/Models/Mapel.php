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
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
