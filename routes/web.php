<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);
Route::put('books/{book}/publish', [BookController::class, 'publish'])->name('books.publish');

Route::resource('genres', GenreController::class);