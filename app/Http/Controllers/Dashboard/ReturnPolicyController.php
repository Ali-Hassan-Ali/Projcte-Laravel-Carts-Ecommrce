<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReturnPolicy;
use Illuminate\Http\Request;

class ReturnPolicyController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:settings_read'])->only('index');
        $this->middleware(['permission:settings_create'])->only('create');
        $this->middleware(['permission:settings_update'])->only('edit');
        $this->middleware(['permission:settings_delete'])->only('destroy');

    } //end of constructor

    public function index(Request $request)
    {
        $return_policys = ReturnPolicy::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('text', 'like', '%' . $request->search . '%');

        })->latest()->paginate(15);

        // dd($connectUs);
        return view('dashboard.settings.return_policy.index', compact('return_policys'));
    }//end of index


    public function create()
    {
        return view('dashboard.settings.return_policy.create');
    }//end of create


    public function store(Request $request)
    {
        // dd($request->all());
        try {

            $request_all = $request->all();

            $return_policy = new ReturnPolicy();
            $return_policy->text      = ['ar' => $request_all['text'], 'en' => $request_all['text_en']];
            $return_policy->save();

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.return_policy.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(ReturnPolicy $returnPolicy)
    {
        return view('dashboard.settings.return_policy.edit',compact('returnPolicy'));
    }//end of edit


    public function update(Request $request, ReturnPolicy $returnPolicy)
    {
        // $returnPolicy = ReturnPolicy::find($id);
        try {

            $returnPolicy->update([
                'text'     => ['ar'=> $request['text'],'en' => $request['text_en']],
            ]);            

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.return_policy.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end of update


    public function destroy(ReturnPolicy $returnPolicy)
    {
        // $returnPolicy = ReturnPolicy::find($id);
        $returnPolicy->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.return_policy.index');
    }//end of destroy

}//end of controller
