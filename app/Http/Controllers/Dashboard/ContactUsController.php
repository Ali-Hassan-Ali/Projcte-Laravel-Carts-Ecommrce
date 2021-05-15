<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConnectRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contact;
use App\Models\Cliant;


class ContactUsController extends Controller
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
        $connectUs = ContactUs::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('subject', 'like', '%' . $request->search . '%')
                ->orWhere('message', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10);

        // dd($connectUs);
        return view('dashboard.settings.connect_us.index', compact('connectUs'));

    }//end of index


    public function create()
    {
        return view('dashboard.settings.connect_us.create');
    }//end of create


    public function store(ConnectRequests $request)
    {
        ContactUs::create($request->all());
        notify()->success(__('home.added_successfully'));
        return back()->with('message','ticit was added to your ticit soppurt list!!!!');
    }//end of store


    public function edit(ContactUs $contactUs,$id)
    {
        $contactUs = ContactUs::find($id);
        return view('dashboard.settings.connect_us.edit',compact('contactUs'));
    }//end of edit


    public function update(Request $request, ContactUs $ticit)
    {


       $answer =  ContactUs::where('email',$request->cliant_email)->first();
      
       
        $ticit = [$request->cliant_email, $request->text,$request->name];

        $mail =  Mail::send(new contact($ticit));



        $answer->update([

            'answer' => 1,
        ]);

     


        notify()->success(__('home.added_successfully'));
        return redirect()->route('dashboard.connect_us.index');
    }//end of update

    public function destroy(ContactUs $contactUs, $id)
    {
        $contactUs = ContactUs::find($id);
        $contactUs->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.connect_us.index');
    }//end of destroy

}//end of controller
