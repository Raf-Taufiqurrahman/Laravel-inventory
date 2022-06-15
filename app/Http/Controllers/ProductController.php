<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::with('category', 'supplier')->when($search, function($query) use($search){
            $query = $query->where('name', 'like', '%'.$search.'%');
        })->orWhereHas('category', function($query) use($search){
            $query = $query->where('name', 'like', '%'.$search.'%');
        })->get();

        return view('landing.product.index', compact('products', 'search'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->first();

        $products = $product->where('category_id', $product->category_id)->where('id', '!=',$product->id)->limit(5)->inRandomOrder()->get();

        $transaction = TransactionDetail::with('transaction', 'product')->where('product_id', $product->id)->get();

        return view('landing.product.show', compact('product', 'products', 'transaction'));
    }
}
