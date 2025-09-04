<?php

namespace App\Livewire\Profile;

use App\Models\Pa as ModelsPa;
use Livewire\Component;

class Pa extends Component
{
    public $project_area;
    public $original;

    public $project_area_nomor;
    public $project_area_tgl;
    public $project_area_penggunaan;
    public $project_area_luas;
    public $project_area_keterangan;

    protected $rules = [
        'project_area.*.project_area_nomor'      => 'required|string|max:255',
        'project_area.*.project_area_tgl'        => 'required|date',
        'project_area.*.project_area_penggunaan' => 'required|string|max:255',
        'project_area.*.project_area_luas'       => 'required|numeric|min:0',
        'project_area.*.project_area_keterangan' => 'nullable|string|max:500',
    ];

    protected $messages = [
        'project_area.*.project_area_nomor.required'      => 'Nomor area wajib diisi.',
        'project_area.*.project_area_tgl.required'        => 'Tanggal wajib diisi.',
        'project_area.*.project_area_penggunaan.required' => 'Penggunaan wajib diisi.',
        'project_area.*.project_area_luas.required'       => 'Luas wajib diisi.',
        'project_area.*.project_area_luas.numeric'        => 'Luas harus berupa angka.',
        'project_area.*.project_area_keterangan.string'   => 'Keterangan harus berupa teks.',
    ];

    public function mount()
    {
        $this->project_area = ModelsPa::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->project_area;
    }

    public function update($id)
    {
        $this->validate();

        $data = collect($this->project_area)->firstWhere('id', $id);

        ModelsPa::find($id)->update($data);

        // refresh data original dari DB
        $this->original = ModelsPa::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->project_area[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsPa::whereId($id)->delete();
        $this->project_area = collect($this->project_area)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $project_area = ModelsPa::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $project_area;

        return view('livewire.profile.pa', [
            'project_area' => $project_area,
            'original'     => $original,
        ]);
    }
}
