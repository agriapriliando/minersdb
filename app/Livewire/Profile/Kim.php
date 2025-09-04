<?php

namespace App\Livewire\Profile;

use App\Models\Kim as ModelsKim;
use Livewire\Component;

class Kim extends Component
{
    public $kim;
    public $original;

    public $kim_no_persetujuan;
    public $kim_tgl_persetujuan;
    public $kim_nama_juru_ledak;
    public $kim_tgl_mulai;
    public $kim_tgl_selesai;

    protected $rules = [
        'kim.*.kim_no_persetujuan'    => 'required|string|max:100',
        'kim.*.kim_tgl_persetujuan'   => 'required|date',
        'kim.*.kim_nama_juru_ledak'   => 'required|string|max:150',
        'kim.*.kim_tgl_mulai'         => 'required|date',
        'kim.*.kim_tgl_selesai'       => 'required|date|after_or_equal:kim.*.kim_tgl_mulai',
    ];

    protected $messages = [
        'kim.*.kim_no_persetujuan.required'   => 'Nomor persetujuan wajib diisi.',
        'kim.*.kim_no_persetujuan.string'     => 'Nomor persetujuan harus berupa teks.',
        'kim.*.kim_no_persetujuan.max'        => 'Nomor persetujuan maksimal 100 karakter.',

        'kim.*.kim_tgl_persetujuan.required'  => 'Tanggal persetujuan wajib diisi.',
        'kim.*.kim_tgl_persetujuan.date'      => 'Tanggal persetujuan tidak valid.',

        'kim.*.kim_nama_juru_ledak.required'  => 'Nama juru ledak wajib diisi.',
        'kim.*.kim_nama_juru_ledak.string'    => 'Nama juru ledak harus berupa teks.',
        'kim.*.kim_nama_juru_ledak.max'       => 'Nama juru ledak maksimal 150 karakter.',

        'kim.*.kim_tgl_mulai.required'        => 'Tanggal mulai wajib diisi.',
        'kim.*.kim_tgl_mulai.date'            => 'Tanggal mulai tidak valid.',

        'kim.*.kim_tgl_selesai.required'      => 'Tanggal selesai wajib diisi.',
        'kim.*.kim_tgl_selesai.date'          => 'Tanggal selesai tidak valid.',
        'kim.*.kim_tgl_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
    ];

    public function mount()
    {
        $this->kim = ModelsKim::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $this->original = $this->kim;
    }

    public function update($id)
    {
        $this->validate();

        $data = collect($this->kim)->firstWhere('id', $id);

        ModelsKim::find($id)->update($data);

        $this->dispatch('update-success', message: 'Data KIM berhasil diperbaharui!');
    }

    public function batal($index)
    {
        $this->kim[$index] = $this->original[$index];
    }

    public function delete($id)
    {
        ModelsKim::whereId($id)->delete();

        $this->kim = collect($this->kim)
            ->reject(fn($row) => $row['id'] == $id)
            ->values()
            ->toArray();

        $this->dispatch('delete-success', message: 'Data KIM berhasil dihapus!');
    }

    public function render()
    {
        $kim = ModelsKim::where('profile_id', session('id_perusahaan'))
            ->latest()
            ->get()
            ->toArray();

        $original = $kim;

        return view('livewire.profile.kim', [
            'kim' => $kim,
            'original' => $original,
        ]);
    }
}
