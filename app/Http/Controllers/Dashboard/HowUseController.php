<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\HowUse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sub_Category;
use App\Models\Product;


class HowUseController extends Controller
{

    public function index()
    {
        $uses = HowUse::all();

        return view('dashboard.how_to_use.index', compact('uses'));

    }//end of index


    public function create()
    {
        $sub_categorys = Sub_Category::all(); 

        return view('dashboard.how_to_use.create'  ,compact('sub_categorys') );

    }//end of create
    


    public function store(Request $request)
    {

        try {

            $request_all = $request->all();

            $how_to_use = new HowUse();

            $how_to_use->description        = ['ar' => $request_all['description'], 'en' => $request_all['description_en']];
            $how_to_use->sub_categorys_id   = $request->sub_categorys_id;

            $how_to_use->save();
            // dd($how_to_use);

            notify()->success(__('home.added_successfully'));

            return redirect()->route('dashboard.how_to_use.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end of store


    public function edit($id)
    {
        // dd($howUses);
        $HowUses = HowUse::find($id);
        $sub_categorys = Sub_Category::all();

        return view('dashboard.how_to_use.edit'  ,compact('HowUses','sub_categorys'));
    }//end of edit



    public function update(Request $request,$id)
    {
        try {

        
            $howUse = HowUse::find($id);

            $howUse->update([
                'description'       => ['ar'=> $request['description'],'en' => $request['description_en']],
                'sub_categorys_id'  => $request->sub_categorys_id,
            ]);            


            notify()->success(__('home.updated_successfully'));
            return redirect()->route('dashboard.how_to_use.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of updaet

   

    public function destroy(HowUse $howUse , $id)
    {
        $howUse = HowUse::find($id);
        $howUse->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.how_to_use.index');
    }//end of destroy

}//end of controller
