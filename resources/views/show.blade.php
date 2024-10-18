@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
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
