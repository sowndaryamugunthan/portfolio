<?php

namespace App\Livewire\Profile;

use App\Models\Interest;
use App\Models\Profile;
use Illuminate\Container\Attributes\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class ProfileList extends Component
{
    public $profiles;

    public function mount()
    {
        $this->profiles = Profile::where('user_id', '!=', Auth::id())->with('user')->get();
    }
    public function sendInterest($receiverId)
{
    Interest::firstOrCreate([
        'sender_id' => Auth::id(),
        'receiver_id' => $receiverId,
    ]);
}


    public function render()
    {
        return view('livewire.profile.profile-list');
    }
}
