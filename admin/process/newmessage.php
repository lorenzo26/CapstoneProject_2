<?php
	if(isset($_POST['send'])){
		$sendTo=$_GET['sendto'];
		$from=$_GET['from'];
		$msg=$_POST['replymsg'];
	}else{
		header("location:./");
	}
	require_once('../../db_config/database.php');
	$sql = "INSERT INTO message(from_id,messages,sentTo_id) VALUES ('$from','$msg','$sendTo')";
	$results=mysqli_query($connection,$sql);
if ($results) {
			header("location:../sentBox.php?ref=$from&message=message sent");		
		}else{
			$error = $connection->error;
    		header("location:../sentBox.php?err=$error");
		}
	$connection->close();

?>
