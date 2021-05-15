<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\Ticit;
use App\Models\Parent_Category;
use App\Models\SupportCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportCartController extends Controller
{

    public function test(Request $request)
    {
        // return 'ddddddddddd';
        dd($request->all());
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

        $ticits = SupportCart::where('claint_id', \Auth::guard('cliants')->user()->id)->get();
        return view('home.ticit-list-supports', compact('parent_categories', 'ticits'));
    }

    public function get(Request $request)
    {

        $ticits = SupportCart::latest()->when($request->search, function ($q) use ($request) {

            return $q->where('cliant_email', 'like', '%' . $request->search . '%')
                ->orWhere('ticit_answer', 'like', '%' . $request->search . '%')
                ->orWhere('ticit_reply', 'like', '%' . $request->search . '%')
                ->orWhere('ticit_address', 'like', '%' . $request->search . '%')
                ->orWhere('number_ticit', 'like', '%' . $request->search . '%')
                ->orWhere('details_ticit', 'like', '%' . $request->search . '%');
            // ->orWhere('address', 'like', '%' . $request->search . '%');

        })->latest()->paginate(15);

        return view('dashboard.ticit-list.index', compact('ticits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
                // return "gggggggggg";

        $request->validate([
            'ticit_address' => 'required',
            'ticit_type'    => 'required',
            'details_ticit' => 'required',
            'images'        => 'required',
        ]);

        dd($request->all());
        // dd($request->all());
        $array = [];
        if ($request->has('images')) {
            foreach ($request['images'] as $file) {

                $logo = time() + rand(0, 99) . '.' . $file->extension();
                $file->move(('images') . '/' . date('d-m-Y'), $logo);
                array_push($array, '/images/' . date('d-m-Y') . '/' . $logo);
                // $request['image'] = ;
            }

        } else {
            $store = null;
        }

        $store = json_encode($array);
        // dd($request->all());
        $recover           = json_decode($store, true);
        $request['images'] = $store;

        $ticits = new SupportCart();

        $ticits->claint_id     = \Auth::guard('cliants')->user()->id;
        $ticits->cliant_email  = \Auth::guard('cliants')->user()->email;
        $ticits->ticit_address = $request->ticit_address;
        $ticits->ticit_type    = $request->ticit_type;
        $ticits->ticit_answer  = "ggggg";
        $ticits->ticit_reply   = "ggggg";
        $ticits->number_ticit  = bin2hex(openssl_random_pseudo_bytes(4));
        $ticits->details_ticit = $request->details_ticit;
        $ticits->images        = $request['images'] = $store;
        $ticits->save();

        return response(['success' => true]);

        // return response(['success' => true]);

        return back()->with('message', 'ticit was added to your ticit soppurt list!!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupportCart  $supportCart
     * @return \Illuminate\Http\Response
     */
    public function show(SupportCart $supportCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupportCart  $supportCart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticits = SupportCart::find($id);
        // dd($ticits);

        return view('dashboard.ticit-list.edit', compact('ticits'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupportCart  $supportCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $ticit = SupportCart::find($id);

            if ($ticit) {

                $ticit->update([

                    'ticit_reply' => $request->details_ticit,
                ]);
            }

            if ($ticit) {

                $mail = Mail::send(new Ticit($ticit));

            }

            $ticit->update([

                'ticit_answer' => 1,
            ]);

            notify()->success('Laravel Notify is awesome!');
            return back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupportCart  $supportCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportCart $supportCart)
    {
        //
    }
}
