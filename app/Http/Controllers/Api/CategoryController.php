<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __invoke()
    {
        $categories = Category::paginate();

        return response()->json([
            'success' => true,
            'message' => 'List Data Category',
            'data' => $categories,
        ], 200);
    }
}
