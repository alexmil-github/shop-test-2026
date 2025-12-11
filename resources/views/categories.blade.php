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
                <a href="{{ route('addCategory') }}" class="btn btn-primary">Добавить категорию</a>
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
                            <tr>
                                <td>1</td>
                                <td>Электроника</td>
                                <td>Смартфоны, ноутбуки и другая техника</td>
                                <td><span class="badge bg-primary">12</span></td>
                                <td>
                                    <a href="category-view.html?id=1"
                                       class="btn btn-sm btn-outline-info">Просмотр</a>
                                    <a href="category-form.html?id=1"
                                       class="btn btn-sm btn-outline-warning">Редактировать</a>
                                    <button class="btn btn-sm btn-outline-danger" disabled>Удалить</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Одежда</td>
                                <td>Мужская и женская одежда</td>
                                <td><span class="badge bg-primary">8</span></td>
                                <td>
                                    <a href="category-view.html?id=2"
                                       class="btn btn-sm btn-outline-info">Просмотр</a>
                                    <a href="category-form.html?id=2"
                                       class="btn btn-sm btn-outline-warning">Редактировать</a>
                                    <button class="btn btn-sm btn-outline-danger">Удалить</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Книги</td>
                                <td>Художественная и научная литература</td>
                                <td><span class="badge bg-primary">5</span></td>
                                <td>
                                    <a href="category-view.html?id=3"
                                       class="btn btn-sm btn-outline-info">Просмотр</a>
                                    <a href="category-form.html?id=3"
                                       class="btn btn-sm btn-outline-warning">Редактировать</a>
                                    <button class="btn btn-sm btn-outline-danger">Удалить</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Спорт</td>
                                <td>Спортивные товары и инвентарь</td>
                                <td><span class="badge bg-primary">0</span></td>
                                <td>
                                    <a href="category-view.html?id=4"
                                       class="btn btn-sm btn-outline-info">Просмотр</a>
                                    <a href="category-form.html?id=4"
                                       class="btn btn-sm btn-outline-warning">Редактировать</a>
                                    <button class="btn btn-sm btn-outline-danger">Удалить</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Дом и сад</td>
                                <td>Товары для дома и садоводства</td>
                                <td><span class="badge bg-primary">3</span></td>
                                <td>
                                    <a href="category-view.html?id=5"
                                       class="btn btn-sm btn-outline-info">Просмотр</a>
                                    <a href="category-form.html?id=5"
                                       class="btn btn-sm btn-outline-warning">Редактировать</a>
                                    <button class="btn btn-sm btn-outline-danger" disabled>Удалить</button>
                                </td>
                            </tr>
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
