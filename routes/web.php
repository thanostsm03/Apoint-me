<?php

use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/businesses');
Route::resource('businesses', BusinessController::class)
    ->only(['index', 'show']);
