<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'index'])->name('home');  
Route::get('/{slug}',[MainController::class,'show'])->name('show');
// web.php
Route::get('category/{slug}', [MainController::class, 'category'])->name('category.show');