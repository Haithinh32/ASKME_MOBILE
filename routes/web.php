<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', [ProductsController::class, 'index_guest'])->name('homepage');
// Route::get('/homepage', function () {
//     return view('homepage');
// });

Route::get('/compare',[Controller::class, 'compare'])->name('compare');
Route::get('/brand',[Controller::class, 'brand'])->name('brand');
Route::get('/search', [ProductsController::class, 'index_guest'])->name('search');
Route::get('download.product.docx', [HomeController::class, 'generateDocx'])->name('download.product.docx');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
 
route::get('/dashboard',[HomeController::class,'index'])->
    middleware(['auth','admin'])->name("dashboard");

    Route::middleware(['auth','admin'])->group(function () {
        Route::get('/dashboard', [ProductsController::class, 'index_admin'])->name('dashboard');
        Route::get('/deleteproduct', [ProductsController::class, 'deleteproduct'])->name('deleteproduct');
        Route::post('/editproduct', [ProductsController::class, 'editproduct'])->name('editproduct');
        Route::post('/updateproduct', [ProductsController::class, 'updateproduct'])->name('updateproduct');
        Route::post('/addnew', [ProductsController::class, 'addnew'])->name('addnew');
        Route::get('/addnew', function () {
            return view('addnew');
        })->name('addnew');
    });
