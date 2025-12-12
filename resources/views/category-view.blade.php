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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="categories.html">Категории</a></li>
                    <li class="breadcrumb-item active">Просмотр категории</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Электроника</h1>
                <div>
                    <a href="category-form.html?id=1" class="btn btn-warning me-2">Редактировать</a>
                    <a href="categories.html" class="btn btn-secondary">Назад к списку</a>
                </div>
            </div>

            <!-- Информация о категории -->
            <div class="row mb-5">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Информация о категории</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>ID:</strong>{{ $category->id }}</p>
                                    <p><strong>Название:</strong> {{ $category->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Описание:</strong> {{ $category->description }}</p>
                                    <p><strong>Количество товаров:</strong> {{ $category->products->count() }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Товары в категории -->
            <h3 class="mb-3">Товары в категории</h3>
            <div class="card shadow-sm mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="product-view.html?id=101" class="btn btn-sm btn-outline-info">Просмотр</a>
                                    <a href="product-form.html?id=101" class="btn btn-sm btn-outline-warning">Редактировать</a>
                                    <button class="btn btn-sm btn-outline-danger">Удалить</button>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="product-form.html?category=1" class="btn btn-primary">Добавить товар в эту категорию</a>
            </div>
        </div>
    </div>
</div>

<script src="./assets/bootstrap.min.js"></script>
</body>
</html>
