<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Employment;

class AnswerApplications extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "¡Hemos respondido tu solicitud, gracias por escribirnos!";
    public $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employment $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.answer-application');
    }
}
