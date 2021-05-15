<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Usage_Policy;
use Illuminate\Http\Request;

class UsagePolicyController extends Controller
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
        $usage_policys = Usage_Policy::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('text', 'like', '%' . $request->search . '%');

        })->latest()->paginate(15);

        // dd($connectUs);
        return view('dashboard.settings.usage_policy.index', compact('usage_policys'));
    }//end of index

    
    public function create()
    {
        return view('dashboard.settings.usage_policy.create');
    }//end of icreate

    
    public function store(Request $request)
    {
        // dd($request->all());
        try {

            $request_all = $request->all();

            $usage_policy = new Usage_Policy();
            $usage_policy->text      = ['ar' => $request_all['text'], 'en' => $request_all['text_en']];
            $usage_policy->save();

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.usage_policy.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end of store


    public function edit(Usage_Policy $usage_Policy, $id)
    {
        $usage_Policy = Usage_Policy::find($id);
        return view('dashboard.settings.usage_policy.edit',compact('usage_Policy'));
    }//end of edit

    
    public function update(Request $request,Usage_Policy $usage_Policy ,$id)
    {
        // dd($request->all());
        $usage_Policy = Usage_Policy::find($id);
        try {

            $usage_Policy->update([
                'text'     => ['ar'=> $request['text'],'en' => $request['text_en']],
            ]);            

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.usage_policy.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end of update

    
    public function destroy(Usage_Policy $usage_Policy, $id)
    {
        $usage_Policy = Usage_Policy::find($id);
        $usage_Policy->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.usage_policy.index');
    }//end of destroy

}//end of contoller
