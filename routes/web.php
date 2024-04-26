<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BookCategoriesController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource("/home", BooksController::class);
Route::resource('/add-book', BookCategoriesController::class);