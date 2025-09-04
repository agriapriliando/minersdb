<?php

namespace App\Livewire\Profile;

use App\Models\Handak;
use Livewire\Component;

class HandakAdd extends Component
{
    public $handak_no_persetujuan;
    public $handak_tgl;
    public $handak_jenis_bahan;
    public $handak_kapasitas_gudang;
    public $handak_tgl_mulai;
    public $handak_tgl_selesai;

    protected $rules = [
        'handak_no_persetujuan'   => 'required|string|max:255',
        'handak_tgl'              => 'required|date',
        'handak_jenis_bahan'      => 'required|string|max:255',
        'handak_kapasitas_gudang' => 'required|numeric|min:0',
        'handak_tgl_mulai'        => 'required|date',
        'handak_tgl_selesai'      => 'required|date|after_or_equal:handak_tgl_mulai',
    ];

    protected $messages = [
        'handak_no_persetujuan.required'   => 'Nomor persetujuan wajib diisi.',
        'handak_tgl.required'              => 'Tanggal wajib diisi.',
        'handak_jenis_bahan.required'      => 'Jenis bahan wajib diisi.',
        'handak_kapasitas_gudang.required' => 'Kapasitas gudang wajib diisi.',
        'handak_kapasitas_gudang.numeric'  => 'Kapasitas gudang harus angka.',
        'handak_tgl_mulai.required'        => 'Tanggal mulai wajib diisi.',
        'handak_tgl_selesai.required'      => 'Tanggal selesai wajib diisi.',
        'handak_tgl_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Handak::create([
            'profile_id'             => $id_perusahaan,
            'handak_no_persetujuan'  => $this->handak_no_persetujuan,
            'handak_tgl'             => $this->handak_tgl,
            'handak_jenis_bahan'     => $this->handak_jenis_bahan,
            'handak_kapasitas_gudang' => $this->handak_kapasitas_gudang,
            'handak_tgl_mulai'       => $this->handak_tgl_mulai,
            'handak_tgl_selesai'     => $this->handak_tgl_selesai,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'handak_no_persetujuan',
            'handak_tgl',
            'handak_jenis_bahan',
            'handak_kapasitas_gudang',
            'handak_tgl_mulai',
            'handak_tgl_selesai',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.handak-add');
    }
}
