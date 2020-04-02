<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Store;
use App\Transaction;
use App\UserProvider;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Auth\RedirectsUsers;

class ShopifyWebhooksController extends Controller
{
    public function orderFulfilledCallback()
    {

        $shop = request()->header('X-Shopify-Shop-Domain');
        $store = Store::where('domain', '=', $shop)->first();

        $order = json_decode(request()->getContent());
        $account = $store->account; // one to one 


        // grab the the order transaction
        $transaction = Transaction::where('order_id', $order->id);

        if ($transaction->exists()) {
            $transaction = $transaction->get()->first();
            $paypalUrlForTracking = 'https://api.paypal.com/v1/shipping/trackers-batch';

            $client = new Client([
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $account->token
                ],
            ]);



            $tracker = array(
                "transaction_id" => $transaction->transaction_number,
                "tracking_number" => $order->fulfillments[0]->tracking_number,
                "status" => "SHIPPED",
                "carrier" => str_replace(" ",  "_", strtoupper($order->fulfillments[0]->tracking_company))
            );

            try {
                $client->request('POST', $paypalUrlForTracking, [
                    'json' => [
                        "trackers" => [0 => $tracker] // trackers [ max 20 trackings ]
                    ]
                ]);
            } catch (ClientException $e) {
                dump($e);
                return;
            }

            $data = array(
                "id" => $order->id,
                "tracking_number" => $order->fulfillments[0]->tracking_number,
                "company" => $order->fulfillments[0]->tracking_company,
                "status" => $order->fulfillment_status,
            );

            $orderSaved = $store->orders()->create($data);


            return response()->json($orderSaved);
        }

        return response()->json(["message" => "no transaction to match order " . $order->id]);
    }
    public function transactionCreatedCallback()
    {


        $transaction = json_decode(request()->getContent());

        if ($transaction->kind == "capture" && $transaction->gateway == "paypal") {
            $data = array(
                "id" => $transaction->id,
                "order_id" => $transaction->order_id,
                "transaction_number" => $transaction->receipt->transaction_id,
            );

            $transactionSaved = Transaction::create($data);

            return response()->json($transactionSaved);
        }

        return response()->json(["message" => "not a paypal transaction"]);
    }

    public function orderUpdatedCallback()
    {
        // if order already exist
        $updatedOrder = json_decode(request()->getContent());
        $order = Order::where('id', $updatedOrder->id);

        if ($order->exists()) {

            $shop = request()->header('X-Shopify-Shop-Domain');
            $store = Store::where('domain', $shop)->first();
            $account = $store->account;

            $order = $order->get()->first();
            $transaction = $order->transaction;

            $paypalUrlForTracking = 'https://api.paypal.com/v1/shipping/trackers/'
                . $transaction->transaction_number
                . '-' . $updatedOrder->tracking_number;

            $client = new Client([
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $account->token
                ],
            ]);

            $tracker = array(
                "transaction_id" => $transaction->transaction_number,
                "tracking_number" => $updatedOrder->fulfillments[0]->tracking_number,
                "status" => "SHIPPED",
                "carrier" => str_replace(" ",  "_", strtoupper($updatedOrder->fulfillments[0]->tracking_company))
            );

            try {
                $client->put($paypalUrlForTracking, ['json' => $tracker]);
                Transaction::update($tracker);
            } catch (ClientException $e) {
                dump($e);
            }
        }
    }

    public function chargeConfirmationHandler(Request $request)
    {
        $chargePlan =  $request->getContent();


        $user = Auth::user();
        $shop = $user->name;
        $id = $user->id;

        $token = UserProvider::find($id)->provider_token;

        $client = new Client([
            'headers' => ['Content-Type' => 'application/json', 'X-Shopify-Access-Token' => $token],
        ]);
        $url = 'https://' . $shop . '/admin/api/2020-01/recurring_application_charges/' . $request->get('charge_id') . '/activate.json';

        // TODO: change test charge

        try {
            $res = $client->post($url, [
                "json" => [
                    "recurring_application_charge" => [
                        "name" => "Standard Plan",
                        "price" => 10.0,
                        "status" => "accepted",
                        "return_url" => env("APP_URL") . "charges",
                        "trial_days" => 1,

                        "test" => true
                    ]
                ]
            ]);


            $data =  json_decode($res->getBody()->getContents())->recurring_application_charge;
            $user->storeCharge()->update([
                'name' => $data->name,
                'status' => $data->status,
                'confirmation_url' => null,
                'trial_ends_at' => $data->trial_ends_on,
                'ends_at' => $data->billing_on,
            ]);

            return redirect('dashboard/stats');
        } catch (ClientException $e) {

            if ($e->getCode() == 422) {
                return redirect('install/choose');
            }
        }



        return response()->json(json_decode($chargePlan));
    }

    public function appUninstallCallback()
    {
        # code...
        $uninstallInfo = json_decode(request()->getContent());
        dump($uninstallInfo);
        // TODO: delete user's data

        return $uninstallInfo;
    }
}
