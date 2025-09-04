<?php

namespace App\Livewire\Profile;

use App\Models\Le as ModelsLe;
use Livewire\Component;

class Le extends Component
{
    public $le;
    public $original;

    public $le_no_persetujuan;
    public $le_tgl_persetujuan;
    public $le_sd_m3_tereka;
    public $le_sd_m3_tertunjuk;
    public $le_sd_m3_terukur;
    public $le_sd_mt_tereka;
    public $le_sd_mt_tertunjuk;
    public $le_sd_mt_terukur;

    protected $rules = [
        'le.*.le_no_persetujuan'   => 'required|string|max:255',
        'le.*.le_tgl_persetujuan'  => 'required|date',
        'le.*.le_sd_m3_tereka'     => 'nullable|numeric|min:0',
        'le.*.le_sd_m3_tertunjuk'  => 'nullable|numeric|min:0',
        'le.*.le_sd_m3_terukur'    => 'nullable|numeric|min:0',
        'le.*.le_sd_mt_tereka'     => 'nullable|numeric|min:0',
        'le.*.le_sd_mt_tertunjuk'  => 'nullable|numeric|min:0',
        'le.*.le_sd_mt_terukur'    => 'nullable|numeric|min:0',
    ];

    protected $messages = [
        'le.*.le_no_persetujuan.required'  => 'Nomor persetujuan wajib diisi.',
        'le.*.le_tgl_persetujuan.required' => 'Tanggal persetujuan wajib diisi.',
        'le.*.le_tgl_persetujuan.date'     => 'Format tanggal tidak valid.',
        'le.*.le_sd_m3_tereka.numeric'     => 'Nilai harus berupa angka.',
        'le.*.le_sd_m3_tertunjuk.numeric'  => 'Nilai harus berupa angka.',
        'le.*.le_sd_m3_terukur.numeric'    => 'Nilai harus berupa angka.',
        'le.*.le_sd_mt_tereka.numeric'     => 'Nilai harus berupa angka.',
        'le.*.le_sd_mt_tertunjuk.numeric'  => 'Nilai harus berupa angka.',
        'le.*.le_sd_mt_terukur.numeric'    => 'Nilai harus berupa angka.',
    ];

    public function mount()
    {
        $this->le = ModelsLe::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->le; // simpan salinan asli
    }

    public function update($id)
    {
        $this->validate();

        $data = collect($this->le)->firstWhere('id', $id);

        ModelsLe::find($id)->update($data);

        // refresh data original dari DB
        $this->original = ModelsLe::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->le[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsLe::whereId($id)->delete();

        $this->le = collect($this->le)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $le = ModelsLe::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $le;

        return view('livewire.profile.le', [
            'le' => $le,
            'original' => $original,
        ]);
    }
}
