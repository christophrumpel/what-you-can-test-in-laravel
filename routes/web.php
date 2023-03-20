<?php

use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StoreProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', PageHomeController::class);

Route::post('purchase/{user}/{product}', PurchaseController::class);

Route::post('product', StoreProductController::class);
