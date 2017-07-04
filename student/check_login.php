<?php 
session_start();
$current_user = $_SESSION['firstName'];
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['username'];

   require_once('../db_config/database.php');

$sql = "SELECT * FROM user_info where user_id='$myusername' or email='$myusername' and role='Admin'";
$result = mysqli_query($connection,$sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $current_user_id = $row['user_id'];
    }
} else {
       header("../?login_err=You must be Administrator");
}
$connection->close();

} else {
    header("location:../?login_err=You must login first");
}


?>