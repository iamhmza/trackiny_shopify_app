<?php

namespace App\Http\Controllers;

//use Request;
use App\User;
use App\Store;
use App\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Events\NewUserHasRegisteredEvent;

class ShopifyAuthController extends Controller
{
    // auth to shopify store
    public function redirectToProvider(Request $request)
    {

        $request->validate(['name' => 'string|required']);

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
            'password' => $shopifyUser->id,
        ]);

        // Create shop attached to user
        $store = $user->store()->firstOrCreate([
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

        // Login with Laravel's Authentication system
        Auth::login($user, true);

        // Triggering new user registered event
        event(new NewUserHasRegisteredEvent($user));

        return redirect('/install/paypal');
    }
}
