<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pl extends Model
{
    protected $fillable = [
        'profile_id',
        'persetujuan_lingkungan_nomor',
        'persetujuan_lingkungan_tgl',
        'persetujuan_lingkungan_target_produksi',
        'persetujuan_lingkungan_wilayah_izin',
        'persetujuan_lingkungan_area_penunjang',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
