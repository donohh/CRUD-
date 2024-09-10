<?php
    require_once "connectdb.php"; 
    $id = getMaxBlogID($connection) + 1;
    $name = trim($_POST['name']);
    $desc = trim($_POST['desc']);
    $image = trim($_POST['image']);
    $rating = trim($_POST['rating']);
    $cost = trim($_POST['cost']);
    $category = trim($_POST['category']);

    if (!empty($name) && !empty($desc) && !empty($image) && !empty($rating) && !empty($cost) && !empty($category)) 
    {
        $insertQuery = "INSERT INTO culinary_blog(IDBlogs, BlogName, BlogDescription, Image, Rating, Cost, IDCategory) VALUES ('$id', '$name', '$desc', '$image', '$rating', '$cost', '$category')";
        $query = mysqli_query($connection, $insertQuery);
        if ($query) 
        {
            echo "<script>
            alert(\"Продукт успешно добавлен\");
            location.href='account.php';        
            </script>";       
        } 
        else 
        {
            echo "<script>
            alert(\"Ошибка\");
            location.href='add.php';       
            </script>";       
        }     
    } 
    else 
    {
        echo "<script>
        alert(\"Поля пустые\");
        location.href='add.php';
        </script>";
    }

    function getMaxBlogID($connection) {
        $query = mysqli_query($connection, "SELECT MAX(`IDBlogs`) as `MaxId` FROM `culinary_blog`");
        $blogs = mysqli_fetch_assoc($query);
        $maxBlogID = $blogs['MaxId'];
        return $maxBlogID;
    }
?>