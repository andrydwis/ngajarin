<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalReviewSubmission extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $action;

    public function __construct($action)
    {
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal-review-submission');
    }
}
