<?php

namespace App\Livewire;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;

class DaftarPerusahaan extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public function mount()
    {
        session(['id_perusahaan' => null]);
        session(['nama_pemegang_perizinan' => null]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.daftar-perusahaan', [
            'profiles' => Profile::search($this->search)
                ->latest()
                ->paginate($this->perPage),
        ]);
    }
}
