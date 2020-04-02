<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class CheckShopifyCharge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $charge = Auth::user()->storeCharge;
        //$shop = request()->header('X-Shopify-Shop-Domain');

        //$charge = User::where('name', $shop)->get()->first()->storeCharge;
        //dump($charge);

        // paid or on trail subscription 
        if ($charge->onTrial() || $charge->active()) {

            return $next($request);
        }

        if (is_null($charge->confirmation_url)) {

            return redirect('/dashboard');
        }

        return redirect($charge->confirmation_url);
    }
}
