<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $search = $request->search;

        $products = Product::with('category', 'supplier'
        )->when($search, function($query) use($search){
            $query = $query->where('name', 'like', '%'.$search.'%');
        })->latest()->paginate(6);

        $categories = Category::with('products')->limit(12)->get();

        return view('landing.welcome', compact('products', 'categories', 'search'));
    }
}
