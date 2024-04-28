<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// frontend routes
// landing page
Route::get('/', [FrontendController::class, 'index']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/create-category', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);



});


// user routes
Route::group(['middleware' => ['auth']], function () {
    
});
