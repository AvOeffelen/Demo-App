<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $appName = config('app.name');

        $from = config('mail.generalContactReceiver');

        return $this
            ->from($from, $appName)
            ->subject("Contact formulier ${appName}")
            ->view('email.general',
                [
                    'tbd' => $this->data,
                ]
            );
    }
}
