<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCourse extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $course;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        //
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'title' => $this->course->title,
            'url' => route('student.course.show', ['course' => $this->course])
        ];
        
        return $this->markdown('emails.new-course', $data);
    }
}
