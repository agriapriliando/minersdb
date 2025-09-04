<?php

namespace App\Livewire\Profile;

use App\Models\Pl as ModelsPl;
use Livewire\Component;

class Pl extends Component
{
    public $persetujuan_lingkungan;
    public $original;

    public $persetujuan_lingkungan_nomor;
    public $persetujuan_lingkungan_tgl;
    public $persetujuan_lingkungan_target_produksi;
    public $persetujuan_lingkungan_wilayah_izin;
    public $persetujuan_lingkungan_area_penunjang;

    protected $rules = [
        'persetujuan_lingkungan.*.persetujuan_lingkungan_nomor'           => 'required|string|max:255',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_tgl'             => 'required|date',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_target_produksi' => 'required|numeric|min:0',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_wilayah_izin'    => 'required|string|max:255',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_area_penunjang'  => 'required|string|max:255',
    ];

    protected $messages = [
        'persetujuan_lingkungan.*.persetujuan_lingkungan_nomor.required'           => 'Nomor persetujuan wajib diisi.',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_tgl.required'             => 'Tanggal wajib diisi.',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_target_produksi.required' => 'Target produksi wajib diisi.',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_target_produksi.numeric'  => 'Target produksi harus berupa angka.',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_wilayah_izin.required'    => 'Wilayah izin wajib diisi.',
        'persetujuan_lingkungan.*.persetujuan_lingkungan_area_penunjang.required'  => 'Area penunjang wajib diisi.',
    ];

    public function mount()
    {
        $this->persetujuan_lingkungan = ModelsPl::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->persetujuan_lingkungan;
    }

    public function update($id)
    {
        $this->validate();

        $data = collect($this->persetujuan_lingkungan)->firstWhere('id', $id);

        ModelsPl::find($id)->update($data);

        $this->original = ModelsPl::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->persetujuan_lingkungan[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsPl::whereId($id)->delete();
        $this->persetujuan_lingkungan = collect($this->persetujuan_lingkungan)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $persetujuan_lingkungan = ModelsPl::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $persetujuan_lingkungan;

        return view('livewire.profile.pl', [
            'persetujuan_lingkungan' => $persetujuan_lingkungan,
            'original' => $original,
        ]);
    }
}
