<div style="max-width: 800px; margin: auto;">
    <h2>Received Interests</h2>

    @if($received->isEmpty())
        <p>No interests received.</p>
    @else
        @foreach($received as $interest)
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <h4>{{ $interest->sender->name ?? 'Name Not Found' }}</h4>
                <p>{{ $interest->sender->profile->full_name ?? 'No Profile Info' }}</p>
                @if($interest->sender->profile?->photo)
                    <img src="{{ asset('storage/' . $interest->sender->profile->photo) }}" width="100">
                @endif
                <a href="{{ url('/profile/' . $interest->sender->id) }}">View Profile</a>
            </div>
        @endforeach
    @endif
</div>
