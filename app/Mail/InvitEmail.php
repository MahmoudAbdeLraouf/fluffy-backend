<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class InvitEmail extends Mailable
{
    use Queueable, SerializesModels;
    public array $content;

    /**
     * Create a new message instance.
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {return $this->subject($this->content['subject'])->view('emails.invit');
    }
}
