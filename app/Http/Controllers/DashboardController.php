<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;
use App\UserProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // get current user
        $store = Auth::user()->store;

        return response()->json($store);

        $shop = $user->name;
        $id = $user->id;
        $token = UserProvider::find($id)->provider_token;

        $client = new Client([
            'headers' => ['Content-Type' => 'application/json', 'X-Shopify-Access-Token' => $token],
        ]);
        $url = 'https://' . $shop . '/admin/api/2020-01/webhooks.json';

        // TODO: change topic to fullfillment create and update

        $addressUrl = env('APP_URL') . $shop . '/webhooks/fullfillment';

        try {

            $response = $client->post($url,
                ['body' => json_encode(
                    [
                        "webhook" => [
                            "topic" => "fullfillments/create",
                            "address" => $addressUrl,
                            "format" => "json",

                        ],

                    ]
                )]
            );

            $response = $client->post($url,
                ['body' => json_encode(
                    [
                        "webhook" => [
                            "topic" => "fullfillments/update",
                            "address" => $addressUrl,
                            "format" => "json",

                        ],

                    ]
                )]
            );

        } catch (ClientException $e) {

            // dd($e->getResponse()->getBody()->getContents());
            return 'Problem with shopify servers';

        }
        // $data = json_decode($response->getBody()->getContents());
        // dd($data);

        return 'done';

    }

    public function account()
    {
        $account = Auth::user()->store->account->only('api_key', 'api_secret');
        return response()->json($account);

    }
}
