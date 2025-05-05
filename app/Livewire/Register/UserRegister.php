<?php

namespace App\Livewire\Register;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UserRegister extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registration Successful!');

        // Clear form after save
        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    public function render()
    {
        return view('livewire.register.user-register');
    }
}
