<?php

namespace App\Http\Livewire;

use App\Models\Reply;
use App\Models\User;
use App\Notifications\NewChat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{
    public $conversation;
    public $replies;
    public $pesan;

    public function send()
    {
        $this->validate([
            'pesan' => ['required']
        ]);

        $reply = new Reply();
        $reply->conversation_id = $this->conversation->id;
        $reply->user_id = Auth::user()->id;
        $reply->message = $this->pesan;
        $reply->save();

        $this->reset('pesan');

        if($this->conversation->user_one == Auth::user()->id){
            $user = User::find($this->conversation->user_two);
        }else{
            $user = User::find($this->conversation->user_one);
        }
        $user->notify(new NewChat($this->conversation, Auth::user()));
    }

    public function render()
    {
        $this->replies = Reply::where('conversation_id', $this->conversation->id)->with('user')->get();
        return view('livewire.chat-list');
    }
}
