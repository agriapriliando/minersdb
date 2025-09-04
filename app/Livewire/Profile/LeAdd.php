<?php

namespace App\Livewire\Profile;

use App\Models\Le;
use Livewire\Component;

class LeAdd extends Component
{

    public $le_no_persetujuan;
    public $le_tgl_persetujuan;
    public $le_sd_m3_tereka;
    public $le_sd_m3_tertunjuk;
    public $le_sd_m3_terukur;
    public $le_sd_mt_tereka;
    public $le_sd_mt_tertunjuk;
    public $le_sd_mt_terukur;

    protected $rules = [
        'le_no_persetujuan'  => 'required|string|max:255',
        'le_tgl_persetujuan' => 'required|date',
        'le_sd_m3_tereka'    => 'nullable|numeric|min:0',
        'le_sd_m3_tertunjuk' => 'nullable|numeric|min:0',
        'le_sd_m3_terukur'   => 'nullable|numeric|min:0',
        'le_sd_mt_tereka'    => 'nullable|numeric|min:0',
        'le_sd_mt_tertunjuk' => 'nullable|numeric|min:0',
        'le_sd_mt_terukur'   => 'nullable|numeric|min:0',
    ];

    protected $messages = [
        'le_no_persetujuan.required'  => 'Nomor persetujuan wajib diisi.',
        'le_tgl_persetujuan.required' => 'Tanggal persetujuan wajib diisi.',
        'le_tgl_persetujuan.date'     => 'Tanggal tidak valid.',
        'le_sd_m3_tereka.numeric'     => 'Nilai harus berupa angka.',
        'le_sd_m3_tertunjuk.numeric'  => 'Nilai harus berupa angka.',
        'le_sd_m3_terukur.numeric'    => 'Nilai harus berupa angka.',
        'le_sd_mt_tereka.numeric'     => 'Nilai harus berupa angka.',
        'le_sd_mt_tertunjuk.numeric'  => 'Nilai harus berupa angka.',
        'le_sd_mt_terukur.numeric'    => 'Nilai harus berupa angka.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Le::create([
            'profile_id'          => $id_perusahaan,
            'le_no_persetujuan'   => $this->le_no_persetujuan,
            'le_tgl_persetujuan'  => $this->le_tgl_persetujuan,
            'le_sd_m3_tereka'     => $this->le_sd_m3_tereka,
            'le_sd_m3_tertunjuk'  => $this->le_sd_m3_tertunjuk,
            'le_sd_m3_terukur'    => $this->le_sd_m3_terukur,
            'le_sd_mt_tereka'     => $this->le_sd_mt_tereka,
            'le_sd_mt_tertunjuk'  => $this->le_sd_mt_tertunjuk,
            'le_sd_mt_terukur'    => $this->le_sd_mt_terukur,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'le_no_persetujuan',
            'le_tgl_persetujuan',
            'le_sd_m3_tereka',
            'le_sd_m3_tertunjuk',
            'le_sd_m3_terukur',
            'le_sd_mt_tereka',
            'le_sd_mt_tertunjuk',
            'le_sd_mt_terukur',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.le-add');
    }
}
