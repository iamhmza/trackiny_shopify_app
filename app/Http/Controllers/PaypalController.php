<?php

namespace App\Http\Controllers;

use App\Account;
use App\Store;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    public function access(Request $request)
    {
        // client ID => AQC92vxvsityhXzRyjtlRCjNIm7KtW6CMNA9ZbgvjkMFooxk77HXKi0pDNi64uy4nbSlf5fVAZZFYysE
        // secret => EJXdCZTFxaF1t3tmnP7IMpGaEW9bfWATKB6OBw2JhyLOgM8LW4WJ-V7p90jtLghMJ_DdejV8-L4nGd7e

        //validate inputs
        $request->validate(['paypalClientId' => 'string|required', 'paypalSecret' => 'string|required']);

        $client = new Client([
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json'],
        ]);

        $devUrl = 'https://api.sandbox.paypal.com/v1/oauth2/token';
        $baseUrl = 'https://api.paypal.com/v1/oauth2/token';

        $paypalClientId = $request->paypalClientId;
        $paypalSecret = $request->paypalSecret;

        try {
            $res = $client->request('POST', $devUrl, [
                'auth' => [$paypalClientId, $paypalSecret],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
            ]);
        } catch (ClientException $e) {

            if ($e->getCode() == 401) {
                return redirect('/install/paypal')->with('error', 'Invalid cridentials');
            }

            return response()->json(['message' => 'Problem with paypal servers', 'success' => false]);
        }

        if ($res->getStatusCode() == 200) {
            $data = json_decode($res->getBody()->getContents());
            $dt = Carbon::now();
            $user = Auth::user();
            $id = $user->id;
            $store = Store::find($id);
            

            $store->account()->firstOrCreate([
                'api_key' => $paypalClientId,
                'api_secret' => $paypalSecret,
                'token' => $data->access_token,
                'expire_time' => $dt->addSeconds($data->expires_in),
            ]);
        }

        return redirect('/dashboard');

    }
}
