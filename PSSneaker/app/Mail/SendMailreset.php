<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailreset extends Mailable
{
    use Queueable, SerializesModels;
    public $token;   // this token that Controller make it to send Email
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }
   

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->markdown('Email.passwordReset')->with([ 
            'token' => $this->token,
            'email' => $this->email
        ]);
    }
}