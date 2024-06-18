<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\PageController;
Route::get('/', [PageController::class, 'home'])->name('home'); Route::get('/about', [PageController::class, 'about'])->name('about'); Route::get('/contact', [PageController::class, 'contact'])->name('contact');
