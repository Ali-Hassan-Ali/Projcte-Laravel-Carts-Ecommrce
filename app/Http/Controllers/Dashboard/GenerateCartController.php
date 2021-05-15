<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\GenerateCartExports;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateCartRequest;
use App\Models\GenerateCart;
use App\Models\Market;
use App\Models\Sub_Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GenerateCartController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:generate_carts_read'])->only('index');
        $this->middleware(['permission:generate_carts_create'])->only('create');
        $this->middleware(['permission:generate_carts_update'])->only('edit');
        $this->middleware(['permission:generate_carts_delete'])->only('destroy');

    } //end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $all_carts = GenerateCart::get();

        foreach ($all_carts as $all_cart) {

            $cart = $all_cart->select('created_at')->first();

            $cart_year  = Carbon::parse($cart->created_at)->year;
            $cart_month = Carbon::parse($cart->created_at)->month;

            $current_year  = Carbon::now()->year;
            $current_month = Carbon::now()->month;

            if ($cart_month == $current_month && $cart_year != $current_year) {

                $update_status         = $all_cart;
                $update_status->status = 1;

                $update_status->save();

                //dd($update_status->status);
            }
        }

        $carts = GenerateCart::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('users_id', 'like', '%' . $request->search . '%')
                ->orWhere('cart_name->ar', 'like', '%' . $request->search . '%')
                ->orWhere('cart_name->en', 'like', '%' . $request->search . '%')
                ->orWhere('cart_text->ar', 'like', '%' . $request->search . '%')
                ->orWhere('cart_text->en', 'like', '%' . $request->search . '%')
                // ->orWhere('status', 'like', '%' . $request->search . '%')
                // ->orWhere('amrecan_price', 'like', '%' . $request->search . '%')
                // ->orWhere('count_of_buy', 'like', '%' . $request->search . '%')
                ->orWhere('cart_code', 'like', '%' . $request->search . '%');

        })->latest()->paginate(50);

        // notify()->success(__('home.added_successfully'));
        return view('dashboard.generate_carts.index', compact('carts'));
    } //end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $markets       = Market::all();
        $sub_categorys = Sub_Category::all();
        return view('dashboard.generate_carts.create', compact('markets', 'sub_categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenerateCartRequest $request)
    {
        $request_all = $request->all();

        // dd($ended_year);

        for ($i = 1; $i <= $request->quentity; $i++) {

            //generate code
            $generate_cart_code = bin2hex(openssl_random_pseudo_bytes(10));

            $carts = new GenerateCart();

            $carts->cart_name       = ['ar' => $request_all['cart_name'], 'en' => $request_all['cart_name_en']];
            $carts->cart_text       = ['ar' => $request_all['cart_text'], 'en' => $request_all['cart_text_en']];
            $carts->cart_code       = $generate_cart_code;
            $carts->users_id        = auth()->user()->id;
            $carts->market_id       = $request->market_id;
            $carts->sub_category_id = $request->sub_category_id;

            $carts->amrecan_price = $request->amrecan_price;

            $current_year  = Carbon::now()->year;
            $current_month = Carbon::now()->month;
            $current_day   = Carbon::now()->day;

            // dd($current_day);

            $ended_year = $current_year + 1;

            $carts->ended_cart_time = $ended_year . '/' . $current_month . '/' . $current_day;

            $carts->save();

        }
        notify()->success(__('home.added_successfully'));
        return redirect()->route('dashboard.generate_carts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GenerateCart  $generateCart
     * @return \Illuminate\Http\Response
     */
    public function show(GenerateCart $generateCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GenerateCart  $generateCart
     * @return \Illuminate\Http\Response
     */
    public function edit(GenerateCart $GenerateCart)
    {
        // return "hkjj";
        $markets       = Market::all();
        $sub_categorys = Sub_Category::all();

        // dd($cart);

        return view('dashboard.generate_carts.edit', compact('markets', 'sub_categorys', 'GenerateCart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GenerateCart  $generateCart
     * @return \Illuminate\Http\Response
     */
    public function update(GenerateCartRequest $request, GenerateCart $generateCart)
    {

        try {

            $generateCart->update([

                'cart_name.'      => ['ar' => $request->cart_name, 'en' => $request->cart_name_en],
                'cart_text.'      => ['ar' => $request->cart_text, 'en' => $request->cart_text_en],
                'cart_code'       => $request->cart_code,
                'users_id'        => auth()->user()->id,
                'market_id'       => $request->market_id,
                'sub_category_id' => $request->sub_category_id,

                'amrecan_price'   => $request->amrecan_price,

            ]);

            notify()->success(__('home.updated_successfully'));
            return redirect()->route('dashboard.generate_carts.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } //end try

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GenerateCart  $generateCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenerateCart $generateCart)
    {

        $generateCart->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.generate_carts.index');

    }

    public function export()
    {
        ob_end_clean(); // this
        ob_start(); // and this
        return Excel::download(new GenerateCartExports, 'Generate-Excel-Carts.xls');
    }

    public function ended_carts()
    {

        $endeds = GenerateCart::where('status', '1')->get();
        return view('dashboard.generate_carts.ended', compact('endeds'));
    }

    public function edit_status(GenerateCart $generateCart)
    {

        $generateCart->update([

            $generateCart->status = 0,
        ]);
        notify()->success(__('home.updated_successfully'));
        return view('dashboard.generate_carts.ended', compact('endeds'));
    }
}
