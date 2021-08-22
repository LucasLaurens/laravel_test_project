<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('aze@aze.fr')
                    ->subject('Mon super sujet')
                    ->view('emails.test', [
                        'user' => $this->user
                    ])
                    // ->attach(public_path('img/laravel.jpg'))
                    ->attachFromStorage('img/laravel.jpg');
    }
}
