@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Создать жанр</h1>

        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Название жанра</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Сохранить</button>
            <a href="{{ route('genres.index') }}" class="btn btn-secondary mt-3">Назад</a>
        </form>
    </div>
@endsection
