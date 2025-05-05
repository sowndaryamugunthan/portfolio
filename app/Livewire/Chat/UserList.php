<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class UserList extends Component
{
    public $users;

    public function mount()
    {
        // Exclude the logged-in user
        $this->users = User::where('id', '!=', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.chat.user-list');
    }
}
