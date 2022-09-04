<?php

namespace App\Http\Controllers\Customer;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
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

        $transactions = Transaction::with('details.product')->where('user_id', $user)->latest()->paginate(10);

        // $grandQuantity = TransactionDetail::sum('quantity');

        // $transactions = TransactionDetail::with('product', 'transaction')->whereHas('transaction', function($query) use($user){
        //     $query->where('user_id', $user);
        // })->paginate(10);

        $grandTransaction = Transaction::with('details.product')->where('user_id', $user)->count();

        $grandQuantity = TransactionDetail::with('transaction', 'product')->whereHas('transaction', function($query) use($user){
            $query->where('user_id', $user);
        })->sum('quantity');

        return view('customer.transaction.index', compact('transactions', 'grandTransaction', 'grandQuantity'));
    }
}
