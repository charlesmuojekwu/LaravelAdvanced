<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name)
    {
        $this->email = $email;
        $this->name = $name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Registration')->markdown('registration-email', ['url' => 'http://localhost:8000']);
    }
}
