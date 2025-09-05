<?php

namespace App\Livewire\Profile;

use App\Models\Rr;
use Livewire\Component;

class RrAdd extends Component
{
    public $rr_no_persetujuan;
    public $rr_tgl_persetujuan;
    public $rr_tahun;
    public $rr_nominal_yang_ditetapkan;
    public $rr_nominal_yang_ditempatkan;

    protected $rules = [
        'rr_no_persetujuan'           => 'required|string|max:255',
        'rr_tgl_persetujuan'          => 'required|date',
        'rr_tahun'                    => 'required',
        'rr_nominal_yang_ditetapkan'  => 'required|numeric|min:0',
        'rr_nominal_yang_ditempatkan' => 'required|numeric|min:0',
    ];

    protected $messages = [
        'rr_no_persetujuan.required'           => 'Nomor persetujuan wajib diisi.',
        'rr_tgl_persetujuan.required'          => 'Tanggal persetujuan wajib diisi.',
        'rr_tgl_persetujuan.date'              => 'Tanggal tidak valid.',
        'rr_tahun.required'                    => 'Tahun wajib diisi.',
        'rr_nominal_yang_ditetapkan.required'  => 'Nominal yang ditetapkan wajib diisi.',
        'rr_nominal_yang_ditetapkan.numeric'   => 'Nominal yang ditetapkan harus berupa angka.',
        'rr_nominal_yang_ditempatkan.required' => 'Nominal yang ditempatkan wajib diisi.',
        'rr_nominal_yang_ditempatkan.numeric'  => 'Nominal yang ditempatkan harus berupa angka.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Rr::create([
            'profile_id'                 => $id_perusahaan,
            'rr_no_persetujuan'          => $this->rr_no_persetujuan,
            'rr_tgl_persetujuan'         => $this->rr_tgl_persetujuan,
            'rr_tahun'                   => $this->rr_tahun,
            'rr_nominal_yang_ditetapkan' => $this->rr_nominal_yang_ditetapkan,
            'rr_nominal_yang_ditempatkan' => $this->rr_nominal_yang_ditempatkan,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'rr_no_persetujuan',
            'rr_tgl_persetujuan',
            'rr_tahun',
            'rr_nominal_yang_ditetapkan',
            'rr_nominal_yang_ditempatkan',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.rr-add');
    }
}
