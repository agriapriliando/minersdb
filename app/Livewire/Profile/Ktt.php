<?php

namespace App\Livewire\Profile;

use App\Models\Ktt as ModelsKtt;
use Livewire\Component;

class Ktt extends Component
{
    public $ktt;       // data binding array dari DB
    public $original;  // salinan data awal

    public $ktt_no_pengesahan;
    public $ktt_tgl_pengesahan;
    public $nama_ktt;

    protected $rules = [
        'ktt.*.ktt_no_pengesahan'   => 'required|string|max:100',
        'ktt.*.ktt_tgl_pengesahan'  => 'required|date',
        'ktt.*.nama_ktt'            => 'required|string|max:150',
    ];

    protected $messages = [
        'ktt.*.ktt_no_pengesahan.required'  => 'Nomor pengesahan wajib diisi.',
        'ktt.*.ktt_no_pengesahan.string'    => 'Nomor pengesahan harus berupa teks.',
        'ktt.*.ktt_no_pengesahan.max'       => 'Nomor pengesahan maksimal 100 karakter.',

        'ktt.*.ktt_tgl_pengesahan.required' => 'Tanggal pengesahan wajib diisi.',
        'ktt.*.ktt_tgl_pengesahan.date'     => 'Tanggal pengesahan tidak valid.',

        'ktt.*.nama_ktt.required'           => 'Nama KTT wajib diisi.',
        'ktt.*.nama_ktt.string'             => 'Nama KTT harus berupa teks.',
        'ktt.*.nama_ktt.max'                => 'Nama KTT maksimal 150 karakter.',
    ];

    public function mount()
    {
        $this->ktt = ModelsKtt::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->ktt;
    }

    public function update($id)
    {
        $this->validate();

        $data = collect($this->ktt)->firstWhere('id', $id);

        ModelsKtt::find($id)->update($data);

        $this->dispatch('update-success', message: 'Data KTT berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->ktt[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsKtt::whereId($id)->delete();

        $this->ktt = collect($this->ktt)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data KTT berhasil dihapus!');
    }

    public function render()
    {
        $ktt = ModelsKtt::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $ktt;

        return view('livewire.profile.ktt', [
            'ktt' => $ktt,
            'original' => $original,
        ]);
    }
}
