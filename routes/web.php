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

Route::get('/dashboard', [ProductsController::class, 'index_admin'])->name('dashboard');
Route::get('/search', [ProductsController::class, 'index_guest'])->name('search');
Route::get('/deleteproduct', [ProductsController::class, 'deleteproduct'])->name('deleteproduct');

Route::post('/editproduct', [ProductsController::class, 'editproduct'])->name('editproduct');

Route::post('/updateproduct', [ProductsController::class, 'updateproduct'])->name('updateproduct');

Route::post('/addnew', [ProductsController::class, 'addnew'])->name('addnew');

Route::get('/addnew', function () {
    return view('addnew');
})->name('addnew');

Route::get('/', [ProductsController::class, 'index_guest'])->name('homepage');

