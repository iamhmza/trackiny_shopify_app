<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// SPA
Route::get('/dashboard/{path}', function () {
    return view('dashboard');
})->where('path', '(.*)');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'install'], function () {
    Route::get('/choose', function () {return view('install.choose');});
    Route::get('/shopify', function () {return view('install.shopify');});
    Route::get('/paypal', function () {return view('install.paypal');});
    Route::get('/woocommerce', function () {return view('install.woocommerce');});
});

/**CODE**/
// Authentification With Shopify
Route::group(['prefix' => "shopify"], function () {
    Route::get('/register', 'ShopifyAuthController@redirectToProvider');
    Route::get('/callback', 'ShopifyAuthController@handleProviderCallback');

    Route::post('/webhooks/fullfillment', 'ShopifyWebhooksController@fullfill')->middleware('shopify');
    Route::post('/webhooks/transactions', 'ShopifyWebhooksController@transaction')->middleware('shopify');
    // Charge Shopify Store + middlware for check charge shopify store
    Route::get('/charge', 'ShopifyChargeController@applyCharge');
    //Route::get('/charge', 'ShopifyChargeController@applyCharge')->middleware('shopifycharge');

});
// Authentification With Paypal
Route::group(['prefix' => "paypal"], function () {
    Route::get('/login', 'PaypalController@access');
});

// Authentification With Woocommerce
Route::group(['prefix' => "woocommerce"], function () {
    Route::post('/login', 'WooCommerceAuthController@login');
    Route::post('/webhooks', 'WooCommerceAuthController@getWebHooks');
});

// get current user data
Route::get('/me', 'DashboardController@index');
