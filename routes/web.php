<?php

use App\Http\Controllers\Admin\{
    DashboardController, CategoryController, SupplierController, ProductController, StockController
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/category', CategoryController::class)->except('show', 'create', 'edit');
    Route::resource('/supplier', SupplierController::class)->except('show', 'create', 'edit');
    Route::resource('/product', ProductController::class)->except('show');
    Route::resource('/stock', StockController::class)->only('index', 'update');
});
