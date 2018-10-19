<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SupportMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $game;
    public $name;
    public $email;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($game, $name, $email, $message)
    {
        $this->game     = $game;
        $this->name     = $name;
        $this->email    = $email;
        $this->text     = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
