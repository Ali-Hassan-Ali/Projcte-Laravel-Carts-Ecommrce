<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AbouUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
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
        $about_uss = AbouUs::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('text->en', 'like', '%' . $request->search . '%')
            ->orWhere('text->en', 'like', '%' . $request->search . '%');

        })->latest()->paginate(15);

        // dd($connectUs);
        return view('dashboard.settings.about_us.index', compact('about_uss'));
    }//end of index


    public function create()
    {
        return view('dashboard.settings.about_us.create');
    }//end of create


    public function store(Request $request)
    {
         // dd($request->all());
        try {

            $request_all = $request->all();

            $about_uss = new AbouUs();
            $about_uss->text      = ['ar' => $request_all['text'], 'en' => $request_all['text_en']];
            $about_uss->save();

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.about_us.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end of store



    public function edit(AbouUs $abouUs,$id)
    {
        $abouUs = AbouUs::find($id);
        return view('dashboard.settings.about_us.edit',compact('abouUs'));
    }//end of edit


    public function update(Request $request, AbouUs $abouUs,$id)
    {
        $abouUs = AbouUs::find($id);
        try {

            $abouUs->update([
                'text'     => ['ar'=> $request['text'],'en' => $request['text_en']],
            ]);            

            notify()->success(__('home.added_successfully'));
            return redirect()->route('dashboard.about_us.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end of update


    public function destroy(AbouUs $abouUs,$id)
    {
        $abouUs = AbouUs::find($id);
        $abouUs->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.about_us.index');
    }//end of destroy

}//end of controller
