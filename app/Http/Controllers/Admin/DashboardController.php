<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Vehicle;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

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
        $categories = Category::count();

        $vehicles = Vehicle::count();

        $suppliers = Supplier::count();

        $products = Product::count();

        $customers = User::count();

        $transactions = TransactionDetail::sum('quantity');

        $transactionThisMonth = TransactionDetail::whereMonth('created_at', date('m'))->sum('quantity');

        $productsOutStock = Product::where('quantity', '<=', 10)->paginate(6);

        return view('admin.dashboard', compact('categories', 'vehicles', 'suppliers', 'products', 'customers', 'transactions', 'transactionThisMonth', 'productsOutStock'));
    }
}
