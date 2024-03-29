<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IndexSubmission extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $task;
    public $file;
    public $course;
    public $slug;
 

    public function __construct($title, $task, $file, $course, $slug)
    {
        $this->title = $title;
        $this->task = $task;
        $this->file = $file;
        $this->course = $course;
        $this->slug = $slug;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.index-submission');
    }
}
