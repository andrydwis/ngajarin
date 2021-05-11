<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IndexEpisode extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $description;
    public $type;
    public $link;
    public $slug;
    public $course;
    public $submission;
    

    public function __construct($title, $description, $type, $link, $slug, $course, $submission)
    {
        $this->slug = $slug;
        $this->course = $course;
        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->link = $link;
        $this->submission = $submission;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.index-episode');
    }
}
