<?php

namespace App\Livewire\Profile;

use App\Models\Kim;
use Livewire\Component;

class KimAdd extends Component
{
    public $kim_no_persetujuan;
    public $kim_tgl_persetujuan;
    public $kim_nama_juru_ledak;
    public $kim_tgl_mulai;
    public $kim_tgl_selesai;

    protected $rules = [
        'kim_no_persetujuan'   => 'required|string|max:100',
        'kim_tgl_persetujuan'  => 'required|date',
        'kim_nama_juru_ledak'  => 'required|string|max:150',
        'kim_tgl_mulai'        => 'required|date',
        'kim_tgl_selesai'      => 'required|date|after_or_equal:kim_tgl_mulai',
    ];

    protected $messages = [
        'kim_no_persetujuan.required'   => 'Nomor persetujuan wajib diisi.',
        'kim_no_persetujuan.string'     => 'Nomor persetujuan harus berupa teks.',
        'kim_no_persetujuan.max'        => 'Nomor persetujuan maksimal 100 karakter.',

        'kim_tgl_persetujuan.required'  => 'Tanggal persetujuan wajib diisi.',
        'kim_tgl_persetujuan.date'      => 'Format tanggal persetujuan tidak valid.',

        'kim_nama_juru_ledak.required'  => 'Nama juru ledak wajib diisi.',
        'kim_nama_juru_ledak.string'    => 'Nama juru ledak harus berupa teks.',
        'kim_nama_juru_ledak.max'       => 'Nama juru ledak maksimal 150 karakter.',

        'kim_tgl_mulai.required'        => 'Tanggal mulai wajib diisi.',
        'kim_tgl_mulai.date'            => 'Tanggal mulai tidak valid.',

        'kim_tgl_selesai.required'      => 'Tanggal selesai wajib diisi.',
        'kim_tgl_selesai.date'          => 'Tanggal selesai tidak valid.',
        'kim_tgl_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
    ];

    public function save($id_perusahaan)
    {
        $this->validate();

        Kim::create([
            'profile_id'         => $id_perusahaan,
            'kim_no_persetujuan' => $this->kim_no_persetujuan,
            'kim_tgl_persetujuan' => $this->kim_tgl_persetujuan,
            'kim_nama_juru_ledak' => $this->kim_nama_juru_ledak,
            'kim_tgl_mulai'      => $this->kim_tgl_mulai,
            'kim_tgl_selesai'    => $this->kim_tgl_selesai,
        ]);

        $this->resetForm();

        $this->dispatch('save-success', message: 'Data KIM berhasil disimpan!');
    }

    public function resetForm()
    {
        $this->reset([
            'kim_no_persetujuan',
            'kim_tgl_persetujuan',
            'kim_nama_juru_ledak',
            'kim_tgl_mulai',
            'kim_tgl_selesai',
        ]);
    }
    public function render()
    {
        return view('livewire.profile.kim-add');
    }
}
