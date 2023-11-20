<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredentialChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $credetials;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($credetials)
    {
        $this->credetials = $credetials;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Test')->view('mail.send-credentials' , get_defined_vars());
    }
}
