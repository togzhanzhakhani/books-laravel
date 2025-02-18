@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Добавить книгу</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Название книги:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cover" class="form-label">Обложка:</label>
            <input type="file" name="cover" id="cover" class="form-control-file">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary ml-2">Назад</a>
        </div>
    </form>
</div>
@endsection
