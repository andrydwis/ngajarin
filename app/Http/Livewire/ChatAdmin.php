<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatAdmin extends Component
{
    public function chat()
    {
        $admin = User::role('admin')->first();
        $conversation = Conversation::where('user_one', Auth::user()->id)->where('user_two', $admin)->first();
        if($conversation){
            return redirect()->route('user.chat.show', ['conversation' => $conversation]);
        }else{
            $conversation = new Conversation();
            $conversation->user_one = Auth::user()->id;
            $conversation->user_two = $admin->id;
            $conversation->save();

            return redirect()->route('user.chat.show', ['conversation' => $conversation]);
        }
    }

    public function render()
    {
        return view('livewire.chat-admin');
    }
}
