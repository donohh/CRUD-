<?php
    require_once "connectdb.php"; 
    $queryCategories = mysqli_query($connection, "SELECT * FROM `categories`");    
    $categories = mysqli_fetch_all($queryCategories);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление</title>
    <style>
        :root {
            --tangerine-color: rgba(244, 142, 40, 1);
            --white-color: rgba(255, 255, 255, 1);
            --black-color: rgba(0, 0, 0, 1);
            --gray-color: rgba(182, 182, 182, 1);        
            --light-tangerine-color: rgba(245, 221, 196, 1);   
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 550px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid rgba(158, 158, 158, 0.25);
            border-radius: 2px;
            box-shadow: 0 0 0.2rem 0.2rem rgba(158, 158, 158, 0.25);
        }

        .update-input {       
            display: flex;     
            width: 475px;
            flex-direction: column;
        }

        .update-input input, select {
            width: 100%;
            height: 40px;
        }

        .update-input p {
            margin: 10px 0 10px 0;
        }
    </style>
</head>
<body>
    <form action="add-db.php" method="post">
        <h1>Добавление продукта</h1>
        <div class="update-input">
            <p>Название <input name="name" type="text"></p>
            <p>Описание <input name="desc" type="text"></p>
            <p>Фото <input name="image" type="file"></p>
            <p>Рейтинг <input name="rating" type="number"></p>
            <p>Цена <input name="cost" type="number"></p>
            <p>Категория <select name="category" class="form-control">
                <?php
                    foreach ($categories as $category) {
                        ?>
                            <option name="category" value="<?=$category[0]?>"><?=$category[1]?></option>
                        <?php
                    }
                ?>
            </select></p>         
        </div>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>