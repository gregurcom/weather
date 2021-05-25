<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\AccessController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', [IndexController::class, 'home'])->name('home');

Route::get('weather', [WeatherController::class, 'weather'])->name('weather');

Route::get('weather/map', [WeatherController::class, 'map'])->name('weather.map');

Route::match(['get', 'post'], 'settings', [SettingController::class, 'settings'])->name('settings');

Route::get('register', [RegistrationController::class, 'show'])->name('registration.show');
Route::post('register', [RegistrationController::class, 'register'])->name('register');

Route::get('login', [AccessController::class, 'show'])->name('login.show');
Route::post('login', [AccessController::class, 'login'])->name('login');

Route::middleware('auth')->group(function() {
    Route::get('logout', [AccessController::class, 'logout'])->name('logout');
    Route::get('weather/subscribe', [SubscriptionController::class, 'subscribe'])->name('weather.subscribe');
    Route::delete('weather/subscribe', [SubscriptionController::class, 'remove'])->name('subscribe.remove');
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});
