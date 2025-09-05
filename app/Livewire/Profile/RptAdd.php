<?php

namespace App\Livewire\Profile;

use App\Models\Rpt;
use Livewire\Component;

class RptAdd extends Component
{
    public $rpt_no_persetujuan;
    public $rpt_tgl_persetujuan;
    public $rpt_nominal_yang_ditetapkan;
    public $rpt_nominal_yang_ditempatkan;
    public $rpt_tahun_pembayaran;

    protected $rules = [
        'rpt_no_persetujuan'           => 'required|string|max:255',
        'rpt_tgl_persetujuan'          => 'required|date',
        'rpt_nominal_yang_ditetapkan'  => 'required|numeric|min:0',
        'rpt_nominal_yang_ditempatkan' => 'required|numeric|min:0',
        'rpt_tahun_pembayaran'         => 'required|digits:4|integer|min:1900',
    ];

    protected $messages = [
        'rpt_no_persetujuan.required'           => 'Nomor persetujuan wajib diisi.',
        'rpt_tgl_persetujuan.required'          => 'Tanggal persetujuan wajib diisi.',
        'rpt_nominal_yang_ditetapkan.required'  => 'Nominal yang ditetapkan wajib diisi.',
        'rpt_nominal_yang_ditetapkan.numeric'   => 'Nominal yang ditetapkan harus berupa angka.',
        'rpt_nominal_yang_ditempatkan.required' => 'Nominal yang ditempatkan wajib diisi.',
        'rpt_nominal_yang_ditempatkan.numeric'  => 'Nominal yang ditempatkan harus berupa angka.',
        'rpt_tahun_pembayaran.required'         => 'Tahun pembayaran wajib diisi.',
        'rpt_tahun_pembayaran.digits'           => 'Tahun pembayaran harus 4 digit.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Rpt::create([
            'profile_id'                 => $id_perusahaan,
            'rpt_no_persetujuan'         => $this->rpt_no_persetujuan,
            'rpt_tgl_persetujuan'        => $this->rpt_tgl_persetujuan,
            'rpt_nominal_yang_ditetapkan' => $this->rpt_nominal_yang_ditetapkan,
            'rpt_nominal_yang_ditempatkan' => $this->rpt_nominal_yang_ditempatkan,
            'rpt_tahun_pembayaran'       => $this->rpt_tahun_pembayaran,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'rpt_no_persetujuan',
            'rpt_tgl_persetujuan',
            'rpt_nominal_yang_ditetapkan',
            'rpt_nominal_yang_ditempatkan',
            'rpt_tahun_pembayaran',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.rpt-add');
    }
}
