<?php

namespace App\Livewire\Profile;

use App\Models\Dokumen;
use App\Models\Rkabop as ModelsRkabop;
use App\Traits\WithDokumen;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Rkabop extends Component
{
    public $rkabop = [];
    public $original = [];

    public $newRkabop = [];  // data baru untuk form tambah

    // field tambah data baru (bisa ditambah sesuai kebutuhan form create)
    // public $rkab_no_persetujuan;
    // public $rkab_tgl_persetujuan;

    public $editingId = null;

    // protected $messages = [
    //     'rkabop.*.rkab_no_persetujuan.required' => 'Nomor persetujuan wajib diisi.',
    //     'rkabop.*.rkab_tgl_persetujuan.required' => 'Tanggal persetujuan wajib diisi.',
    //     'rkabop.*.rkab_tgl_persetujuan.date' => 'Tanggal tidak valid.',
    // ];

    public function mount()
    {
        $this->rkabop = ModelsRkabop::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')
            ->toArray();

        $this->original = $this->rkabop;
    }

    protected function rulesForRow($id)
    {
        return $this->rules("rkabop.$id.");
    }

    protected function rulesForNew()
    {
        return $this->rules("newRkabop.");
    }

    protected function rules($prefix = '')
    {
        return [
            $prefix . 'rkab_no_persetujuan' => 'required|string',
            $prefix . 'rkab_tgl_persetujuan' => 'required|date',

            // Sumber Daya Tahun I
            $prefix . 'rkab_sd_thn_i_m3_tereka' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_i_m3_tertunjuk' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_i_m3_terukur' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_i_mt_tereka' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_i_mt_tertunjuk' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_i_mt_terukur' => 'nullable|numeric|min:0',

            // Sumber Daya Tahun II
            $prefix . 'rkab_sd_thn_ii_m3_tereka' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_ii_m3_tertunjuk' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_ii_m3_terukur' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_ii_mt_tereka' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_ii_mt_tertunjuk' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_ii_mt_terukur' => 'nullable|numeric|min:0',

            // Sumber Daya Tahun III
            $prefix . 'rkab_sd_thn_iii_m3_tereka' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_iii_m3_tertunjuk' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_iii_m3_terukur' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_iii_mt_tereka' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_iii_mt_tertunjuk' => 'nullable|numeric|min:0',
            $prefix . 'rkab_sd_thn_iii_mt_terukur' => 'nullable|numeric|min:0',

            // Tenaga Ahli
            $prefix . 'rkab_tenaga_ahli_competent_person' => 'nullable|string',

            // Cadangan
            $prefix . 'rkab_cadangan_thn_i_terkira' => 'nullable|numeric|min:0',
            $prefix . 'rkab_cadangan_thn_i_terbukti' => 'nullable|numeric|min:0',
            $prefix . 'rkab_cadangan_thn_ii_terkira' => 'nullable|numeric|min:0',
            $prefix . 'rkab_cadangan_thn_ii_terbukti' => 'nullable|numeric|min:0',
            $prefix . 'rkab_cadangan_thn_iii_terkira' => 'nullable|numeric|min:0',
            $prefix . 'rkab_cadangan_thn_iii_terbukti' => 'nullable|numeric|min:0',

            // Produksi Tahun I
            $prefix . 'rkab_prod_thn_i_target_m3_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_i_target_m3_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_i_realisasi_m3_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_i_realisasi_m3_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_i_target_mt_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_i_target_my_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_i_realisasi_mt_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_i_realisasi_mt_sampingan' => 'nullable|numeric|min:0',

            // Produksi Tahun II
            $prefix . 'rkab_prod_thn_ii_target_m3_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_ii_target_m3_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_ii_realisasi_m3_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_ii_realisasi_m3_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_ii_target_mt_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_ii_target_my_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_ii_realisasi_mt_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_ii_realisasi_mt_sampingan' => 'nullable|numeric|min:0',

            // Produksi Tahun III
            $prefix . 'rkab_prod_thn_iii_target_m3_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_iii_target_m3_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_iii_realisasi_m3_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_iii_realisasi_m3_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_iii_target_mt_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_iii_target_my_sampingan' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_iii_realisasi_mt_utama' => 'nullable|numeric|min:0',
            $prefix . 'rkab_prod_thn_iii_realisasi_mt_sampingan' => 'nullable|numeric|min:0',

            // Pajak
            $prefix . 'rkab_pajak_thn_i_daerah' => 'nullable|numeric|min:0',
            $prefix . 'rkab_pajak_thn_i_opsen' => 'nullable|numeric|min:0',
            $prefix . 'rkab_pajak_thn_ii_daerah' => 'nullable|numeric|min:0',
            $prefix . 'rkab_pajak_thn_ii_opsen' => 'nullable|numeric|min:0',
            $prefix . 'rkab_pajak_thn_iii_daerah' => 'nullable|numeric|min:0',
            $prefix . 'rkab_pajak_thn_iii_opsen' => 'nullable|numeric|min:0',

            // Tenaga Kerja Tahun I
            $prefix . 'rkab_tenaga_kerja_thn_i_lokal' => 'nullable|numeric|min:0',
            $prefix . 'rkab_tenaga_kerja_thn_i_non_lokal' => 'nullable|numeric|min:0',
            $prefix . 'rkab_tenaga_kerja_thn_i_tka' => 'nullable|numeric|min:0',

            // Tenaga Kerja Tahun II
            $prefix . 'rkab_tenaga_kerja_thn_ii_lokal' => 'nullable|numeric|min:0',
            $prefix . 'rkab_tenaga_kerja_thn_ii_non_lokal' => 'nullable|numeric|min:0',
            $prefix . 'rkab_tenaga_kerja_thn_ii_tka' => 'nullable|numeric|min:0',

            // Tenaga Kerja Tahun III
            $prefix . 'rkab_tenaga_kerja_thn_iii_lokal' => 'nullable|numeric|min:0',
            $prefix . 'rkab_tenaga_kerja_thn_iii_non_lokal' => 'nullable|numeric|min:0',
            $prefix . 'rkab_tenaga_kerja_thn_iii_tka' => 'nullable|numeric|min:0',
        ];
    }

    public function store()
    {
        $this->validate($this->rulesForNew());

        ModelsRkabop::create(array_merge(
            ['profile_id' => session('id_perusahaan')],
            $this->newRkabop
        ));

        $this->rkabop = ModelsRkabop::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')
            ->toArray();

        $this->original = $this->rkabop;

        // reset form tambah
        $this->reset('newRkabop');

        $this->dispatch('store-success', message: 'Data RKABOP baru berhasil ditambahkan!');
    }

    public function update($id)
    {
        $this->validate($this->rulesForRow($id));

        $data = $this->rkabop[$id];
        ModelsRkabop::find($id)->update($data);

        $this->original = ModelsRkabop::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')
            ->toArray();

        $this->dispatch('update-success', message: 'Data RKABOP berhasil diperbaharui!');
        $this->editingId = null;
    }

    public function batal($id)
    {
        if (isset($this->original[$id])) {
            $this->rkabop[$id] = $this->original[$id];
        }
        $this->editingId = null;
    }

    public function delete($id)
    {
        ModelsRkabop::whereId($id)->delete();

        unset($this->rkabop[$id]);
        unset($this->original[$id]);

        $this->dispatch('delete-success', message: 'Data RKABOP berhasil dihapus!');
    }

    // untuk dokumen
    use WithFileUploads, WithPagination, WithDokumen;
    public function render()
    {
        $input_model_dokumen = 'rkabop';
        return view('livewire.profile.' . $input_model_dokumen, [
            'dokumens' => Dokumen::where('profile_id', session('id_perusahaan'))
                ->where('model_dokumen', $input_model_dokumen)
                ->where('judul_dokumen', 'like', '%' . $this->searchdok . '%')
                ->latest()
                ->paginate(5),
            'jenis_dokumens' => ['Persetujuan', 'Non Persetujuan'],
            'judul_menu' => 'RKAB Operasi Produksi',
            'input_model_dokumen' => $input_model_dokumen,
        ]);
    }
}
