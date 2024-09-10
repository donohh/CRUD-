<?php
    require_once "connectdb.php";
    $queryUsers = mysqli_query($connection, "SELECT * FROM users WHERE Role='Пользователь'");
    $users = mysqli_fetch_all($queryUsers);  
    $queryBlogs = mysqli_query($connection, "SELECT * FROM culinary_blog");
    $itemsBlogs = mysqli_fetch_all($queryBlogs);
    $queryCategories = mysqli_query($connection, "SELECT * FROM categories");
    $itemsCategories = mysqli_fetch_all($queryCategories);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
    body {
        font-family: "Montserrat", sans-serif;
        background-color: var(--white-color);
    }

    a {
        display: flex;
        width: 130px;
        height: 30px;
        text-decoration: none;
        color: white;
        background-color: gray;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
    }

    table {
        border-collapse: collapse;
        margin: 0;
        border: 1px solid black;
    }

    table tr {
        height: 40px;   
        padding: .45rem;
    }

    table tr:nth-child(even) {
        background-color: #eaeaea;
    }

    thead tr, th {
        background-color: black;
        height: 40px;
        color: white;
        text-align: left;
        font-weight: 500;
    }

    .blogs {
        margin-top: 50px;
    }

    .categories {
        margin-top: 50px;
    }

    header {
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        padding: 5px;
        background-color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-box {
        display: flex;
        flex-direction: row;
        gap: 5px;
    }
</style>
</head>
<body>
    <header>
        <div class="btn-box">
            <a href="authorization.php">Выйти</a>
            <a href="account.php">Каталог</a>
            <a href="profile.php">Профиль</a>
        </div>   
    </header>

    <form action="admin-panel-db.php" method="get">
        <div class="users" id="users">
            <table>
                <tr>
                    <th>Идентификатор</th>
                    <th>Логин</th>
                    <th>Пароль</th>
                    <th>ФИО</th>
                    <th>Пол</th>
                    <th>Эл. почта</th>
                    <th>Номер телефона</th>
                    <th>Дата рождения</th>
                    <th>Роль</th>
                    <th>Статус</th>
                </tr>
                <?php foreach ($users as $user):?>             
                    <tr>
                        <td><?=$user[0]?></td>
                        <td><?=$user[1]?></td>
                        <td><?=$user[2]?></td>
                        <td><?=$user[3]?></td>
                        <td><?=$user[4]?></td>
                        <td><?=$user[5]?></td>
                        <td><?=$user[6]?></td>
                        <td><?=$user[7]?></td>
                        <td><?=$user[8]?></td>
                        <?php            
                            if ($user[9] == 0) {
                                ?> 
                                    <td><a style="width: 150px; background-color: transparent; color: red; border: 2px solid red;" name="blocking" href="admin-panel-db.php?idBlocking=<?=$user[0]?>" type="submit">Заблокировать</a></td>  
                                <?php
                            } elseif ($user[9] == 1) {
                                ?>
                                    <td><a style="width: 150px; background-color: transparent; color: mediumseagreen; border: 2px solid mediumseagreen;" name="recovery" href="admin-panel-db.php?idRecovery=<?=$user[0]?>" type="submit">Восстановить</a></td>;  
                                <?php                                                   
                            }                   
                        ?>     
                    </tr>
                <?endforeach;?>
            </table>
        </div>
    </form>

    <div class="blogs">
        <table>
            <tr>
                <th>Идентификатор</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Картинка</th>
                <th>Рейтинг</th>
                <th>Цена</th>
            </tr>
            <?php 
                foreach ($itemsBlogs as $item) {
                    ?>
                    <tr>
                        <td><?= $item[0]?></td>
                        <td><?= $item[1]?></td>
                        <td><?= $item[2]?></td>
                        <td><?= $item[3]?></td>
                        <td><?= $item[4]?></td>
                        <td><?= $item[5]?> рублей</td>
                    </tr>
                    <?php
                }        
            ?>
        </table>
    </div>

    <div class="categories">
        <table>
            <tr>
                <th>Идентификатор</th>
                <th>Название</th>
            </tr>
            <?php 
                foreach ($itemsCategories as $item) {
                    ?>
                    <tr>
                        <td><?= $item[0]?></td>
                        <td><?= $item[1]?></td>
                    </tr>
                    <?php
                }        
            ?>
        </table>
    </div>
<script>
    let isShow = false;
    var containerUsers = document.getElementById("users");
    var containerBlogs = document.getElementById("blogs");

    var styleDisplayUsers = getComputedStyle(containerUsers).display;
    var styleDisplayBlogs = getComputedStyle(containerBlogs).display;

    // function actionUsers() {
    //     if (styleDisplayUsers == 'none') {
    //         isShow = true;
    //         containerUsers.style.display = 'block';
    //     } else if (styleDisplayUsers == 'block') {
    //         isShow = false;
    //         containerUsers.style.display = 'none';
    //     } 
    // }     
    
    // function actionBlogs() {
    //     if (styleDisplayBlogs == 'none') {
    //         isShow = true;
    //         containerBlogs.style.display = 'block';
    //     } else {
    //         isShow = false;
    //         containerBlogs.style.display = 'none';
    //     }
    // }  
</script>
</body>
</html>