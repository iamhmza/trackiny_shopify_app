<?php

namespace App\Http\Controllers;

use App\Store;
use App\Transaction;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;

class ShopifyWebhooksController extends Controller
{
    public function orderFulfilledCallback(Request $request)
    {
        $shop = request()->header('X-Shopify-Shop-Domain');
        $store = Store::where('domain', '=', $shop)->first();
        $order = json_decode(request()->getContent());

        $account = $store->account();

        // grab the the order transaction
        $transaction = Transaction::where('order_id', '=', $order->id);

        if ($transaction->exists()) {
            $paypalUrlForTracking = 'https://api.sandbox.paypal.com/v1/shipping/trackers/' . $transaction->id . '-' . $transaction->tracking_number;

            $transaction = $transaction->get();
            dump($transaction);

            $client = new Client([
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $account->token
                ],
            ]);

            try {
                $res = $client->request('POST', $paypalUrlForTracking, [
                    'json' => [
                        "transaction_id" => $transaction->id,
                        "tracking_number" => $transaction->tracking_number,
                        "status" => $order->fulfillment_status,
                        "carrier" => $order->tracking_company
                    ]
                ]);
            } catch (ClientException $e) {
                dump($e);
                return;
            }
        }

        $data = array(
            "order_id" => $order->id,
            "tracking_number" => $order->fulfillments[0]->tracking_number,
            "company" => $order->fulfillments[0]->tracking_company,
            "status" => $order->fulfillment_status,
        );

        $store->orders()->create($data);


        return;
    }
    public function transactionCreatedCallback(Request $request)
    {
        $shop = request()->header('X-Shopify-Shop-Domain');
        $store = Store::where('domain', '=', $shop)->first();
        dump($store);

        $transaction = json_decode(request()->getContent());
        dump($transaction);

        if ($transaction->kind = "capture" && $transaction->gateway == "payapl") {
            $data = array(
                "id" => $transaction->id,
                "orderId" => $transaction->order_id,
                "receipt" => $transaction->receipt,
            );
            dump($data);
        }

        return;
    }
}
