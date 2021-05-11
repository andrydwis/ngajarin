<?php

namespace App\View\Components;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AdminNotifications extends Component
{
    public $user;
    public $notifications;
    public $chats;
    public $unreadNotifications;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->user = User::find(Auth::user()->id);
        $this->notifications = Notification::where('notifiable_id', Auth::user()->id)->where('type', '!=', 'App\Notifications\NewChat')->get();
        $this->chats = Notification::where('notifiable_id', Auth::user()->id)->where('type', 'App\Notifications\NewChat')->select('type', 'data', DB::raw('count(*) as amount'))->groupBy('data', 'type')->get();
        $this->unreadNotifications = $this->user->unreadNotifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-notifications');
    }
}
