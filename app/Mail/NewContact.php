<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    //variabile che memorizza i dati del form , 
    //utilizzando public potremmo accedervi dalla view 
    public $lead;
    /**
     * Create a new message instance.
     */
    public function __construct($_lead)
    {
        $this->lead = $_lead;
    }

    /**
     * Get the message envelope.
     */


    public function envelope(): Envelope
    {
        return new Envelope(
            //mesaggio da inviare all'utente
            subject: 'New Contact',
            //destinatario
            replyTo: $this->lead->address
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            //contenuto dell' email da inviare
            view: 'mails.new-contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}