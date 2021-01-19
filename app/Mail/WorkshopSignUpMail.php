<?php

namespace App\Mail;

use App\Model\Workshop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class WorkshopSignUpMail
 *
 * @package App\Mail
 */
class WorkshopSignUpMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Workshop
     */
    public $workshop;

    /**
     * @var array
     */
    public $attendee;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Workshop $workshop, array $attendee)
    {
        $this->workshop = $workshop;
        $this->attendee = $attendee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->from('no-reply@gelre-energiek.nl','Gelre Energiek')
                ->subject("Aanmelding workshop Gelre Energiek {$this->workshop->title}")
                ->view('email.workshop_signup',[
                    'workshop' => $this->workshop,
                    'attendee' => $this->attendee
            ]);
    }
}
