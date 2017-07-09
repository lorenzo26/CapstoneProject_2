<?php 



if(@$_GET['q']== 'addquiz') {
$title = $_POST['name'];
$title= ucwords(strtolower($title));
$numque = $_POST['total'];
$create_id=rand();
require_once('../../db_config/database.php');
$sql ="INSERT INTO createact (create_id, title, numque,status) VALUES  ('$create_id','$title' , '$numque', 'locked')";
$result = mysqli_query($connection,$sql);

if ($result) {
	echo "$sql";
header("location:../create.php?q=4&step=2&eid=$create_id&n=$numque");
}else{
	$error = $connection->error;
	
}


}

?>