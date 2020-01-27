<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;

class ShopifyAuthController extends Controller
{
    // auth to shopify store
    public function register(Request $request)
    {

        $request->validate(['name' => 'string|required']);

        $nameStore = $request->name;

        $redirectUri = env('SHOPIFY_REDIRECT');
        $scopes = 'read_products,read_fulfillments';

        // TODO: change redirect URI
        $auth = 'https://' . $nameStore . '.myshopify.com/admin/oauth/authorize?client_id=' . env('SHOPIFY_KEY') .
            '&scope=' . $scopes .
            '&redirect_uri=' . $redirectUri;

        return redirect($auth);
    }

    public function authorise($code, $shop)
    {
        // var_dump($code);

        // $url = 'https://' . $shop . '/admin/oauth/access_token';
        // $data = [
        //     "client_id" => env('SHOPIFY_KEY'),
        //     "client_secret" => env('SHOPIFY_SECRET'),
        //     "code" => $code,
        // ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://xzero.myshopify.com/admin/oauth/access_token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\r\n\t\"code\": \".$code.\",\r\n\t\"client_id\": \"dc49fbcdbcd2b948ce759d50a9bd0c8b\",\r\n\t\"client_secret\": \"eb28d2b2ddfb5f7843f68b1889787459\"\r\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        var_dump(json_decode($response));
        echo $response;
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // $result = curl_exec($ch);

        // var_dump($result);
        // $access_token = json_decode($result)->access_token;

        // curl_close($ch);
        // register webhooks

        // TODO: save access token

        //redirect to client dashboard
        return 'done';

    }

    // authorise to shopify store
    public function handleCallback(Request $request)
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
