<div style="max-width: 400px; margin: auto; padding-top: 50px;">
    <h2 style="text-align: center;">Login</h2>

    @if (session()->has('error'))
        <div style="color: red; text-align: center; margin-bottom: 10px;">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="login">
        <label>Email</label>
        <input type="email" wire:model="email" style="width: 100%; padding: 8px;">
        @error('email') <span style="color: red;">{{ $message }}</span> @enderror

        <label>Password</label>
        <input type="password" wire:model="password" style="width: 100%; padding: 8px;">
        @error('password') <span style="color: red;">{{ $message }}</span> @enderror

        <button type="submit" style="width: 100%; margin-top: 10px; padding: 10px; background: #4CAF50; color: white;">
            Login
        </button>
    </form>

    <div style="text-align: center; margin-top: 10px;">
        <a href="/register" style="color: #4CAF50;">New user? Register</a>
    </div>
</div>
