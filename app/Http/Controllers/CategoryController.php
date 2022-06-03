<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('landing.category.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $products = Product::where('category_id', $category->id)->get();

        return view('landing.category.show', compact('category', 'products'));
    }
}
