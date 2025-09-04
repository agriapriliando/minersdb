<?php

namespace App\Livewire\Profile;

use App\Models\Iui;
use Livewire\Component;

class IuiAdd extends Component
{
    public $iui_no_izin;
    public $iui_tgl_izin;
    public $iui_status_permodalan_pmdn_pma;
    public $iui_kontrak_kerja_sama;

    protected $rules = [
        'iui_no_izin'                   => 'required|string|max:100',
        'iui_tgl_izin'                  => 'required|date',
        'iui_status_permodalan_pmdn_pma' => 'required|in:PMDN,PMA',
        'iui_kontrak_kerja_sama'        => 'nullable|string|max:255',
    ];

    protected $messages = [
        'iui_no_izin.required'                   => 'Nomor izin wajib diisi.',
        'iui_no_izin.string'                     => 'Nomor izin harus berupa teks.',
        'iui_no_izin.max'                        => 'Nomor izin maksimal 100 karakter.',
        'iui_tgl_izin.required'                  => 'Tanggal izin wajib diisi.',
        'iui_tgl_izin.date'                      => 'Format tanggal tidak valid.',
        'iui_status_permodalan_pmdn_pma.required' => 'Status permodalan wajib dipilih.',
        'iui_status_permodalan_pmdn_pma.in'      => 'Status permodalan hanya boleh PMDN atau PMA.',
        'iui_kontrak_kerja_sama.string'          => 'Kontrak kerja sama harus berupa teks.',
        'iui_kontrak_kerja_sama.max'             => 'Kontrak kerja sama maksimal 255 karakter.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Iui::create([
            'profile_id'                    => $id_perusahaan,
            'iui_no_izin'                   => $this->iui_no_izin,
            'iui_tgl_izin'                  => $this->iui_tgl_izin,
            'iui_status_permodalan_pmdn_pma' => $this->iui_status_permodalan_pmdn_pma,
            'iui_kontrak_kerja_sama'        => $this->iui_kontrak_kerja_sama,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data IUI berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'iui_no_izin',
            'iui_tgl_izin',
            'iui_status_permodalan_pmdn_pma',
            'iui_kontrak_kerja_sama',
        ]);
    }

    public function render()
    {
        return view('livewire.profile.iui-add');
    }
}
