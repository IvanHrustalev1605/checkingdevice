<?php

namespace App\Mail\Test;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class MailCron extends Mailable
{
    use Queueable, SerializesModels;
    public $devices;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $devices)
    {
        $this->devices = $devices;
    }
    public function build()
    {
        return $this->from('example@example.com', 'Даты поверки на текущий месяц!')
                ->markdown('mail.test.mail-cron-device')
                ->with([
                'DeviceAll' => $this->devices,
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
            subject: 'Приборы которые нужно поверить',
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
