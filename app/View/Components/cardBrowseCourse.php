<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardBrowseCourse extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $course;
    public $slug;
    public $title;
    public $created_date;
    public $students;
    public $submissions;
    public $tags;
    public $thumbnail;
    public $episodes;
    public $level;

    public function __construct($course, $slug, $title, $level, $tags, $thumbnail, $episodes, $submissions)
    {
        $this->course = $course;
        $this->slug = $slug;
        $this->title = $title;
        $this->level = $level;
        $this->tags = $tags;
        $this->thumbnail = $thumbnail;
        $this->episodes = $episodes;
        $this->submissions = $submissions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card-browse-course');
    }
}
