<?php

// SPA
Route::get('/dashboard/{path}', function () {
    return view('dashboard');
})->where('path', '(.*)');

Route::get('/dashboard', function () {
    return view('dashboard');
});

// landing page
Route::get('/', function () {
    return view('welcome');
});

// authentication
Route::group(['prefix' => 'install'], function () {
    Route::get('/choose', function () {
        return view('install.choose');
    });
    Route::get('/shopify', function () {
        return view('install.shopify');
    });
    Route::get('/paypal', function () {
        return view('install.paypal');
    });
    Route::get('/woocommerce', function () {
        return view('install.woocommerce');
    });
});

// Authentification With Shopify
Route::group(['prefix' => "shopify"], function () {
    Route::get('/register', 'ShopifyAuthController@redirectToProvider');
    Route::get('/callback', 'ShopifyAuthController@handleProviderCallback');

    // Charge Shopify Store + middlware for check charge shopify store
    Route::get('/charge', 'ShopifyChargeController@applyCharge');
    //Route::get('/charge', 'ShopifyChargeController@applyCharge')->middleware('shopifycharge');
});

// Authentification With Paypal
Route::group(['prefix' => "paypal"], function () {
    Route::get('/login', 'PaypalController@getCredentials');
});

// Authentification With Woocommerce
Route::group(['prefix' => "woocommerce"], function () {
    Route::post('/login', 'WooCommerceAuthController@login');
    Route::post('/webhooks', 'WooCommerceAuthController@getWebHooks');
});

// API for dashboard
Route::get('/me', 'DashboardController@index');
Route::get('/me/account', 'DashboardController@account');

// shopify webhooks
Route::group(['middleware' => 'shopify'], function () {
    Route::post('/webhooks/fulfillment', 'ShopifyWebhooksController@orderFulfilledCallback');
    Route::post('/webhooks/transaction', 'ShopifyWebhooksController@transactionCreatedCallback');
});
