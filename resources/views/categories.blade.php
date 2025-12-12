<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель - Категории</title>
{{--    <link href="./assets/bootstrap.min.css" rel="stylesheet">  --}}
    <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
<!-- Навигация -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Админ-панель</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="categories.html">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.html">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.html">Заказы</a>
                </li>
            </ul>
            <div class="navbar-text">
                <span class="me-3">Администратор</span>
                <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Выйти</a>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Категории</h1>
{{--                <a href="/admin/categories/add" class="btn btn-primary">Добавить категорию</a>--}}
                <a href="{{ route('category.create') }}" class="btn btn-primary">Добавить категорию</a>
            </div>

            <!-- Таблица категорий -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Товаров</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
{{--                                <td><span class="badge bg-primary">{{ \App\Models\Product::where('category_id', $category->id)->count() }}</span></td>--}}
                                <td><span class="badge bg-primary">{{ $category->products->count() }}</span></td>
                                <td>
                                    <a href="/admin/category/{{ $category->id }}"
                                       class="btn btn-sm btn-outline-info">Просмотр</a>
                                    <a href="/admin/category/{{ $category->id }}/edit"
                                       class="btn btn-sm btn-outline-warning">Редактировать</a>
                                    @if($category->products->count() == 0)
                                    <form action="{{ route('category.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Удалить</button>
                                    </form>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Пагинация -->
            <nav aria-label="Пагинация" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Назад</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Вперед</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script src="asset('assets/bootstrap.min.js')"></script>
</body>

</html>
