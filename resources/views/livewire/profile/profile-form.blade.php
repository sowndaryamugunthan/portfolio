<div style="max-width: 600px; margin: auto; padding-top: 30px;">
    <h2>Profile Form</h2>

    @if (session()->has('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div>
            <label for="photo">Profile Photo</label>
            <input type="file" wire:model="photo">
            @if(Auth::user()->profile?->photo)
            <img src="{{ asset('storage/' . Auth::user()->profile->photo) }}" width="100">
            @endif

        </div>

        <div style="margin-bottom: 15px;">
            <label>Full Name</label>
            <input type="text" wire:model="full_name" style="width: 100%; padding: 8px;">
            @error('full_name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Email</label>
            <input type="text" wire:model="email" style="width: 100%; padding: 8px;">
            @error('email') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Mobile</label>
            <input type="text" wire:model="mobile" style="width: 100%; padding: 8px;">
            @error('mobile') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Gender</label>
            <select wire:model="gender" style="width: 100%; padding: 8px;">
                <option value="">-- Select --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('gender') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Date of Birth</label>
            <input type="date" wire:model="dob" style="width: 100%; padding: 8px;">
            @error('dob') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Education</label>
            <input type="text" wire:model="education" style="width: 100%; padding: 8px;">
            @error('education') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Profession</label>
            <input type="text" wire:model="profession" style="width: 100%; padding: 8px;">
            @error('profession') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Family Details</label>
            <textarea wire:model="family_details" style="width: 100%; padding: 8px;"></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Partner Preferences</label>
            <textarea wire:model="partner_preferences" style="width: 100%; padding: 8px;"></textarea>
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none;">
            Save Profile
        </button>
    </form>
</div>
