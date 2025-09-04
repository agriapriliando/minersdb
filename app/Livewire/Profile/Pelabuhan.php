<?php

namespace App\Livewire\Profile;

use App\Models\Pelabuhan as ModelsPelabuhan;
use Livewire\Component;

class Pelabuhan extends Component
{
    public $pelabuhan;
    public $original;

    public $pelabuhan_no_persetujuan;
    public $pelabuhan_tgl_persetujuan;
    public $pelabuhan_status_tuks_terum;

    protected $rules = [
        'pelabuhan.*.pelabuhan_no_persetujuan'   => 'required|string|max:255',
        'pelabuhan.*.pelabuhan_tgl_persetujuan'  => 'required|date',
        'pelabuhan.*.pelabuhan_status_tuks_terum' => 'required|string|max:255',
    ];

    protected $messages = [
        'pelabuhan.*.pelabuhan_no_persetujuan.required'   => 'Nomor persetujuan wajib diisi.',
        'pelabuhan.*.pelabuhan_no_persetujuan.string'     => 'Nomor persetujuan harus berupa teks.',
        'pelabuhan.*.pelabuhan_tgl_persetujuan.required'  => 'Tanggal wajib diisi.',
        'pelabuhan.*.pelabuhan_tgl_persetujuan.date'      => 'Tanggal tidak valid.',
        'pelabuhan.*.pelabuhan_status_tuks_terum.required' => 'Status TUKS/TERUM wajib diisi.',
        'pelabuhan.*.pelabuhan_status_tuks_terum.string'   => 'Status harus berupa teks.',
    ];

    public function mount()
    {
        $this->pelabuhan = ModelsPelabuhan::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->pelabuhan; // simpan salinan asli
    }

    public function update($id)
    {
        $this->validate();

        $data = collect($this->pelabuhan)->firstWhere('id', $id);

        ModelsPelabuhan::find($id)->update($data);

        // refresh data original dari DB
        $this->original = ModelsPelabuhan::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        // reset satu baris ke data awal
        $this->pelabuhan[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsPelabuhan::whereId($id)->delete();

        $this->pelabuhan = collect($this->pelabuhan)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $pelabuhan = ModelsPelabuhan::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $pelabuhan;

        return view('livewire.profile.pelabuhan', [
            'pelabuhan' => $pelabuhan,
            'original'  => $original
        ]);
    }
}
