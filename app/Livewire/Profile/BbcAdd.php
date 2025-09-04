<?php

namespace App\Livewire\Profile;

use App\Models\Bbc;
use Livewire\Component;

class BbcAdd extends Component
{
    public $bbc_tangki_no_persetujuan;
    public $bbc_tgl;
    public $bbc_kapasitas_tangki;
    public $bbc_tgl_mulai;
    public $bbc_tgl_selesai;

    protected $rules = [
        'bbc_tangki_no_persetujuan' => 'required|string|max:255',
        'bbc_tgl'                   => 'required|date',
        'bbc_kapasitas_tangki'      => 'required|numeric|min:0',
        'bbc_tgl_mulai'             => 'required|date',
        'bbc_tgl_selesai'           => 'required|date|after_or_equal:bbc_tgl_mulai',
    ];

    protected $messages = [
        'bbc_tangki_no_persetujuan.required' => 'Nomor persetujuan wajib diisi.',
        'bbc_tgl.required'                   => 'Tanggal wajib diisi.',
        'bbc_kapasitas_tangki.required'      => 'Kapasitas tangki wajib diisi.',
        'bbc_kapasitas_tangki.numeric'       => 'Kapasitas tangki harus angka.',
        'bbc_tgl_mulai.required'             => 'Tanggal mulai wajib diisi.',
        'bbc_tgl_selesai.required'           => 'Tanggal selesai wajib diisi.',
        'bbc_tgl_selesai.after_or_equal'     => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Bbc::create([
            'profile_id'               => $id_perusahaan,
            'bbc_tangki_no_persetujuan' => $this->bbc_tangki_no_persetujuan,
            'bbc_tgl'                  => $this->bbc_tgl,
            'bbc_kapasitas_tangki'     => $this->bbc_kapasitas_tangki,
            'bbc_tgl_mulai'            => $this->bbc_tgl_mulai,
            'bbc_tgl_selesai'          => $this->bbc_tgl_selesai,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'bbc_tangki_no_persetujuan',
            'bbc_tgl',
            'bbc_kapasitas_tangki',
            'bbc_tgl_mulai',
            'bbc_tgl_selesai',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.bbc-add');
    }
}
