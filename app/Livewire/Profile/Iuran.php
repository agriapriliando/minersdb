<?php

namespace App\Livewire\Profile;

use App\Models\Iuran as ModelsIuran;
use Livewire\Component;
use Livewire\WithPagination;

class Iuran extends Component
{
    use WithPagination;
    public $iuran;

    public $original;

    public $iuran_tetap_per_tahun_nominal;
    public $iuran_tetap_per_tahun_tgl_bayar;

    protected $rules = [
        'iuran.*.iuran_tetap_per_tahun_nominal' => 'required|numeric|min:0',
        'iuran.*.iuran_tetap_per_tahun_tgl_bayar' => 'required|date',
    ];

    protected $messages = [
        'iuran.*.iuran_tetap_per_tahun_nominal.required' => 'Nominal wajib diisi.',
        'iuran.*.iuran_tetap_per_tahun_nominal.numeric'  => 'Nominal harus angka.',
        'iuran.*.iuran_tetap_per_tahun_tgl_bayar.required' => 'Tanggal wajib diisi.',
        'iuran.*.iuran_tetap_per_tahun_tgl_bayar.date'     => 'Tanggal tidak valid.',
    ];

    public function update($id)
    {
        $this->validate();

        $data = collect($this->iuran)->firstWhere('id', $id);

        ModelsIuran::find($id)->update($data);

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function mount()
    {
        $this->iuran = ModelsIuran::where('profile_id', session('id_perusahaan'))->latest()->get()
            ->toArray();
        $this->original = $this->iuran; // simpan salinan asli

    }

    public function batal($index)
    {
        // reset satu baris ke data awal
        $this->iuran[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsIuran::whereId($id)->delete();
        $this->iuran = collect($this->iuran)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();
        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $iuran = ModelsIuran::where('profile_id', session('id_perusahaan'))->latest()->get()
            ->toArray();
        $original = $iuran;
        return view('livewire.profile.iuran', [
            'iuran' => $iuran,
            'original' => $original
        ]);
    }
}
