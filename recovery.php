<?php
    $id = $_COOKIE['UserID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Восстановление пароля</title>
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

        .form-input {
            display: flex;
            width: 100%;
            height: 25px;
            flex-direction: row;
            justify-content: left;
            gap: 2.5%;
        }

        a {
            display: flex;
            background: #3740ff;
            color: #fff;
            width: 100px;
            height: 25px;
            text-decoration: none;
            justify-content: center;
        }
    </style>
</head>
<body>
    <form action="send.php" method="get">
        <h1>Восстановление пароля</h1>
        <div class="form-input">
            <input type="email" placeholder="Введите вашу почту">
            <a type="submit" href="send.php?id=<?=$id?>">Отправить</a>
        </div>
        
    </form>
</body>
</html>