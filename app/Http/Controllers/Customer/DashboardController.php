<?php

namespace App\Http\Controllers\Customer;

use App\Models\Rent;
use App\Models\Order;
use App\Enums\OrderStatus;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::id();

        $vehicles = Rent::with('user', 'vehicle')->where('user_id', $user)->get();

        $products = Order::with('user')->where('user_id', $user)->get();

        $transactions = Transaction::with('details', 'user')->where('user_id', $user)->get();

        $orders = Order::with('user')->where('user_id', $user)->where('status', OrderStatus::Pending)->get();

        return view('customer.dashboard', compact('vehicles', 'products', 'orders', 'transactions'));
    }
}
