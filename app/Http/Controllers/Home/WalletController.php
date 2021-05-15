<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Parent_Category;
use App\Models\Product;
use App\Models\WalletDatabase;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WalletController extends Controller
{

    public function index()
    {

        if (session()->get('rate') == null) {

            session()->put('price_icon', '$');
            session()->put('rate', 'UST');

        }

        // $mightAlsoLike = Product::mightAlsoLike()->get();
        $parent_categories = Parent_Category::with('sub_category')->get();

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

        return view('home.wallet', compact('parent_categories'))->with([
            'discount'    => $discount,
            'newSubtotal' => $newSubtotal,
            'newTotal'    => $newTotal,
        ]);
    }

    public function store(Product $carts)
    {
        // dd($carts->cart_details->short_descript);

        //dd(\Auth::guard('cliants')->user());

        //  dd($carts);
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($carts) {
            return $cartItem->id === $carts->id;
        });

        if (Auth::guard('cliants')->check() && $duplicates->isNotEmpty() !== true) {

            $walletdb = new WalletDatabase();

            $walletdb->cart_id         = $carts->id;
            $walletdb->cart_name       = $carts->cart_details->cart_name;
            $walletdb->short_descript  = $carts->cart_details->short_descript;
            $walletdb->cart_text       = $carts->cart_details->cart_text;
            $walletdb->users_id        = Auth::guard('cliants')->user()->id;
            $walletdb->market_id       = $carts->market_id;
            $walletdb->image           = $carts->cart_details->image_path;
            $walletdb->sub_category_id = $carts->sub_category_id;
            $walletdb->amrecan_price   = $carts->amrecan_price;

            // dd($walletdb);

            $walletdb->save();

        }

        if ($duplicates->isNotEmpty()) {
            return back();

        }

        $carts = Cart::add($carts->id, $carts->cart_details->cart_name, 1, $carts->amrecan_price)
            ->associate('App\Models\Product');

        return response()->json($carts);

        // return back()->with('success_message', 'Item was added to your cart!!!!');
    }

    public function storeToPayment(Product $carts)
    {

        //dd(\Auth::guard('cliants')->user());
        if (Auth::guard('cliants')->check()) {

            $walletdb = new WalletDatabase();

            $walletdb->cart_id         = $carts->id;
            $walletdb->cart_name       = $carts->cart_name;
            $walletdb->short_descript  = $carts->short_descript;
            $walletdb->cart_text       = $carts->cart_text;
            $walletdb->users_id        = Auth::guard('cliants')->user()->id;
            $walletdb->market_id       = $carts->market_id;
            $walletdb->image           = $carts->image;
            $walletdb->sub_category_id = $carts->sub_category_id;
            $walletdb->amrecan_price   = $carts->amrecan_price;

            // dd($walletdb);

            $walletdb->save();

        }

        //  dd($carts);
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($carts) {
            return $cartItem->id === $carts->id;
        });

        if ($duplicates->isNotEmpty()) {
            return back()->with('success_message', 'Item is already in your carts!');
        }

        $carts = Cart::add($carts->id, $carts->cart_name, 1, $carts->amrecan_price)
            ->associate('App\Models\Product');

        return redirect()->route('payment');

        // return back()->with('success_message', 'Item was added to your cart!!!!');
    }

    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'quantity' => 'required|numeric'
        // ]);

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {

        $cart = Cart::content()->where('rowId', $id)->first();

        if (\Auth::guard('cliants')->check()) {

            $WalletDatabase = WalletDatabase::where('cart_id', $cart->id)->where('users_id', \Auth::guard('cliants')->user()->id)->first();

            if (!$WalletDatabase == null) {
                $WalletDatabase->delete();

            }
        }

        // dd($cart);

        Cart::remove($id);

        return response()->json($cart);

        // return back()->withSuccess('secess delete');
    }

    public function IncDes(Request $request, $id)
    {

        $a = Cart::update($id, $request->quantity);

        return response()->json($a);

    }
}
