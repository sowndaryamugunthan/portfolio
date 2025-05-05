<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Dashboard extends Component
{
    public $matches;
    public function mount()
    {
        $userProfile = Auth::user()->profile;

        if ($userProfile) {
            $this->matches = User::whereHas('profile', function ($query) use ($userProfile) {
                $query->where('gender', '!=', $userProfile->gender)
                      ->where('education', $userProfile->education);
            })->with('profile')->get();
        } else {
            $this->matches = collect(); // empty
        }
    }
    public function render()
{
    $user = Auth::user();
    return view('livewire.dashboard', compact('user'));
}

}
