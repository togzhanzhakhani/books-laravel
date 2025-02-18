<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $genres = ['Фантастика', 'Детектив', 'Роман', 'Ужасы', 'Приключения'];
        $genreInstances = [];
        foreach ($genres as $genreName) {
            $genreInstances[] = Genre::create(['name' => $genreName]);
        }

        $book1 = Book::create(['title' => 'Хоббит', 'cover_url' => 'default_cover.jpg']);
        $book2 = Book::create(['title' => '1984', 'cover_url' => 'default_cover.jpg']);

        $book1->genres()->attach($genreInstances[0]->id);
        $book2->genres()->attach($genreInstances[1]->id);  
    }
}
