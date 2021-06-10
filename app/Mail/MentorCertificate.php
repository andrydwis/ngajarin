<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MentorCertificate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $certificate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $certificate)
    {
        //
        $this->user = $user;
        $this->certificate = $certificate;
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
        ];

        // return $this->markdown('emails.mentor-certificate', $data)
        // ->attach(public_path('/certificate/certificate-mentor.pdf'));

        return $this->markdown('emails.mentor-certificate', $data)
            ->attach($this->certificate, [
                'as' => 'sertifikat.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
