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
                    <a class="nav-link active" href="/admin">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/product">Товары</a>
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
                    <li class="breadcrumb-item"><a href="/admin/product">Товары</a></li>
                    <li class="breadcrumb-item active">Новый товар</li>
                </ol>
            </nav>


            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Новый товар</h1>
                <a href="/admin/product" class="btn btn-secondary">Назад к списку</a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Заполните информацию о товаре</h5>
                        </div>
                        <div class="card-body">
                            <form id="productForm" method="POST" action="{{ route('product.store') }}"
                                  enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="productName" class="form-label">
                                        Название товара <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="productName"
                                           name="name"
                                           maxlength="20"
                                           required
                                           placeholder="Введите название товара (максимум 20 символов)">
                                    <!-- Сообщение об ошибке с сервера -->
                                    @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">
                                        Описание товара
                                    </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="productDescription"
                                              name="description"
                                              maxlength="50"
                                              rows="3"
                                              placeholder="Введите описание товара (максимум 50 символов)"></textarea>
                                    <!-- Сообщение об ошибке с сервера -->

                                </div>

                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">
                                        Цена товара <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="number"
                                               class="form-control {% if price_error %}is-invalid{% endif %}"
                                               id="productPrice"
                                               name="price"
                                               step="0.01"
                                               min="10"
                                               required
                                               placeholder="10.00">
                                        <span class="input-group-text">₽</span>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="productCategory" class="form-label">
                                        Категория <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select {% if category_error %}is-invalid{% endif %}"
                                            id="productCategory"
                                            name="category_id"
                                            required>
                                        <option value="">Выберите категорию</option>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <label for="productImage" class="form-label">
                                        Изображение товара <span class="text-danger">*</span>
                                    </label>
                                    <input type="file"
                                           class="form-control {% if image_error %}is-invalid{% endif %}"
                                           id="productImage"
                                           name="image"
                                           accept="image/jpeg"
                                           required>

                                    <div class="form-text">
                                        Только JPG, максимум 2 МБ. Будет создана миниатюра 300×300px с водяным знаком
                                        "Shop"
                                    </div>

                                    <!-- Превью изображения -->
                                    <div class="image-preview-container mt-2">
                                        <p class="mb-1">Предпросмотр:</p>
                                        <img id="imagePreview" class="image-preview" src="" alt="Превью изображения">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary"
                                            onclick="window.location.href='products.html'">Отмена
                                    </button>
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
                                <li>Название товара обязательно (макс. 20 символов)</li>
                                <li>Описание не должно превышать 50 символов</li>
                                <li>Цена должна быть не менее 10 рублей</li>
                                <li>Изображение обязательно при создании</li>
                                <li>Формат изображения: JPG, макс. 2 МБ</li>
                                <li>Изображение будет автоматически сжато до 300×300px</li>
                                <li>На изображение будет добавлен водяной знак "Shop"</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (без валидации) -->
<script src="asset('assets/bootstrap.min.js')"></script>

</body>
</html>
