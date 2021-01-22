<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\SettingController;

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
Route::middleware('locale')->group(function() {
    Route::get('/', [IndexController::class, 'home'])->name('home');

    Route::get('weather', [WeatherController::class, 'weather'])->name('weather');

    Route::get('weather/map', [WeatherCOntroller::class, 'map'])->name('weather.map');

    Route::match(['get', 'post'], 'settings', [SettingController::class, 'settings'])->name('settings');

});
