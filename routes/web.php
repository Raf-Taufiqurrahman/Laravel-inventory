<?php

use App\Http\Controllers\Admin\{
    DashboardController, CategoryController, CustomerController, SupplierController,
    ProductController, StockController, VehicleController
};
use App\Http\Controllers\{
    LandingController, ProductController as LandingProductController,
    CartController, TransactionController, CategoryController as LandingCategoryController,
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

Route::get('/', LandingController::class)->name('landing');

Route::controller(LandingCategoryController::class)->as('category.')->group(function(){
    Route::get('/category', 'index')->name('index');
    Route::get('/category/{slug}', 'show')->name('show');
});

Route::controller(LandingProductController::class)->as('product.')->group(function(){
    Route::get('/product', 'index')->name('index');
    Route::get('/product/{slug}', 'show')->name('show');
});

Route::controller(CartController::class)->middleware('auth')->group(function(){
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/{product:slug}', 'store')->name('cart.store');
    Route::delete('/cart/destroy/{cart:id}', 'destroy')->name('cart.destroy');
    Route::put('/cart/update/{cart:id}', 'update')->name('cart.update');
});

Route::post('/transaction', [TransactionController::class, 'store'])->middleware('auth')->name('transaction.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/category', CategoryController::class)->except('show', 'create', 'edit');
    Route::resource('/supplier', SupplierController::class)->except('show', 'create', 'edit');
    Route::resource('/product', ProductController::class)->except('show');
    Route::resource('/customer', CustomerController::class);
    Route::resource('/stock', StockController::class)->only('index', 'update');
    Route::resource('/vehicle', VehicleController::class)->except('show', 'create', 'edit');
});
