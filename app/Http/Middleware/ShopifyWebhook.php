<?php

namespace App\Http\Middleware;

use Closure;

class ShopifyWebhook
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

        $hmac = request()->header('X-Shopify-Hmac-Sha256') ?: '';
        $shop = request()->header('X-Shopify-Shop-Domain');
        $data = request()->getContent();

        // From https://help.shopify.com/api/getting-started/webhooks#verify-webhook

        $secret = 'e7fd1858d31a547dc1b44aef3f8c56aeed25eddb4c11d20b13ecf0ffb96817f7';
        $hmacLocal = base64_encode(hash_hmac('sha256', $data, env('SHOPIFY_SECRET'), true));
        if (!hash_equals($hmac, $hmacLocal) || empty($shop)) {
            // Issue with HMAC or missing shop header
            abort(401, 'Invalid webhook signature');
        }

        return $next($request);
    }
}
