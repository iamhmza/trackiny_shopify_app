<?php

namespace App\Http\Controllers;

use App\ShopifyWebHooks;
use Illuminate\Http\Request;

class ShopifyWebHooksController extends Controller
{
    public function fullfill(Request $request)
    {
        // From https://help.shopify.com/api/getting-started/webhooks#verify-webhook
        $data = request()->getContent();
        // save data 

        return $data;
      
    }
    public function transcation(Request $request)
    {   
        $data = request()->getContent();
        // save data 
        error_log('data transaction est '.$data);
        
        return $data;

    }
}
