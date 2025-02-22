# Установка и запуск
## Клонируйте репозиторий:
```sh
git clone https://github.com/togzhanzhakhani/books-laravel
cd books-laravel
```

## Соберите и запустите проект с помощью Docker:
```sh
docker-compose up -d
```

## Запустите миграцию и сидеры:
```sh
docker-compose exec laravel.test php artisan migrate
docker-compose exec laravel.test php artisan db:seed
```

## Сделайте символическую ссылку:
```sh
docker-compose exec laravel.test php artisan storage:link
```

## После этого откройте браузер и перейдите по адресу:
```sh
http://localhost:80
```

### 1. Web интерфейс
- Книги (Books): На странице `/books` можно просматривать список всех книг, а также выполнять операции создания, редактирования, удаления.
- Жанры (Genres): На странице `/genres` можно просматривать список всех жанров и также выполнять CRUD операции.

### 2. API
Для получения данных в формате JSON используйте следующие эндпоинты:

Жанры:
- `GET api/genres` — Список всех жанров
- `GET api/genres/{genre}` — Информация о конкретном жанре

Книги:
- `GET api/books` — Список всех книг
- `GET api/books/{book}` — Информация о конкретной книге
