<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function product()
    {
        $transactions = Transaction::with('details.product')->latest()->paginate(10);

        $grandTransaction = Transaction::with('details.product')->count();

        $grandQuantity = TransactionDetail::sum('quantity');

        return view('admin.transaction.product', compact('transactions', 'grandQuantity', 'grandTransaction'));
    }
}
