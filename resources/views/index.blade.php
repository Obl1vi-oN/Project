@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
</head>
<body>
<div class="container">
    <h1>Каталог</h1>
    <div class="catalog-content">
        @foreach($products as $product)
            <div class="item">
                <h3>{{ $product->name }}</h3>
                <p>Количество: {{ $product->amount }}</p>
                <p>Цена: {{ $product->cost }}р.</p>
                <a href="/product/{{ $product->id }}" class="btn">Подробнее</a>
            </div>
        @endforeach
    </div>
    <div class="order-btn">
        <button id="orderBtn" class="btn order-btn">Заказать</button>
    </div>
</div>

<!-- Модальное окно для выбора количества товаров -->
<div id="orderModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Оформление заказа</h2>
        <form class="form" id="orderForm" action="/order" method="POST">
            @csrf
            <div class="inputs">
                <label for="product">Выберите товар:</label>
                <select name="product_id" id="product" class="input">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->cost }}р.</option>
                    @endforeach
                </select>
            </div>
            <div class="inputs">
                <label for="quantity">Количество:</label>
                <input type="number" name="quantity" id="quantity" class="input" min="1" required>
            </div>

            <button type="submit" class="btn">Подтвердить заказ</button>
        </form>
    </div>
</div>

@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

<script>
    const modal = document.getElementById("orderModal");
    const btn = document.getElementById("orderBtn");
    const span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>

@endsection
