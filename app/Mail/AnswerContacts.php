<?php

namespace App\Mail;

use App\Models\Contact;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerContacts extends Mailable
{
    //Mailable para respnder mensajes de contactos
    use Queueable, SerializesModels;

    public $subject = "¡Hemos respondido tu solicitud, gracias por escribirnos!";
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.answer-contact');
    }
}
