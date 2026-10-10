<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);
Route::resource('beritas', BeritaController::class);
Route::resource('artikels', ArtikelController::class);
