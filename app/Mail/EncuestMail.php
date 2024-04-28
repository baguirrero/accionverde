<?php

namespace App\Mail;

use App\Models\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EncuestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $case;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Person $case)
    {
        $this->case = $case;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('atencion_accionverde@accionporigualdad.com', 'Apori')->view('mail.encuest-mail')->subject('Encuesta de Satisfacción');
    }
}
