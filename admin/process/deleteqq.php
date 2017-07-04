<?php
	$q_id = $_GET['ref'];

	require_once('../../db_config/database.php');		
		
		$sql = "UPDATE questions SET quiz= '' WHERE question_id ='$q_id'";

		$results=mysqli_query($connection,$sql);
		
		if ($results) {
			header("location:../quiz.php ?message=$q_id have been deleted in Quiz Questions");		
		}else{
			$error = $connection->error;
    		header("location:../quiz.php?err=$error");
		}
	$connection->close();

?>