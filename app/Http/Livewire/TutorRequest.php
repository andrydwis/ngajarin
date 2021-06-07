<?php

namespace App\Http\Livewire;

use App\Models\Schedule;
use App\Models\Tutoring;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TutorRequest extends Component
{
    public $user;
    public $dates;
    public $date_selected;
    public $min;
    public $max;
    public $schedule_now;
    public $review_form;

    protected $listeners = ['show' => 'showReviewForm'];

    public function mount()
    {
        $this->schedule_now = Tutoring::where('date', Carbon::now()->isoFormat('Y-M-D'))->where('status', 'diterima')->where('student_id', Auth::user()->id)->first();
        $this->review_form = false;
    }

    public function showReviewForm(Tutoring $tutoring)
    {
        $this->review_form = true;
        $tutoring->status = 'selesai';
        $tutoring->save();
    }

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
