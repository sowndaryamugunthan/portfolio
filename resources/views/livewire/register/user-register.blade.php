<div>

    <form wire:submit.prevent="save">
        <div>
            <label>Name:</label>
            <input type="text" wire:model="name">
            @error('name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Email:</label>
            <input type="email" wire:model="email">
            @error('email') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Password:</label>
            <input type="password" wire:model="password">
            @error('password') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Register</button>
    </form>
</div>
