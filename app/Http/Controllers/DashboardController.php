<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index()
    {
        // get current user's store
        $user = Auth::user();
        return response()->json($user);
    }

    public function account()
    {
        // TODO: check if token expired 
        $account = Auth::user()->store->account->only('api_key', 'api_secret');
        return response()->json($account);
    }

    public function getOrders()
    {
        $orders = Auth::user()->store->orders;

        return response()->json($orders);
    }

    public function updateAccount(Request $request)
    {
        $request->validate(['paypalSecret' => 'string|required', 'paypalKey' => 'string|required']);

        Auth::user()
            ->store
            ->account();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/install/choose');
    }
}
