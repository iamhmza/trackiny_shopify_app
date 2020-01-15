<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;

class ShopifyAuthController extends Controller
{
    // auth to shopify store
    public function register(Request $request)
    {

        $request->validate(['name'=> 'string|required']);

        $nameStore = $request->name;

        $redirectUri = 'http://localhost:8000/shopify/authorise';
        $scopes = 'read_products,read_fulfillments';

        // TODO: change redirect URI
        $auth = 'https://' . $nameStore . '.myshopify.com/admin/oauth/authorize?client_id=' . env('API_KEY') .
            '&scope=' . $scopes .
            '&redirect_uri=' . $redirectUri;
        //return $auth;
        return redirect($auth);
    }
    // authorise to shopify store
    public function authorise(Request $request)
    {

        try {
            return redirect()->route('/access', [$request->input("code"), $request->input("shop")]);
        } catch (Exception $e) {
            //throw $th;
        }
    }
    // get access Token from shopify store
    public function access($code, $shop)
    {
        $url = 'https://' . $shop . '/admin/oauth/access_token';
        $data = array("client_id" => env('API_KEY'), "client_secret" => env('client_secret'), "code" => $code);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        var_dump(json_decode($result));
        // $access_token = json_decode($result)->access_token;

        // var_dump($access_token);
        curl_close($ch);
        // register webhooks
        // return $this->registerWebHooks($shop, $access_token);

        // TODO: save access token

        //redirect to client dashboard
        return $result;
    }
    private function registerWebHooks($shop, $token)
    {
        $url = 'https://' . $shop . '//admin/api/2020-01/webhooks.json';
        $data = array("webhook" => ["topic" => "orders/create", "address" => "https://5d9c58d5.ngrok.io/shopify/callback", "format" => "json"]);
        return json_encode($data);
        $ch = curl_init($url);

        //Create an array of custom headers.
        $customHeaders = array(
            'X-Shopify-Access-Token' => $token,
        );

        //Use the CURLOPT_HTTPHEADER option to use our
        //custom headers.
        curl_setopt($ch, CURLOPT_HTTPHEADER, $customHeaders);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
