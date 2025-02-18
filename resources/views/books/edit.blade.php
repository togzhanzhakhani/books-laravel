@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Редактировать книгу: {{ $book->title }}</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">Название книги:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="form-group">
            <label for="cover" class="form-label">Обложка:</label>
            <input type="file" name="cover" id="cover" class="form-control-file">
            @if ($book->cover_url)
                <p>Текущая обложка: <img src="{{ Storage::url($book->cover_url) }}" alt="Cover" class="img-thumbnail" style="width: 100px;"></p>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning">Обновить</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary ml-2">Назад</a>
        </div>
    </form>
</div>
@endsection
