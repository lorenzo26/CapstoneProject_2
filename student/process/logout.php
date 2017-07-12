<?php

$name = $_GET['ref'];
	 require_once('../../db_config/database.php');
	  $sql = "UPDATE `user_info` SET `online`= 0 WHERE user_id = $name";
            mysqli_query($connection,$sql);
               echo "$sql";
	session_start();
	$_SESSION['loggedin'] = false;
	session_destroy();
	$myuser = $_SESSION['username'];
	header("location:../../");
?>
