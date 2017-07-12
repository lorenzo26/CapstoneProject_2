<?php

require_once('../../db_config/database.php');
if(isset($_POST['upstd'])){
	$stdid = $_GET['ref'];
	$firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql =  "UPDATE user_info SET firstName = '$firstname', middleName = '$middlename',  lastName = '$lastname', email = '$email', address = '$address', gender = '$gender' WHERE user_id = $stdid"
	;

    
        $results=mysqli_query($connection,$sql);
        
        if ($results) {
            header("location:../student.php?ref=list&message=ID $stdid have been Updated");        
        }else{
            $error = $connection->error;
            header("location:../student.php?ref=list&message=$error");
        }
    $connection->close();

}
?>