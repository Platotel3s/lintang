<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upt extends Model
{
    protected $table = 'upts';

    protected $fillable = [
        'namaUpt',
        'alamat',
    ];
}
