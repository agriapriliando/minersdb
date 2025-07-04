<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelabuhan extends Model
{
    protected $fillable = [
        'profile_id',
        'pelabuhan_no_persetujuan',
        'pelabuhan_tgl_persetujuan',
        'pelabuhan_status_tuks_terum',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
