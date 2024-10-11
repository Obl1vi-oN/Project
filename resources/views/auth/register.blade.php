<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-container {
            margin: 0 auto;
            width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        form div {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        input {
            border: 1px solid #1a202c;
            border-radius: 10px;
            padding: 10px;
        }
        button {
            cursor: pointer;
            padding: 10px;
            background-color: #049696;
            color: white;
            border: none;
            width: 100%;
            border-radius: 10px;
            transition: all .5s;
        }
        button:hover {
            background-color: #1a202c;
        }
        div a {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Регистрация</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Поле для имени пользователя -->
        <div>
            <label for="username">Имя пользователя</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
        </div>

        <!-- Поле для имени -->
        <div>
            <label for="first_name">Имя</label>
            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
        </div>

        <!-- Поле для Фамилии -->
        <div>
            <label for="last_name">Фамилия</label>
            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required autofocus>
        </div>

        <!-- Поле для email -->
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <!-- Поле для пароля -->
        <div>
            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" required>
        </div>

        <!-- Подтверждение пароля -->
        <div>
            <label for="password_confirmation">Подтвердите пароль</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Зарегистрироваться</button>
            <a href="{{ route('login') }}" class="btn">Или войти</a>
        </div>
    </form>
</div>
</body>
</html>
