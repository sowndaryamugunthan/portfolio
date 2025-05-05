<?php

namespace App\Livewire\Profile;

use App\Models\Profile;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class ViewProfile extends Component
{
    public $profile;

    public function mount($id)
    {
        $this->profile = Profile::find($id);
    }
    public function render()
    {
        return view('livewire.profile.view-profile');
    }
}
