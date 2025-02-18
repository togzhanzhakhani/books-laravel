@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Жанры</h1>
        <a href="{{ route('genres.create') }}" class="btn btn-primary">Добавить жанр</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название жанра</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($genres as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
