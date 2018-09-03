<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
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
        return $this->subject('Письмо отправлено со станицы вашего магазина')->view('mails.shop', [
            'email' => $this->email,
            'text' => $this->text
        ]);
    }
}
