<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AboutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $text;

    /**
     * Create a new message instance.
     *
     * @param string $email
     * @param string $text
     */
    public function __construct(string $email, string $text)
    {
        $this->email = $email;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Письмо отправлено со станицы "О нас"')->view('mails.about', [
            'email' => $this->email,
            'text' => $this->text
        ]);
    }
}
