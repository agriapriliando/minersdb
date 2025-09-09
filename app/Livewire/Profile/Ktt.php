<?php

namespace App\Livewire\Profile;

use App\Models\Ktt as ModelsKtt;
use Livewire\Component;

class Ktt extends Component
{
    public $ktt = [];
    public $original = [];

    // field tambah data baru
    public $ktt_no_pengesahan;
    public $ktt_tgl_pengesahan;
    public $nama_ktt;

    public $editingId = null;

    protected $messages = [
        'ktt.*.ktt_no_pengesahan.required' => 'Nomor pengesahan wajib diisi.',
        'ktt.*.ktt_tgl_pengesahan.required' => 'Tanggal pengesahan wajib diisi.',
        'ktt.*.ktt_tgl_pengesahan.date'     => 'Tanggal tidak valid.',
        'ktt.*.nama_ktt.required'           => 'Nama KTT wajib diisi.',

        'ktt_no_pengesahan.required' => 'Nomor pengesahan wajib diisi.',
        'ktt_tgl_pengesahan.required' => 'Tanggal pengesahan wajib diisi.',
        'ktt_tgl_pengesahan.date'     => 'Tanggal tidak valid.',
        'nama_ktt.required'           => 'Nama KTT wajib diisi.',
    ];

    public function mount()
    {
        $this->ktt = ModelsKtt::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')
            ->toArray();

        $this->original = $this->ktt;
    }

    protected function rulesForRow($id)
    {
        return [
            "ktt.$id.ktt_no_pengesahan" => 'required',
            "ktt.$id.ktt_tgl_pengesahan" => 'required|date',
            "ktt.$id.nama_ktt" => 'required',
        ];
    }

    protected function rulesForNew()
    {
        return [
            "ktt_no_pengesahan" => 'required',
            "ktt_tgl_pengesahan" => 'required|date',
            "nama_ktt" => 'required',
        ];
    }

    public function store()
    {
        $this->validate($this->rulesForNew());

        ModelsKtt::create([
            'profile_id' => session('id_perusahaan'),
            'ktt_no_pengesahan' => $this->ktt_no_pengesahan,
            'ktt_tgl_pengesahan' => $this->ktt_tgl_pengesahan,
            'nama_ktt' => $this->nama_ktt,
        ]);

        $this->ktt = ModelsKtt::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')
            ->toArray();

        $this->original = $this->ktt;

        $this->reset(['ktt_no_pengesahan', 'ktt_tgl_pengesahan', 'nama_ktt']);

        $this->dispatch('store-success', message: 'Data KTT baru berhasil ditambahkan!');
    }

    public function update($id)
    {
        $this->validate($this->rulesForRow($id));

        $data = $this->ktt[$id];
        ModelsKtt::find($id)->update($data);

        $this->original = ModelsKtt::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')
            ->toArray();

        $this->dispatch('update-success', message: 'Data KTT berhasil diperbaharui!');
        $this->editingId = null;
    }

    public function batal($id)
    {
        if (isset($this->original[$id])) {
            $this->ktt[$id] = $this->original[$id];
        }
        $this->editingId = null;
    }

    public function delete($id)
    {
        ModelsKtt::whereId($id)->delete();

        unset($this->ktt[$id]);
        unset($this->original[$id]);

        $this->dispatch('delete-success', message: 'Data KTT berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.profile.ktt');
    }
}
