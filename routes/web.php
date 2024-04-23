<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
Route::get('/', function () {
    return view('homepage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/homepage', function () {
        return view('homepage');
    })->name('homepage');
});

Route::get('/', [ProductsController::class, 'index'])->name('homepage');