<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Triwulan extends Model
{
    protected $fillable = [
        'profile_id',
        'laporan_triwulan_i',
        'laporan_triwulan_ii',
        'laporan_triwulan_iii',
        'laporan_triwulan_iv',
    ];
}
