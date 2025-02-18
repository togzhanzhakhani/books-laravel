<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('genres.index', ['genres' => Genre::all()]);
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(StoreGenreRequest $request)
    {
        Genre::create($request->only('name'));
        return redirect()->route('genres.index');
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre->update($request->only('name'));
        return redirect()->route('genres.index');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
