<?php

namespace App\Http\Controllers;

use App\WooCommerceAuth;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
class WooCommerceAuthController extends Controller
{
    // composer require automattic/woocommerce 
    //install package from (https://packagist.org/packages/automattic/woocommerce)
    public function login(Request $request){
        // system validation 
        $res = $request->validate([
                'storeName' => 'required',
                'consumerKey' => 'required',
                'ConsumerSecret' => 'required'
            ]);
        $store = $request->storeName;
        $consumer_key = $request->consumerKey;
        $consumer_secret = $request->ConsumerSecret;
 
        //return $store . '    ' . $consumer_key ; 
        $woocommerce = new Client(
            $store, 
            $consumer_key, 
            $consumer_secret,
            [
                'version' => 'wc/v3',
            ]
        );
        return $woocommerce->get('orders');
        //return $woocommerce;
    }
    public function getWebHooks(Request $request){
        // getContent 
        error_log("login");
        return "String is  not found"; 
    }
}
