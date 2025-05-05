<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // ✅ Correct
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
#[Layout('layouts.app')]
#[On('messageSent')]
class Messages extends Component
{
    public $receiver;
    public $messageText;
    public $messages;

    public function mount($receiverId)
    {
        $this->receiver = User::findOrFail($receiverId);
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::where(function ($query) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $this->receiver->id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver->id)->where('receiver_id', Auth::id());
        })->orderBy('created_at')->get();
    }

    public function sendMessage()
    {
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiver->id,
            'message' => $this->messageText,
        ]);

        $this->messageText = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat.messages');
    }
}
