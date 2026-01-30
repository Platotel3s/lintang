<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'upt_id',
        'jenis_laporan_id',
        'dokumen',
        'periode_id',
        'status',
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function upt()
    {
        return $this->belongsTo(Upt::class);
    }

    public function jenisLaporan()
    {
        return $this->belongsTo(JenisLaporan::class);
    }
}
