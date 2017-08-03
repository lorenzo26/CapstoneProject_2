<?php
if(isset($_POST['uplogo'])) {
	$id = $_GET['ref'];
	$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
}else{
	header("location:.././");
}

require_once('../../db_config/database.php');

	$sql = "UPDATE user_info SET avatar='$image' where user_id ='$id'";

if ($connection->query($sql) === TRUE) {
    header("location:.././?ref=$id&message=Profile Picture have been updated");
} else {
	$error = $connection->error;
   header("location:.././?message=$error");
}

$connection->close();
?>