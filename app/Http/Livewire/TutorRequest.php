<?php

namespace App\Http\Livewire;

use App\Models\Schedule;
use Livewire\Component;

class TutorRequest extends Component
{
    public $user;
    public $dates;
    public $date_selected;
    public $min;
    public $max;

    public function getSchedule($date, $id)
    {
        $this->date_selected = $date;
        $schedule = Schedule::find($id);
        $this->min = $schedule->hour_start;
        $this->max = $schedule->hour_end;
    }

    public function render()
    {
        return view('livewire.tutor-request');
    }
}
