<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerify;
use App\Models\Cliant;
use App\Models\WalletDatabase;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Socialite;

class AuthController extends Controller
{

    public function verifyindex()
    {
        return view('auth.verify');
    }//end of verifyindex

    public function create(Request $request)
    {

        // dd($request->all());

        $data = $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:cliants'],
            'phone_number' => ['required'],
            'password'     => ['required', 'string', 'min:8'],
            // 'g-recaptcha-response' => 'required|captcha'
        ]);

        try {
            // dd($request->all());

            $digits = 4;
            $code   = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

            $cliant = Cliant::create([
                'email'        => $data['email'],
                'name'         => $data['name'],
                'phone_number' => $data['phone_number'],
                'code_phone'   => $code,
                'password'     => Hash::make($data['password']),
            ]);
            //     $curl = curl_init();

            //     curl_setopt_array($curl, array(
            //      CURLOPT_URL => "https://api.sms.to/sms/send",
            //       CURLOPT_RETURNTRANSFER => true,
            //       CURLOPT_ENCODING => "",
            //       CURLOPT_MAXREDIRS => 10,
            //       CURLOPT_TIMEOUT => 0,
            //       CURLOPT_FOLLOWLOCATION => true,
            //       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //       CURLOPT_CUSTOMREQUEST => "POST",
            //       CURLOPT_POSTFIELDS =>"{\n    \"messages\": [\n        {\n            \"message\": \"your verify code is:  $code  \",\n            \"to\": \"$request->phone_number,\"\n        },\n        {\n            \"message\": \"This is test\",\n            \"to\": \"+35799999999998\"\n        }\n    ],\n    \"sender_id\": \"SMSto\",\n    \"callback_url\": \"https://example.com/callback/handler\",\n    \"scheduled_for\": \"2019-12-12 12:00:00\",\n    \"timezone\": \"Asia/Kathmandu\"\n}",
            //       CURLOPT_HTTPHEADER => array(
            //      "Content-Type: application/json",
            //      "Accept: application/json",
            //      "Authorization: Bearer ZafPuhZtiTAut4n7Yih8OmzbuAPy9tKd"
            //   ),

            //         //   ));
            // return response(['success' => true]);
            // return  redirect()->route('/');

            // return  redirect()->route('/');

            //     $response = curl_exec($curl);

            //     curl_close($curl);
            //     echo $response;

            // } catch (\Exception $e) {
            //     redirect()->route('/')->withErrors(['error' => $e->getMessage()]);
            // } //end try

            $emailverify = bin2hex(openssl_random_pseudo_bytes(10));

            $cliant->update([
                'code_email' => $emailverify,
            ]);

            $mail = Mail::send(new EmailVerify($cliant));

            $remember_me = $request->has('remember_me') ? true : false;

            if (auth()->guard('cliants')->attempt(
                [
                    'email'    => $request->input("email"),
                    'password' => $request->input('password'),
                ], $remember_me));

            $sessions = Cart::content();

            if ($sessions) {

                foreach ($sessions as $session) {

                    $walletdb                  = new WalletDatabase();
                    $walletdb->cart_id         = $session->id;
                    $walletdb->cart_name       = $session->cart_name;
                    $walletdb->short_descript  = $session->short_descript;
                    $walletdb->cart_text       = $session->cart_text;
                    $walletdb->users_id        = Auth::guard('cliants')->user()->id;
                    $walletdb->market_id       = $session->market_id;
                    $walletdb->image           = $session->image;
                    $walletdb->sub_category_id = $session->sub_category_id;
                    $walletdb->amrecan_price   = $session->amrecan_price;

                    $walletdb->save();

                } //end of foreach
            } //end of if

            return response(['success' => true]);

        } catch (\Exception $e) {
            redirect()->route('/')->withErrors(['error' => $e->getMessage()]);
        } //end try

    } //end of function register

    public function verify(Request $request)
    {

        return view('home.verify_phone');

    } //end of function verify

    public function isverify(Request $request)
    {

        // dd($request->all());
        $cliant = Cliant::where('code_phone', $request->code)->first();

        if (!$cliant == null) {

            $cliant->update([

                'isVerified' => 1,
            ]);

            return redirect()->route('/');

        } else {

            return back()->with('message', 'Invalid  code. Please try again.');

        }//end of if

    }//end of isverify

    public function emailverify($id, $code)
    {

        $cliant = Cliant::where('id', $id)->first();

        if ($cliant->code_email == $code) {

            $cliant->update([
                'emailVerified' => 1,
            ]);

            return redirect()->route('/');

        } else {

            sesstion()->flush();

            return redirect()->route('/');
        }

    }

    public function redirect($provider)
    {
        config([
            'services.' . $provider . '.client_id'     => setting($provider . '_client_id'),
            'services.' . $provider . '.client_secret' => setting($provider . '_client_secret'),
            'services.' . $provider . '.redirect_url'  => setting($provider . '_redirect_url'),

        ]);

        return Socialite::driver($provider)->redirect();
    } //end ofredirect

    public function Callback($provider)
    {

        try {

            $social_client = Socialite::driver($provider)->user();
            // $Social_user = Socialite::driver($provider)Auth::guard('cliants')->user();

        } catch (Exception $e) {

            return redirect('/');

        } //end oftry catch

        $cliants = Cliant::where('provider', $provider)
            ->where('provider_id', $social_client->getId())
            ->first();

        if (!$cliants) {

            $digits = 4;
            $code   = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

            Cliant::create([
                'name'         => $social_client->getName(),
                'email'        => $social_client->getEmail(),
                'image'        => $social_client->getAvatar(),
                'phone_number' => $social_client->getPhone(),
                'provider'     => $provider,
                'code_phone'   => $code,
                'provider_id'  => $provider_id->getID(),
            ]);

        } //end of if

        Auth::guard('cliants')->login($cliant, true);

        $emailverify = bin2hex(openssl_random_pseudo_bytes(10));

        $cliant->update([
            'code_email' => $emailverify,
        ]);

        $mail = Mail::send(new EmailVerify($cliant));

        $sessions = Cart::content();

        if ($sessions) {

            foreach ($sessions as $session) {

                $walletdb                  = new WalletDatabase();
                $walletdb->cart_id         = $session->id;
                $walletdb->cart_name       = $session->cart_name;
                $walletdb->short_descript  = $session->short_descript;
                $walletdb->cart_text       = $session->cart_text;
                $walletdb->users_id        = Auth::guard('cliants')->user()->id;
                $walletdb->market_id       = $session->market_id;
                $walletdb->image           = $session->image;
                $walletdb->sub_category_id = $session->sub_category_id;
                $walletdb->amrecan_price   = $session->amrecan_price;

                $walletdb->save();

            }
        }

        return redirect()->intended('/');

    } //end of Callback

    public function returnverify()
    {

        $id     = \Auth::guard('cliants')->user()->id;
        $cliant = Cliant::where('id', $id)->first();

        $code = mt_srand(4);

        $cliants->update([
            'code_phone' => $code,
        ]);

        //     $curl = curl_init();

        //     curl_setopt_array($curl, array(
        //      CURLOPT_URL => "https://api.sms.to/sms/send",
        //       CURLOPT_RETURNTRANSFER => true,
        //       CURLOPT_ENCODING => "",
        //       CURLOPT_MAXREDIRS => 10,
        //       CURLOPT_TIMEOUT => 0,
        //       CURLOPT_FOLLOWLOCATION => true,
        //        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //       CURLOPT_CUSTOMREQUEST => "POST",
        //       CURLOPT_POSTFIELDS =>"{\n    \"messages\": [\n        {\n            \"message\": \"your verify code is:  $code  \",\n            \"to\": \"$cliant->phone_number,\"\n        },\n        {\n            \"message\": \"This is test\",\n            \"to\": \"+35799999999998\"\n        }\n    ],\n    \"sender_id\": \"SMSto\",\n    \"callback_url\": \"https://example.com/callback/handler\",\n    \"scheduled_for\": \"2019-12-12 12:00:00\",\n    \"timezone\": \"Asia/Kathmandu\"\n}",
        //       CURLOPT_HTTPHEADER => array(
        //      "Content-Type: application/json",
        //      "Accept: application/json",
        //      "Authorization: Bearer ZafPuhZtiTAut4n7Yih8OmzbuAPy9tKd"
        //   ),
        //   ));

        //     $response = curl_exec($curl);

        //     curl_close($curl);
        //     echo $response;

        return back();
    }//end of function Callback

}//end of controller
