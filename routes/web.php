<?php


use Illuminate\Support\Facades\Route;


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ //...


	 Route::group(['namespace' => 'Home'], function(){


        Route::get('/', 'WelcomeController@index')->name('/');
        Route::get('referral/{assign}', 'AssignmenController@index')->name('Assignmen');
        Route::get('AssignmenController','AssignmenController@get')->name('AssignmenController');

        // user profile
        Route::resource('profiles', 'ProfileController');
        Route::post('change.password/{id}', 'ProfileController@changePassword')->name('changePassword');
        Route::post('LoginCline', 'ProfileController@login')->name('LoginCline');
        Route::post('register.mobile', 'ProfileController@RegisterMobile')->name('register.mobile');
        Route::post('recharge{id}','ProfileController@recharge')->name('recharge');
        Route::post('logouts','ProfileController@logouts')->name('logouts');

        // user auth messges
        Route::post('/registers', 'AuthController@create')->name('registers');

        // route slogin google and favebook
        Route::get('login/{provider}', 'AuthController@redirect')->where('provider','facebook|google|twitter');
        Route::get('login/{provider}/callback','AuthController@Callback')->where('provider','facebook|google|twitter');

		// route show prouduc
        Route::get('product/{category}', 'WelcomeController@show_market')->name('product');
        Route::get('product_not_stor/{category}/{market}', 'WelcomeController@show_cart')->name('product_not_stor');
        Route::get('show_carts/{category}/{market}', 'WelcomeController@show_carts')->name('show_carts');
        Route::get('product_show_details/{category}/{cart}', 'WelcomeController@show_details')->name('product_show_details');
        Route::get('exchabges-rates', 'WelcomeController@change_currency')->name('exchabges-rates');
        Route::get('How-Useage/{sub_category_id}', 'WelcomeController@how_useage')->name('How-Useage');

        // route Footer
        Route::get('Contact-Us', 'FooterController@showcontact')->name('contact');
        Route::post('Contact-Us', 'FooterController@storecontact')->name('storecontact');
        Route::get('About-Us', 'FooterController@showabout')->name('showabout');
        Route::get('Usage-Policy', 'FooterController@ShowUsagePolicy')->name('ShowUsagePolicy');
        Route::get('SearchCarts', 'FooterController@SearchCarts')->name('SearchCarts');
        Route::get('Privacy-Policy', 'FooterController@showPrivacyPolicy')->name('showPrivacyPolicy');
        Route::get('Recovery-Policy', 'FooterController@showRecovery')->name('showRecovery');
        Route::get('Recovery-common_questions', 'FooterController@common_questions')->name('common_questions');

        //rout wallet
        Route::get('/wallet', 'WalletController@index')->name('wallet.index');
        Route::post('/wallet/{carts}', 'WalletController@store')->name('wallet.store');
        Route::patch('/wallet/{cart}', 'WalletController@update')->name('wallet.update');
        Route::delete('/walletdel/{id}', 'WalletController@destroy')->name('wallet.destroy');
        Route::post('/incDes{id}','WalletController@IncDes')->name('incdes');
        Route::get('rate','RateController@index');


        //route coupon
        Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
        Route::delete('/coupon/delete', 'CouponsController@destroy')->name('coupon.destroy');

     
        Route::get('/incDes{id}','WalletController@IncDes')->name('incdes');
        
        // Routs purchase
        Route::resource('Purchase', 'PurchaseController');
        Route::get('Fast-Purchase','PurchaseController@index')->name('purchase.index');
        Route::get('Fast-Purchase-categorys/{id}','PurchaseController@parent_category')->name('purchase.categorys');
        Route::get('Fast-Purchase-sub_categoryed/{id}','PurchaseController@sub_categoryed')->name('purchase.sub_categoryed');
        Route::get('Fast-Purchase-makted/{id}','PurchaseController@makted')->name('purchase.makted');
       
        Route::resource('ticit','SupportCartController');
        Route::get('/ticit-admin', 'SupportCartController@get')->name('ticit-admin');
        Route::post('test', 'SupportCartController@test')->name('test');

        Route::get('/verify', 'AuthController@verify')->name('verify'); 
        Route::post('/isverify', 'AuthController@isverify')->name('isverify'); 
        Route::get('/Email/{id}/{code}', 'AuthController@emailverify')->name('emailverify'); 
        Route::get('/returnverify', 'AuthController@returnverify')->name('returnverify'); 


        //payment system
        Route::get('/payment', 'OrderController@index')->name('payment');
        Route::post('order.pay.store', 'OrderController@paystore')->name('order.pay.store');
        Route::post('/storeToPayment{carts}','WalletController@storeToPayment')->name('storeToPayment');
        Route::get('/payment-store', 'OrderController@store')->name('payment-store');
        Route::get('/payment-show', 'OrderController@show')->name('payment-show');
        Route::get('/payment-search', 'OrderController@search')->name('payment-search');
        Route::get('/complete', 'OrderController@complete')->name('complete');
        Route::get('/my_purchase', 'OrderController@my_purchase')->name('my_purchase');
        Route::get('/purchase_details/{number}', 'OrderController@purchase_details')->name('purchase_details');
        Route::get('/purchase_invoices/{number}', 'OrderController@purchase_invoices')->name('purchase_invoices');
        Route::get('/purchase_admin', 'OrderController@purchase_admin')->name('purchase_admin');
        Route::get('/purchases_search', 'OrderController@purchases_search')->name('purchases_search');
        Route::delete('/purchase_delete/{order}', 'OrderController@purchase_delete')->name('purchase_delete');
        Route::delete('/payment-delete/{cartStore}', 'OrderController@destroy')->name('payment-delete');

        //email system
        Route::resource('SmartEmail','SmartEmailController');
        Route::resource('HolidayMessage','HolidayMessageController');
        Route::resource('MonthlyMessage','MonthlyMessageController');

        //stars system
        Route::get('stars' ,'StarsController@index')->name('stars');
        Route::get('order_by_satrs/{cart}','StarsController@order_by_satrs')->name('order_by_satrs');
        Route::get('notify' , 'StarsController@notify')->name('notify');

        //notify

         
	});//route group Home
	 
	 // this is auth
	Auth::routes(['register'=> false]);

});//end of end






