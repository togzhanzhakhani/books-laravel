@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать жанр</h1>

        <form action="{{ route('genres.update', $genre) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название жанра</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $genre->name) }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Сохранить изменения</button>
            <a href="{{ route('genres.index') }}" class="btn btn-secondary mt-3">Назад</a>
        </form>
    </div>
@endsection
