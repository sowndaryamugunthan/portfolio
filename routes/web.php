<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\UserLogin;
use App\Livewire\Chat\ChatList;
use App\Livewire\Chat\Messages;
use App\Livewire\Chat\UserList;
use App\Livewire\Dashboard;
use App\Livewire\Interest\MyInterests;
use App\Livewire\Interest\ReceivedInterests;
use App\Livewire\Matches;
use App\Livewire\Profile\ProfileForm;
use App\Livewire\Profile\ProfileList;
use App\Livewire\Profile\ViewProfile;
use App\Livewire\Register\UserRegister;
use Illuminate\Support\Facades\Auth;

// Home page (temporary)
Route::get('/', function () {
    return view('create_profile');
});

// Auth routes
Route::get('/login', UserLogin::class)->name('login');
Route::get('/register', UserRegister::class);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class);
    Route::get('/profile', ProfileForm::class);
    Route::get('/profile/{id}', ViewProfile::class);

    // Matches & Interests
    Route::get('/matches', Matches::class);
    Route::get('/my-interests', MyInterests::class);
    Route::get('/interests/received', ReceivedInterests::class)->middleware('auth');

    // Optional: browse all profiles
    Route::get('/browse', ProfileList::class);

    // Chat
    Route::get('/chat', UserList::class);
    Route::get('/chat/{receiverId}', Messages::class);
    Route::get('/chatlist', ChatList::class);
});
