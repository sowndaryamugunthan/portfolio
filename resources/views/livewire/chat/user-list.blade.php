<div>
    <h2>Available Users to Chat</h2>

    <ul>
        @foreach ($users as $user)
            <li style="margin: 10px 0;">
                <a href="{{ url('/chat/' . $user->id) }}">
                    {{ $user->name }} ({{ $user->email }})
                </a>
            </li>
        @endforeach
    </ul>
</div>
