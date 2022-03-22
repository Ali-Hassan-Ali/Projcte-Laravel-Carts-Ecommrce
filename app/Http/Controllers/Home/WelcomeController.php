<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HowUse;
use App\Models\Market;
use App\Models\Parent_Category;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Sub_Category;
use App\Models\WalletDatabase;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

// req  1usd = ['SQIRK] AMOUT * EX

////////////////////////////
class WelcomeController extends Controller
{

    public function how_useage($sub_category_id)
    {
        // dd($id);
        $parent_categories = Parent_Category::with('sub_category')->get();
        
        // if (session()->get('rate') == null) {

            $how_useage     = HowUse::find($sub_category_id);

            $all_how_useage = HowUse::all();
            // dd($how_useage->description);
            $how_useage     = HowUse::where('sub_categorys_id', $sub_category_id)->get();

            // dd($how_useage);
        // }

        return view('home.how_useage', compact('parent_categories', 'how_useage', 'all_how_useage'));
    }

    public function index()
    {

        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        //  Cart::destroy();

        if (session()->get('rate') == null) {

            session()->put('price_icon', '$');
            session()->put('rate', 'UST');

        }

        $parent_categories = Parent_Category::with('sub_category')->get();

        $carts = Product::orderBy('count_of_buy')->paginate(10);

        if (\Auth::guard('cliants')->check()) {

            session()->put('rate', 'UST');

            session()->put('price_icon', '$');

            if (session()->get('rate') == 'UST') {

                $ses = Cart::content();

                if (!$ses == null) {

                    // dd($ses);

                    foreach ($ses as $se) {

                        $dd = Product::where('id', $se->id)->first();

                        // dd($dd);
                        $amount = $dd->amrecan_price;

                        $a = Cart::update($se->rowId, ['price' => $amount]);
                    }

                }

            }

            $cartss = WalletDatabase::where('users_id', '=', \Auth::guard('cliants')->user()->id)->get();

            if (!$cartss == null) {

                foreach ($cartss as $cart) {

                    $dd = Product::where('id', $cart->cart_id)->first();

                    if (!$dd == null) {

                        $duplicates = Cart::search(function ($cartItem, $rowId) use ($dd) {
                            return $cartItem->id === $dd->id;
                        });

                        if ($duplicates->isNotEmpty()) {

                            return view('home.welcome', compact('parent_categories', 'carts'));

                        }

                        Cart::add($dd->id, $dd->cart_details->cart_name, 1, $dd->amrecan_price)
                            ->associate('App\Models\Product');

                    }

                }
            }

        } else {

            // dd(Cart::content());

            if (!session()->get('rate') == null) {

                if (session()->get('rate') == 'UST') {

                    $carts = Product::orderBy('used')->paginate(10);

                } else {

                    $convert = Rate::select(session()->get('rate'))->value(session()->get('rate'));

                    foreach ($carts as $cart) {

                        $amount = $cart->amrecan_price;

                        $newamount = $amount * $convert;

                        $cart->amrecan_price = $newamount;

                    }

                }
            }
        }

        return view('home.welcome', compact('parent_categories', 'carts'));

    }

    public function show_market($category)
    {
        $parent_categories = Parent_Category::with('sub_category')->get();

        $sub_categories = Sub_Category::where('id', '=', $category)->get();

        $market_id   = Product::where('sub_category_id', $category)->pluck('market_id');

        $carts    = Product::where('sub_category_id', $category)->get();

        $SubImage = Product::where('sub_category_id', $category)->first();

        $markets   = Market::whereIn('id', $market_id)->get();

        return view('home.products', compact('carts', 'sub_categories', 'markets', 'parent_categories', 'SubImage'));

    } //end if  function show_market

    public function show_carts($category, $market)
    {

        $markets = [];

        $parent_categories = Parent_Category::with('sub_category')->get();

        $sub_categories = Sub_Category::where('id', '=', $category)->get();

        $carts = Product::where('sub_category_id', $category)->where('market_id', $market)->get();

        $market_id = Product::where('sub_category_id', $category)->pluck('market_id');
        $markets   = Market::whereIn('id', $market_id)->get();
        $SubImage = Product::where('sub_category_id', $category)->first();

        if (!session()->get('rate') == null) {

            if (session()->get('rate') == 'UST') {

                $carts = Product::where('sub_category_id', $category)->where('market_id', $market)->get();

            } else {

                $convert = Rate::select(session()->get('rate'))->value(session()->get('rate'));

                foreach ($carts as $cart) {

                    $amount = $cart->amrecan_price;

                    $newamount = $amount * $convert;

                    $cart->amrecan_price = $newamount;

                }

            }
        }

        return view('home.markets', compact('carts', 'markets', 'sub_categories', 'parent_categories','SubImage'));

    } //end of function

    public function show_details($category, $cart)
    {

        //  dd($category,$cart);

        $parent_categories = Parent_Category::with('sub_category')->get();

        $sub_categories = Sub_Category::where('id', $category)->get();

        $carts = Product::find($cart);

        if (!session()->get('rate') == null) {

            if (session()->get('rate') == 'UST') {

                $carts = Product::find($cart);

            } else {

                $convert = Rate::select(session()->get('rate'))->value(session()->get('rate'));

                foreach ($carts as $cart) {

                    $amount = $cart->amrecan_price;

                    $newamount = $amount * $convert;

                    $cart->amrecan_price = $newamount;

                }

            }

            $random_carts = Product::inRandomOrder()->get();

        }

        return view('home.products-details', compact('sub_categories', 'parent_categories', 'random_carts', 'carts'));

    }

    public function change_currency(Request $request)
    {

        session()->put('rate', $request->rate);

        if (session()->get('rate') == 'UST') {

            session()->put('price_icon', '$');

        } else {

            if (\Config::get('app.locale') === 'en') {

                session()->put('price_icon', session()->get('rate'));
            }

            if (session()->get('rate') == 'EGP' && \Config::get('app.locale') === 'ar') {

                session()->put('price_icon', 'ر.س');
            }

            if (session()->get('rate') == 'AED' && \Lang::locale() == "ar") {

                session()->put('price_icon', 'د.أ');
            }

            if (session()->get('rate') == 'KWD' && \Lang::locale() == "ar") {

                session()->put('price_icon', 'د.ك');

            }if (session()->get('rate') == 'MAD' && \Lang::locale() == "ar") {

                session()->put('price_icon', 'د.م');

            }
            if (session()->get('rate') == 'TRY' && \Lang::locale() == "ar") {

                session()->put('price_icon', 'ل.ت');

            }

            if (session()->get('rate') == 'LYD' && \Lang::locale() == "ar") {

                session()->put('price_icon', 'ل.ل');

            }
            if (session()->get('rate') == 'NIS' && \Lang::locale() == "ar") {

                session()->put('price_icon', 'ش.ف');

            }

        }

        if (session()->get('rate') == 'UST') {

            $ses = Cart::content();

            foreach ($ses as $se) {

                $dd = Product::where('id', $se->id)->first();

                $amount = $dd->amrecan_price;

                $a = Cart::update($se->rowId, ['price' => $amount]);
            }

        } else {

            $ses = Cart::content();

            $convert = Rate::select(session()->get('rate'))->value(session()->get('rate'));

            foreach ($ses as $se) {

                $dd = Product::where('id', $se->id)->first();

                $amount = $dd->amrecan_price;

                $newamount = $amount * $convert;

                $a = Cart::update($se->rowId, ['price' => $newamount]);

            }

        }

        return back();

    }

} //end of controller gome
