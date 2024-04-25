<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/compare',[PageController::class, 'compare'])->name('compare');

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