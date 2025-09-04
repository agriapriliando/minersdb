<?php

namespace App\Livewire\Profile;

use App\Models\Iuran;
use Livewire\Component;

class IuranAdd extends Component
{
    public $iuran_tetap_per_tahun_nominal;
    public $iuran_tetap_per_tahun_tgl_bayar;

    protected $rules = [
        'iuran_tetap_per_tahun_nominal' => 'required|numeric|min:0',
        'iuran_tetap_per_tahun_tgl_bayar' => 'required|date',
    ];

    protected $messages = [
        'iuran_tetap_per_tahun_nominal.required' => 'Nominal wajib diisi.',
        'iuran_tetap_per_tahun_nominal.numeric' => 'Nominal harus angka.',
        'iuran_tetap_per_tahun_tgl_bayar.required' => 'Tanggal wajib diisi.',
        'iuran_tetap_per_tahun_tgl_bayar.date' => 'Tanggal tidak valid.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Iuran::create([
            'profile_id' => $id_perusahaan,
            'iuran_tetap_per_tahun_nominal' => $this->iuran_tetap_per_tahun_nominal,
            'iuran_tetap_per_tahun_tgl_bayar' => $this->iuran_tetap_per_tahun_tgl_bayar,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset(['iuran_tetap_per_tahun_nominal', 'iuran_tetap_per_tahun_tgl_bayar']);
    }
    public function render()
    {
        return view('livewire.profile.iuran-add');
    }
}
