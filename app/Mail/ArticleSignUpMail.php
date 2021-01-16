<?php

namespace App\Mail;

use App\Model\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ArticleSignUpMail
 *
 * @package App\Mail
 */
class ArticleSignUpMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Article
     */
    public $article;

    /**
     * @var array
     */
    public $attendee;

    /**
     * ArticleSignUpMail constructor.
     * @param Article $article
     * @param array $attendee
     *
     * @return void
     */
    public function __construct(Article $article, array $attendee)
    {
        $this->article = $article;
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
            ->from('no-reply@bravissamenvitaal.nl','Gelre Energiek')
            ->subject("Contactformulier Gelre Energiek {$this->article->title}")
            ->view('email.workshop_signup',[
                'workshop' => $this->article,
                'attendee' => $this->attendee
            ]);
    }
}
