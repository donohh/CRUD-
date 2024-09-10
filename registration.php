<?php
    require_once "connectdb.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: system-ui, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
        }

        form {
            width: 350px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid rgba(158, 158, 158, 0.25);
            border-radius: 2px;
            box-shadow: 0 0 0.2rem 0.2rem rgba(158, 158, 158, 0.25);
        }

        form h1 {
            margin-bottom: 1rem;
            text-align: center;
        }

        .blockName, .blockPassword, .blockFIO, .blockGender, .blockEmail, .blockPhone, .blockDate, .blockBtn{
            display:flex;
            gap: 5px;
            padding: 5px;
            justify-content: space-between;
        }

        .blockName input, .blockPassword input, .blockFIO input, .blockEmail input, .blockPhone input {
            padding: 0.4rem;
            width: 180px;
            border: 1px solid rgba(158, 158, 158, 0.65);
            border-radius: 2px;
        }

        .blockName input::placeholder, .blockPassword input::placeholder, .blockFIO input::placeholder, .blockEmail input::placeholder, .blockPhone input::placeholder {
            color: rgba(158, 158, 158, 0.55);
        }

        button {
            margin-top: 1.5rem;
            background: #3740ff;
            color: #fff;
            width: 200px;
            height: 25px;
            border-radius: 2px;
            border: none;
        }

        button:hover,
        button:focus {
            background: #272eb5
        }
    </style>
    <title>Регистрация</title>
</head>
<body>
    <form action="registration-db.php" method="post">
        <h1>Регистрация</h1>
        <div class="blockForm">
            <div class="blockName">
                <p>Введите имя:</p>
                <input type="text" name="login" placeholder="Имя">
            </div>
            <div class="blockPassword">
                <p>Введите пароль:</p>
                <input type="password" name="password" placeholder="Пароль">
            </div>
            <div class="blockFIO">
                <p>Введите ФИО:</p>
                <input type="text" name="fio" placeholder="ФИО">
            </div>
            <div class="blockGender">
                <label>Выберите пол:</label>
                <input name="gender" type="radio" value="Мужской">
                <label>Мужской</label>
                <input name="gender" type="radio" value="Женский">
                <label>Женский</label>
            </div>
            <div class="blockEmail">
                <p>Введите почту:</p>
                <input type="email" name="email" placeholder="Эл. почта">
            </div>
            <div class="blockPhone">
                <p>Введите телефон:</p>
                <input type="text" name="phone" placeholder="Введите номер телефона">
            </div>
            <div class="blockDate">
                <p>Выберите дату рождения:</p>
                <input type="date" name="date">
            </div>
            <div class="blockBtn">
                <button type="submit">Создать аккаунт</button>
                <button type="reset">Сброс</button>
            </div>
        </div>
    </form>
</body>
</html>