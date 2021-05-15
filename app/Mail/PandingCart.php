<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PandingCart extends Mailable
{
    use Queueable, SerializesModels;

    public $pending_requests,$email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pending_requests,$email)
    {
        $this->pending_requests = $pending_requests;
        $this->email = $email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {



        return $this->to($this->email->user->email)
        ->bcc('majalstore@gmail.com')
        ->subject('majal store')
        ->markdown('emails.pending_requests');
    }
}
