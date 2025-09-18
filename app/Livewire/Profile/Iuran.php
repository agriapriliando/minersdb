<?php

namespace App\Livewire\Profile;

use App\Models\Dokumen;
use App\Models\Iuran as ModelsIuran;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Iuran extends Component
{
    // untuk dokumen
    use WithFileUploads, WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $file;
    public $searchdok = '';

    public $iuran = [];
    public $original = [];


    // field tambah data baru
    public $iuran_tetap_per_tahun_nominal;
    public $iuran_tetap_per_tahun_tgl_bayar;

    public $editingId = null;

    protected $messages = [
        'iuran.*.iuran_tetap_per_tahun_nominal.required' => 'Nominal iuran wajib diisi.',
        'iuran.*.iuran_tetap_per_tahun_nominal.numeric'  => 'Nominal harus berupa angka.',
        'iuran.*.iuran_tetap_per_tahun_nominal.min'      => 'Nominal tidak boleh kurang dari 0.',

        'iuran.*.iuran_tetap_per_tahun_tgl_bayar.required' => 'Tanggal bayar wajib diisi.',
        'iuran.*.iuran_tetap_per_tahun_tgl_bayar.date'     => 'Tanggal tidak valid.',
    ];

    public function mount()
    {
        $this->iuran = ModelsIuran::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')     // kunci array pakai ID
            ->toArray();

        $this->original = $this->iuran;
    }

    // Fungsi untuk tambah dokumen
    public function saveDokumen()
    {
        $this->validate([
            'file' => 'required|file|max:10240', // max 5MB
        ]);

        // Simpan file ke storage/app/public/dokumens
        $path = $this->file->store('dokumens', 'public');

        Dokumen::create([
            'profile_id'    => session('id_perusahaan'),
            'model_dokumen' => 'iuran',
            'judul_dokumen' => pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME),
            'ket_dokumen'   => null,
            'link_dokumen'  => 'storage/' . $path,
            'size_dokumen'  => $this->file->getSize(),
            'ext_dokumen'   => $this->file->getClientOriginalExtension(),
        ]);

        // Reset input file
        $this->reset('file');

        session()->flash('success', 'Dokumen berhasil diunggah!');
    }

    public function deleteDokumen($id)
    {
        // Cari dokumen berdasarkan ID
        $dokumen = Dokumen::find($id);
        if (!$dokumen) {
            session()->flash('error', 'Dokumen tidak ditemukan.');
            // Refresh daftar dokumen
            $this->loadDokumens();
            return;
        }
        // Hapus file fisik jika ada
        if ($dokumen->link_dokumen && Storage::disk('public')->exists(str_replace('storage/', '', $dokumen->link_dokumen))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $dokumen->link_dokumen));
        }

        // Hapus record dari database
        $dokumen->delete();

        // Kirim notifikasi sukses
        session()->flash('success', 'Dokumen berhasil dihapus.');
    }

    public function updatedSearchdok()
    {
        $this->resetPage();
    }

    protected function rulesForRow($id)
    {
        return [
            "iuran.$id.iuran_tetap_per_tahun_nominal" => 'required|numeric|min:0',
            "iuran.$id.iuran_tetap_per_tahun_tgl_bayar" => 'required|date',
        ];
    }

    protected function rulesForNew()
    {
        return [
            "iuran_tetap_per_tahun_nominal" => 'required|numeric|min:0',
            "iuran_tetap_per_tahun_tgl_bayar" => 'required|date',
        ];
    }

    public function store()
    {
        $this->validate($this->rulesForNew());

        ModelsIuran::create([
            'profile_id' => session('id_perusahaan'),
            'iuran_tetap_per_tahun_nominal' => $this->iuran_tetap_per_tahun_nominal,
            'iuran_tetap_per_tahun_tgl_bayar' => $this->iuran_tetap_per_tahun_tgl_bayar,
        ]);

        // refresh data dengan key id
        $this->iuran = ModelsIuran::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')
            ->toArray();

        $this->original = $this->iuran;

        $this->reset(['iuran_tetap_per_tahun_nominal', 'iuran_tetap_per_tahun_tgl_bayar']);

        $this->dispatch('store-success', message: 'Data iuran baru berhasil ditambahkan!');
    }

    public function update($id)
    {
        $this->validate($this->rulesForRow($id));

        $data = $this->iuran[$id];
        ModelsIuran::find($id)->update($data);

        $this->original = ModelsIuran::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->keyBy('id')
            ->toArray();

        $this->dispatch('update-success', message: 'Data iuran berhasil diperbaharui!');
        $this->editingId = null;
    }

    public function batal($id)
    {
        if (isset($this->original[$id])) {
            $this->iuran[$id] = $this->original[$id];
        }
        $this->editingId = null;
    }

    public function delete($id)
    {
        ModelsIuran::whereId($id)->delete();

        unset($this->iuran[$id]);
        unset($this->original[$id]);

        $this->dispatch('delete-success', message: 'Data iuran berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.profile.iuran', [
            'dokumens' => Dokumen::where('profile_id', session('id_perusahaan'))
                ->iuran()
                ->where('judul_dokumen', 'like', '%' . $this->searchdok . '%')
                ->latest()
                ->paginate(5)
        ]);
    }
}
