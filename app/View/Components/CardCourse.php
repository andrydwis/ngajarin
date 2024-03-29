<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardCourse extends Component
{
    public $slug;
    public $title;
    public $students;
    public $submission;
    public $publishStatus;
    public $tags;
    public $thumbnail;
    public $episodes;
    public $level;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($slug, $title, $level, $tags, $publishStatus, $thumbnail, $episodes, $submission)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->level = $level;
        $this->tags = $tags;
        $this->publishStatus = $publishStatus;
        $this->thumbnail = $thumbnail;
        $this->episodes = $episodes;
        $this->submission = $submission;
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
