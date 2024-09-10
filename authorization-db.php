<?php
    require_once "connectdb.php";
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    
    if (isset($_POST['auth'])) {
        if (!empty($login) && !empty($password)) {
            $query = mysqli_query($connection, "SELECT * FROM users WHERE Login='$login' && Password='$password'");
            $users = mysqli_fetch_array($query);
            $usersID = $users['ID'];
            $usersBlocked = $users['Blocked?']; 
            if (!empty($users) && $usersBlocked != '1') {
                setcookie("ID", $usersID, time()+3600, "/");
                echo "<script>
                alert(\"Добро пожаловать!\");
                location.href='account.php';
                </script>";
            } elseif ($usersBlocked == '1') {
                echo "<script>
                alert(\"Данный пользователь заблокирован!\");
                location.href='authorization.php';
                </script>";
            } else {
                echo "<script>
                alert(\"Пользователь не найден!\");
                location.href='authorization.php';
                </script>";
            }
        } 
        else {
            echo "<script>
            alert(\"Пустые поля!\");
            location.href='authorization.php';
            </script>";  
        }
    }

    elseif (isset($_POST['recovery'])) {
        $query = mysqli_query($connection, "SELECT * FROM users WHERE Login='$login'");
        $users = mysqli_fetch_array($query);
        setcookie("UserID", $users['ID'], time()+3600, "/");
        echo "<script>
        location.href='recovery.php';
        </script>"; 
    }
?>