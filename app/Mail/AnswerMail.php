<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnswerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $message;
    public $name;

    /**
     * Create a new message instance.
     *
     * @param string $email
     * @param string $message
     * @param string $name
     */
    public function __construct(string $email, string $message, string $name)
    {
        $this->email = $email;
        $this->message = $message;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('У пользователя возник вопрос')->view('mails.answer', [
            'email' => $this->email,
            'name' => $this->name,
            'message' => $this->message,
        ]);
    }
}
