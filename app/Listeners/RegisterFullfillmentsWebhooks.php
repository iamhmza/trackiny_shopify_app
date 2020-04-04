<?php

namespace App\Listeners;

use App\Store;
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
        $store = Store::find($id);

        $client = new Client([
            'headers' => ['Content-Type' => 'application/json', 'X-Shopify-Access-Token' => $token],
        ]);
        $url = 'https://' . $shop . '/admin/api/2020-01/webhooks.json';

        $webhooks = [
            "orders/fulfilled" => env('APP_URL') . 'webhooks/fulfillment',
            "order_transactions/create" => env('APP_URL') . 'webhooks/transaction',
            "orders/updated" => env('APP_URL') . 'webhooks/fulfillment/update',
            "app/uninstalled" => env('APP_URL') . 'webhooks/uninstall',

        ];


        try {

            $hooks = [];

            foreach ($webhooks as $topic => $address) {

                $response = $client->post(
                    $url,
                    ['body' => json_encode(
                        [
                            "webhook" => [
                                "topic" => $topic,
                                "address" => $address,
                                "format" => "json",
                            ],
                        ]
                    )]
                );
                $data = json_decode($response->getBody()->getContents());
                $hooks[$data->webhook->id] = $data->webhook->topic;
            }

            $store->webhooks()->create([
                'hooks' => json_encode($hooks),
            ]);

        } catch (ClientException $e) {

            // dump($e->getResponse()->getBody()->getContents());
            return 'Problem with shopify servers';
        }
        // $data = json_decode($response->getBody()->getContents());

    }
}
