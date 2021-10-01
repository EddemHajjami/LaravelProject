<?php

use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

    Auth::routes();

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/restaurants', [RestaurantsController::class, 'index']);
    Route::get('/restaurants/{restaurant}', [RestaurantsController::class, 'show']);
    Route::post('/restaurants/{restaurant}', [ReviewsController::class, 'add']);

    Route::get('/account', [UsersController::class, 'user']);
    Route::get('/account/{review}/edit', [ReviewsController::class, 'edit']);
    Route::patch('/account/{review}', [ReviewsController::class, 'patch']);
    Route::delete('/account/{review}', [ReviewsController::class, 'remove']);


    Route::get('/admin', [UsersController::class, 'index']);
    Route::post('/admin', [RestaurantsController::class, 'add']);
    Route::delete('/admin/{restaurant}', [RestaurantsController::class, 'remove']);
    Route::patch('/admin/{user}/disable/', [UsersController::class, 'disable']);
    Route::patch('/admin/{user}/enable/', [UsersController::class, 'enable']);
    Route::get('/admin/hidden/', [UsersController::class, 'hiddenUsers']);

