<?php

use Illuminate\Http\Request;
use App\Subscription;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
	//Get subscriptions list
    Route::get('subscriptions', 'SubscriptionController@index');
     
    //Get subscription by id
    Route::get('subscriptions/{subscription}', 'SubscriptionController@show');

    //Create new subscription
    Route::post('subscriptions', 'SubscriptionController@create');

    //Confirm subscription
    Route::put('subscriptions/confirm', 'SubscriptionController@confirm');

    //Delete subscription
    Route::delete('subscriptions/{subscription}', 'SubscriptionController@delete');