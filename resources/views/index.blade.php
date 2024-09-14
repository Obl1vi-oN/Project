<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 0 100px;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }
        p {
            margin: 0;
        }
        .content {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 40px;
        }
        .item {
            border: 1px solid #4b5563;
            border-radius: 10px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .btn {
            text-decoration: none;
            cursor: pointer;
            color: white;
            background: #049696;
            border: 0;
            padding: 10px;
            border-radius: 6px;
            transition: all .5s;
            text-align: center;
            font-size: 20px;
        }
        .btn:hover {
            background: #036666;
        }
        /* Стили для модального окна */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            text-align: center;
            position: relative;
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            width: 40%;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .close {
            position: absolute;
            right: 10px;
            top: 5px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover, .close:focus {
            color: black;
        }
        .form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .inputs {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .input {
            border: 1px solid gray;
            padding: 10px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Каталог</h1>
    <div class="content">
        @foreach($products as $product)
            <div class="item">
                <p>{{ $product->name }}</p>
                <p>Количество: {{ $product->amount }}</p>
                <p>Цена: {{ $product->cost }}р.</p>
                <a href="/product/{{ $product->id }}" class="btn">Подробнее</a>
            </div>
        @endforeach
    </div>
    <button id="orderBtn" class="btn">Заказать</button>
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

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
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
