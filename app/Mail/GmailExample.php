<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GmailExample extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subj;
    public $mess;
    public function __construct($subject,$message)
    {
        $this->subj = $subject;
        $this->mess = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_message = $this->mess;
        $e_subject = $this->subj;
        return $this->view('temp1.immigrant.mail.mail',compact('e_message'))->subject($e_subject);
    }
}
