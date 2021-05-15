<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CommonQuestions;
use Illuminate\Http\Request;

class CommonQuestionsController extends Controller
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
        $common_questions = CommonQuestions::when($request->search, function ($q) use ($request) {

            // return $q->HasTranslations('name', '%' . $request->search . '%');
            return $q->where('common', 'like', '%' . $request->search . '%')
                ->orWhere('questions', 'like', '%' . $request->search . '%');

        })->latest()->paginate(20);

        // dd($connectUs);
        return view('dashboard.settings.common_questions.index', compact('common_questions'));

    }//end of index

    public function create()
    {
        return view('dashboard.settings.common_questions.create');
    }//end of create


    public function store(Request $request)
    {

        try {

            $request_all = $request->all();

            $common_questions = new CommonQuestions();

            $common_questions->common        = ['ar' => $request_all['common'], 'en' => $request_all['common_en']];
            $common_questions->questions     = ['ar' => $request_all['questions'], 'en' => $request_all['questions_en']];
            
            $common_questions->save();
            // dd($how_to_use);

            notify()->success(__('home.added_successfully'));

            return redirect()->route('dashboard.common_questions.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//end of store

        
    public function edit(CommonQuestions $commonQuestions,$id)
    {
        $commonQuestions = CommonQuestions::find($id);
        return view('dashboard.settings.common_questions.edit',compact('commonQuestions'));
    }//end of edit


    public function update(Request $request, CommonQuestions $commonQuestions,$id)
    {
            $commonQuestions = commonQuestions::find($id);
        try {

            $commonQuestions->update([
                'common'       => ['ar'=> $request['common'],   'en' => $request['common_en']],
                'questions'    => ['ar'=> $request['questions'],'en' => $request['questions_en']],
            ]);            


            notify()->success(__('home.updated_successfully'));
            return redirect()->route('dashboard.common_questions.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    }//endof update

    public function destroy(CommonQuestions $commonQuestions,$id)
    {
        $commonQuestions = CommonQuestions::find($id);
        $commonQuestions->delete();
        notify()->success(__('home.deleted_successfully'));
        return redirect()->route('dashboard.common_questions.index');
    }//end of destroy

}//end of controler
