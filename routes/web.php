<?php

use App\Http\Controllers\CachedProductsApiController;
use App\Http\Controllers\CsvUploadController;
use App\Http\Controllers\PageArchiveController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductsApiController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StoreProductController;
use App\Http\Middleware\ArchiveFeatureActiveMiddleware;
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

Route::post('api/products', ProductsApiController::class);

Route::post('api/cached-products', CachedProductsApiController::class);

Route::post('payment', PaymentController::class);

Route::get('archive', PageArchiveController::class)
    ->middleware(ArchiveFeatureActiveMiddleware::class);

Route::post('csv/upload', CsvUploadController::class);
