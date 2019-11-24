<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendJobMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailArray;

    /**
     * Create a new message instance.
     *
     * @param $mailArray
     */
    public function __construct($mailArray)
    {
        $this->mailArray =$mailArray;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.JobMail');
    }
}
