<?php

namespace App\Livewire\Profile;

use App\Models\Iui as ModelsIui;
use Livewire\Component;
use Livewire\WithPagination;

class Iui extends Component
{
    use WithPagination;
    public $iui;

    public $original;

    public $iui_no_izin;
    public $iui_tgl_izin;
    public $iui_status_permodalan_pmdn_pma;
    public $iui_kontrak_kerja_sama;

    protected $rules = [
        'iui.*.iui_no_izin'                   => 'required|string|max:100',
        'iui.*.iui_tgl_izin'                  => 'required|date',
        'iui.*.iui_status_permodalan_pmdn_pma' => 'required',
        'iui.*.iui_kontrak_kerja_sama'        => 'nullable|string|max:255',
    ];

    protected $messages = [
        'iui.*.iui_no_izin.required'                    => 'Nomor izin wajib diisi.',
        'iui.*.iui_no_izin.string'                      => 'Nomor izin harus berupa teks.',
        'iui.*.iui_no_izin.max'                         => 'Nomor izin maksimal 100 karakter.',

        'iui.*.iui_tgl_izin.required'                   => 'Tanggal izin wajib diisi.',
        'iui.*.iui_tgl_izin.date'                       => 'Tanggal izin harus berupa format tanggal yang valid.',

        'iui.*.iui_status_permodalan_pmdn_pma.required' => 'Status permodalan wajib dipilih.',
        'iui.*.iui_status_permodalan_pmdn_pma.in'       => 'Status permodalan hanya boleh PMDN atau PMA.',

        'iui.*.iui_kontrak_kerja_sama.string'           => 'Kontrak kerja sama harus berupa teks.',
        'iui.*.iui_kontrak_kerja_sama.max'              => 'Kontrak kerja sama maksimal 255 karakter.',
    ];

    public function mount()
    {
        $this->iui = ModelsIui::where('profile_id', session('id_perusahaan'))->latest()->get()
            ->toArray();
        $this->original = $this->iui; // simpan salinan awal

    }

    public function updateiui($id)
    {
        $this->validate();

        $data = collect($this->iui)->firstWhere('id', $id);

        ModelsIui::find($id)->update($data);

        $this->dispatch('update-success', message: 'Data berhasil diperbaharui!');
    }

    public function batal($index)
    {
        // reset satu baris ke data awal
        $this->iui[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsIui::whereId($id)->delete();
        $this->iui = collect($this->iui)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();
        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $iui = ModelsIui::where('profile_id', session('id_perusahaan'))->latest()->get()
            ->toArray();
        $original = $iui;
        return view('livewire.profile.iui', [
            'iui' => $iui,
            'original' => $original
        ]);
    }
}
