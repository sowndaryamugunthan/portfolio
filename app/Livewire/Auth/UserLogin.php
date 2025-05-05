<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class UserLogin extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            $user = Auth::user();

            if ($user->profile) {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/profile');
            }
        }

        $this->addError('email', 'Invalid login credentials');
      }

    public function render()
    {
        return view('livewire.auth.user-login');
    }
}

