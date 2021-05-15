<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Cliant;
use Illuminate\Support\Facades\Mail;
use App\Mail\MonthlyMessageMail;



class MonthlyMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $email;

    
    public function __construct($email)
    {
       

        $this->email = $email;
      
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        
       $email = $this->email;
        $cliants = Cliant::where('monthly_message',1)->get();

        if(!$cliants == null){

            foreach($cliants as $cliant){
            $cliant->message = $email;

            $mail =  Mail::send(new MonthlyMessageMail($cliant));
           
            }
           
        }
    }
}
