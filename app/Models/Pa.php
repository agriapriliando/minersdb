<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pa extends Model
{
    protected $fillable = [
        'profile_id',
        'project_area_nomor',
        'project_area_tgl',
        'project_area_penggunaan',
        'project_area_luas',
        'project_area_keterangan',
    ];
}
