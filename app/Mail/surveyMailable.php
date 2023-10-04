<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class surveyMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    // public $subject = "informacion de prueba";


    public function __construct($data)
    {
        $this->data = $data;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('saade@gmail.com', 'Saade'),
            subject: 'cuestionario',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.survey',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
