<?php

namespace App\Livewire\Profile;

use App\Models\Pelabuhan;
use Livewire\Component;

class PelabuhanAdd extends Component
{
    public $pelabuhan_no_persetujuan;
    public $pelabuhan_tgl_persetujuan;
    public $pelabuhan_status_tuks_terum;

    protected $rules = [
        'pelabuhan_no_persetujuan'   => 'required|string|max:255',
        'pelabuhan_tgl_persetujuan'  => 'required|date',
        'pelabuhan_status_tuks_terum' => 'required|string|max:255',
    ];

    protected $messages = [
        'pelabuhan_no_persetujuan.required'   => 'Nomor persetujuan wajib diisi.',
        'pelabuhan_no_persetujuan.string'     => 'Nomor persetujuan harus berupa teks.',
        'pelabuhan_tgl_persetujuan.required'  => 'Tanggal wajib diisi.',
        'pelabuhan_tgl_persetujuan.date'      => 'Tanggal tidak valid.',
        'pelabuhan_status_tuks_terum.required' => 'Status TUKS/TERUM wajib diisi.',
        'pelabuhan_status_tuks_terum.string'   => 'Status harus berupa teks.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Pelabuhan::create([
            'profile_id'                 => $id_perusahaan,
            'pelabuhan_no_persetujuan'   => $this->pelabuhan_no_persetujuan,
            'pelabuhan_tgl_persetujuan'  => $this->pelabuhan_tgl_persetujuan,
            'pelabuhan_status_tuks_terum' => $this->pelabuhan_status_tuks_terum,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'pelabuhan_no_persetujuan',
            'pelabuhan_tgl_persetujuan',
            'pelabuhan_status_tuks_terum',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.pelabuhan-add');
    }
}
