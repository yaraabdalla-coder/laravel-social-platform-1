<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class forgetpasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $expireMinutes;
    public $userName;
    public $reseturl;
    public $email;
    public function __construct($expireMinutes,$userName,$reseturl,$email)
    {
        
    $this->userName= $userName;
    $this->reseturl = $reseturl;
    $this->expireMinutes= $expireMinutes;
    $this->email=$email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forgetpassword Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.forgetpassword',
             
        with: [
            'userName' => $this->userName,
            'resetUrl' => $this->reseturl,
            'expireMinutes' => $this->expireMinutes,
            'email' => $this->email,
        ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
