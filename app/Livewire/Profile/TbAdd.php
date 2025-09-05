<?php

namespace App\Livewire\Profile;

use App\Models\Tb;
use Livewire\Component;

class TbAdd extends Component
{
    public $no_sk_tanda_batas;
    public $tgl_sk_tanda_batas;
    public $tanda_batas_laporan_pemeliharaan;

    protected $rules = [
        'no_sk_tanda_batas'               => 'required|string|max:255',
        'tgl_sk_tanda_batas'              => 'required|date',
        'tanda_batas_laporan_pemeliharaan' => 'nullable|string',
    ];

    protected $messages = [
        'no_sk_tanda_batas.required'   => 'Nomor SK wajib diisi.',
        'tgl_sk_tanda_batas.required'  => 'Tanggal SK wajib diisi.',
        'tgl_sk_tanda_batas.date'      => 'Tanggal tidak valid.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Tb::create([
            'profile_id'                        => $id_perusahaan,
            'no_sk_tanda_batas'                 => $this->no_sk_tanda_batas,
            'tgl_sk_tanda_batas'                => $this->tgl_sk_tanda_batas,
            'tanda_batas_laporan_pemeliharaan'  => $this->tanda_batas_laporan_pemeliharaan,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'no_sk_tanda_batas',
            'tgl_sk_tanda_batas',
            'tanda_batas_laporan_pemeliharaan',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.tb-add');
    }
}
