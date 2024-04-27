<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BookCategoriesController;
use App\Http\Controllers\BookLendingController;
use App\Http\Controllers\BookUsersController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource("/home", BooksController::class);
Route::resource('/add-book', BookCategoriesController::class);
Route::resource('/book-lendings', BookLendingController::class);
Route::resource('/add-book-lending', BookUsersController::class);
Route::post('/book-lendings/{id}/return', 'App\Http\Controllers\BookLendingController@returnBook')->name('book-lendings.return');

