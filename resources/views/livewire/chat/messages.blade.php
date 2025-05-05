<div>
    <div wire:poll.3s>
        <h2>Chat with {{ $receiver->name }}</h2>

        <div style="max-height: 400px; overflow-y: auto; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc;">
            @foreach ($messages as $msg)
                <div style="margin-bottom: 10px;">
                    <strong>
                        {{ $msg->sender_id == auth()->id() ? 'You' : $receiver->name }}
                    </strong>:
                    {{ $msg->message }}
                    <br>
                    <small style="color: #777;">
                        {{ $msg->created_at->format('d M Y h:i A') }}
                    </small>
                </div>
            @endforeach
        </div>
    </div>

    <form wire:submit.prevent="sendMessage">
        <input type="text" wire:model="messageText" placeholder="Type a message" style="width: 70%; padding: 8px;" />
        <button type="submit" style="padding: 8px 15px; background: #007bff; color: white; border: none;">Send</button>
    </form>
</div>
