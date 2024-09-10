<?php
    require_once "connectdb.php";
    $id = getMaxUserID($connection) + 1;
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $fio = trim($_POST['fio']);
    $gender = trim($_POST['gender']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $date = trim($_POST['date']);

    if (!empty($login) && !empty($password) && !empty($fio) && !empty($gender) && !empty($email) && !empty($phone) && !empty($date)) {
        $selectQuery = "SELECT * FROM users";
        $users = mysqli_fetch_array(mysqli_query($connection, $selectQuery));
        if ($users['Email'] == $email)
        {
            echo "<script>
            alert(\"Пользователь с такой почтой уже существует\");
            location.href='registration.php';
            </script>";
        }
        else {
            $insertQuery = "INSERT INTO users(ID, Login, Password, FIO, Gender, Email, NumberOfPhone, DateOfBirth, Role) VALUES ('$id','$login','$password','$fio','$gender','$email','$phone','$date','Пользователь')";
            $query = mysqli_query($connection, $insertQuery);   
            if ($query) {
                //$query = mysqli_query($connection, "SELECT * FROM users WHERE Login='$login' AND Password='$password'");
                //$users = mysqli_fetch_array($query);
                echo "<script>
                alert(\"Регистрация успешна!\");
                location.href='account.php';        
                </script>";       
            } 
            else 
            {
                echo "<script>
                alert(\"Ошибка\");
                location.href='registration.php';
                </script>";
            }
        }
        
    } 
    else {
        echo "<script>
        alert(\"Пустые поля!\");
        location.href='registration.php';
        </script>";  
    }

    function getMaxUserID($connection) {
        $query = mysqli_query($connection, "SELECT MAX(ID) as MaxId FROM users");
        $users = mysqli_fetch_assoc($query);
        $maxUserID = $users['MaxId'];
        return $maxUserID;
    }
?>