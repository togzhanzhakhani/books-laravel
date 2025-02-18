<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }
}
