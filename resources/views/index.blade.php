<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        p {
            margin: 0;
        }
        .content {
            display: flex;
            flex-direction: row;
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

    </style>
</head>
<body>
<h1>Product</h1>

<div class="content">
    @foreach($products as $product)
        <div class="item">
            <p>{{ $product->name }}</p>
            <p>Количество: {{ $product->amount }}</p>
            <p>Цена: {{ $product->cost }}р.</p>
        </div>
    @endforeach
</div>
</body>
</html>
