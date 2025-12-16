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
                <h1>Товары</h1>
                <a href="/admin/product/create" class="btn btn-primary">Добавить товар</a>
            </div>

            <!-- Фильтры -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="search" class="form-label">Поиск</label>
                            <input type="text" class="form-control" id="search" placeholder="Поиск по названию">
                        </div>
                        <div class="col-md-4">
                            <label for="categoryFilter" class="form-label">Категория</label>
                            <select class="form-select" id="categoryFilter">
                                <option selected value="">Все категории</option>
                                <option value="1">Электроника</option>
                                <option value="2">Одежда</option>
                                <option value="3">Книги</option>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary me-2">Применить</button>
                            <button type="reset" class="btn btn-secondary">Сбросить</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Таблица товаров -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Изображение</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Цена</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        <div class="product-thumbnail">
                                            <img src="{{ asset('storage/'.$product->image_path)  }}" alt="{{ $product->name }}" class="img-thumbnail">
                                        </div>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ \App\Models\Category::find($product->category_id)->name  }}</td>
                                    <td>{{  $product->price }} ₽</td>
                                    <td>
                                        <a href="product-view.html" class="btn btn-sm btn-outline-info">Просмотр</a>
                                        <a href="product-form.html" class="btn btn-sm btn-outline-warning">Редактировать</a>
                                        <button class="btn btn-sm btn-outline-danger">Удалить</button>
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
