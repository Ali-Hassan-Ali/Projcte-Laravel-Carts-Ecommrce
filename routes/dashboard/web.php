<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

            //user routes
            Route::resource('users', 'UserController')->except(['show']);

            //cupons routs
            Route::resource('cupons', 'CuponController')->except(['show']);

            //parent_category routs
            Route::resource('parent_category', 'ParentCategoryController')->except(['show']);
		
		//sub_category routs
		Route::resource('sub_categories', 'SubCategoryController')->except(['show']);

            //markets routs
            Route::resource('markets', 'MarketController')->except(['show']);

            //carts routs
            Route::resource('carts', 'CartController')->except(['show']);

            //carts routs
            Route::resource('carts_detail', 'CartDetailControlller')->except(['show']);

            //carts routs
            Route::resource('carts_store', 'CartStoreController')->except(['show']);

            //generate carts  routs
            Route::resource('generate_carts', 'GenerateCartController')->except(['show']);

            //generate carts  routs
            Route::resource('pay_currencie', 'PayCurrencieController')->except(['show','create','store','distroy']); 
            Route::get('/pending_requests', 'PayCurrencieController@pending_requests')->name('pending_requests');
            Route::post('/not_exept/{number}', 'PayCurrencieController@not_exept')->name('not_exept');
            Route::post('/pay_currencie_details/{number}', 'PayCurrencieController@pay_currencie_details')->name('pay_currencie_details');


            //connect us  routs
            Route::resource('connect_us', 'ContactUsController')->except(['show']);

            //usage policy  routs
            Route::resource('usage_policy', 'UsagePolicyController')->except(['show']);

            //privacy policy  routs
            Route::resource('privacy_policy', 'PrivacyPolicyController')->except(['show']); 

            //return policy  routs
            Route::resource('return_policy', 'ReturnPolicyController')->except(['show']);

            //about us  routs
            Route::resource('about_us', 'AboutUsController')->except(['show']); 

            //CommonQuestions  routs
            Route::resource('common_questions', 'CommonQuestionsController')->except(['show']); 
            //export excel file
            Route::get('export_carts', 'GenerateCartController@export');

            //ended carts
            Route::get('ended_carts_page', 'GenerateCartController@ended_carts')->name('ended_carts_page');

            Route::resource('how_to_use', 'HowUseController')->except(['show']);

            Route::get('/ticit-list', 'SupportCartController@update')->name('ticit-list');

            Route::get('social_links.index', 'SettingsController@index')->name('social_links.index');
            Route::get('social_login.index', 'SettingsController@social_login')->name('social_login.index');
            Route::post('social_links.store', 'SettingsController@store')->name('social_links.store');


        });//end of dashboard routes

        // Auth::routes();

});

