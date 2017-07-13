<?php 
 require_once('../../db_config/database.php');
 
	$stdid = $_GET['ref'];
	$sql =  "delete from user_info where user_id = $stdid"; 
	$results=mysqli_query($connection,$sql);
	echo "$sql";
	if ($results) {
		// header("location:../student.php?ref=list&message=ID $stdid have been Deleted");        
	}else{
		$error = $connection->error;
		// header("location:../student.php?ref=list&message$error");
	}
		$connection->close();
		     

?>