<?php

namespace App\View\Components\student;

use App\Models\Submission;
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
    public $sub;

    public function __construct($title, $task, $file, $course, $slug, $sub)
    {
        $this->title = $title;
        $this->task = $task;
        $this->file = $file;
        $this->course = $course;
        $this->slug = $slug;
        $this->sub = $sub;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.student.index-submission');
    }
}
