<?php 
require_once('../../db_config/database.php');



if(isset($_POST['unlock'])){
	$id=$_GET['ref'];
    $sql =  "UPDATE createact SET status = 'unlocked' Where create_id = $id";
    mysqli_query($connection, $sql);
	$show = "SELECT * from createact Where create_id = $id";
    $showresult=mysqli_query($connection, $show);
    if ($showresult->num_rows > 0) {
        while($row = $showresult->fetch_assoc()) {
        	$title = $row['title'];
        }
     }
    header("location:../list.php?ref=list&message=$title have been locked");
}

if (isset($_POST['lock'])) {
	$id=$_GET['ref'];
	 $sql =  "UPDATE createact SET status = 'locked' Where create_id = $id";
    mysqli_query($connection, $sql);
    $show = "SELECT * from createact Where create_id = $id";
    $showresult=mysqli_query($connection, $show);
    if ($showresult->num_rows > 0) {
        while($row = $showresult->fetch_assoc()) {
        	$title = $row['title'];
        }
     }
    header("location:../list.php?ref=list&message=$title have been locked");
}

if (isset($_POST['delete'])) {
	$cid = $_GET['cid'];
	$qid = $_GET['qid'];
	$show = "SELECT * from questions Where question_id = $qid and create_id = $cid";
    $showresult=mysqli_query($connection, $show);
    if ($showresult->num_rows > 0) {
        while($row = $showresult->fetch_assoc()) {
        	$question = $row['question'];

        }
     }
	$del = "DELETE FROM questions Where question_id = $qid and create_id = $cid";
	 mysqli_query($connection, $del);
     foreach($connection->query("SELECT COUNT(question) FROM questions where create_id = '$cid'") as $row){
      $count = $row['COUNT(question)'] ;
    }
    
    $sql2 = "UPDATE createact set numque = $count WHERE create_id = '$cid'";
$results = mysqli_query($connection,$sql2);
    header("location:../list.php?ref=edit&id=$cid&message=$question have been deleted");
}




?>