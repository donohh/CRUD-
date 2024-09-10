<?php
    require_once "connectdb.php"; 
    $UserID = $_GET['id'];
    $newPassword = generatePassword();
    if(mail("examplephptask@gmail.com", "Заявка на восстановление пароля", "Новый пароль - `$newPassword`", "Заголовок сообщения")) {
        mysqli_query($connection, "UPDATE `users` SET `Password`='$newPassword' WHERE `ID`='$UserID';");
        echo "<script>alert(\"Ссылка на восстановление пароля отправлена\");
        location.href='recovery.php';
        </script>";
    }
 
    function generatePassword($length = 20) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $count = mb_strlen($chars);

        for ($i = 0, $password = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $password .= mb_substr($chars, $index, 1);
        }
        return $password;
    }
?>