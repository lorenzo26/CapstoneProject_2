<?php 
require_once('../../db_config/database.php');



if(isset($_POST['unlock'])){
	$id=$_GET['ref'];
    $sql =  "UPDATE createact SET status = 'unlocked' Where create_id = $id";
    mysqli_query($connection, $sql);
header("location:../list.php?ref=list");
}elseif (isset($_POST['lock'])) {
	 $sql2 =  "UPDATE createact SET status = 'locked' Where create_id = $id";
    mysqli_query($connection, $sql2);
    header("location:../list.php?ref=list");
}

if (isset($_POST['delete'])) {
	$cid = $_GET['cid'];
	$qid = $_GET['qid'];
	$del = "DELETE FROM questions Where question_id = $qid and create_id = $cid";
	 mysqli_query($connection, $del);
	 echo "$del";
	 header("location:../list.php?ref=edit&id=$cid");
}




?>