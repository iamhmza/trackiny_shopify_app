<?php

namespace App\Http\Controllers;

use App\Store;
use App\Transaction;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;

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
        // 
    }


    public function chargeConfirmationHandler(Request $request)
    {
        $chargePlan =  $request->getContent();

        dump($chargePlan);

        // TODO: update store_charge record
        // TODO: redirect back to dashboard

        return response()->json('charge confirm happend');
    }
}
