<?php

namespace App\Livewire;

use App\Models\Interest;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class Matches extends Component
{
    public $matches;

    public function mount()
{
    $userId = Auth::id();

    $this->matches = Interest::where('sender_id', $userId)
        ->whereHas('receiver.sentInterests', function ($query) use ($userId) {
            $query->where('receiver_id', $userId)
                  ->where('status', 'accepted');
        })
        ->with('receiver.profile')
        ->get();
}

    public function acceptInterest($interestId)
    {
        $interest = Interest::find($interestId);

        if ($interest) {
            $interest->update(['status' => 'accepted']);
            session()->flash('success', 'Interest accepted!');
        }
    }

    public function rejectInterest($interestId)
    {
        $interest = Interest::find($interestId);

        if ($interest) {
            $interest->update(['status' => 'rejected']);
            session()->flash('success', 'Interest rejected!');
        }
    }
    public function render()
    {
        return view('livewire.matches');
    }
}
