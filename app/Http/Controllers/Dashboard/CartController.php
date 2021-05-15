<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Models\Product;
use App\Models\Notify;
use App\Models\Sub_Category;
use App\Models\CartDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:carts_read'])->only('index');
        $this->middleware(['permission:carts_create'])->only('create');
        $this->middleware(['permission:carts_update'])->only('edit');
        $this->middleware(['permission:carts_delete'])->only('destroy');

    } //end of constructor

    public function index(Request $request)
    {

        $carts = Product::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('users_id', 'like', '%' . $request->search . '%')
                ->orWhere('cart_name->ar', 'like', '%' . $request->search . '%')
                ->orWhere('cart_name->en', 'like', '%' . $request->search . '%')
                ->orWhere('cart_text->ar', 'like', '%' . $request->search . '%')
                ->orWhere('cart_text->en', 'like', '%' . $request->search . '%')
                ->orWhere('short_descript->ar', 'like', '%' . $request->search . '%')
                ->orWhere('short_descript->en', 'like', '%' . $request->search . '%')
                ->orWhere('amrecan_price', 'like', '%' . $request->search . '%')
                ->orWhere('balance', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10);

        return view('dashboard.carts.index', compact('carts'));
    } //end of index

    public function create()
    {
        $markets       = Market::all();
        $sub_categorys = Sub_Category::all();
        $carts_details = CartDetail::all();
        return view('dashboard.carts.create', compact('markets', 'sub_categorys','carts_details'));
    } //end ofcreate

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'cart_details_id' => 'required',
            'sub_category_id' => 'required',
            'balance'         => 'required',
            'rating'          => 'required',
            'stars'           => 'required',
            'amrecan_price'   => 'required',
        ]);
        // return "ffffffff";
        $request_all = $request->all();

        $carts = new Product();

        $carts->cart_details_id = $request->cart_details_id;

        $carts->users_id = auth()->user()->id;

        $carts->market_id = $request->market_id;

        $carts->sub_category_id = $request->sub_category_id;

        $carts->rating = $request->rating;

        $carts->balance = $request->balance;

        $carts->stars = $request->stars;

        $carts->amrecan_price = $request->amrecan_price;

        $carts->save();


        notify()->success(__('home.added_successfully'));
        return redirect()->route('dashboard.carts.index');

        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // } //end try

    } //end of store

    public function edit(Product $cart)
    {
        $markets       = Market::all();
        $sub_categorys = Sub_Category::all();
        $carts_details = CartDetail::all();
        return view('dashboard.carts.edit', compact('markets', 'sub_categorys', 'cart','carts_details'));
    } //end of edit

    public function update(Request $request, Product $cart)
    {
        // dd($request->all());

        $request->validate([
            'cart_details_id' => 'required',
            'sub_category_id' => 'required',
            'balance'         => 'required',
            'rating'          => 'required',
            'stars'           => 'required',
            'amrecan_price'   => 'required',
        ]);

        $cart->update([

            'cart_details_id' => $request->cart_details_id,
            'users_id'        => auth()->user()->id,
            'market_id'       => $request->market_id,
            'sub_category_id' => $request->sub_category_id,
            'balance'         => $request->balance,
            'rating'          => $request->rating,
            'stars'           => $request->stars,
            'amrecan_price'   => $request->amrecan_price,

        ]);

        notify()->success(__('home.updated_successfully'));
        return redirect()->route('dashboard.carts.index');

        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // } //end try

    } //end of update

    public function destroy(Product $cart)
    {

        $cart->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.carts.index');

    } //end of destroy

} //end of controller
