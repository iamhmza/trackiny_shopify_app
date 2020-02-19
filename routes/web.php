<?php


Route::group(['middleware' => 'auth'], function () {
    // SPA
    Route::get('/dashboard/{path}', function () {
        return view('dashboard');
    })->where('path', '(.*)')->middleware('');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // API for dashboard
    Route::get('/me', 'DashboardController@index');
    Route::get('/me/orders', 'DashboardController@getOrders');
    Route::get('/me/account', 'DashboardController@account');
});


// landing page
Route::get('/', function () {
    return view('welcome');
});

// authentication
Route::group(['prefix' => 'install'], function () {
    Route::get('/choose', function () {
        return view('install.choose');
    })->name('choose');
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


// shopify webhooks
Route::group(['middleware' => 'shopify'], function () {
    Route::post('/webhooks/fulfillment', 'ShopifyWebhooksController@orderFulfilledCallback');
    Route::post('/webhooks/transaction', 'ShopifyWebhooksController@transactionCreatedCallback');
});

Route::get('/charges', 'ShopifyWebhooksController@chargeConfirmationHandler');
