<?php

namespace App\Livewire\Profile;

use App\Models\Stk as ModelsStk;
use Livewire\Component;

class Stk extends Component
{
    public $stk;
    public $original;

    public $stk_no_persetujuan;
    public $stk_tgl_persetujuan;
    public $stk_sd_m3_tereka;
    public $stk_sd_m3_tertunjuk;
    public $stk_sd_m3_terukur;
    public $stk_sd_mt_tereka;
    public $stk_sd_mt_tertunjuk;
    public $stk_sd_mt_terukur;
    public $stk_luas_sumber_daya;
    public $stk_sd_tenaga_ahli;
    public $stk_cadang_m3_terkira;
    public $stk_cadang_m3_terbukti;
    public $stk_cadang_mt_terkira;
    public $stk_cadang_mt_terbukti;
    public $stk_luas_cadangan;
    public $stk_cadang_tenaga_ahli;
    public $stk_target_produksi_m3;
    public $stk_target_produksi_mt;

    protected $rules = [
        'stk.*.stk_no_persetujuan'      => 'required|string|max:255',
        'stk.*.stk_tgl_persetujuan'     => 'required|date',
        'stk.*.stk_sd_m3_tereka'        => 'nullable|numeric|min:0',
        'stk.*.stk_sd_m3_tertunjuk'     => 'nullable|numeric|min:0',
        'stk.*.stk_sd_m3_terukur'       => 'nullable|numeric|min:0',
        'stk.*.stk_sd_mt_tereka'        => 'nullable|numeric|min:0',
        'stk.*.stk_sd_mt_tertunjuk'     => 'nullable|numeric|min:0',
        'stk.*.stk_sd_mt_terukur'       => 'nullable|numeric|min:0',
        'stk.*.stk_luas_sumber_daya'    => 'nullable|numeric|min:0',
        'stk.*.stk_sd_tenaga_ahli'      => 'nullable|string|max:255',
        'stk.*.stk_cadang_m3_terkira'   => 'nullable|numeric|min:0',
        'stk.*.stk_cadang_m3_terbukti'  => 'nullable|numeric|min:0',
        'stk.*.stk_cadang_mt_terkira'   => 'nullable|numeric|min:0',
        'stk.*.stk_cadang_mt_terbukti'  => 'nullable|numeric|min:0',
        'stk.*.stk_luas_cadangan'       => 'nullable|numeric|min:0',
        'stk.*.stk_cadang_tenaga_ahli'  => 'nullable|string|max:255',
        'stk.*.stk_target_produksi_m3'  => 'nullable|numeric|min:0',
        'stk.*.stk_target_produksi_mt'  => 'nullable|numeric|min:0',
    ];

    protected $messages = [
        'stk.*.stk_no_persetujuan.required'   => 'Nomor persetujuan wajib diisi.',
        'stk.*.stk_tgl_persetujuan.required'  => 'Tanggal persetujuan wajib diisi.',
        'stk.*.stk_tgl_persetujuan.date'      => 'Tanggal tidak valid.',
    ];

    public function mount()
    {
        $this->stk = ModelsStk::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->stk;
    }

    protected function rulesForRow($index)
    {
        return [
            "stk.$index.stk_no_persetujuan"     => 'required|string|max:255',
            "stk.$index.stk_tgl_persetujuan"    => 'required|date',
            "stk.$index.stk_sd_m3_tereka"       => 'nullable|numeric|min:0',
            "stk.$index.stk_sd_m3_tertunjuk"    => 'nullable|numeric|min:0',
            "stk.$index.stk_sd_m3_terukur"      => 'nullable|numeric|min:0',
            "stk.$index.stk_sd_mt_tereka"       => 'nullable|numeric|min:0',
            "stk.$index.stk_sd_mt_tertunjuk"    => 'nullable|numeric|min:0',
            "stk.$index.stk_sd_mt_terukur"      => 'nullable|numeric|min:0',
            "stk.$index.stk_luas_sumber_daya"   => 'nullable|numeric|min:0',
            "stk.$index.stk_sd_tenaga_ahli"     => 'nullable|string|max:255',
            "stk.$index.stk_cadang_m3_terkira"  => 'nullable|numeric|min:0',
            "stk.$index.stk_cadang_m3_terbukti" => 'nullable|numeric|min:0',
            "stk.$index.stk_cadang_mt_terkira"  => 'nullable|numeric|min:0',
            "stk.$index.stk_cadang_mt_terbukti" => 'nullable|numeric|min:0',
            "stk.$index.stk_luas_cadangan"      => 'nullable|numeric|min:0',
            "stk.$index.stk_cadang_tenaga_ahli" => 'nullable|string|max:255',
            "stk.$index.stk_target_produksi_m3" => 'nullable|numeric|min:0',
            "stk.$index.stk_target_produksi_mt" => 'nullable|numeric|min:0',
        ];
    }

    public function update($id)
    {
        $index = collect($this->stk)->search(fn($row) => $row['id'] == $id);

        $this->validate($this->rulesForRow($index));

        $data = $this->stk[$index];

        ModelsStk::find($id)->update($data);

        $this->original = ModelsStk::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->stk[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsStk::whereId($id)->delete();
        $this->stk = collect($this->stk)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $stk = ModelsStk::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $stk;

        return view('livewire.profile.stk', [
            'stk' => $stk,
            'original' => $original,
        ]);
    }
}
