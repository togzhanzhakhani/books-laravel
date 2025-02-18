<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return GenreResource::collection(Genre::all());
    }

    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }
}
