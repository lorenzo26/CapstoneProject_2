<?php
	if(isset($_POST['newstd'])){
		$stdfirstname = $_POST['firstname'];
		$stdmiddlename = $_POST['middlename'];
		$stdlastname = $_POST['lastname'];
		$stdem = $_POST['email'];
		$stdadd = $_POST['address'];
		$gender = $_POST['gender'];
	}else{
		header("location:./");
	}

	require_once('../../db_config/database.php');
		$regdate = date('jS \ F Y h:i:s A');
		$stdno = rand(100000,999999).'';
		$password = 123456;
		$role = "Student";
		
		$sql = "INSERT INTO user_info(user_id, lastName, firstName, middleName, gender, email, address, role, password, regdate) VALUES ('$stdno','$stdlastname','$stdfirstname','$stdmiddlename','$gender','$stdem','$stdadd','$role','$password','$regdate')";

		$results=mysqli_query($connection,$sql);
		
		if ($results) {
			header("location:../registerstudent.php ?message=$stdname have been registered with ID $stdno");		
		}else{
			$error = $connection->error;
    		header("location:../registerstudent.php?err=$error");
		}
	$connection->close();

?>