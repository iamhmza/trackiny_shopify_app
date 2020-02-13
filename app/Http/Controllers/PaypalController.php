<?php

namespace App\Http\Controllers;

use App\Account;
use App\Store;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{


    public function access(Request $request)
    {

        //validate inputs
        $request->validate(['paypalClientId' => 'string|required', 'paypalSecret' => 'string|required']);

        // get current user store
        $store = Auth::user()->store;

        // get payapl token
        $data = $this->getPaypalToken($request->paypalClientId, $request->paypalSecret);

        // add or get new account
        $store->account()->firstOrCreate([
            'api_key' => $request->paypalClientId,
            'api_secret' => $request->paypalSecret,
            'token' => $data->access_token,
            'expire_time' => now()->addSeconds($data->expires_in),
        ]);

        // get user token
        // $token = $this->getToken($user->email, $user->password);

        return redirect('/dashboard');
    }

    // private function getToken($email, $password)
    // {
    //     $credentials = ['email' => $email, 'password' => $password];

    //     if (!$token = auth('api')->attempt($credentials)) {

    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return $token;
    // }

    private function getPaypalToken($paypalClientId, $paypalSecret)
    {
        $client = new Client([
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json'],
        ]);

        $baseUrl = 'https://api.paypal.com/v1/oauth2/token';

        try {
            $res = $client->request('POST', $baseUrl, [
                'auth' => [$paypalClientId, $paypalSecret],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
            ]);
        } catch (ClientException $e) {

            if ($e->getCode() == 401) {
                return back(401)->with('error', 'Invalid cridentials');
            }

            // report($e);
            return back(500)->with(['error' => 'Problem with paypal servers']);
        }

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody()->getContents());
        }
    }
}
