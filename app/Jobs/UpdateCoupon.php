<?php

namespace App\Jobs;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Rate;





class UpdateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $coupon;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

       
     
            if(!session()->get('rate') == null){

                if(session()->get('rate') == 'UST'){
    
                      $amount =    $this->coupon->discount(Cart::subtotal());

                     session()->put('coupon', [
                    'name' => $this->coupon->name,
                    'discount' => round($amount,2),
                ]);
    
                  }else{
    
                    $amount =    $this->coupon->discount(Cart::subtotal());
            
                    $convert =  Rate::select(session()->get('rate'))->value(session()->get('rate'));

                    $newtotal = $amount * $convert;

                 session()->put('coupon', [
                   'name' => $this->coupon->name,
                   'discount' => round($newtotal,2),
               ]);
    
                  }
           
        }
    
}
}
