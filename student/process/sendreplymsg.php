<?php
	if(isset($_POST['send'])){
		$sendTo=$_GET['sendto'];
		$from=$_GET['from'];
		$msg=$_POST['replymsg'];
	}else{
		header("location:./");
	}
	require_once('../../db_config/database.php');
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$time = date("h:i:sa");
	$date = date("Y-m-d");
	echo "$time";
	echo "$date";
	$sql = "INSERT INTO message(from_id,messages,sentTo_id,date,time) VALUES ('$from','$msg','$sendTo','$date','$time')";
	$results=mysqli_query($connection,$sql);
	echo "$sql";
if ($results) {
			header("location:../sentBox.php?ref=$from&message=message sent");		
		}else{
			$error = $connection->error;
    		header("location:../sentBox.php?err=$error");
		}
	$connection->close();

?>