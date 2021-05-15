<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Models\Parent_Category;
use App\Models\Product;
use App\Models\Sub_Category;
use App\Models\WalletDatabase;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class PurchaseController extends Controller
{

    public function index()
    {

        if (session()->get('rate') == null) {

            session()->put('price_icon', '$');
            session()->put('rate', 'UST');

        }
        
        $parent_categories = Parent_Category::with('sub_category')->get();
        $sub_categorys     = sub_category::all();
        $markets           = Market::all();
        $products          = Product::all();

        return view('home.purchase', compact('parent_categories', 'sub_categorys', 'markets', 'products'));
    } //end of index

    public function parent_category($id)
    {
        // return "gooooooood";
        $sub_category = sub_category::where("parent_category_id", $id)->get();
        return response()->json($sub_category);
    } //end of create

    public function sub_categoryed($id)
    {
        $marketd = Market::where("id", $id)->get();

        return response()->json($marketd);
    } //end of create

    public function makted($id)
    {
        // return "ggggggggggggg";
        $product = Product::where("id", $id)->with('cart_details')->get();
        // dd($product);
        return response()->json($product);
    } //end of create

    public function store(Request $request)
    {
        // dd($request->all());

        if (Auth::guard('cliants')->check()) {

            $walletdb = new WalletDatabase();

            $walletdb->cart_id         = $request->cart_id;
            $walletdb->cart_name       = $request->cart_name;
            $walletdb->short_descript  = $request->short_descript;
            $walletdb->cart_text       = $request->cart_text;
            $walletdb->image           = $request->image;
            $walletdb->users_id        = Auth::guard('cliants')->user()->id;
            $walletdb->market_id       = $request->market_id;
            $walletdb->sub_category_id = $request->sub_category_id;
            $walletdb->amrecan_price   = $request->amrecan_price;

            $walletdb->save();

            // dd($walletdb);

        } //end of if

        //  dd($carts);
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->cart_id;
        });

        if ($duplicates->isNotEmpty()) {
            return back()->with('success_message', 'Item is already in your carts!');
        }

        $carts = Cart::add($request->cart_id, $request->cart_name, 1, $request->amrecan_price)
            ->associate('App\Models\Product');
        // dd($carts);
        return redirect()->route('payment');

        // return response()->json($carts);

    } //end of store

    public function show(Purchase $purchase)
    {
        //
    } //end of show

    public function edit(Purchase $purchase)
    {
        //
    } //end of edit

    public function update(Request $request, Purchase $purchase)
    {
        //
    } //end of update

    public function destroy(Purchase $purchase)
    {
        //
    } //end of destroy

} //end of controller
