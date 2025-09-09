<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class RippmContent extends Component
{
    public $rippm;
    public $original;

    public $rippm_id;
    public $rippm_tahun;
    public $rippm_pendidikan_rencana;
    public $rippm_pendidikan_realisasi;
    public $rippm_kesehatan_rencana;
    public $rippm_kesehatan_realisasi;
    public $rippm_kemandirian_rencana;
    public $rippm_kemandirian_realisasi;
    public $rippm_tenaga_kerja_rencana;
    public $rippm_tenaga_kerja_realisasi;
    public $rippm_sosbud_rencana;
    public $rippm_sosbud_realisasi;
    public $rippm_lingkungan_rencana;
    public $rippm_lingkungan_realisasi;
    public $rippm_lembaga_komunitas_rencana;
    public $rippm_lembaga_komunitas_realisasi;
    public $rippm_infrastruktur_rencana;
    public $rippm_infrastruktur_realisasi;

    protected $rules = [
        'rippm.*.rippm_tahun'                        => 'required|digits:4|integer|min:1900',
        'rippm.*.rippm_pendidikan_rencana'           => 'nullable|numeric|min:0',
        'rippm.*.rippm_pendidikan_realisasi'         => 'nullable|numeric|min:0',
        'rippm.*.rippm_kesehatan_rencana'            => 'nullable|numeric|min:0',
        'rippm.*.rippm_kesehatan_realisasi'          => 'nullable|numeric|min:0',
        'rippm.*.rippm_kemandirian_rencana'          => 'nullable|numeric|min:0',
        'rippm.*.rippm_kemandirian_realisasi'        => 'nullable|numeric|min:0',
        'rippm.*.rippm_tenaga_kerja_rencana'         => 'nullable|numeric|min:0',
        'rippm.*.rippm_tenaga_kerja_realisasi'       => 'nullable|numeric|min:0',
        'rippm.*.rippm_sosbud_rencana'               => 'nullable|numeric|min:0',
        'rippm.*.rippm_sosbud_realisasi'             => 'nullable|numeric|min:0',
        'rippm.*.rippm_lingkungan_rencana'           => 'nullable|numeric|min:0',
        'rippm.*.rippm_lingkungan_realisasi'         => 'nullable|numeric|min:0',
        'rippm.*.rippm_lembaga_komunitas_rencana'    => 'nullable|numeric|min:0',
        'rippm.*.rippm_lembaga_komunitas_realisasi'  => 'nullable|numeric|min:0',
        'rippm.*.rippm_infrastruktur_rencana'        => 'nullable|numeric|min:0',
        'rippm.*.rippm_infrastruktur_realisasi'      => 'nullable|numeric|min:0',
    ];

    protected $messages = [
        'rippm.*.rippm_tahun.required' => 'Tahun wajib diisi.',
        'rippm.*.rippm_tahun.digits'   => 'Tahun harus 4 digit.',
        'rippm.*.rippm_tahun.integer'  => 'Tahun harus berupa angka.',
    ];

    public function mount()
    {
        $this->rippm = RippmContent::where('rippm_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->rippm;
    }

    protected function rulesForRow($index)
    {
        return [
            "rippm.$index.rippm_tahun"                       => 'required|digits:4|integer|min:1900',
            "rippm.$index.rippm_pendidikan_rencana"          => 'nullable|numeric|min:0',
            "rippm.$index.rippm_pendidikan_realisasi"        => 'nullable|numeric|min:0',
            "rippm.$index.rippm_kesehatan_rencana"           => 'nullable|numeric|min:0',
            "rippm.$index.rippm_kesehatan_realisasi"         => 'nullable|numeric|min:0',
            "rippm.$index.rippm_kemandirian_rencana"         => 'nullable|numeric|min:0',
            "rippm.$index.rippm_kemandirian_realisasi"       => 'nullable|numeric|min:0',
            "rippm.$index.rippm_tenaga_kerja_rencana"        => 'nullable|numeric|min:0',
            "rippm.$index.rippm_tenaga_kerja_realisasi"      => 'nullable|numeric|min:0',
            "rippm.$index.rippm_sosbud_rencana"              => 'nullable|numeric|min:0',
            "rippm.$index.rippm_sosbud_realisasi"            => 'nullable|numeric|min:0',
            "rippm.$index.rippm_lingkungan_rencana"          => 'nullable|numeric|min:0',
            "rippm.$index.rippm_lingkungan_realisasi"        => 'nullable|numeric|min:0',
            "rippm.$index.rippm_lembaga_komunitas_rencana"   => 'nullable|numeric|min:0',
            "rippm.$index.rippm_lembaga_komunitas_realisasi" => 'nullable|numeric|min:0',
            "rippm.$index.rippm_infrastruktur_rencana"       => 'nullable|numeric|min:0',
            "rippm.$index.rippm_infrastruktur_realisasi"     => 'nullable|numeric|min:0',
        ];
    }

    public function update($id)
    {
        $index = collect($this->rippm)->search(fn($row) => $row['id'] == $id);

        $this->validate($this->rulesForRow($index));

        $data = $this->rippm[$index];

        RippmContent::find($id)->update($data);

        $this->original = RippmContent::where('rippm_id', session('id_perusahaan'))
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
        RippmContent::whereId($id)->delete();
        $this->rippm = collect($this->rippm)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data berhasil dihapus!');
    }

    public function render()
    {
        $rippm = RippmContent::where('rippm_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $rippm;

        return view('livewire.profile.rippm-content', [
            'rippm' => $rippm,
            'original' => $original,
        ]);
    }
}
