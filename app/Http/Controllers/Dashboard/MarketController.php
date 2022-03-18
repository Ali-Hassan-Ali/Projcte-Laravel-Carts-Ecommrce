<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Market;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarketRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class MarketController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:markets_read'])->only('index');
        $this->middleware(['permission:markets_create'])->only('create');
        $this->middleware(['permission:markets_update'])->only('edit');
        $this->middleware(['permission:markets_delete'])->only('destroy');

    }//end of constructor

    public function index(Request $request)
    {
     $markets = Market::when($request->search, function($q) use ($request){

        return $q->where('name->ar', 'like', '%' . $request->search . '%')
               ->orWhere('name->en', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.markets.index', compact('markets'));
    }//end of index


    public function create()
    {
        $sub_categorys = Sub_Category::all(); 
        return view('dashboard.markets.create' ,compact('sub_categorys'));
    }//end create


    public function store(Request $request)
    {   
        $request->validate([
            'name'              => 'required',
            'name_en'           => 'required',
            'image'             => 'required',
        ]);

        $markets_all = $request->all();


        // try {

            $markets          = new Market();
            $markets->name    = ['ar'=> $markets_all['name'],'en'=> $markets_all['name_en']];
            $markets->user_id = auth()->user()->id;
            $markets->image   = $request->file('image')->store('market_images','public');

            $markets->save();

            // Market::create($request->all());
            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.markets.index');

        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage[],]        // }//end try

    }//end store


    public function edit(Market $market)
    {
        $sub_categorys = Sub_Category::all(); 
        return view('dashboard.markets.edit', compact('market','sub_categorys'));
    }//end of edit


    public function update(MarketRequest $request, Market $market)
    {

        try {
          

            if($request->image){

            $market->update([

                'name'    => ['ar'=> $request->name,'en'=> $request->name_en],
                'user_id' => auth()->user()->id,
                'image'   => $request->file('image')->store('market_images','public'),
                
            ]);

            } else {

                $market->update([

                    'name'    => ['ar'=> $request->name,'en'=> $request->name_en],
                    'user_id' => auth()->user()->id,
                    
                ]);

            }
            
            // $market->update($request->all());
            notify()->success(__('home.updated_successfully'));
            return redirect()->route('dashboard.markets.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end try

    }//end of update


    public function destroy(Market $market)
    {
       

        $market->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.markets.index');

    }//end of destroy


}//end of controller
