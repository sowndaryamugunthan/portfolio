<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class ProfileForm extends Component
{
    use WithFileUploads;

    public $full_name, $gender, $dob, $education, $profession, $mobile, $email, $family_details, $partner_preferences;
    public $photo;

    public function mount()
    {
        $profile = Auth::user()->profile;

        if ($profile) {
            $this->fill($profile->toArray());
        } else {
            $this->email = Auth::user()->email;
        }
    }

    public function save()
    {
        $validated = $this->validate([
            'full_name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:15',
            'gender' => 'nullable|string|max:10',
            'dob' => 'nullable|date',
            'education' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'email' => 'required|email',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($this->photo) {
            $photoPath = $this->photo->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }
        // dd($photoPath);
        Auth::user()->profile()->updateOrCreate(
            ['user_id' => Auth::id()],
            array_merge($validated, [

                'family_details' => $this->family_details,
                'partner_preferences' => $this->partner_preferences,
            ])
        );

        session()->flash('success', 'Profile saved successfully!');
        return redirect()->to('/dashboard');
    }


    public function render()
    {
        return view('livewire.profile.profile-form');
    }
}
