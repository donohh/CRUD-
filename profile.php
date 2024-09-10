<?php
    require_once "connectdb.php";
    $IDUser = $_COOKIE['ID'];
    $query = mysqli_query($connection, "SELECT * FROM users WHERE ID='$IDUser'");
    $users = mysqli_fetch_array($query);  
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

        .admin h1 {
            margin-bottom: none;
            text-align: left;
        }

        .admin button {
            margin-top: 1.5rem;
            background: #3740ff;
            color: #fff;
            width: 200px;
            height: 35px;
            border-radius: 2px;
            border: none;
        }

        .blockLogin, .blockPassword, .blockFIO, .blockEmail, .blockPhone, .blockDateOfBirth .blockBtn{
            display:flex;
            gap: 5px;
            padding: 5px;
            justify-content: space-between;
        }

        .blockLogin input, .blockPassword input, .blockFIO input, .blockEmail input, .blockPhone input, .blockDateOfBirth input {
            padding: 0.4rem;
            width: 180px;
            border: 1px solid rgba(158, 158, 158, 0.65);
            border-radius: 2px;
        }

        .blockLogin input::placeholder, .blockPassword input::placeholder, .blockFIO input::placeholder, .blockEmail input::placeholder, .blockPhone input::placeholder, .blockDateOfBirth input::placeholder {
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
    <title>Профиль</title>
</head>
<body>
    <form action="authorization.php" method="post">
        <h1>Данные пользователя</h1>
        <div class="blockForm">
            <div class="blockLogin">
                <p>Логин: </p>
                <input type="text" id="input" name="login" placeholder="Логин" value="<?=$users['Login']?>" title="Пожалуйста, введите свой логин">
            </div>
            <div class="blockPassword">
                <p>Пароль: </p>
                <input type="text" id="input" name="password" placeholder="Пароль" value="<?=$users['Password']?>" title="Пожалуйста, введите свой пароль">
            </div>
            <div class="blockFIO">
                <p>ФИО: </p>
                <input type="text" id="input" name="fio" placeholder="ФИО" value="<?=$users['FIO']?>" title="Пожалуйста, введите свое ФИО">
            </div>
            <div class="blockEmail">
                <p>Эл. почта: </p>
                <input type="email" id="input" name="email" placeholder="Эл. почта" value="<?=$users['Email']?>" title="Пожалуйста, введите свою электронную почту">
            </div>
            <div class="blockPhone">
                <p>Номер: </p>
                <input type="number" id="input" name="phone" placeholder="Номер телефона" value="<?=$users['NumberOfPhone']?>" title="Пожалуйста, введите свой номер телефона">
            </div>
            <div class="blockDateOfBirth">
                <p>Дата рождения: </p>
                <input type="date" id="input" name="dateofbirth" placeholder="Дата рождения" value="<?=$users['DateOfBirth']?>" title="Пожалуйста, введите свою дату рождения">
            </div>
            <div class="blockBtn">            
                <button onclick=deleteCookie()>Выйти</button>
                <button onclick=deleteAccount()>Удалить аккаунт</button>
            </div>
        </div>
    </form>
    <?php
        if ($users['Role'] == 'Администратор') {
            ?>
            <form class="admin" action="admin-panel.php" method="post">
                <h1>Для сотрудников</h1>
                <button type="submit">Панель администратора</button>
            </form>
            <?php
        }
    ?>
    
<script>
    function deleteCookie() {
        unset($_COOKIE['ID']);
        setcookie("ID", null, -1, '/');
        location.href='authorization.php';
    }

    function deleteAccount() {
        let result = confirm("Удалить аккаунт?");
        if (result) {         
            mysqli_query($connection, "DELETE FROM `users` WHERE `ID`='$IDUser'");
            alert("Аккаунт успешно удален");
            location.href='authorization.php';
        } else {
            return;
        }
    }
</script>
</body>
</html>