<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/businesses');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::resource('businesses', BusinessController::class)
    ->only(['index', 'show']);
