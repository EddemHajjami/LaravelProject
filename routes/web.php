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

    Route::delete('/restaurants/{review}', [ReviewsController::class, 'remove'])->middleware('reviewer');
    Route::get('/account', [UsersController::class, 'user'])->middleware('reviewer');
    Route::get('/account/{review}/edit', [ReviewsController::class, 'edit'])->middleware('reviewer');;
    Route::patch('/account/{review}', [ReviewsController::class, 'patch'])->middleware('reviewer');

    Route::get('/admin', [UsersController::class, 'index'])->middleware('admin');
    Route::post('/admin', [RestaurantsController::class, 'add'])->middleware('admin');
    Route::delete('/admin/{restaurant}', [RestaurantsController::class, 'remove'])->middleware('admin');
    Route::patch('/admin/{user}/lock/', [UsersController::class, 'lock'])->middleware('admin');
    Route::patch('/admin/{user}/unlock/', [UsersController::class, 'unlock'])->middleware('admin');
    Route::get('/admin/users/', [UsersController::class, 'users'])->middleware('admin');
    Route::get('/admin/locked/', [UsersController::class, 'lockedUsers'])->middleware('admin');

