<?php

namespace App\Mail\Test;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OdersCronWhereNotOderedMail extends Mailable
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
        return $this->from('example@example.com', 'Не заказано!')
                ->view('mail.test.mail-cron-oders-notOdered')
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
            subject: 'Нужно заказать',
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
            view: 'mail.test.mail-cron-oders-notOdered',
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
