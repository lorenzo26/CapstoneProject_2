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
	$time = date("H:i:sa");
	$date = date("Y-m-d");
	echo "$time";
	echo "$date";
	$sql = "INSERT INTO message(from_id,messages,sentTo_id,date,time,unread_msg) VALUES ('$from','$msg','$sendTo','$date','$time','1')";
	$results=mysqli_query($connection,$sql);
	echo "$sql";
if ($results) {
			header("location:../messages.php?ref=sentbox&id=$from&message=message sent");		
		}else{
			$error = $connection->error;
    		header("location:../messages.php?err=$error");
		}
	$connection->close();

?>
