<?php

namespace App\Livewire\Profile;

use App\Models\Rippm as ModelsRippm;
use Livewire\Component;

class Rippm extends Component
{
    public $rippm;
    public $original;

    public $rippm_no_persetujuan;
    public $rippm_tgl_persetujuan;
    public $rippm_keterangan;

    protected $rules = [
        'rippm.*.rippm_no_persetujuan'  => 'required|string|max:255',
        'rippm.*.rippm_tgl_persetujuan' => 'required|date',
        'rippm.*.rippm_keterangan'      => 'nullable|string',
    ];

    protected $messages = [
        'rippm.*.rippm_no_persetujuan.required'  => 'Nomor persetujuan wajib diisi.',
        'rippm.*.rippm_tgl_persetujuan.required' => 'Tanggal persetujuan wajib diisi.',
        'rippm.*.rippm_tgl_persetujuan.date'     => 'Tanggal tidak valid.',
    ];

    public function mount()
    {
        $this->rippm = ModelsRippm::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->rippm;
    }

    protected function rulesForRow($index)
    {
        return [
            "rippm.$index.rippm_no_persetujuan"  => 'required|string|max:255',
            "rippm.$index.rippm_tgl_persetujuan" => 'required|date',
            "rippm.$index.rippm_keterangan"      => 'nullable|string',
        ];
    }

    public function update($id)
    {
        $index = collect($this->rippm)->search(fn($row) => $row['id'] == $id);

        $this->validate($this->rulesForRow($index));

        $data = $this->rippm[$index];

        ModelsRippm::find($id)->update($data);

        // refresh data original dari DB
        $this->original = ModelsRippm::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->rippm[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsRippm::whereId($id)->delete();
        $this->rippm = collect($this->rippm)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $rippm = ModelsRippm::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $rippm;

        return view('livewire.profile.rippm', [
            'rippm'    => $rippm,
            'original' => $original,
        ]);
    }
}
