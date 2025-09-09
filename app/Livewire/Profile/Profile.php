<?php

namespace App\Livewire\Profile;

use App\Models\Profile as ModelsProfile;
use Livewire\Component;

class Profile extends Component
{
    public $id;
    public $profile;
    public $isEditing = false;

    // semua kolom profile
    public $nama_pemegang_perizinan;
    public $kabupaten_kota;
    public $kecamatan;
    public $desa_kelurahan;
    public $luas_ha;
    public $tahapan_iup;
    public $komoditas;
    public $nomor_induk_berusaha_nib;
    public $nomor_npwp;
    public $status_npwp;
    public $jenis_izin;
    public $nomor_sk_izin;
    public $tgl_terbit_izin;
    public $tgl_berakhir_izin;
    public $alamat_perusahaan_berdasarkan_sk_izin;
    public $nama_direktur_sesuai_sk_izin;
    public $dewan_direksi_bod;
    public $modal_kerja;
    public $nama_pic;
    public $no_hp_pic;
    public $email_resmi_perusahaan;
    public $nib_email_oss;
    public $nib_nomor_hp_oss;
    public $keterangan;

    public function mount($id)
    {
        $this->id = $id;
        $this->profile = ModelsProfile::findOrFail($id);

        // isi property sesuai data dari database
        $this->fill($this->profile->toArray());

        // simpan di session jika perlu
        session(['id_perusahaan' => $id]);
        session(['nama_pemegang_perizinan' => $this->profile->nama_pemegang_perizinan]);
    }

    public function rules()
    {
        return [
            'nama_pemegang_perizinan' => 'required|string|max:255',
            'kabupaten_kota' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'desa_kelurahan' => 'nullable|string|max:255',
            'luas_ha' => 'nullable|string',
            'tahapan_iup' => 'nullable|string|max:255',
            'komoditas' => 'nullable|string|max:255',
            'nomor_induk_berusaha_nib' => 'nullable|string|max:255',
            'nomor_npwp' => 'nullable|string|max:255',
            'status_npwp' => 'nullable|string|max:255',
            'jenis_izin' => 'nullable|string|max:255',
            'nomor_sk_izin' => 'nullable|string|max:255',
            'tgl_terbit_izin' => 'nullable|date',
            'tgl_berakhir_izin' => 'nullable|date',
            'alamat_perusahaan_berdasarkan_sk_izin' => 'nullable|string',
            'nama_direktur_sesuai_sk_izin' => 'nullable|string|max:255',
            'dewan_direksi_bod' => 'nullable|string',
            'modal_kerja' => 'nullable|string',
            'nama_pic' => 'nullable|string|max:255',
            'no_hp_pic' => 'nullable|string|max:20',
            'email_resmi_perusahaan' => 'nullable|email|max:255',
            'nib_email_oss' => 'nullable|string|max:255',
            'nib_nomor_hp_oss' => 'nullable|string|max:20',
            'keterangan' => 'nullable|string',
        ];
    }

    public function edit()
    {
        // aktifkan mode edit
        $this->isEditing = true;
    }

    public function cancel()
    {
        // reload data dari database
        $this->profile = ModelsProfile::findOrFail($this->id);

        // isi ulang semua property dengan data asli
        $this->fill($this->profile->toArray());
        $this->isEditing = false;
    }

    public function update()
    {
        $this->validate();

        $this->profile->update($this->only([
            'nama_pemegang_perizinan',
            'kabupaten_kota',
            'kecamatan',
            'desa_kelurahan',
            'luas_ha',
            'tahapan_iup',
            'komoditas',
            'nomor_induk_berusaha_nib',
            'nomor_npwp',
            'status_npwp',
            'jenis_izin',
            'nomor_sk_izin',
            'tgl_terbit_izin',
            'tgl_berakhir_izin',
            'alamat_perusahaan_berdasarkan_sk_izin',
            'nama_direktur_sesuai_sk_izin',
            'dewan_direksi_bod',
            'modal_kerja',
            'nama_pic',
            'no_hp_pic',
            'email_resmi_perusahaan',
            'nib_email_oss',
            'nib_nomor_hp_oss',
            'keterangan',
        ]));

        $this->isEditing = false; // kembali ke mode view
        $this->dispatch('update-success', message: 'Profile berhasil diperbaharui!');
    }

    public function render()
    {
        return view('livewire.profile.profile');
    }
}
