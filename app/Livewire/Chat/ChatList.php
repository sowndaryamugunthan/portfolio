<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ChatList extends Component
{
    public $conversations;

    public function mount()
    {
        $userId = Auth::id();

        $this->conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver'])
            ->latest('created_at')
            ->get()
            ->unique(function ($message) use ($userId) {
                return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
            });
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
