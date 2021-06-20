<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalMentorRequest extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public $reason;
    public $actionAccept;
    public $actionReject;

    public function __construct($user, $reason, $actionAccept, $actionReject)
    {
        $this->user = $user;
        $this->reason = $reason;
        $this->actionAccept = $actionAccept;
        $this->actionReject = $actionReject;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-mentor-request');
    }
}
