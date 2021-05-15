<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Currency;
use App\Models\Rate;

class RateOFTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:day';

    /**
     * The console command description.
     *
     * @var string
     */
    
    protected $description = 'Send a Daily rate to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        
        $A =  Currency::convert()
        ->from('USD')
        ->to('SAR')
        ->amount(1)
        ->get();
     
$B =   Currency::convert()
->from('USD')
->to('EGP')
->amount(1)
->get();
      
     $C =   Currency::convert()
      ->from('USD')
      ->to('AED')
      ->amount(1)
      ->get();

$D =   Currency::convert()
->from('USD')
->to('KWD')
->amount(1)
->get();

$F =   Currency::convert()
->from('USD')
->to('MAD')
->amount(1)
->get();

$G =   Currency::convert()
->from('USD')
->to('TRY')
->amount(1)
->get();

     $H =   Currency::convert()
        ->from('USD')
        ->to('EUR')
        ->amount(1)
        ->get();
     
     $U =   Currency::convert()
     ->from('USD')
     ->to('LYD')
     ->amount(1)
     ->get();
  
  $J =   Currency::convert()
  ->from('USD')
  ->to('ILS')
  ->amount(1)
  ->get();

  $A =  number_format($A,2,".",".");
  $B =  number_format($B,2,".",".");
  $C =  number_format($C,2,".",".");
  $D =  number_format($D,2,".",".");
  $F =  number_format($F,2,".",".");
  $G =  number_format($G,2,".",".");
  $H =  number_format($H,2,".",".");
  $U =  number_format($U,2,".",".");
  $J =  number_format($J,2,".",".");

  //dd($A,$B,$C,$D,$F,$G,$H,$U,$J);

  $rate = Rate::where('id',1)->first();
  $rate->update([
    'SAR' => $A,
    'EGP' => $B,
    'AED' => $C,
    'KWD' => $D,
    'MAD' => $F,
    'TRY' => $G,
    'EUR' => $H,
    'LYD' => $U,
    'NIS' => $J,
  ]);

  $this->info('rate of the Day sent to database');

    }
}
