<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('kendaraan', KendaraanController::class);
    
    Route::get('mobil', [KendaraanController::class, 'getAllMobil']);
    Route::get('motor', [KendaraanController::class, 'getAllMotor']);

    Route::get('motor/stock', [KendaraanController::class, 'getAllStockMotor']);
    Route::get('mobil/stock', [KendaraanController::class, 'getAllStockMotor']);
    Route::get('motor/sold', [KendaraanController::class, 'getAllSoldMotor']);
    Route::get('mobil/sold', [KendaraanController::class, 'getAllSoldMobil']);
});