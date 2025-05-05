<div>
    <h2>Interests You've Sent</h2>
    @forelse($sent as $interest)
        <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #ccc;">
            <strong>{{ $interest->receiver->name }}</strong><br>
            Email: {{ $interest->receiver->email }}<br>
            Gender: {{ $interest->receiver->profile->gender ?? '-' }}
        </div>
    @empty
        <p>You haven’t sent any interests.</p>
    @endforelse

    <h2 style="margin-top: 30px;">Interests You’ve Received</h2>
    @forelse($received as $interest)
        <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #ccc;">
            <strong>{{ $interest->sender->name }}</strong><br>
            Email: {{ $interest->sender->email }}<br>
            Gender: {{ $interest->sender->profile->gender ?? '-' }}
        </div>
    @empty
        <p>No one has sent you any interests yet.</p>
    @endforelse
</div>
