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
    
    // category routes
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/create-category', [CategoryController::class, 'create']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::post('/category/update/{id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);

    // product routes

});


// user routes
Route::group(['middleware' => ['auth']], function () {
    
});