<?php 

	if (isset($_POST['sendemail'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];


	}else{
		header("location:./");
	}

	require_once('../db_config/database.php');
	

	if ($name==" ") {
		$name = "Anonymous";
		$sql = "INSERT INTO email(name, email, message) VALUES ('$name','$email','$message')";
		$results=mysqli_query($connection,$sql);

		if ($results) {
			header("location:../index.php ?message=message sent");		
		}else{
			$error = $connection->error;
    		header("location:../index.php?err=$error");
		}

	}else
	{
		$sql = "INSERT INTO email(name, email, message) VALUES ('$name','$email','$message')";
	$results=mysqli_query($connection,$sql);
		
		if ($results) {
			header("location:../index.php ?message=message sent");		
		}else{
			$error = $connection->error;
    		header("location:../index.php?err=$error");
		}
		}
	$connection->close();
?>
