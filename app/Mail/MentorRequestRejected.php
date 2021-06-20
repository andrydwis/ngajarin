<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MentorRequestRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $reason;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $reason)
    {
        //
        $this->user = $user;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'name' => $this->user->name,
            'reason' => $this->reason,
        ];

        return $this->markdown('emails.mentor-request-rejected', $data);
    }
}
