<?php

namespace App\Livewire\Profile;

use App\Models\Pl;
use Livewire\Component;

class PlAdd extends Component
{
    public $persetujuan_lingkungan_nomor;
    public $persetujuan_lingkungan_tgl;
    public $persetujuan_lingkungan_target_produksi;
    public $persetujuan_lingkungan_wilayah_izin;
    public $persetujuan_lingkungan_area_penunjang;

    protected $rules = [
        'persetujuan_lingkungan_nomor'           => 'required|string|max:255',
        'persetujuan_lingkungan_tgl'             => 'required|date',
        'persetujuan_lingkungan_target_produksi' => 'required|numeric|min:0',
        'persetujuan_lingkungan_wilayah_izin'    => 'required|string|max:255',
        'persetujuan_lingkungan_area_penunjang'  => 'required|string|max:255',
    ];

    protected $messages = [
        'persetujuan_lingkungan_nomor.required'           => 'Nomor persetujuan wajib diisi.',
        'persetujuan_lingkungan_tgl.required'             => 'Tanggal wajib diisi.',
        'persetujuan_lingkungan_target_produksi.required' => 'Target produksi wajib diisi.',
        'persetujuan_lingkungan_target_produksi.numeric'  => 'Target produksi harus berupa angka.',
        'persetujuan_lingkungan_wilayah_izin.required'    => 'Wilayah izin wajib diisi.',
        'persetujuan_lingkungan_area_penunjang.required'  => 'Area penunjang wajib diisi.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Pl::create([
            'profile_id'                        => $id_perusahaan,
            'persetujuan_lingkungan_nomor'      => $this->persetujuan_lingkungan_nomor,
            'persetujuan_lingkungan_tgl'        => $this->persetujuan_lingkungan_tgl,
            'persetujuan_lingkungan_target_produksi' => $this->persetujuan_lingkungan_target_produksi,
            'persetujuan_lingkungan_wilayah_izin'    => $this->persetujuan_lingkungan_wilayah_izin,
            'persetujuan_lingkungan_area_penunjang'  => $this->persetujuan_lingkungan_area_penunjang,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'persetujuan_lingkungan_nomor',
            'persetujuan_lingkungan_tgl',
            'persetujuan_lingkungan_target_produksi',
            'persetujuan_lingkungan_wilayah_izin',
            'persetujuan_lingkungan_area_penunjang',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.pl-add');
    }
}
