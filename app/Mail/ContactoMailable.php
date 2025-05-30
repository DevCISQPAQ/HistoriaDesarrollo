<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function build()
    {
        return $this->subject('Nuevo mensaje de historia de desarrollo')
                ->view('emails.emaildestino')
                ->with(['data' => $this->datos]);

                // return $this->from(config('mail.from.address'), config('mail.from.name'))
                // ->subject('Nuevo mensaje de contacto')
                // ->view('emails.emaildestino')
                // ->with(['data' => $this->datos]);
    }
}

