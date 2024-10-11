@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <style>
        .container {
            margin: 0 100px;
        }
        .product-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
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
        }
        .btn:hover {
            background: #036666;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="product-container">
        <h1>{{ $product->name }}</h1>
        <p>Количество: {{ $product->amount }}</p>
        <p>Цена: {{ $product->cost }}р.</p>
    </div>
    <div class="back-btn">
        <a href="/products" class="btn">Назад к каталогу</a>
    </div>
</div>
</body>
</html>

@endsection
