<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
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
    <h2>Вход</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Поле для email -->
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <!-- Поле для пароля -->
        <div>
            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" required>
        </div>

        <!-- Кнопка входа -->
        <div>
            <button type="submit">Войти</button>
            <a href="{{ route('register') }}" class="btn">Или зарегистрироваться</a>
        </div>
    </form>
</div>
</body>
</html>
