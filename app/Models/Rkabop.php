<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rkabop extends Model
{
    protected $fillable = [
        'profile_id',
        'rkab_no_persetujuan',
        'rkab_tgl_persetujuan',
        // Sumber Daya Tahun I
        'rkab_sd_thn_i_m3_tereka',
        'rkab_sd_thn_i_m3_tertunjuk',
        'rkab_sd_thn_i_m3_terukur',
        'rkab_sd_thn_i_mt_tereka',
        'rkab_sd_thn_i_mt_tertunjuk',
        'rkab_sd_thn_i_mt_terukur',
        // Sumber Daya Tahun II
        'rkab_sd_thn_ii_m3_tereka',
        'rkab_sd_thn_ii_m3_tertunjuk',
        'rkab_sd_thn_ii_m3_terukur',
        'rkab_sd_thn_ii_mt_tereka',
        'rkab_sd_thn_ii_mt_tertunjuk',
        'rkab_sd_thn_ii_mt_terukur',
        // Sumber Daya Tahun III
        'rkab_sd_thn_iii_m3_tereka',
        'rkab_sd_thn_iii_m3_tertunjuk',
        'rkab_sd_thn_iii_m3_terukur',
        'rkab_sd_thn_iii_mt_tereka',
        'rkab_sd_thn_iii_mt_tertunjuk',
        'rkab_sd_thn_iii_mt_terukur',
        // Tenaga Ahli
        'rkab_tenaga_ahli_competent_person',
        // Cadangan
        'rkab_cadangan_thn_i_terkira',
        'rkab_cadangan_thn_i_terbukti',
        'rkab_cadangan_thn_ii_terkira',
        'rkab_cadangan_thn_ii_terbukti',
        'rkab_cadangan_thn_iii_terkira',
        'rkab_cadangan_thn_iii_terbukti',
        // Produksi Tahun I
        'rkab_prod_thn_i_target_m3_utama',
        'rkab_prod_thn_i_target_m3_sampingan',
        'rkab_prod_thn_i_realisasi_m3_utama',
        'rkab_prod_thn_i_realisasi_m3_sampingan',
        'rkab_prod_thn_i_target_mt_utama',
        'rkab_prod_thn_i_target_my_sampingan',
        'rkab_prod_thn_i_realisasi_mt_utama',
        'rkab_prod_thn_i_realisasi_mt_sampingan',
        // Produksi Tahun II
        'rkab_prod_thn_ii_target_m3_utama',
        'rkab_prod_thn_ii_target_m3_sampingan',
        'rkab_prod_thn_ii_realisasi_m3_utama',
        'rkab_prod_thn_ii_realisasi_m3_sampingan',
        'rkab_prod_thn_ii_target_mt_utama',
        'rkab_prod_thn_ii_target_my_sampingan',
        'rkab_prod_thn_ii_realisasi_mt_utama',
        'rkab_prod_thn_ii_realisasi_mt_sampingan',
        // Produksi Tahun III
        'rkab_prod_thn_iii_target_m3_utama',
        'rkab_prod_thn_iii_target_m3_sampingan',
        'rkab_prod_thn_iii_realisasi_m3_utama',
        'rkab_prod_thn_iii_realisasi_m3_sampingan',
        'rkab_prod_thn_iii_target_mt_utama',
        'rkab_prod_thn_iii_target_my_sampingan',
        'rkab_prod_thn_iii_realisasi_mt_utama',
        'rkab_prod_thn_iii_realisasi_mt_sampingan',
        // Pajak
        'rkab_pajak_thn_i_daerah',
        'rkab_pajak_thn_i_opsen',
        'rkab_pajak_thn_ii_daerah',
        'rkab_pajak_thn_ii_opsen',
        'rkab_pajak_thn_iii_daerah',
        'rkab_pajak_thn_iii_opsen',
        // Tenaga Kerja Tahun I
        'rkab_tenaga_kerja_thn_i_lokal',
        'rkab_tenaga_kerja_thn_i_non_lokal',
        'rkab_tenaga_kerja_thn_i_tka',
        // Tenaga Kerja Tahun II
        'rkab_tenaga_kerja_thn_ii_lokal',
        'rkab_tenaga_kerja_thn_ii_non_lokal',
        'rkab_tenaga_kerja_thn_ii_tka',
        // Tenaga Kerja Tahun III
        'rkab_tenaga_kerja_thn_iii_lokal',
        'rkab_tenaga_kerja_thn_iii_non_lokal',
        'rkab_tenaga_kerja_thn_iii_tka',
    ];
}
