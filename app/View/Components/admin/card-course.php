<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class card-course extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $judul = $this->judul;
        $tanggal = $this->tanggal;
        $murid = $this->murid;
        $submission = $this->submission;
        $tag = $this->tag;
        $thumbnail = $this->thumbnail;
        $courseId = $this->courseId;

        return view('components.admin.card-course',compact('judul','tanggal','murid','submission','tag','thumbnail','courseId'));
    }
}
