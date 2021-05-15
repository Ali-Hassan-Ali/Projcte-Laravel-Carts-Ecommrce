<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Jobs\UpdateCoupon;
use Illuminate\Support\Facades\Validator;

class CouponsController extends Controller
{
    public function store(Request $request)
    {


    try {

        $coupon = Cupon::where('name', $request->coupon_code)->first();

        if ($coupon == null || $coupon->end <= date("Y-m-d")) {
          
            return response()->json('error');
            // return back()->withErrors('Invalid coupon code. Please try again.');
        }
        // return response()->json($coupon);
        // dd($coupon);
        dispatch_now(new UpdateCoupon($coupon));

        // return response()->json($coupon);
        return response()->json(['success' => true]);


        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end try
      
    }//end of function



    public function destroy()
    {

        $coupon = session()->forget('coupon');

        return response()->json(['success' => true]);
    }//end of destroy


}//end of controoller
