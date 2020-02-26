<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index()
    {
        // get current user's store
        $data = Auth::user()->withStore();
        return response()->json($data);
    }

    public function getOrders()
    {
        $orders = Auth::user()->store->orders;
        return response()->json($orders);
    }

    public function getFulfilledOrders()
    {
        $user = Auth::user();
        $token  = $user->provider->provider_token;
        $client = new Client(['headers' => ['Content-Type ' => 'application/json', 'X-Shopify-Access-Token' => $token]]);
        $url = $user->name . '/admin/api/2020-01/orders/count.json?fulfillment_status=shipped';

        try {

            $res  = $client->request('get', $url);
            $data = json_decode($res->getBody()->getContents());
        } catch (ClientException $e) {
            dump($e->getResponse()->getBody()->getContents());

            return 'server Error';
        }




        return response()->json($data);
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/install/choose');
    }
}
