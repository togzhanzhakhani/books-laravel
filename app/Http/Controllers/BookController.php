<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', ['books' => Book::paginate(10)]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $coverPath = $request->hasFile('cover') 
            ? $request->file('cover')->store('covers', 'public') 
            : 'covers/book.png';
        Book::create(['title' => $request->title, 'cover_url' => $coverPath]);
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        if ($request->hasFile('cover')) {
            if ($book->cover_url !== 'covers/book.png') {
                Storage::disk('public')->delete($book->cover_url);
            }
            $coverPath = $request->file('cover')->store('covers', 'public');
            $book->update(['cover_url' => $coverPath]);
        }
        $book->update($request->only('title'));
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        if ($book->cover_url !== 'covers/book.png') {
            Storage::disk('public')->delete($book->cover_url);
        }
        $book->delete();
        return redirect()->route('books.index');
    }

    public function publish(Book $book)
    {
        $book->update(['status' => 'published']);
        return redirect()->route('books.index');
    }
}
