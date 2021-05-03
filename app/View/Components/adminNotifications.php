<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class adminNotifications extends Component
{
    public $user;
    public $notifications;
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
        $this->notifications = $this->user->notifications;
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
