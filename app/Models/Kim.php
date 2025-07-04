<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kim extends Model
{
    protected $fillable = [
        'profile_id',
        'kim_no_persetujuan',
        'kim_tgl_persetujuan',
        'kim_nama_juru_ledak',
        'kim_tgl_mulai',
        'kim_tgl_selesai',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
