<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\MyBusinessesController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/businesses');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('logout', fn () => abort(405));
    Route::resource('owner', OwnerController::class)
        ->only(['create', 'store']);
    Route::resource('my_businesses', MyBusinessesController::class);
});

Route::resource('businesses', BusinessController::class)
    ->only(['index', 'show']);
