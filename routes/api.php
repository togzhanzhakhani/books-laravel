<?php

use App\Http\Controllers\api\BookController;
use App\Http\Controllers\api\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/{genre}', [GenreController::class, 'show']);
Route::get('books', [BookController::class, 'index']);
Route::get('books/{book}', [BookController::class, 'show']);