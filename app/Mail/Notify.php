<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notify extends Mailable
{
    use Queueable, SerializesModels;


    public $cliants,$product;
   
    
    public function __construct($cliants,$product)
    {
        $this->cliants = $cliants;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $product = $this->product;

        return $this->to($this->cliants->email)
                    ->bcc('majalstore@gmail.com')
                    ->subject('majal store')
                    ->markdown('emails.Notify');
    }
}
