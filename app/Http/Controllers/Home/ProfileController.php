<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cliant;
use App\Models\GenerateCart;
use App\Models\Parent_Category;
use App\Models\user;
use App\Rules\MatchOldPassword;
use Auth;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\WalletDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    public function index()
    {

    } //end of index

    public function store(Request $request)
    {
        dd($request->all());
    } //end of store

    public function RegisterMobile(Request $request)
    {
        dd($request->all());
    }

    public function login(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // try {

            if ($validator->passes()) {

             
                $remember_me = $request->has('remember_me') ? true : false;
                if (Auth::guard('cliants')->attempt(array(

                    'email'    => $request->input('email'),
                    'password' => $request->input('password')), true, $remember_me)) {

                        return response(['success' => true]);
                        // return redirect()->route('/');
                    } // end if

                    return response(['error' => ['email' => (__('home.error'))]]);
                    // return response()->json(['error' => 'Sorry User not found.']);
                } //ed of if validator

                return response()->json(['error' => $validator->errors()->all()]);

            // } catch (Exception $e) {
            //     return response()->json([
            //         'success' => 'false',
            //         'errors'  => $e->getMessage(),
            //     ], 400);

            // } //end of catcg

        } //end of store

        public function changePassword(Request $request, $id)
        {
            // dd($request->all());
            // return "gggggggg";
            // dd(Auth::guard('cliants')->user()->id);
            $cliants = Cliant::find($id);

            $request->validate([
                'current_password'     => ['required', new MatchOldPassword],
                'new_password'         => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            Cliant::find(Auth::guard('cliants')->user()->id)->update(['password' => Hash::make($request->new_password)]);



            return response(['success' => true]);
            // return redirect()->back();
        }

        public function show(Cliant $cliants)
        {
            $id                = Auth::guard('cliants')->user()->id;
            $parent_categories = Parent_Category::with('sub_category')->get();
            $cliants           = Cliant::find($id);
            return view('home.profile', compact('cliants', 'parent_categories'));
        } //end of show

        public function edit(user $user)
        {
            //
        } //end of edit

        public function recharge(Request $request, $id)
        {

            $cliant = Cliant::where('id', $id)->first();

            $balance = GenerateCart::where('cart_code', $request->code)->where('status', null)->where('used', null)->first();

            //    dd($balance);
            if (!$balance == null) {
                $rechare = $balance->amrecan_price;

                $chare = ($rechare + $cliant->account_balance);

                // dd($chare);

                $cliant->update([

                    'account_balance' => $chare,
                ]);

                $balance->update([

                    'used' => 1,
                ]);

                return back()->with('success_message', 'your balance has been successfully charged.');
            } else {

                return back()->withErrors('Invalid  code. Please try again.');
            }

        }

        public function update(Request $request, Cliant $cliants, $id)
        {
            // dd($request->all());
            $request->validate([
                'name'  => 'required',
                'email' => 'required',
                // 'password'    => 'required|confirmed',
                'image' => 'image',
            ]);

            // dd($request->all());
            $cliants = Cliant::find($id);

            $cliants->update([
                'name'            => $request->name,
                'email'           => $request->email,
                'code_cart_phone' => $request->has('code_cart_phone'),
                'code_cart_email' => $request->has('code_cart_email'),
                'monthly_message' => $request->has('monthly_message'),
                'holiday_message' => $request->has('holiday_message'),
                'smart_email'     => $request->has('smart_email'),
            ]);

            $request_data             = $request->except(['password', 'image']);
            $request_data['password'] = bcrypt($request->password);

            $request_data = $request->except(['image']);

            if ($request->image) {

                if ($cliants->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/user_images/' . $cliants->image);

                } //end of inner if

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/user_images/' . $request->image->hashName()));

                $request_data['image'] = $request->image->hashName();

            } //end of external if

            $cliants->update($request_data);

            // dd($cliants);


            // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
            // Alert::message('Location data entered succesfully!');
            
            return redirect()->back()->with('alert', 'Deleted!');
            // return redirect()->back();
        } //end of update

        public function logouts()
        {
            Auth::guard('cliants')->logout();

            return redirect('/');
        } //end of logouts

    } //end of controller
