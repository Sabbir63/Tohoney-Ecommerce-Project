<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMessages extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $user_message = "";
     public function __construct($user_form_message){
      $this->user_message = $user_form_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
      $user_blade_message = $this->user_message;
        return $this->view('mail/user_mail',compact('user_blade_message'));
    }
}
