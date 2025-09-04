<?php

namespace App\Livewire\Profile;

use App\Models\Pa;
use Livewire\Component;

class PaAdd extends Component
{
    public $project_area_nomor;
    public $project_area_tgl;
    public $project_area_penggunaan;
    public $project_area_luas;
    public $project_area_keterangan;

    protected $rules = [
        'project_area_nomor'      => 'required|string|max:255',
        'project_area_tgl'        => 'required|date',
        'project_area_penggunaan' => 'required|string|max:255',
        'project_area_luas'       => 'required|numeric|min:0',
        'project_area_keterangan' => 'nullable|string|max:500',
    ];

    protected $messages = [
        'project_area_nomor.required'      => 'Nomor area wajib diisi.',
        'project_area_tgl.required'        => 'Tanggal wajib diisi.',
        'project_area_penggunaan.required' => 'Penggunaan wajib diisi.',
        'project_area_luas.required'       => 'Luas wajib diisi.',
        'project_area_luas.numeric'        => 'Luas harus berupa angka.',
        'project_area_keterangan.string'   => 'Keterangan harus berupa teks.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Pa::create([
            'profile_id'              => $id_perusahaan,
            'project_area_nomor'      => $this->project_area_nomor,
            'project_area_tgl'        => $this->project_area_tgl,
            'project_area_penggunaan' => $this->project_area_penggunaan,
            'project_area_luas'       => $this->project_area_luas,
            'project_area_keterangan' => $this->project_area_keterangan,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'project_area_nomor',
            'project_area_tgl',
            'project_area_penggunaan',
            'project_area_luas',
            'project_area_keterangan',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.pa-add');
    }
}
