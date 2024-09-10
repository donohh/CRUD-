<?php
   require_once "connectdb.php"; 
   $IDBlogs = $_GET['id'];
   $query = mysqli_query($connection, "DELETE FROM `culinary_blog` WHERE `IDBlogs`='$IDBlogs'");
   if ($query) {
      echo "<script>
      alert(\"Продукт успешно удален!\");  
      location.href='account.php';
      </script>";
   } else {
      echo "<script>
      alert(\"Ошибка\");
      location.href='account.php';
      </script>";
   }
?>