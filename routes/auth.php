<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.user');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.user');

Route::middleware('auth')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('weather/subscribe', [SubscriptionController::class, 'subscribe'])->name('weather.subscribe');
    Route::delete('subscribe/remove', [SubscriptionController::class, 'subscriptionRemove'])->name('subscribe.remove');
});
