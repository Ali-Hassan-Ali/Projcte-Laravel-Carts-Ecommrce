<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HolidayMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $cliant;

    public function __construct($cliant)
    {
       
        $this->cliant = $cliant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->cliant->email, $this->cliant->id)
                    ->bcc('majalstore@gmail.com')
                    ->subject('majal store')
                    ->markdown('emails.holidayemail');
    }
}
