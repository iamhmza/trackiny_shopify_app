<?php

namespace App\Listeners;

use App\UserProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RegisterFullfillmentsWebhooks
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $user = $event->user;
        $shop = $user->name;
        $id = $user->id;

        $token = UserProvider::find($id)->provider_token;

        $client = new Client([
            'headers' => ['Content-Type' => 'application/json', 'X-Shopify-Access-Token' => $token],
        ]);
        $url = 'https://' . $shop . '/admin/api/2020-01/webhooks.json';

        $addressUrlForOrderFulfilled = env('APP_URL') . 'webhooks/fulfillment';
        $addressUrlForOrderUpdate = env('APP_URL') . 'webhooks/fulfillment/update';
        $addressUrlForTransaction = env('APP_URL') . 'webhooks/transaction';
        $addressUrlForAppUninstall = env('APP_URL') . 'webhooks/uninstall';


        // TODO: webhooks array with types and urls


        try {

            $response = $client->post(
                $url,
                ['body' => json_encode(
                    [
                        "webhook" => [
                            "topic" => "orders/fulfilled",
                            "address" => $addressUrlForOrderFulfilled,
                            "format" => "json",
                        ],
                    ]
                )]
            );

            dump($response);

            $response = $client->post(
                $url,
                ['body' => json_encode(
                    [
                        "webhook" => [
                            "topic" => "order_transactions/create",
                            "address" => $addressUrlForTransaction,
                            "format" => "json",
                        ],
                    ]
                )]
            );

            $response = $client->post(
                $url,
                ['body' => json_encode(
                    [
                        "webhook" => [
                            "topic" => "orders/updated",
                            "address" => $addressUrlForOrderUpdate,
                            "format" => "json",
                        ],
                    ]
                )]
            );
            $response = $client->post(
                $url,
                ['body' => json_encode(
                    [
                        "webhook" => [
                            "topic" => "app/uninstalled",
                            "address" => $addressUrlForAppUninstall,
                            "format" => "json",
                        ],
                    ]
                )]
            );
            dump($response);
        } catch (ClientException $e) {

            // dump($e->getResponse()->getBody()->getContents());
            return 'Problem with shopify servers';
        }
        // $data = json_decode($response->getBody()->getContents());

    }
}
