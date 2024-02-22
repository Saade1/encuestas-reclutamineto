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

    public $subject;


    public function __construct($data,$subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }


    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         from: new Address('saade@gmail.com', 'Saade'),
    //         subject: 'Aqui va a ir indicaciones',
    //     );
    // }
    public function build()
    {
        return $this->from('saade@gmail.com', 'Saade')
                    ->subject($this->subject)
                    ->view('email.survey');
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
