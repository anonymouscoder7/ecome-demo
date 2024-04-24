<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;


// landing page
Route::get('/',[FrontendController::class,'index']);