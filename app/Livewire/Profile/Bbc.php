<?php

namespace App\Livewire\Profile;

use App\Models\Bbc as ModelsBbc;
use Livewire\Component;

class Bbc extends Component
{
    public $bbc;
    public $original;

    public $bbc_tangki_no_persetujuan;
    public $bbc_tgl;
    public $bbc_kapasitas_tangki;
    public $bbc_tgl_mulai;
    public $bbc_tgl_selesai;

    protected $rules = [
        'bbc.*.bbc_tangki_no_persetujuan' => 'required|string|max:255',
        'bbc.*.bbc_tgl'                   => 'required|date',
        'bbc.*.bbc_kapasitas_tangki'      => 'required|numeric|min:0',
        'bbc.*.bbc_tgl_mulai'             => 'required|date',
        'bbc.*.bbc_tgl_selesai'           => 'required|date|after_or_equal:bbc.*.bbc_tgl_mulai',
    ];

    protected $messages = [
        'bbc.*.bbc_tangki_no_persetujuan.required' => 'Nomor persetujuan wajib diisi.',
        'bbc.*.bbc_tgl.required'                   => 'Tanggal wajib diisi.',
        'bbc.*.bbc_kapasitas_tangki.required'      => 'Kapasitas tangki wajib diisi.',
        'bbc.*.bbc_kapasitas_tangki.numeric'       => 'Kapasitas tangki harus angka.',
        'bbc.*.bbc_tgl_mulai.required'             => 'Tanggal mulai wajib diisi.',
        'bbc.*.bbc_tgl_selesai.required'           => 'Tanggal selesai wajib diisi.',
        'bbc.*.bbc_tgl_selesai.after_or_equal'     => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
    ];

    public function mount()
    {
        $this->bbc = ModelsBbc::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->bbc; // simpan salinan asli
    }

    public function update($id)
    {
        $this->validate();

        $data = collect($this->bbc)->firstWhere('id', $id);

        ModelsBbc::find($id)->update($data);

        // refresh data original dari DB
        $this->original = ModelsBbc::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->bbc[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsBbc::whereId($id)->delete();

        $this->bbc = collect($this->bbc)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $bbc = ModelsBbc::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $bbc;

        return view('livewire.profile.bbc', [
            'bbc' => $bbc,
            'original' => $original,
        ]);
    }
}
