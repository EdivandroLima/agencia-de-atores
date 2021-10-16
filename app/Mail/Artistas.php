<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Artistas extends Mailable
{
    use Queueable, SerializesModels;

    protected $atores = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($atores = '[]')
    {
        $this->atores = json_decode($atores);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email_produtor')->with([
            'atores' => $this->atores
        ]);
    }
}
