<?php

namespace App\Http\Controllers;

//use Request;
use App\Store;
use App\User;
use App\UserProvider;
use Auth;
use Illuminate\Http\Request;
use Socialite;

class ShopifyAuthController extends Controller
{
    // auth to shopify store
    public function redirectToProvider(Request $request)
    {

        $request->validate(['name' => 'string|required']);

        $nameStore = $request->name;

        $config = new \SocialiteProviders\Manager\Config(
            env('SHOPIFY_KEY'),
            env('SHOPIFY_SECRET'),
            env('SHOPIFY_REDIRECT'),
            ['subdomain' => $request->get('name')]
        );

        return Socialite::with('shopify')
            ->setConfig($config)
            ->scopes(['read_orders', 'write_orders', 'read_fulfillments', 'write_fulfillments'])
            ->redirect();
    }

    public function handleProviderCallback(Request $request)
    {

        $shopifyUser = Socialite::driver('shopify')->user();

        // Create user
        $user = User::firstOrCreate([
            'name' => $shopifyUser->nickname,
            'email' => $shopifyUser->email,
            'password' => '',
        ]);

        $user->store()->firstOrCreate([
            'name' => $shopifyUser->name,
            'domain' => $shopifyUser->nickname,
        ]);

        // Store the OAuth Identity
        UserProvider::firstOrCreate([
            'user_id' => $user->id,
            'provider' => 'shopify',
            'provider_user_id' => $shopifyUser->id,
            'provider_token' => $shopifyUser->token,
        ]);

        // Create shop
        // $store = Store::firstOrCreate([
        //     'name' => $shopifyUser->name,
        //     'domain' => $shopifyUser->nickname,
        // ]);

        // Attach store to user
        // $store->users()->syncWithoutDetaching([$user->id]);

        // Login with Laravel's Authentication system
        Auth::login($user, true);

        // dd($shopifyUser->token);

        return redirect('/install/paypal');

    }

}
