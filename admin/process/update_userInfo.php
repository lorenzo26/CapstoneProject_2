<?php
if (isset($_POST['upschool'])) {
	$id = $_GET['ref'];
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$middlename  = $_POST['middlename'];
	$address  = $_POST['address'];
	$email = $_POST['email'];
	$newpass = $_POST['newpass'];
	$conpass = $_POST['conpass'];
	require_once('../../db_config/database.php');

	
		if ($newpass!=$conpass) {
			echo "Password not Match";
		}else{
			
			$sql = "UPDATE user_info SET lastName = '$lastname', firstName = '$firstname', lastName = '$lastname', address = '$address', email = '$email', password = '$newpass' where user_id = $id";
			$result = mysqli_query($connection,$sql);
			header("location:../profile.php?ref=$id");

		}
    }



?>