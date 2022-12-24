<?php

namespace App\Mail\Test;

use App\Models\Pribori;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;


class MailCron extends Mailable
{
    use Queueable, SerializesModels;
    public $cronMail;
    public $number;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $cronMail, Collection $number)
    {
        $this->cronMail = $cronMail;
        $this->number = $number;
    }
    public function build()
    {
        return $this->from('example@example.com', 'Example')
                ->markdown('mail.test.mail-cron')
                ->with([
                'CurrentDate' => $this->cronMail,
                'number' => $this->number
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
            subject: 'Mail Cron',
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
