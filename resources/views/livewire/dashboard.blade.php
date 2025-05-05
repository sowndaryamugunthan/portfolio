<div class="card">
    <p>Welcome, {{ Auth::user()->name }}</p>

    {{-- Profile info --}}
    <div style="margin-top: 30px;">
        <h4>Profile Details</h4>
        @if($user->profile?->photo)
        <img src="{{ asset('storage/' . $user->profile->photo) }}" width="100" />
    @endif

        <ul style="list-style: none; padding: 0;">
            <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
            <li><strong>Mobile:</strong> {{ Auth::user()->profile->mobile ?? '-' }}</li>
            <li><strong>Gender:</strong> {{ Auth::user()->profile->gender ?? '-' }}</li>
            <li><strong>DOB:</strong> {{ Auth::user()->profile->dob ?? '-' }}</li>
            <li><strong>Education:</strong> {{ Auth::user()->profile->education ?? '-' }}</li>
            <li><strong>Profession:</strong> {{ Auth::user()->profile->profession ?? '-' }}</li>
        </ul>
    </div>
    @if (session()->has('success'))
    <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif
<a href="{{ url('/matches') }}">View Matches</a>

    <div style="margin-top: 20px;">
        <a href="/logout" style="background: red; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Logout
        </a>
    </div>
</div>
