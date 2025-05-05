<div>
    <h2>Your Conversations</h2>

    <ul>
        @foreach ($conversations as $conversation)
            @php
                $otherUser = $conversation->sender_id === auth()->id() ? $conversation->receiver : $conversation->sender;
            @endphp
            <li>
                <a href="{{ url('/chat/' . $otherUser->id) }}">
                    {{ $otherUser->name }}
                </a>
            </li>
        @endforeach
    </ul>
    </div>
