<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserSendNewPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $data;

     public function __construct($data)
     {
         //
         $this->data = $data;
     }
 
     /**
      * Build the message.
      *
      * @return $this
      */

      // Formato del "gmail"
     public function build()
     {
         return $this->from(env('MAIL_FROM'), env('APP_NAME'))
                     ->view('emails.user_send__new_password')
                     ->subject('Su nueva contraseña')
                     ->with($this->data);
 
 
     }

 
}
