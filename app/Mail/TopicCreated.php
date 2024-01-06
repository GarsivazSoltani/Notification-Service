<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TopicCreated extends Mailable
{
    use Queueable, SerializesModels;
    private $first_name;
    private $last_name;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $this->first_name = 'Garsivaz';
        $this->last_name = 'Solatni';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Topic Created',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.topic-created',
            with: [
                'full_name' => $this->first_name . ' ' . $this->last_name,
            ],
        );
    }

    // 'full_name' => $this->first_name . ' ' . $this->last_name

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
