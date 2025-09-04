<?php

namespace App\Livewire\Profile;

use App\Models\Profile as ModelsProfile;
use Livewire\Component;

class Profile extends Component
{
    public $id;
    public $profile;

    public function mount($id)
    {
        $this->id = $id;
        session(['id_perusahaan' => $id]);
        $this->profile = ModelsProfile::where('id', $id)->first();
        session(['nama_pemegang_perizinan' => $this->profile->nama_pemegang_perizinan]);
    }
    public function render()
    {
        return view('livewire.profile.profile');
    }
}
