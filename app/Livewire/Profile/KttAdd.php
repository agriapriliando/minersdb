<?php

namespace App\Livewire\Profile;

use App\Models\Ktt;
use Livewire\Component;

class KttAdd extends Component
{
    public $ktt_no_pengesahan;
    public $ktt_tgl_pengesahan;
    public $nama_ktt;

    protected $rules = [
        'ktt_no_pengesahan'  => 'required|string|max:100',
        'ktt_tgl_pengesahan' => 'required|date',
        'nama_ktt'           => 'required|string|max:150',
    ];

    protected $messages = [
        'ktt_no_pengesahan.required'  => 'Nomor pengesahan wajib diisi.',
        'ktt_no_pengesahan.string'    => 'Nomor pengesahan harus berupa teks.',
        'ktt_no_pengesahan.max'       => 'Nomor pengesahan maksimal 100 karakter.',

        'ktt_tgl_pengesahan.required' => 'Tanggal pengesahan wajib diisi.',
        'ktt_tgl_pengesahan.date'     => 'Tanggal pengesahan tidak valid.',

        'nama_ktt.required'           => 'Nama KTT wajib diisi.',
        'nama_ktt.string'             => 'Nama KTT harus berupa teks.',
        'nama_ktt.max'                => 'Nama KTT maksimal 150 karakter.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Ktt::create([
            'profile_id'        => $id_perusahaan,
            'ktt_no_pengesahan' => $this->ktt_no_pengesahan,
            'ktt_tgl_pengesahan' => $this->ktt_tgl_pengesahan,
            'nama_ktt'          => $this->nama_ktt,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data KTT berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'ktt_no_pengesahan',
            'ktt_tgl_pengesahan',
            'nama_ktt',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.ktt-add');
    }
}
