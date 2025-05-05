<?php

namespace App\Livewire\Interest;

use App\Models\Interest;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class MyInterests extends Component
{
    public $sent, $received;
    public $myInterests;


    public function mount()
    {
        $user = Auth::user();
        $this->myInterests = Auth::user()->sentInterests()->with('receiver')->get();
        $this->sent = $user->sentInterests()->with('receiver.profile')->get();
        $this->received = $user->receivedInterests()->with('sender.profile')->get();
    }
    public function acceptInterest($interestId)
{
    $interest = Interest::find($interestId);

    if ($interest && $interest->receiver_id == Auth::id()) {
        $interest->update(['status' => 'accepted']);
        session()->flash('message', 'Interest accepted!');
    }
}

    public function render()
    {
        return view('livewire.interest.my-interests');
    }
}
