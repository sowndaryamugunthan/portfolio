<?php

namespace App\Livewire\Interest;

use App\Models\Interest;
use Illuminate\Container\Attributes\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class SendInterest extends Component
{
    public $receiverId;

    public function sendInterest($receiverId)
    {
        $senderId = Auth::id();

        Interest::firstOrCreate([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
        ]);

        session()->flash('success', 'Interest sent!');
    }

    public function render()
    {
        return view('livewire.interest.send-interest',['receiverId' => $this->user->id]);
    }
}
