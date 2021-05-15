<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\BayCart;
use App\Models\CartStore;
use App\Models\Cliant;
use App\Models\Order;
use App\Models\Parent_Category;
use App\Models\PayCurrencie;
use App\Models\Product;
use App\Models\Purchase;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function paystore(Request $request)
    {

        // get all wallet content
        // dd($request->all());
        $products = Cart::content();

        //proccess product
        foreach ($products as $product) {

            $cart_category = Product::where('id', $product->id)->first();

            // validate quantity
            if ($cart_category->quantity < $product->qty) {

                Cart::destroy();

                return view('home.welcome');
            }

            $result = $cart_category->quantity - $product->qty;
            $count  = $cart_category->count_of_buy + 1;
            Product::where('id', $product->id)->update([
                'quantity'     => $result,
                'count_of_buy' => $count,

            ]);
        }

        //get order from DB
        foreach ($products as $product) {

            CartStore::where('products_id', $product->id)->take($product->qty)->update([
                'used'      => 1,
                'user_name' => \Auth::guard('cliants')->user()->name,
            ]);

            $carts[] = CartStore::where('products_id', $product->id)->take($product->qty)->get();

        }

        $discount        = session()->get('coupon')['discount'] ?? 0;
        $code            = session()->get('coupon')['name'] ?? null;
        $tax             = config('cart.tax') / 100;
        $number          = Cart::subtotal();
        $convertNum      = preg_replace('/,/', '', $number);
        $newSubtotal     = ($convertNum - $discount);
        $newTotal        = $newSubtotal;
        $newTax          = $newSubtotal * $tax;
        $newTotalwithTax = $newTotal * (1 + $tax);

        $date   = date("Y-M-D");
        $digits = 6;

        $file_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/sub_category_images/'), $file_name);

        $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        foreach ($products as $cart) {

            $carts                       = CartStore::where('products_id', $cart->id)->take($cart->qty)->get(['cart_code'])->pluck('cart_code')->toArray();
            $purchases                   = new Purchase();
            $purchases->number           = $code;
            $purchases->cart_id          = $cart->id;
            $purchases->cart_name        = $cart->model->cart_details->cart_name;
            $purchases->short_descript   = $cart->model->cart_details->short_descript;
            $purchases->cart_text        = $cart->model->cart_details->cart_text;
            $purchases->sub_category_id  = $cart->model->sub_category_id;
            $purchases->purchases_status = 2;
            $purchases->users_id         = \Auth::guard('cliants')->user()->id;
            $purchases->price            = $cart->price;
            $purchases->date             = $date;
            $purchases->status           = '1';
            $purchases->code             = implode($carts, '<br>');
            // dd($purchases->code);
            $purchases->quantity = $cart->qty;

            $purchases->image           = $file_name;
            $purchases->totalprice      = $newTotal;
            $purchases->totaltax        = $newTax;
            $purchases->rate            = session()->get('price_icon');
            $purchases->newTotalwithTax = $newTotalwithTax;

            $purchases->save();

        }

        //send cart order to email
        if (\Auth::guard('cliants')->user()->code_cart_email == 1) {

            $cliant = Cliant::where('id', \Auth::guard('cliants')->user()->id)->first();

            if (!$cliant->another_assignmen_link == null) {

                $balance = Cliant::where('assignmen_link', $cliant->another_assignmen_link)->first();

                $tax = config('cart.tax') / 100;

                $total = Cart::subtotal();

                $number = ($total * $tax + $total) * 1 / 100;

                $balance->update([
                    'account_balance' => $number,
                ]);

            }
        }

        return redirect()->route('complete');
    }
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

        $pay_currencie = PayCurrencie::all();

        $discount        = session()->get('coupon')['discount'] ?? 0;
        $code            = session()->get('coupon')['name'] ?? null;
        $tax             = config('cart.tax') / 100;
        $number          = Cart::subtotal();
        $convertNum      = preg_replace('/,/', '', $number);
        $newSubtotal     = ($convertNum - $discount);
        $newTotal        = $newSubtotal;
        $newTax          = $newSubtotal * $tax;
        $newTotalwithTax = $newTotal * (1 + $tax);
        // dd($newTotalwithTax);

        return view('home.payment', compact('parent_categories', 'pay_currencie'))->with([
            'newTax'          => $newTax,
            'newTotalwithTax' => $newTotalwithTax,

        ]);
    }

    public function search(Request $request)
    {

        $carts = CartStore::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('users_id', 'like', '%' . $request->search . '%')
                ->orWhere('products_id', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10);

        return view('dashboard.orders.index', compact('carts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //get all wallet content
        // dd($request->all());
        $products = Cart::content();

        //proccess product
        foreach ($products as $product) {

            $cart_category = Product::where('id', $product->id)->first();

            //validate quantity
            if ($cart_category->quantity < $product->qty) {

                Cart::destroy();

                return view('home.welcome');
            }

            if ($product->model->stars > 0) {

                $cliant = Cliant::where('id', \Auth::guard('cliants')->user()->id)->first();

                $cliantStars = $claint->stars;

                $cartStars = $product->model->stars * $product->qty;

                $stars = $CliantStars + $cartStars;

                $cliant->update([
                    'stars' => $stars,
                ]);

            }

            $result = $cart_category->quantity - $product->qty;
            $count  = $cart_category->count_of_buy + 1;
            Product::where('id', $product->id)->update([
                'quantity'     => $result,
                'count_of_buy' => $count,

            ]);

        }

        //get order from DB
        foreach ($products as $product) {

            CartStore::where('products_id', $product->id)->take($product->qty)->update([
                'used'      => 1,
                'user_name' => \Auth::guard('cliants')->user()->name,
                'cliant_id' => \Auth::guard('cliants')->user()->id,
            ]);

            $carts[] = CartStore::where('products_id', $product->id)->take($product->qty)->get();

        }

        $discount        = session()->get('coupon')['discount'] ?? 0;
        $code            = session()->get('coupon')['name'] ?? null;
        $tax             = config('cart.tax') / 100;
        $number          = Cart::subtotal();
        $convertNum      = preg_replace('/,/', '', $number);
        $newSubtotal     = ($convertNum - $discount);
        $newTotal        = $newSubtotal;
        $newTax          = $newSubtotal * $tax;
        $newTotalwithTax = $newTotal * (1 + $tax);

        $date = date("Y-M-D");

        $digits = 6;

        $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        foreach ($products as $cart) {

            $carts = CartStore::where('products_id', $cart->id)->take($cart->qty)->get(['cart_code'])->pluck('cart_code')->toArray();

            $purchases                   = new Purchase();
            $purchases->number           = $code;
            $purchases->cart_id          = $cart->id;
            $purchases->cart_name        = $cart->model->cart_details->cart_name;
            $purchases->short_descript   = $cart->model->cart_details->short_descript;
            $purchases->cart_text        = $cart->model->cart_details->cart_text;
            $purchases->sub_category_id  = $cart->model->sub_category_id;
            $purchases->purchases_status = 1;
            $purchases->users_id         = \Auth::guard('cliants')->user()->id;
            $purchases->price            = $cart->price;
            $purchases->date             = $date;
            $purchases->code             = implode($carts, '<br> ');
            $purchases->quantity         = $cart->qty;
            $purchases->totalprice       = $newTotal;
            $purchases->totaltax         = $newTax;
            $purchases->rate             = session()->get('price_icon');
            $purchases->newTotalwithTax  = $newTotalwithTax;

            $purchases->save();

        }

        //send cart order to email
        if (\Auth::guard('cliants')->user()->code_cart_email == 1) {

            Mail::send(new BayCart($carts));

            $cliant = Cliant::where('id', \Auth::guard('cliants')->user()->id)->first();

            if (!$cliant->another_assignmen_link == null) {

                $balance = Cliant::where('assignmen_link', $cliant->another_assignmen_link)->first();

                $tax = config('cart.tax') / 100;

                $total = Cart::subtotal();

                $number = ($total * $tax + $total) * 1 / 100;

                $balance->update([
                    'account_balance' => $number,
                ]);

            }
        }

        return redirect()->route('complete');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     *
     */

    public function complete()
    {

        $random_carts = Product::inRandomOrder()->paginate(10);

        $parent_categories = Parent_Category::with('sub_category')->get();

        return view('home.complete', compact('parent_categories', 'random_carts'));

    }

    public function my_purchase()
    {

        $parent_categories = Parent_Category::with('sub_category')->get();

        $purchases = Purchase::where('users_id', \Auth::guard('cliants')->user()->id)->select('number', 'newTotalwithTax', 'purchases_status', 'date')->distinct()->latest()->get();

        return view('home.purchases', compact('purchases', 'parent_categories'));

    }

    public function purchase_details($number)
    {

        $parent_categories = Parent_Category::with('sub_category')->get();

        $purchases_first = Purchase::where('number', $number)->first();

        $purchases = Purchase::where('number', $number)->get();

        if ($purchases == null && $purchases_first == null) {

            return view('/');
        }

        // dd($purchases);

        return view('home.purchases-details', compact('parent_categories', 'purchases', 'purchases_first'));

    }

    public function purchase_invoices($number)
    {

        $purchases = Purchase::where('number', $number)->get();

        $purchases_first = Purchase::where('number', $number)->first();

        if ($purchases == null && $purchases_first == null) {

            return view('/');
        }
        //  dd($purchases);

        return view('home.invoices', compact('purchases', 'purchases_first'));

    }

    public function purchase_admin(Request $request)
    {

        $purchases = Purchase::latest()->when($request->search, function ($q) use ($request) {

            return $q->where('numberr', 'like', '%' . $request->search . '%')
                ->orWhere('date', 'like', '%' . $request->search . '%')
                ->orWhere('crate', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%')
                ->orWhere('quantity', 'like', '%' . $request->search . '%')
                ->orWhere('totalprice', 'like', '%' . $request->search . '%')
                ->orWhere('short_descript->ar', 'like', '%' . $request->search . '%')
                ->orWhere('short_descript->en', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10);

        // $purchases =  Purchase::latest()->get();

        return view('dashboard.orders.purchase_admin', compact('purchases'));

    }

    public function purchases_search(Request $request)
    {

        $purchases = Purchase::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('number', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10);

        return view('dashboard.orders.purchase_admin', compact('purchases'));

    }

    public function purchase_delete(Purchase $order)
    {

        $order->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('purchase_admin');

    }

    public function show(Request $request)
    {

        $carts = CartStore::latest()->when($request->search, function ($q) use ($request) {

            return $q->where('cart_name->ar', 'like', '%' . $request->search . '%')
                ->orWhere('cart_name->en', 'like', '%' . $request->search . '%')
                ->orWhere('short_descript->ar', 'like', '%' . $request->search . '%')
                ->orWhere('short_descript->en', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10);

        return view('dashboard.orders.index', compact('carts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartStore $cartStore)
    {
        $cartStore->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('payment-show');
    } //end of destroy
}
