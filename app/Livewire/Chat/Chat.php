<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Conversation;
use App\Models\Message;
use App\Notifications\MessageSentNotification;

class Chat extends Component
{
    use WithFileUploads;

    public Conversation $conversation;
    public $receiver;
    public $body;
    public $loadedMessages;
    public $paginate_var = 10;
    public $photo;
    public $photoPreview;

    public function listenBroadcastedMessage($event)
    {
        $this->dispatch('scroll-bottom');
        $newMessage = Message::find($event['message_id']);
        $this->loadedMessages->push($newMessage);
        $newMessage->read_at = now();
        $newMessage->save();
    }

    public function updatedPhoto()
    {
        $this->photoPreview = $this->photo->temporaryUrl();
    }

    public function removePhoto()
    {
        $this->photo = null;
        $this->photoPreview = null;
    }

    public function sendMessage()
    {
        $this->validate([
            'body' => 'required_without:photo|string',
            'photo' => 'nullable|image|max:10240' // max 10MB
        ]);

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('photos', 'public');
        }

        $createdMessage = Message::create([
            'conversation_id' => $this->conversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiver->id,
            'body' => $this->body ?? null,
            'photo' => $photoPath ?? null,
        ]);

        $this->dispatch('scroll-bottom');
        $this->reset('body', 'photo', 'photoPreview');
        $this->loadedMessages->push($createdMessage);
        $this->conversation->updated_at = now();
        $this->conversation->save();
        $this->dispatch('refresh')->to(ChatList::class);
        $this->receiver->notify(new MessageSentNotification(auth()->user(), $createdMessage, $this->conversation));
    }

    public function loadMore()
    {
        $this->paginate_var += 10;
        $this->loadMessages();
        $this->dispatch('update-height');
    }

    public function loadMessages()
    {
        $count = Message::where('conversation_id', $this->conversation->id)->count();
        $this->loadedMessages = Message::where('conversation_id', $this->conversation->id)
            ->skip($count - $this->paginate_var)
            ->take($this->paginate_var)
            ->get();

        return $this->loadedMessages;
    }

    public function mount()
    {
        $this->receiver = $this->conversation->getReceiver();
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat.chat');
    }
}
