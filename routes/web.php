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

Route::get('/', function () {
    return view('shopify_install');
});
/**CODE**/
// Authentification With Shopify
Route::group(['prefix' => "shopify"], function () {
    Route::post('/login', 'ShopifyAuthController@register');
    Route::get('/authorise','ShopifyAuthController@authorise');
    Route::get('/access/{code}/{shop}','ShopifyAuthController@access')->name('/access');

    Route::post('/webhooks/fullfilment', 'ShopifyWebhooksController@fullfill')->middleware('shopify');
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



