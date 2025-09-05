<?php

namespace App\Livewire\Profile;

use App\Models\Rpt as ModelsRpt;
use Livewire\Component;

class Rpt extends Component
{
    public $rpt;
    public $original;

    public $rpt_no_persetujuan;
    public $rpt_tgl_persetujuan;
    public $rpt_nominal_yang_ditetapkan;
    public $rpt_nominal_yang_ditempatkan;
    public $rpt_tahun_pembayaran;

    protected $rules = [
        'rpt.*.rpt_no_persetujuan'           => 'required|string|max:255',
        'rpt.*.rpt_tgl_persetujuan'          => 'required|date',
        'rpt.*.rpt_nominal_yang_ditetapkan'  => 'required|numeric|min:0',
        'rpt.*.rpt_nominal_yang_ditempatkan' => 'required|numeric|min:0',
        'rpt.*.rpt_tahun_pembayaran'         => 'required|digits:4|integer|min:1900',
    ];

    protected $messages = [
        'rpt.*.rpt_no_persetujuan.required'           => 'Nomor persetujuan wajib diisi.',
        'rpt.*.rpt_tgl_persetujuan.required'          => 'Tanggal persetujuan wajib diisi.',
        'rpt.*.rpt_nominal_yang_ditetapkan.required'  => 'Nominal yang ditetapkan wajib diisi.',
        'rpt.*.rpt_nominal_yang_ditetapkan.numeric'   => 'Nominal yang ditetapkan harus berupa angka.',
        'rpt.*.rpt_nominal_yang_ditempatkan.required' => 'Nominal yang ditempatkan wajib diisi.',
        'rpt.*.rpt_nominal_yang_ditempatkan.numeric'  => 'Nominal yang ditempatkan harus berupa angka.',
        'rpt.*.rpt_tahun_pembayaran.required'         => 'Tahun pembayaran wajib diisi.',
        'rpt.*.rpt_tahun_pembayaran.digits'           => 'Tahun pembayaran harus 4 digit.',
    ];

    public function mount()
    {
        $this->rpt = ModelsRpt::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->rpt;
    }

    protected function rulesForRow($index)
    {
        return [
            "rpt.$index.rpt_no_persetujuan"           => 'required|string|max:255',
            "rpt.$index.rpt_tgl_persetujuan"          => 'required|date',
            "rpt.$index.rpt_nominal_yang_ditetapkan"  => 'required|numeric|min:0',
            "rpt.$index.rpt_nominal_yang_ditempatkan" => 'required|numeric|min:0',
            "rpt.$index.rpt_tahun_pembayaran"         => 'required|digits:4|integer|min:1900',
        ];
    }

    public function update($id)
    {
        $index = collect($this->rpt)->search(fn($row) => $row['id'] == $id);

        $this->validate($this->rulesForRow($index));

        $data = $this->rpt[$index];

        ModelsRpt::find($id)->update($data);

        // refresh data original dari DB
        $this->original = ModelsRpt::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->rpt[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsRpt::whereId($id)->delete();
        $this->rpt = collect($this->rpt)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $rpt = ModelsRpt::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $rpt;

        return view('livewire.profile.rpt', [
            'rpt' => $rpt,
            'original' => $original,
        ]);
    }
}
