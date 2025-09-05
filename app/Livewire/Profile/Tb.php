<?php

namespace App\Livewire\Profile;

use App\Models\Tb as ModelsTb;
use Livewire\Component;

class Tb extends Component
{
    public $tandaBatas;
    public $original;

    public $no_sk_tanda_batas;
    public $tgl_sk_tanda_batas;
    public $tanda_batas_laporan_pemeliharaan;

    protected $rules = [
        'tandaBatas.*.no_sk_tanda_batas'               => 'required|string|max:255',
        'tandaBatas.*.tgl_sk_tanda_batas'              => 'required|date',
        'tandaBatas.*.tanda_batas_laporan_pemeliharaan' => 'nullable|string',
    ];

    protected $messages = [
        'tandaBatas.*.no_sk_tanda_batas.required'        => 'Nomor SK wajib diisi.',
        'tandaBatas.*.tgl_sk_tanda_batas.required'       => 'Tanggal SK wajib diisi.',
        'tandaBatas.*.tgl_sk_tanda_batas.date'           => 'Tanggal tidak valid.',
    ];

    public function mount()
    {
        $this->tandaBatas = ModelsTb::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->tandaBatas;
    }

    protected function rulesForRow($index)
    {
        return [
            "tandaBatas.$index.no_sk_tanda_batas"                => 'required|string|max:255',
            "tandaBatas.$index.tgl_sk_tanda_batas"               => 'required|date',
            "tandaBatas.$index.tanda_batas_laporan_pemeliharaan" => 'nullable|string',
        ];
    }

    public function update($id)
    {
        $index = collect($this->tandaBatas)->search(fn($row) => $row['id'] == $id);

        $this->validate($this->rulesForRow($index));

        $data = $this->tandaBatas[$index];

        ModelsTb::find($id)->update($data);

        $this->original = ModelsTb::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->tandaBatas[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsTb::whereId($id)->delete();
        $this->tandaBatas = collect($this->tandaBatas)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $tandaBatas = ModelsTb::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $tandaBatas;

        return view('livewire.profile.tb', [
            'tandaBatas' => $tandaBatas,
            'original'   => $original,
        ]);
    }
}
