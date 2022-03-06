<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PoliController;
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

        // Route Poli
        Route::resource('poli', PoliController::class);
            // Route Hapus Poli
            Route::get('remove-poli', [PoliController::class, 'delete']);

        // Route Antrian
        Route::resource('antrian', AntrianController::class);
        Route::get('/edit-status', [AntrianController::class, 'editStatus'])->name('antrian.editstatus');
        Route::get('/reset-antrian', [AntrianController::class, 'resetAntrian'])->name('antrian.reset');
        Route::get('/next-antrian', [AntrianController::class, 'nextAntrian'])->name('antrian.next');
    }

);