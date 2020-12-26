<?php

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
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('customers', CustomerController::class);
    Route::resource('taxes', TaxController::class);
    Route::resource('product_groups', ProductGroupController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class);

    Route::get('/sale', function () {
        return view('sales.index');
    })->name('sale');
});
