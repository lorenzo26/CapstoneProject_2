<?php
	$q_id = $_GET['ref'];

	require_once('../../db_config/database.php');		
		
		$sql = "UPDATE questions SET exam= 'checked' WHERE question_id ='$q_id'";

		$results=mysqli_query($connection,$sql);
		
		if ($results) {
			header("location:../addexamquestions.php ?message=$q_id have been add in Exam Questions");		
		}else{
			$error = $connection->error;
    		header("location:../addexamquestions.php?err=$error");
		}
	$connection->close();

?>