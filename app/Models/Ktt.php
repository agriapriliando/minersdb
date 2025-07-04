<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ktt extends Model
{
    protected $fillable = [
        'profile_id',
        'ktt_no_pengesahan',
        'ktt_tgl_pengesahan',
        'nama_ktt',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
