<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardCourse extends Component
{
    public $title;
    public $created_date;
    public $students;
    public $submission;
    public $tags;
    public $thumbnail;
    public $courseId;
    public $level;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($title, $level, $tags, $thumbnail, $courseId)
    {
        $this->title = $title;
        $this->level = $level;
        $this->tags = $tags;
        $this->thumbnail = $thumbnail;
        $this->courseId = $courseId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {

        return view('components.card-course');
    }
}
