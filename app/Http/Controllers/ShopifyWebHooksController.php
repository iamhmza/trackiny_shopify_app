<?php

namespace App\Http\Controllers;

use App\Account;
use App\Order;
use App\Store;
use App\StoreCharge;
use App\Transaction;
use App\User;
use App\UserProvider;
use App\Webhook;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                    'Authorization' => 'Bearer ' . $account->token,
                ],
            ]);

            // companies array
            $companies = array(

                "4PX" => "FOUR_PX_EXPRESS",
                "APC" => "APC_OVERNIGHT",
                "Amazon Logistics UK" => "",
                "Amazon Logistics US" => "",
                "Anjun Logistics" => "",
                "Australia Post" => "AUSTRALIA_POST",
                "Bluedart" => "BLUEDART",
                "Canada Post" => "CANADA_POST",
                "Canpar" => "CANPAR",
                "China Post" => "CHINA_POST",
                "Chukou1" => "",
                "Correios" => "",
                "DHL Express" => "DHL",
                "DHL eCommerce" => "DHL_GLOBAL_ECOMMERCE",
                "DHL eCommerce Asia" => "DHL_GLOBAL_MAIL_ASIA",
                "DPD" => "DPD",
                "DPD Local" => "DPD_LOCAL",
                "DPD UK" => "DPD_UK",
                "Delhivery" => "",
                "Eagle" => "",
                "FSC" => "",
                "FedEx" => "FEDEX",
                "GLS" => "GLS",
                "GLS (US)" => "GLS",
                "Globegistics" => "GLOBEGISTICS",
                "Japan Post (EN)" => "JAPAN_POST",
                "Japan Post (JA)" => "JAPAN_POST",
                "La Poste" => "LAPOSTE",
                "New Zealand Post" => "NZ_POST",
                "Newgistics" => "",
                "PostNL" => "POSTNL",
                "PostNord" => "",
                "Purolator" => "PUROLATOR",
                "Royal Mail" => "ROYAL_MAIL",
                "SF Express" => "SF_EXPRESS",
                "SFC Fulfillment" => "SFC_EXPRESS",
                "Sagawa (EN)" => "SAGAWA",
                "Sagawa (JA)" => "SAGAWA_JP",
                "Sendle" => "SENDLE",
                "Singapore" => "Post ",
                "TNT" => "TNT",
                "UPS" => "UPS",
                "USPS" => "USPS",
                "Whistl" => "",
                "Yamato (EN)" => "YAMATO",
                "Yamato (JA)" => "YAMATO",
                "YunExpress" => "",

            );

            // transaction id and tracking number are required
            $tracker = array(
                "transaction_id" => $transaction->transaction_number,
                "tracking_number" => $order->fulfillments[0]->tracking_number,
                "status" => "SHIPPED",
            );

            if (!empty($companies[$order->fulfillments[0]->tracking_company]) || ($companies[$order->fulfillments[0]->tracking_company] !== "")) {

                $tracker['carrier'] = $companies[$order->fulfillments[0]->tracking_company];

            }

            try {
                $client->request('POST', $paypalUrlForTracking, [
                    'json' => [
                        "trackers" => [0 => $tracker], // trackers [ max 20 trackings ]
                    ],
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
                    'Authorization' => 'Bearer ' . $account->token,
                ],
            ]);

            $tracker = array(
                "transaction_id" => $transaction->transaction_number,
                "tracking_number" => $updatedOrder->fulfillments[0]->tracking_number,
                "status" => "SHIPPED",
                "carrier" => str_replace(" ", "_", strtoupper($updatedOrder->fulfillments[0]->tracking_company)),
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
        $chargePlan = $request->getContent();

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
                        "test" => true,
                    ],
                ],
            ]);

            $data = json_decode($res->getBody()->getContents())->recurring_application_charge;
            $user->storeCharge()->update([
                'name' => $data->name,
                'status' => $data->status,
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
        # unistall app data
        $uninstallInfo = json_decode(request()->getContent());

        // get the user who deleted the app
        $user = User::where('name', $uninstallInfo->name)
            ->orWhere('name', $uninstallInfo->domain)
            ->get()
            ->first();
        $id = $user->id;
        $storeId = $user->store->id;

        // delete webhooks from shopify
        $webhooks = Webhook::where("store_id", $storeId)->get()->first()->hooks;
        $hooks = json_decode($webhooks);

        $token = UserProvider::find($id)->provider_token;
        $shop = $user->store->domain;

        $client = new Client([
            'headers' => ['Content-Type' => 'application/json', 'X-Shopify-Access-Token' => $token],
        ]);

        foreach ($hooks as $id => $address) {
            try {
                $client->delete('https://' . $shop . '/admin/api/2020-01/webhooks/' . $id . '.json');
            } catch (\Throwable $th) {
                dump('deleting webhooks failed');
            }

        }

        // delete user with stores and charges and accounts and orders and transactions
        Account::where("store_id", $storeId)->delete();
        Order::where("store_id", $storeId)->delete();
        Webhook::where("store_id", $storeId)->delete();
        $user->store()->delete();

        StoreCharge::where("user_id", $id)->delete();
        UserProvider::where("user_id", $id)->delete();

        $user->delete();

        return "done";
    }
}
