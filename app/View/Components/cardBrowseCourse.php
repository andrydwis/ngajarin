<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardBrowseCourse extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $slug;
    public $title;
    public $created_date;
    public $students;
    public $submissions;
    public $tags;
    public $thumbnail;
    public $episodes;
    public $level;

    public function __construct($slug, $title, $level, $tags, $thumbnail, $episodes, $submissions)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->level = $level;
        $this->tags = $tags;
        $this->thumbnail = $thumbnail;
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
