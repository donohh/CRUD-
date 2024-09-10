<?php
    require_once "connectdb.php"; 
    $IDRecovery = $_GET['idRecovery'];
    $IDBlocking = $_GET['idBlocking'];

    if (isset($_GET['idRecovery'])) {      
        mysqli_query($connection, "UPDATE `users` SET `Blocked?`='0' WHERE `ID` = '$IDRecovery';");   
        echo "<script>
        alert(\"Пользователь восстановлен\");
        location.href='admin-panel.php';
        </script>";
    } elseif (isset($_GET['idBlocking'])) {
        mysqli_query($connection, "UPDATE `users` SET `Blocked?`='1' WHERE `ID` = '$IDBlocking';");
        echo "<script>
        alert(\"Пользователь заблокирован\");
        location.href='admin-panel.php';
        </script>";
    }
?>