<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rent;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function product()
    {
        $transactions = Transaction::with('details.product')->latest()->paginate(10);

        $grandTransaction = Transaction::with('details.product')->count();

        $grandQuantity = TransactionDetail::sum('quantity');

        return view('admin.transaction.product', compact('transactions', 'grandQuantity', 'grandTransaction'));
    }

    public function vehicle()
    {
        $rents = Rent::with('vehicle', 'user')->latest()->paginate(10);

        return view('admin.transaction.vehicle', compact('rents'));
    }
}
