<?php

namespace App\Http\Controllers\Home;

use App\Models\Assignmen;
use Illuminate\Http\Request;
use App\Models\Parent_Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cliant;
use App\Models\Market;
use App\Models\Sub_Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Currency;


class AssignmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($assign)
    {

        
    
       
        $parent_categories = Parent_Category::with('sub_category')->get();

        $carts = Product::orderBy('used')->paginate(10);

        if(session()->get('rate') == null){

         session()->put('price_icon','$');
         session()->put('rate', 'UST');



      }
       
        $parent_categories = Parent_Category::with('sub_category')->get();

        $carts = Product::orderBy('used')->paginate(10);

        if(!session()->get('rate') == null){

            if(session()->get('rate') == 'UST'){
  


      
               $carts = Product::orderBy('used')->paginate(10);


         }else{

      

         $convert =  Rate::select(session()->get('rate'))->value(session()->get('rate'));

        foreach($carts as $cart){


            $amount =    $cart->amrecan_price;

            $newamount = $amount * $convert;
            
            $cart->amrecan_price = $newamount;
 


      }

   }
}

         $cliant = Cliant::where('assignmen_link',$assign)->first();

         $cliant->assignmen_users = $cliant->assignmen_users + 1;

         $cliant->save();

        

         if(\Auth::guard('cliants')->user()){

         $myacount =  Cliant::where('id',\Auth::guard('cliants')->user()->id)->first();
         $myacount->another_assignmen_link = $assign;
         $myacount->save();

         }else{

            return view('home.welcome')->with('error_message', 'you should sign up to use referral link system!');
         }
         
        return view('home.welcome',compact('parent_categories','carts'));
    }

    public function get(){

        if(!\Auth::guard('cliants')->user() == null){
        $cliant = Cliant::where('id',\Auth::guard('cliants')->user()->id)->first();
        }else{


            $cliant = 0;

        }

      
        $parent_categories = Parent_Category::with('sub_category')->get();

        return view('home.referral-system',compact('parent_categories','cliant'));
    }

    
}
