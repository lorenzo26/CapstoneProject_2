<?php 
require_once('../../db_config/database.php');
$id=$_GET['ref'];


if(isset($_POST['unlock'])){
    $sql =  "UPDATE createact SET status = 'unlocked' Where create_id = $id";
    mysqli_query($connection, $sql);
// header("location:../list.php");
}

if (isset($_POST['lock'])) {
	 $sql2 =  "UPDATE createact SET status = 'locked' Where create_id = $id";
    mysqli_query($connection, $sql2);
    // header("location:../list.php");
}




?>