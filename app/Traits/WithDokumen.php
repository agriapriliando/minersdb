<?php

namespace App\Traits;

use App\Models\Dokumen;
use Illuminate\Support\Facades\Storage;

trait WithDokumen
{
    protected $paginationTheme = 'bootstrap';
    public $file;
    public $jenis_dokumen = 'Lainnya';
    public $searchdok;

    public function saveDokumen($model = 'profil')
    {
        $this->validate([
            'file'          => 'required|file|max:10240',
            'jenis_dokumen' => 'required|string|max:100',
        ]);

        $path = $this->file->store('dokumens/' . session('id_perusahaan'), 'public');

        Dokumen::create([
            'profile_id'    => session('id_perusahaan'),
            'model_dokumen' => $model,
            'jenis_dokumen' => $this->jenis_dokumen,
            'judul_dokumen' => pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME),
            'ket_dokumen'   => null,
            'link_dokumen'  => 'storage/' . $path,
            'size_dokumen'  => $this->file->getSize(),
            'ext_dokumen'   => $this->file->getClientOriginalExtension(),
        ]);

        $this->reset(['file', 'jenis_dokumen']);

        session()->flash('success', 'Dokumen berhasil diunggah!');
    }

    public function deleteDokumen($id)
    {
        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            session()->flash('error', 'Dokumen tidak ditemukan.');
            return;
        }

        if ($dokumen->link_dokumen && Storage::disk('public')->exists(str_replace('storage/', '', $dokumen->link_dokumen))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $dokumen->link_dokumen));
        }

        $dokumen->delete();

        session()->flash('success', 'Dokumen berhasil dihapus.');
    }

    public function updatedSearchdok()
    {
        $this->resetPage();
    }
}
