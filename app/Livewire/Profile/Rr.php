<?php

namespace App\Livewire\Profile;

use App\Models\Rr as ModelsRr;
use Livewire\Component;

class Rr extends Component
{
    public $rr;
    public $original;

    public $rr_no_persetujuan;
    public $rr_tgl_persetujuan;
    public $rr_tahun;
    public $rr_nominal_yang_ditetapkan;
    public $rr_nominal_yang_ditempatkan;

    protected $rules = [
        'rr.*.rr_no_persetujuan'           => 'required|string|max:255',
        'rr.*.rr_tgl_persetujuan'          => 'required|date',
        'rr.*.rr_tahun'                    => 'required',
        'rr.*.rr_nominal_yang_ditetapkan'  => 'required|numeric|min:0',
        'rr.*.rr_nominal_yang_ditempatkan' => 'required|numeric|min:0',
    ];

    protected $messages = [
        'rr.*.rr_no_persetujuan.required'           => 'Nomor persetujuan wajib diisi.',
        'rr.*.rr_tgl_persetujuan.required'          => 'Tanggal persetujuan wajib diisi.',
        'rr.*.rr_tahun.required'                    => 'Tahun wajib diisi.',
        'rr.*.rr_nominal_yang_ditetapkan.required'  => 'Nominal yang ditetapkan wajib diisi.',
        'rr.*.rr_nominal_yang_ditetapkan.numeric'   => 'Nominal yang ditetapkan harus berupa angka.',
        'rr.*.rr_nominal_yang_ditempatkan.required' => 'Nominal yang ditempatkan wajib diisi.',
        'rr.*.rr_nominal_yang_ditempatkan.numeric'  => 'Nominal yang ditempatkan harus berupa angka.',
    ];

    public function mount()
    {
        $this->rr = ModelsRr::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->rr;
    }

    protected function rulesForRow($index)
    {
        return [
            "rr.$index.rr_no_persetujuan"           => 'required|string|max:255',
            "rr.$index.rr_tgl_persetujuan"          => 'required|date',
            "rr.$index.rr_tahun"                    => 'required',
            "rr.$index.rr_nominal_yang_ditetapkan"  => 'required|numeric|min:0',
            "rr.$index.rr_nominal_yang_ditempatkan" => 'required|numeric|min:0',
        ];
    }

    public function update($id)
    {
        $index = collect($this->rr)->search(fn($row) => $row['id'] == $id);

        $this->validate($this->rulesForRow($index));

        $data = $this->rr[$index];

        ModelsRr::find($id)->update($data);

        // refresh data original dari DB
        $this->original = ModelsRr::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->rr[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsRr::whereId($id)->delete();
        $this->rr = collect($this->rr)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $rr = ModelsRr::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $rr;

        return view('livewire.profile.rr', [
            'rr' => $rr,
            'original' => $original,
        ]);
    }
}
