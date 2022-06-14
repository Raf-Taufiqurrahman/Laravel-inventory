<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Vehicle;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
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

        $productsOutStock = Product::where('quantity', '<=', 10)->paginate(5);

        $orders = Order::where('status', 0)->get();

        $bestProduct = DB::table('transaction_details')
                        ->addSelect(DB::raw('products.name as name, sum(transaction_details.quantity) as total'))
                        ->join('products', 'products.id', 'transaction_details.product_id')
                        ->groupBy('transaction_details.product_id')
                        ->orderBy('total', 'DESC')
                        ->limit(5)->get();

        $label = [];

        $total = [];

        if(count($bestProduct)){
            foreach($bestProduct as $data){
                $label[] = $data->name;
                $total[] = (int) $data->total;
            }
        }else{
            $label[] = '';
            $total[] = '';
        }

        return view('admin.dashboard', compact('categories', 'vehicles', 'suppliers', 'products', 'customers', 'transactions', 'transactionThisMonth', 'productsOutStock', 'orders', 'label', 'total'));
    }
}
