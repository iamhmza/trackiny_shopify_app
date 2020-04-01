<?php

namespace App\Listeners;

use App\UserProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecurringApplicationCharge
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

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
        $url = 'https://' . $shop . '/admin/api/2020-01/recurring_application_charges.json';

        // TODO: change test charge

        try {
            $res = $client->post($url, [
                "json" => [
                    "recurring_application_charge" => [
                        "name" => "Standard Plan",
                        "price" => 10.0,
                        "return_url" => env("APP_URL") . "charges",
                        "trial_days" => 10,
                        "test" => true
                    ]
                ]
            ]);


            $data =  json_decode($res->getBody()->getContents())->recurring_application_charge;
            $user->storeCharge()->create([
                'name' => $data->name,
                'confirmation_url' =>  $data->confirmation_url,
                'status' => $data->status,
                'trial_ends_at' => $data->trial_ends_on,
                'ends_at' => $data->billing_on,
            ]);
        } catch (ClientException $e) {
            dump($e);
        }





        /* 
        
        response example 
        array (
  'recurring_application_charge' => 
    array (
        'id' => 1029266947,
        'name' => 'Super Duper Plan',
        'api_client_id' => 755357713,
        'price' => '10.00',
        'status' => 'pending',
        'return_url' => 'http://super-duper.shopifyapps.com/',
        'billing_on' => NULL,
        'created_at' => '2020-02-06T12:38:57-05:00',
        'updated_at' => '2020-02-06T12:38:57-05:00',
        'test' => NULL,
        'activated_on' => NULL,
        'cancelled_on' => NULL,
        'trial_days' => 0,
        'trial_ends_on' => NULL,
        'decorated_return_url' => 'http://super-duper.shopifyapps.com/?charge_id=1029266947',
        'confirmation_url' => 'https://apple.myshopify.com/admin/charges/1029266947/confirm_recurring_application_charge?signature=BAh7BzoHaWRpBANeWT06EmF1dG9fYWN0aXZhdGVG--8dc23e0f71f25bdf008c848e6be0413eeab176aa',
    ),
)
        
        
        */
    }
}
