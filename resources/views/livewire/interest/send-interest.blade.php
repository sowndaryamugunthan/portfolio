<div>
    @if (session()->has('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session()->has('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <button wire:click="send" style="padding: 10px; background: blue; color: white;">
        Send Interest
    </button>
</div>
