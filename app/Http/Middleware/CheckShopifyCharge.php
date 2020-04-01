<?php

namespace App\Http\Middleware;

use Closure;
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


        if ($charge->onTrial() || $charge->active()) {

            return $next($request);
        }

        return redirect($charge->confirmation_url);
    }
}
