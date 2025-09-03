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
        $this->profile = ModelsProfile::where('id', $id)->first();
    }
    public function render()
    {
        return view('livewire.profile.profile');
    }
}
