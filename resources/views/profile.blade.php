@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>

</head>
<body>
<div class="container">
    <div>
        <form action="{{ route('logout') }}" method="post" class="profile-form">
            @csrf
            @method('post')
            <h1>Профиль</h1>
            <button type="submit" class="btn">Выйти</button>
        </form>
    </div>

    <div class="profile-content">
        <p>Имя: {{Auth::user()->first_name}}</p>
        <p>Фамилия: {{Auth::user()->last_name}}</p>
        <p>Почта: {{Auth::user()->email}}</p>
    </div>
    <h1>История заказов</h1>
    <div class="history-content">
        <ul>
            @foreach($show as $shows)
                <li>
                    <p>Статус: </p>
                    <p>Название: {{$shows->product->name}}</p>
                    <p>Количество: {{$shows->quantity}}</p>
                    <p>Сумма: {{$shows->total_cost}}</p>
                </li>
            @endforeach

        </ul>
    </div>
</div>
</body>
</html>

@endsection
