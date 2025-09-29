<?php

namespace App\Livewire;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;

class DaftarPerusahaan extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public $komoditasSearch = '';
    public $kabupaten_kotaSearch = '';
    public function mount()
    {
        session(['id_perusahaan' => null]);
        session(['nama_pemegang_perizinan' => null]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingKomoditasSearch()
    {
        $this->resetPage();
    }
    public function updatingKabupaten_kotaSearch()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->komoditasSearch = '';
        $this->kabupaten_kotaSearch = '';
        $this->perPage = 10;
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.daftar-perusahaan', [
            'profiles' => Profile::search($this->search)
                ->komoditas($this->komoditasSearch)
                ->kabupaten_kota($this->kabupaten_kotaSearch)
                ->latest()
                ->paginate($this->perPage),
            'komoditas' => Profile::select('komoditas')->distinct()->pluck('komoditas', 'komoditas'),
            'kabupaten_kota' => Profile::select('kabupaten_kota')->distinct()->pluck('kabupaten_kota', 'kabupaten_kota'),
        ]);
    }
}
