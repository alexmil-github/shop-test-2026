<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Админ-панель</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="categories.html">Категории</a>
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
                <a href="login.html" class="btn btn-outline-light btn-sm">Выйти</a>
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
                    <li class="breadcrumb-item active">Новая категория</li>
                </ol>
            </nav>

            <!-- Пример сообщения об ошибке с сервера -->
            <!--
            <div class="alert alert-danger" role="alert">
                Ошибка при сохранении категории. Проверьте введенные данные.
            </div>
            -->

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Новая категория</h1>
                <a href="categories.html" class="btn btn-secondary">Назад к списку</a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Заполните информацию о категории</h5>
                        </div>
                        <div class="card-body">
                            <form id="categoryForm" method="POST" action="#" novalidate>
                                <div class="mb-3">
                                    <label for="categoryName" class="form-label">
                                        Название категории <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control {% if name_error %}is-invalid{% endif %}"
                                           id="categoryName" name="name" maxlength="15" required value=""
                                           placeholder="Введите название категории (максимум 15 символов)">
                                    <!-- Сообщение об ошибке с сервера -->
                                <!-- {% if name_error %}
                                        <div class="invalid-feedback d-block">
{{--                                            {{ name_error }}--}}
                                    </div>
                                    {% else %}
                                    <div class="invalid-feedback">
                                        Название категории обязательно и должно содержать не более 15 символов.
                                    </div>
                                    {% endif %} -->
                                    <div class="form-text">
                                        Максимум 15 символов
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="categoryDescription" class="form-label">
                                        Описание категории
                                    </label>
                                    <textarea class="form-control {% if description_error %}is-invalid{% endif %}"
                                              id="categoryDescription" name="description" maxlength="50" rows="3"
                                              placeholder="Введите описание категории (максимум 50 символов)"></textarea>
                                    <!-- Сообщение об ошибке с сервера -->
                                <!-- {% if description_error %}
                                        <div class="invalid-feedback d-block">
{{--                                            {{ description_error }}--}}
                                    </div>
                                    {% else %}
                                    <div class="invalid-feedback">
                                        Описание не должно превышать 50 символов.
                                    </div>
                                    {% endif %} -->
                                    <div class="form-text">
                                        Необязательное поле, максимум 50 символов
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary"
                                            onclick="window.location.href='categories.html'">Отмена</button>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Правила заполнения</h5>
                        </div>
                        <div class="card-body">
                            <ul class="mb-0">
                                <li>Название категории обязательно для заполнения</li>
                                <li>Название не должно превышать 15 символов</li>
                                <li>Описание не должно превышать 50 символов</li>
                                <li>Удалить категорию можно только если в ней нет товаров</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="asset('assets/bootstrap.min.js')"></script>


</body>

</html>
