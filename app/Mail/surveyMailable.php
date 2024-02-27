<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SurveyMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('saade@gmail.com', 'Saade')
            ->subject('Cuestionario de HIGHTECH')
            ->view('email.email');
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.email',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
