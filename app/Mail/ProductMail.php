<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $product;
    public $email;
    public $text;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Product $product
     * @param string $email
     * @param string $text
     */
    public function __construct(User $user, Product $product, string $email, string $text)
    {
        $this->user = $user;
        $this->product = $product;
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
        return $this->subject('Товар "' . $this->product->name . '"')->view('mails.product', [
            'user' => $this->user,
            'product' => $this->product,
            'email' => $this->email,
            'text' => $this->text
        ]);
    }
}
