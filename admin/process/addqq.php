<?php
	$q_id = $_GET['ref'];

	require_once('../../db_config/database.php');		
		
		$sql = "UPDATE questions SET quiz= 'checked' WHERE question_id ='$q_id'";

		$results=mysqli_query($connection,$sql);
		
		if ($results) {
			header("location:../addquizquestions.php ?message=$q_id have been add in Quiz Questions");		
		}else{
			$error = $connection->error;
    		header("location:../addquizquestions.php?err=$error");
		}
	$connection->close();

?>