<?php
    require_once "connectdb.php";
    $id = $_COOKIE['id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['desc']);
    $image = trim($_POST['image']);
    $rating = trim($_POST['rating']);
    $cost = trim($_POST['cost']);
    $category = trim($_POST['category']);

    $query = mysqli_query($connection, "UPDATE culinary_blog SET BlogName='$name', BlogDescription='$description', Image='$image', Rating='$rating', Cost='$cost', IDCategory='$category' WHERE IDBlogs='$id'");
    if (!empty($name) && !empty($description) && !empty($image) && !empty($rating) && !empty($cost) && !empty($category))
    {
         if ($query) {
            echo "<script>
            alert(\"Продукт успешно изменен!\"); 
            location.href='account.php'; 
            </script>";
         } else {
            echo "<script>
            alert(\"Ошибка\");
            location.href='update.php'; 
            </script>";
         }
     } else {
         echo "<script>
         alert(\"Пустые поля!\");
         location.href='update.php'; 
         </script>";  
    }
?>