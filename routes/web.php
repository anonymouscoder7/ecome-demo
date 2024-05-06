<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Order\CartController as OrderCartController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// frontend routes
// landing page

Route::get('/', [FrontendController::class, 'index']);
Route::get('/products', [FrontendController::class, 'product']);
Route::get('/product-details/{id}', [FrontendController::class, 'viewProduct']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', [AdminController::class, 'index']);

    // category routes
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/create-category', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);

    // product routes
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/create-product', [ProductController::class, 'create']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::post('/product/update/{id}', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);
});


// user routes
Route::group(['middleware' => ['auth']], function () {
    Route::post('/add-to-cart', [OrderCartController::class, 'store']);

    // checkout
    Route::get('/checkout', [OrderCartController::class, 'checkout']);
    // order 
    Route::post('/order', [OrderController::class, 'store']);

    Route::get('/pay-with-khalti/{price}/{id}', [OrderController::class, 'payWithKhalti']);

    Route::get('/change-order-status/{id}', [OrderController::class, 'changeOrderStatus']);
});
