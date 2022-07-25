<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class createUser extends Mailable
{
    use Queueable, SerializesModels;

    public $dataEmail;

    public function __construct($dataEmail)
    {
        $this->dataEmail = $dataEmail;
    }

    public function build()
    {
        return $this->from('comunicaciones@websirc.com','Comunicaciones websirc')->view('mail.createUser')->subject('Creaciòn de usuario');;
    }
}
