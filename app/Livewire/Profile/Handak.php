<?php

namespace App\Livewire\Profile;

use App\Models\Handak as ModelsHandak;
use Livewire\Component;

class Handak extends Component
{
    public $handak;
    public $original;

    public $handak_no_persetujuan;
    public $handak_tgl;
    public $handak_jenis_bahan;
    public $handak_kapasitas_gudang;
    public $handak_tgl_mulai;
    public $handak_tgl_selesai;

    protected $rules = [
        'handak.*.handak_no_persetujuan'   => 'required|string|max:255',
        'handak.*.handak_tgl'              => 'required|date',
        'handak.*.handak_jenis_bahan'      => 'required|string|max:255',
        'handak.*.handak_kapasitas_gudang' => 'required|numeric|min:0',
        'handak.*.handak_tgl_mulai'        => 'required|date',
        'handak.*.handak_tgl_selesai'      => 'required|date|after_or_equal:handak.*.handak_tgl_mulai',
    ];

    protected $messages = [
        'handak.*.handak_no_persetujuan.required'   => 'Nomor persetujuan wajib diisi.',
        'handak.*.handak_tgl.required'              => 'Tanggal wajib diisi.',
        'handak.*.handak_jenis_bahan.required'      => 'Jenis bahan wajib diisi.',
        'handak.*.handak_kapasitas_gudang.required' => 'Kapasitas gudang wajib diisi.',
        'handak.*.handak_kapasitas_gudang.numeric'  => 'Kapasitas gudang harus berupa angka.',
        'handak.*.handak_tgl_mulai.required'        => 'Tanggal mulai wajib diisi.',
        'handak.*.handak_tgl_selesai.required'      => 'Tanggal selesai wajib diisi.',
        'handak.*.handak_tgl_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
    ];

    public function mount()
    {
        $this->handak = ModelsHandak::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->handak;
    }

    public function update($id)
    {
        $this->validate();

        $data = collect($this->handak)->firstWhere('id', $id);

        ModelsHandak::find($id)->update($data);

        // refresh data original dari DB
        $this->original = ModelsHandak::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->handak[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsHandak::whereId($id)->delete();
        $this->handak = collect($this->handak)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $handak = ModelsHandak::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $handak;

        return view('livewire.profile.handak', [
            'handak' => $handak,
            'original' => $original,
        ]);
    }
}
