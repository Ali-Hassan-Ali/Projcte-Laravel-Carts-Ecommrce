<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
        public function index()
    {
    	return view('home.welcome');
    }//end of index
}
