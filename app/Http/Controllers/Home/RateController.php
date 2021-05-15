<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Currency;
use App\Models\Rate;



class RateController extends Controller
{
    public function index(){

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

            //  dd($A,$B,$C,$D,$F,$G,$H,$U,$J);

              $rate = Rate::where('id',1)->first();
              $rate->update([
                'SAR' => preg_replace('/,/', '', $A),
                'EGP' => preg_replace('/,/', '', $B),
                'AED' => preg_replace('/,/', '', $C),
                'KWD' => preg_replace('/,/', '', $D),
                'MAD' => preg_replace('/,/', '', $F),
                'TRY' => preg_replace('/,/', '', $G),
                'EUR' => preg_replace('/,/', '', $H),
                'LYD' => preg_replace('/,/', '', $U),
                'NIS' => preg_replace('/,/', '', $J),
              ]);

              return 'rate exchange done !';




    }



    
}
