<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/install/paypal', function () {
        return view('install.paypal');
    });

    Route::group(['middleware' => 'shopifycharge'], function () {
        Route::get('/dashboard/{path}', function () {
            return view('dashboard');
        })->where('path', '(.*)');

        Route::get('/dashboard', function () {
            return view('dashboard');
        });

        // API for dashboard
        Route::get('/me', 'DashboardController@index');
        Route::get('/me/store', 'DashboardController@shop');
        Route::get('/me/account', 'DashboardController@account');
        Route::get('/me/orders', 'DashboardController@getOrders');
        Route::get('/me/count', 'DashboardController@getFulfilledOrders');
    });
    Route::get('/charges', 'ShopifyWebhooksController@chargeConfirmationHandler');
});

Route::get('/me/logout', 'DashboardController@logout');

// landing page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

// authentication
Route::group(['prefix' => 'install'], function () {
    Route::get('/choose', function () {
        return view('install.choose');
    })->name('choose');
    Route::get('/shopify', function () {
        return view('install.shopify');
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
// TODO: add middleware 'shopifycharge'
Route::group(['middleware' => 'shopify'], function () {
    Route::post('/webhooks/fulfillment', 'ShopifyWebhooksController@orderFulfilledCallback');
    Route::post('/webhooks/fulfillment/update', 'ShopifyWebhooksController@orderUpdatedCallback');
    Route::post('/webhooks/transaction', 'ShopifyWebhooksController@transactionCreatedCallback');
    Route::post('/webhooks/uninstall', 'ShopifyWebhooksController@appUninstallCallback');
});
