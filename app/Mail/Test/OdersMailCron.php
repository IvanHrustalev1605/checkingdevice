<?php

namespace App\Mail\Test;

use App\Models\Oders;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OdersMailCron extends Mailable
{
    use Queueable, SerializesModels;
    public $oders;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $oders)
    {
        $this->oders = $oders;
    }
    public function build()
    {
        return $this->from('example@example.com', 'Example')
                ->view('mail.test.mail-cron')
                ->with([
                'CurrentDate' => $this->oders
                ]);
}
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Oders Mail Cron',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.test.mail-cron',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
