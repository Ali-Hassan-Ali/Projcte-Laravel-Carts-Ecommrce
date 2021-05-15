<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
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
        $privacy_policys  = PrivacyPolicy::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('text', 'like', '%' . $request->search . '%');

        })->latest()->paginate(15);

        // dd($connectUs);
        return view('dashboard.settings.privacy_policy.index', compact('privacy_policys'));
    }//end of index

    
    public function create()
    {
        return view('dashboard.settings.privacy_policy.create');
    }//end of create

    
    public function store(Request $request)
    {
         // dd($request->all());
        try {

            $request_all = $request->all();

            $privacy_policy = new PrivacyPolicy();
            $privacy_policy->text      = ['ar' => $request_all['text'], 'en' => $request_all['text_en']];
            $privacy_policy->save();

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.privacy_policy.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end of store

    
    public function edit(PrivacyPolicy $privacyPolicy)
    {
        // $usage_Policy = Usage_Policy::find($id);
        return view('dashboard.settings.privacy_policy.edit',compact('privacyPolicy'));
    }//end of edit

    
    public function update(Request $request, PrivacyPolicy $privacyPolicy)
    {
        // $privacyPolicy = PrivacyPolicy::find($id);
         try {

            $privacyPolicy->update([
                'text'     => ['ar'=> $request['text'],'en' => $request['text_en']],
            ]);            

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.privacy_policy.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end off update

    
    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        // $privacyPolicy = PrivacyPolicy::find($id);
        $privacyPolicy->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.privacy_policy.index');
    }//end of destroy

}//end of controller
