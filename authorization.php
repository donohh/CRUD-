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

        .blockName, .blockPassword, .blockBtn {
            display:flex;
            gap: 5px;
            padding: 5px;
            justify-content: space-between;
        }

        .blockName input, .blockPassword input {
            padding: 0.4rem;
            width: 180px;
            border: 1px solid rgba(158, 158, 158, 0.65);
            border-radius: 2px;
        }

        .blockName input::placeholder, .blockPassword input::placeholder {
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
    <title>Авторизация</title>
</head>
<body>
    <form action="authorization-db.php" method="post">
        <welcome-text style="display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; margin: 0 0 20px 0;"></welcome-text>
        <div class="blockForm">
            <div class="blockName">
                <p>Введите имя:</p>
                <input id="input" type="text" name="login" placeholder="Имя">
            </div>
            <div class="blockPassword">
                <p>Введите пароль: </p>
                <input id="input" type="password" name="password" placeholder="Пароль">
            </div>
            <div class="blockBtn">
                <button name="auth" type="submit">Войти</button>
                <button type="reset">Сброс</button>
                <button name="recovery" type="submit" href="recovery.php">Забыли пароль?</button>
            </div>
        </div>
    </form>
<script>
    class WelcomeText extends HTMLElement {
        constructor() {
            super(); 
            let welcome = "Доброе утро";
            const hour = new Date().getHours();
            if (hour > 17) {
                welcome = "Добрый вечер";
            } else if (hour > 12) {
                welcome = "Добрый день";
            }
            this.innerText= welcome;
        }
    } 
    customElements.define("welcome-text", WelcomeText);
</script>
</body>
</html>