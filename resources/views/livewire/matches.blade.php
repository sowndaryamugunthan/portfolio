<div style="max-width: 800px; margin: auto;">
    <h2>Matched Profiles</h2>

    @if($matches->isEmpty())
        <p>No matches found.</p>
    @else
        @foreach($matches as $match)
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <h4>{{ $match->receiver->name ?? 'Name Not Found' }}</h4>
                <p>{{ $match->receiver->profile->full_name ?? 'No Profile Info' }}</p>
                @if($match->receiver->profile?->photo)
                    <img src="{{ asset('storage/' . $match->receiver->profile->photo) }}" width="100">
                @endif
                <a href="{{ url('/profile/' . $match->receiver->id) }}">View Profile</a>
            </div>
        @endforeach
    @endif
</div>
