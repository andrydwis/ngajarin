<?php

namespace App\View\Components;

use Illuminate\View\Component;

class indexEpisode extends Component
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

    public function __construct($title, $description, $type, $link)
    {

        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->link = $link;
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
