<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect('/homepage');
});

Route::get('/homepage',[
    PageController::class, 'homepage'
])->name('homepage');

