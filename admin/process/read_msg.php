<?php 
include('../../db_config/database.php');
$id = $_GET['id'];
$sql = "UPDATE message SET unread_msg = 0 Where sentTo_id = '$id'";
mysqli_query($connection,$sql);
header("location:../messages.php?ref=inbox&id=$id")

?>