<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode_laporan';

    protected $fillable = [
        'nama',
        'bulanMulai',
        'bulanSelesai',
    ];
}
