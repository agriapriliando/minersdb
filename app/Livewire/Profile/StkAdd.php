<?php

namespace App\Livewire\Profile;

use App\Models\Stk;
use Livewire\Component;

class StkAdd extends Component
{
    public $stk_no_persetujuan;
    public $stk_tgl_persetujuan;
    public $stk_sd_m3_tereka;
    public $stk_sd_m3_tertunjuk;
    public $stk_sd_m3_terukur;
    public $stk_sd_mt_tereka;
    public $stk_sd_mt_tertunjuk;
    public $stk_sd_mt_terukur;
    public $stk_luas_sumber_daya;
    public $stk_sd_tenaga_ahli;
    public $stk_cadang_m3_terkira;
    public $stk_cadang_m3_terbukti;
    public $stk_cadang_mt_terkira;
    public $stk_cadang_mt_terbukti;
    public $stk_luas_cadangan;
    public $stk_cadang_tenaga_ahli;
    public $stk_target_produksi_m3;
    public $stk_target_produksi_mt;

    protected $rules = [
        'stk_no_persetujuan'     => 'required|string|max:255',
        'stk_tgl_persetujuan'    => 'required|date',
        'stk_sd_m3_tereka'       => 'nullable|numeric|min:0',
        'stk_sd_m3_tertunjuk'    => 'nullable|numeric|min:0',
        'stk_sd_m3_terukur'      => 'nullable|numeric|min:0',
        'stk_sd_mt_tereka'       => 'nullable|numeric|min:0',
        'stk_sd_mt_tertunjuk'    => 'nullable|numeric|min:0',
        'stk_sd_mt_terukur'      => 'nullable|numeric|min:0',
        'stk_luas_sumber_daya'   => 'nullable|numeric|min:0',
        'stk_sd_tenaga_ahli'     => 'nullable|string|max:255',
        'stk_cadang_m3_terkira'  => 'nullable|numeric|min:0',
        'stk_cadang_m3_terbukti' => 'nullable|numeric|min:0',
        'stk_cadang_mt_terkira'  => 'nullable|numeric|min:0',
        'stk_cadang_mt_terbukti' => 'nullable|numeric|min:0',
        'stk_luas_cadangan'      => 'nullable|numeric|min:0',
        'stk_cadang_tenaga_ahli' => 'nullable|string|max:255',
        'stk_target_produksi_m3' => 'nullable|numeric|min:0',
        'stk_target_produksi_mt' => 'nullable|numeric|min:0',
    ];

    protected $messages = [
        'stk_no_persetujuan.required'  => 'Nomor persetujuan wajib diisi.',
        'stk_tgl_persetujuan.required' => 'Tanggal persetujuan wajib diisi.',
        'stk_tgl_persetujuan.date'     => 'Tanggal tidak valid.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Stk::create([
            'profile_id'              => $id_perusahaan,
            'stk_no_persetujuan'      => $this->stk_no_persetujuan,
            'stk_tgl_persetujuan'     => $this->stk_tgl_persetujuan,
            'stk_sd_m3_tereka'        => $this->stk_sd_m3_tereka,
            'stk_sd_m3_tertunjuk'     => $this->stk_sd_m3_tertunjuk,
            'stk_sd_m3_terukur'       => $this->stk_sd_m3_terukur,
            'stk_sd_mt_tereka'        => $this->stk_sd_mt_tereka,
            'stk_sd_mt_tertunjuk'     => $this->stk_sd_mt_tertunjuk,
            'stk_sd_mt_terukur'       => $this->stk_sd_mt_terukur,
            'stk_luas_sumber_daya'    => $this->stk_luas_sumber_daya,
            'stk_sd_tenaga_ahli'      => $this->stk_sd_tenaga_ahli,
            'stk_cadang_m3_terkira'   => $this->stk_cadang_m3_terkira,
            'stk_cadang_m3_terbukti'  => $this->stk_cadang_m3_terbukti,
            'stk_cadang_mt_terkira'   => $this->stk_cadang_mt_terkira,
            'stk_cadang_mt_terbukti'  => $this->stk_cadang_mt_terbukti,
            'stk_luas_cadangan'       => $this->stk_luas_cadangan,
            'stk_cadang_tenaga_ahli'  => $this->stk_cadang_tenaga_ahli,
            'stk_target_produksi_m3'  => $this->stk_target_produksi_m3,
            'stk_target_produksi_mt'  => $this->stk_target_produksi_mt,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'stk_no_persetujuan',
            'stk_tgl_persetujuan',
            'stk_sd_m3_tereka',
            'stk_sd_m3_tertunjuk',
            'stk_sd_m3_terukur',
            'stk_sd_mt_tereka',
            'stk_sd_mt_tertunjuk',
            'stk_sd_mt_terukur',
            'stk_luas_sumber_daya',
            'stk_sd_tenaga_ahli',
            'stk_cadang_m3_terkira',
            'stk_cadang_m3_terbukti',
            'stk_cadang_mt_terkira',
            'stk_cadang_mt_terbukti',
            'stk_luas_cadangan',
            'stk_cadang_tenaga_ahli',
            'stk_target_produksi_m3',
            'stk_target_produksi_mt',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.stk-add');
    }
}
