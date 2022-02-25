<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
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

Route::resource('/', LandingController::class);
Route::get('auth-register', [LandingController::class, 'register']);




Route::group(['prefix' => 'menu', 'as' => 'menu.', 'middleware' => 'auth'],
    function()
    {
        Route::resource('dashboard', DashboardController::class);
    }

);