<?php
	$q_id = $_GET['ref'];

	require_once('../../db_config/database.php');		
		
		$sql = "UPDATE questions SET exam= '' WHERE question_id ='$q_id'";

		$results=mysqli_query($connection,$sql);
		
		if ($results) {
			header("location:../exam.php ?message=$q_id have been deleted in Exam Questions");		
		}else{
			$error = $connection->error;
    		header("location:../exam.php?err=$error");
		}
	$connection->close();

?>