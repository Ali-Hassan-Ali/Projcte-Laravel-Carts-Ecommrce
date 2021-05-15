<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notify;


class NotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
    public function handle()
    {
        

        $cliants =  $this->cliants;

        $product =  $this->product;


        foreach($cliants as $cliant){

         Mail::send(new Notify($cliant,$product));


        }


    }
}
