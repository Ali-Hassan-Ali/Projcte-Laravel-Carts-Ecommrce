<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Parent_Category;
use App\Models\Usage_Policy;
use App\Models\PrivacyPolicy;
use App\Models\ReturnPolicy;
use App\Models\AbouUs;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\CommonQuestions;

class FooterController extends Controller
{
    public function common_questions()
    {
        $parent_categories = Parent_Category::with('sub_category')->get();

        $common_questions = CommonQuestions::all();

        return view('home.footer.common_questions',compact('common_questions','parent_categories'));
    }//end of show contact us page

    public function showcontact()
    {
    	$parent_categories = Parent_Category::with('sub_category')->get();

    	return view('home.footer.contact',compact('parent_categories'));
    }//end of show contact us page

    public function showPrivacyPolicy()
    {
        $parent_categories = Parent_Category::with('sub_category')->get();
        $privacy_policys = PrivacyPolicy::all();

        return view('home.footer.PrivacyPolicy',compact('parent_categories','privacy_policys'));
    }//end of show contact us page

    public function storecontact(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'email'       => 'required|unique:contact_us',
            'subject'     => 'required',
            'message'     => 'required',
            // 'answer'      => 'required'
        ]);

		ContactUs::create($request->all());

        return response(['success' => true]);
        
    }//end of store contact us page


    public function showabout()
    {
    	$parent_categories = Parent_Category::with('sub_category')->get();
        $about_us = AbouUs::all();

        notify()->success('Laravel Notify is awesome!');

    	return view('home.footer.about',compact('parent_categories','about_us'));
    }//end of show contact us page

    public function showRecovery()
    {
        $parent_categories = Parent_Category::with('sub_category')->get();
        $return_policys = ReturnPolicy::all();

        return view('home.footer.recovery',compact('parent_categories','return_policys'));
    }//end of show contact us page

    public function ShowUsagePolicy()
    {
        $parent_categories = Parent_Category::with('sub_category')->get();
        $usage_policys = Usage_Policy::all();

        return view('home.footer.usagepolicy',compact('parent_categories','usage_policys'));
    }//end of show contact us page

    public function SearchCarts(Request $request)
    {
        // return "fffffffffff";
        // dd($request->all());

      
            $parent_categories = Parent_Category::with('sub_category')->get();

            $carts = Product::with('cart_details')->whenSearch(request()->search)->paginate(30);
            // return $carts;
            // $carts = Product::whenSearch(request()->search)->paginate(30);
        

        return view('home.search',compact('parent_categories','carts'));
    }//end of show contact us page


}//end of function
