<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StartChat extends Component
{
    public $user;

    public function start()
    {
        $conversation = Conversation::where('user_one', Auth::user()->id)->where('user_two', $this->user->id)->first();
        if($conversation){
            return redirect()->route('user.chat.show', ['conversation' => $conversation]);
        }else{
            $conversation = new Conversation();
            $conversation->user_one = Auth::user()->id;
            $conversation->user_two = $this->user->id;
            $conversation->save();

            return redirect()->route('user.chat.show', ['conversation' => $conversation]);
        }
    }

    public function render()
    {
        return view('livewire.start-chat');
    }
}
