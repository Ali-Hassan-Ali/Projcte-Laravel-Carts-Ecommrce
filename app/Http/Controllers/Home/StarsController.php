<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parent_Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\CartStore;
use App\Mail\StarsOrder;
use App\Models\Cliant;
use App\Models\Purchase;
use App\Models\Notify;
use Illuminate\Support\Facades\Mail;

class StarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session()->get('rate') == null) {

            session()->put('price_icon', '$');
            session()->put('rate', 'UST');

        }
        
        $parent_categories = Parent_Category::with('sub_category')->get();

        $carts =   Product::where('stars','>', 0)->get();


        return view('home.stars',compact('parent_categories','carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_by_satrs(Request $request,  $cart)
    {
        // dd($request->stars,$cart);

        try{

        $cliant =  Cliant::where('id' , \Auth::guard('cliants')->user()->id)->first();

        if($cliant->stars >= $request->stars){

            $cliantStars =  $cliant->stars;

            $cartStars = $request->stars;

            $stars = $cliantStars - $cartStars;

            

            $cliant->update([
                'stars' => $stars,
            ]);

            $cart_category = Product::where('id',$cart)->first();

            $result = $cart_category->quantity - 1; 
            $count = $cart_category->count_of_buy + 1;
            Product::where('id', $product->id)->update([
                'quantity' => $result,
                'count_of_buy' => $count,
            
            ]);

            CartStore::where('products_id',$cart)->take(1)->update([
                'used'=>1,
                'user_name' => \Auth::guard('cliants')->user()->name,
                'cliant_id' => \Auth::guard('cliants')->user()->id
                ]);



        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $tax = config('cart.tax') / 100;
        $number = Cart::subtotal();
        $convertNum = preg_replace('/,/', '', $number);
        $newSubtotal = ($convertNum - $discount);
        $newTotal = $newSubtotal;
        $newTax = $newSubtotal * $tax;
        $newTotalwithTax = $newTotal * (1 + $tax);

        $date = date("Y-M-D");

        $digits = 6;

        $code =rand(pow(10, $digits-1), pow(10, $digits)-1);

        $carts =  CartStore::where('products_id',$cart)->take(1)->get(['cart_code'])->pluck('cart_code')->toArray();

        
            $purchases = new Purchase();
            $purchases->number          = $code;
            $purchases->cart_id         = $cart_category->id;
            $purchases->cart_name       = $cart_category->cart_details->cart_name;
            $purchases->short_descript  = $cart_category->cart_details->short_descript;
            $purchases->cart_text       = $cart_category->cart_details->cart_text;
            $purchases->sub_category_id = $cart_category->sub_category_id;
            $purchases->purchases_status= 1;
            $purchases->users_id        = Auth::guard('cliants')->user()->id;
            $purchases->price           = $request->stars;
            $purchases->date            = $date;
            $purchases->code            = implode($carts, '<br> ');
            $purchases->quantity        = 1;
            $purchases->totalprice      = $request->stars;
            $purchases->totaltax        = 0;
            $purchases->rate            =  "⭐";
            $purchases->newTotalwithTax = $request->stars;

            $purchases->save();

            


        

        //send cart order to email
        if(\Auth::guard('cliants')->user()->code_cart_email == 1){

            Mail::send(new StarsOrder($purchases));

        }

       $cliant =  Cliant::where('id' , \Auth::guard('cliants')->user()->id)->first();

       if(!$cliant->another_assignmen_link == null){

       $balance = Cliant::where('assignmen_link' , $cliant->another_assignmen_link)->first();

       $tax = config('cart.tax') / 100;

       $total = Cart::subtotal();

       $number = ($total * $tax + $total) * 1 / 100;

       $balance->update([
           'account_balance' => $number,
       ]);

        }

       return redirect()->route('complete');
    

      } else{
            
            
            return back()->withErrors('You dont have enough stars');


        }

         } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         } //end try

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ConvertStars()
    {
        $cliant =  Cliant::where('id' , \Auth::guard('cliants')->user()->id)->first();

        $convert = $cliant->stars / 100 ;

        $balance =   $cliant->account_balance;

        $total = $convert + $balance;

        $cliant->update([

            'account_balance' => $total,
            'stars'           => 0

        ]);

        return back()->with('success','You  stars are converted to the balance ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notify(Request $request)
    {

        Notify::create($request->all());

        return response(['success' => true]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
