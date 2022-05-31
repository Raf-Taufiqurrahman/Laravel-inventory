<?php

use App\Http\Controllers\Admin\{
    DashboardController, CategoryController, CustomerController, SupplierController,
    ProductController, StockController,
};
use App\Http\Controllers\{
    LandingController, ProductController as LandingProductController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', LandingController::class);

Route::get('/product/{slug}', [LandingProductController::class,'show'])->name('product.show');



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/category', CategoryController::class)->except('show', 'create', 'edit');
    Route::resource('/supplier', SupplierController::class)->except('show', 'create', 'edit');
    Route::resource('/product', ProductController::class)->except('show');
    Route::resource('/customer', CustomerController::class);
    Route::resource('/stock', StockController::class)->only('index', 'update');
});
