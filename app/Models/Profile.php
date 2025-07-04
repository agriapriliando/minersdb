<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama_pemegang_perizinan',
        'kabupaten_kota',
        'kecamatan',
        'desa_kelurahan',
        'luas_ha',
        'tahapan_iup',
        'komoditas',
        'nomor_induk_berusaha_nib',
        'nomor_npwp',
        'status_npwp',
        'jenis_izin',
        'nomor_sk_izin',
        'tgl_terbit_izin',
        'tgl_berakhir_izin',
        'alamat_perusahaan_berdasarkan_sk_izin',
        'nama_direktur_sesuai_sk_izin',
        'dewan_direksi_bod',
        'modal_kerja',
        'nama_pic',
        'no_hp_pic',
        'email_resmi_perusahaan',
        'nib_email_oss',
        'nib_nomor_hp_oss',
        'keterangan',
    ];

    // Define the relationship for 'Ktt'
    public function ktts()
    {
        return $this->hasMany(Ktt::class);
    }

    // Relationship with Kim model
    public function kims()
    {
        return $this->hasMany(Kim::class);
    }

    // Relationship with Handak model
    public function handaks()
    {
        return $this->hasMany(Handak::class);
    }

    // Relationship with Bbc model
    public function bbcs()
    {
        return $this->hasMany(Bbc::class);
    }

    // Relationship with Le model
    public function les()
    {
        return $this->hasMany(Le::class);
    }

    // Relationship with Stk model
    public function stks()
    {
        return $this->hasMany(Stk::class);
    }

    // Relationship with Rr model
    public function rrs()
    {
        return $this->hasMany(Rr::class);
    }

    // Relationship with Rpt model
    public function rpts()
    {
        return $this->hasMany(Rpt::class);
    }

    // Relationship with Rippm model
    public function rippms()
    {
        return $this->hasMany(Rippm::class);
    }

    // Relationship with RippmContent model

    // Relationship with Rkabop model
    public function rkabops()
    {
        return $this->hasMany(Rkabop::class);
    }

    // Relationship with RkabopPeralatan model

    // Relationship with Reportmonth model
    public function reportmonths()
    {
        return $this->hasMany(Reportmonth::class);
    }

    // Relationship with Triwulan model
    public function triwulans()
    {
        return $this->hasMany(Triwulan::class);
    }

    // Relationship with Iuran model
    public function iurans()
    {
        return $this->hasMany(Iuran::class);
    }

    // Relationship with Tb model
    public function tbs()
    {
        return $this->hasMany(Tb::class);
    }

    // Relationship with Pa model
    public function pas()
    {
        return $this->hasMany(Pa::class);
    }

    // Relationship with Pl model
    public function pls()
    {
        return $this->hasMany(Pl::class);
    }

    // Relationship with Pelabuhan model
    public function pelabuhans()
    {
        return $this->hasMany(Pelabuhan::class);
    }

    // Relationship with Iui model
    public function iuis()
    {
        return $this->hasMany(Iui::class);
    }
}
