<?php

namespace App\Http\Controllers;

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
        $user = Auth::user();
        $shop = $user->name;
        $id = $user->id;
        $token = UserProvider::find($id)->provider_token;

        $client = new Client([
            'headers' => ['Content-Type' => 'application/json', 'X-Shopify-Access-Token' => $token],
        ]);
        $url = 'https://' . $shop . '/admin/api/2020-01/webhooks.json';

        // TODO: change topic to fullfillment create and update

        try {

            $response = $client->post($url,
                ['body' => json_encode(
                    [
                        "webhook" => [
                            "topic" => "fullfillments/create",
                            "address" => env(APP_URL) . '/webhooks/fullfillment',
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
                            "address" => env(APP_URL) . '/webhooks/fullfillment',
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
}
