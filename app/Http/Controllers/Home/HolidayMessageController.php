<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Jobs\HolidayMessageJob;
use App\Models\HolidayMessage;
use Illuminate\Http\Request;

class HolidayMessageController extends Controller
{
    public function index(Request $request)
    {

        $emails = HolidayMessage::latest()->when($request->search, function ($q) use ($request) {

            return $q->where('text', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10);

        return view('dashboard.HolidayMessage.index', compact('emails'));

    }

    public function create()
    {

        $emails = HolidayMessage::latest()->get();

        return view('dashboard.HolidayMessage.create', compact('emails'));

    }

    public function store(Request $request)
    {

        $emails = HolidayMessage::latest()->get();

        $email = new HolidayMessage();

        $email->text = $request->text;

        $email->save();

        $email = $request->text;

        dispatch(new HolidayMessageJob($email));

        notify()->success(__('home.added_successfully'));

        return redirect()->route('HolidayMessage.index');

    }
}
