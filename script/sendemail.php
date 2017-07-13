<?php 

	if (isset($_POST['sendemail'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];


	}else{
		header("location:./");
	}

	require_once('../db_config/database.php');
	

	if ($name== '') {
		
		$sql = "INSERT INTO email(name, email, message,unread_email) VALUES ('Anonymous','$email','$message','1')";
		$results=mysqli_query($connection,$sql);

		if ($results) {
			header("location:.././?message=message sent");		
		}else{
			$error = $connection->error;
    		header("location:.././?err=$error");
		}

	}else{
		$sql = "INSERT INTO email(name, email, message,unread_email) VALUES ('$name','$email','$message','1')";
	$results=mysqli_query($connection,$sql);
		
		if ($results) {
			header("location:.././?message=message sent");		
		}else{
			$error = $connection->error;
    		header("location:.././?err=$error");
		}
		}
	$connection->close();
?>
