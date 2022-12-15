<?php

namespace App\Mail\Test;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class MailTest extends Mailable
{
    use Queueable, SerializesModels;
    public $testMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $testMail)
    {
        $this->testMail = $testMail;
    }
    public function build()
    {
        return $this->from('example@example.com', 'Example')
                ->view('mail.test.mail-test')
                ->with([
                'testMailEmail' => $this->testMail->email,
                'testMailPassword' => $this->testMail->password
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
            subject: 'Mail Test',
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
            markdown: 'mail.test.mail-test',
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
