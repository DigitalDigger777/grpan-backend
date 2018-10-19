<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublicMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $company;
    public $game_url;
    public $email;
    public $skype;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $company, $game_url, $email, $skype, $message)
    {
        $this->name = $name;
        $this->company = $company;
        $this->game_url = $game_url;
        $this->email = $email;
        $this->skype = $skype;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.public');
    }
}
