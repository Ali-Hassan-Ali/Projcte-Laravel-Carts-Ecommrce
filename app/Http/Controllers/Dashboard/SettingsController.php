<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	public function index () 
	{
		return view('dashboard.settings.socialite-link.create');
	}//end of index 

	public function social_login () 
	{
		return view('dashboard.settings.socialite-login.create');
	}//end of index 

	public function store(Request $request) 
	{
		setting($request->all())->save();

		notify()->success(__('home.added_successfully'));
        return redirect()->back();
	}//end of index    

}//end of controller
