@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Список книг</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Добавить книгу</a>
    
    <div class="list-group">
        @foreach ($books as $book)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $book->title }}</strong> 
                    <span class="badge badge-{{ $book->status === 'published' ? 'success' : 'warning' }}">
                        {{ $book->status === 'published' ? 'Опубликовано' : 'Черновик' }}
                    </span>
                </div>
                
                <div class="d-flex">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm mr-2">Редактировать</a>

                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>

                    @if ($book->status === 'draft')
                        <form action="{{ route('books.publish', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm ml-2">Опубликовать</button>
                        </form>
                    @endif
                </div>
                
                <img src="{{ asset('storage/' . $book->cover_url) }}" alt="Обложка книги" width="80" class="ml-3">
            </div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $books->links() }}
    </div>
</div>
@endsection
