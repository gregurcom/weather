<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('register', [RegisterController::class, 'index'])->name('register.page');
Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::get('login', [LoginController::class, 'index'])->name('login.page');
Route::post('login', [LoginController::class, 'store'])->name('login');
