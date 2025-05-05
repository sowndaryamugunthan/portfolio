<?php

namespace App\Livewire\Interest;

use App\Models\Interest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReceivedInterests extends Component
{
    public $received;

    public function mount()
    {
        $this->received = Interest::where('receiver_id', Auth::id())
            ->with('sender.profile')
            ->get();
    }

    public function render()
    {
        return view('livewire.interest.received-interests');
    }
}
