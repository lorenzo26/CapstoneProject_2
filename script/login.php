<?php
    $my_username = $_POST['username'];
    $my_password = $_POST['password'];

    if (isset($_POST['signin'])) {
        require_once('../db_config/database.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user_info WHERE user_id = $username and password = '$password'";
        $result = mysqli_query($connection, $sql);
        
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
            extract($row);
            $user_role = $row['role'];
            $firstname = $row['firstName'];


        if ($user_role == "Admin") {
            setcookie(loggedin, date("F jS - g:i a"), 360);
            session_start();           
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['firstName'] = $firstName;
            $sql = "UPDATE `user_info` SET `online`= 1 WHERE user_id = $username";
            mysqli_query($connection,$sql);
            header("location:../admin/./");
         
         }else{
            setcookie(loggedin, date("F jS - g:i a"), 360);
            session_start();           
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['firstName'] = $firstName;
            $sql = "UPDATE `user_info` SET `online`= 1 WHERE user_id = $username";
            mysqli_query($connection,$sql);
            header("location:../student/./?ref=$username");
         }
            }
        
        }else {
        
       header("location:../index.php?login_err=Account not found in database");

        }
    }

    $connection->close();

?>