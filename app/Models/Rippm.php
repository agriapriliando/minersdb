<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rippm extends Model
{
    protected $fillable = [
        'profile_id',
        'rippm_no_persetujuan',
        'rippm_tgl_persetujuan',
        'rippm_keterangan',
    ];

    protected $casts = [
        'rippm_tgl_persetujuan' => 'date:Y-m-d',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
