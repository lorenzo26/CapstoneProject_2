<?php 
include('../../db_config/database.php');
$sql = "UPDATE email SET unread_email = 0";
mysqli_query($connection,$sql);
header("location:../email.php")

?>