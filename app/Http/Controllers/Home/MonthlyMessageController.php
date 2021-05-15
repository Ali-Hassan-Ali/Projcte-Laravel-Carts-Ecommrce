<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Jobs\MonthlyMessageJob;
use App\Models\MonthlyMessage;
use Illuminate\Http\Request;

class MonthlyMessageController extends Controller
{
    public function index(Request $request)
    {

        $emails = MonthlyMessage::latest()->when($request->search, function ($q) use ($request) {

            return $q->where('text', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10);

        return view('dashboard.MonthlyMessage.index', compact('emails'));

    }

    public function create()
    {

        $emails = MonthlyMessage::latest()->get();

        return view('dashboard.MonthlyMessage.create', compact('emails'));

    }

    public function store(Request $request)
    {

        $emails = MonthlyMessage::latest()->get();

        $email = new MonthlyMessage();

        $email->text = $request->text;

        $email->save();

        $email = $request->text;

        dispatch(new MonthlyMessageJob($email));

        notify()->success(__('home.added_successfully'));

        return redirect()->route('MonthlyMessage.index');

    }
}
