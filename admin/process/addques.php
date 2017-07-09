<?php 


require_once('../../db_config/database.php');


if(isset($_POST['addq'])){

	$id = $_GET['eid'];
$n=(int)@$_GET['n'];

for($i=1;$i<=$n;$i++) {
	$question = $_POST['question'.$i];
	$option1 = $_POST['option1'.$i];
	$option2 = $_POST['option2'.$i];
	$option3 =$_POST['option3'.$i];
	$option4 = $_POST['option4'.$i];
	$answer = $_POST['answer'.$i];
	$qid=rand(10000,99999).'';

$sql = "INSERT INTO questions(question_id, question, option1, option2, option3, option4, answer, create_id) VALUES ('$qid','$question','$option1','$option2','$option3','$option4','$answer','$id')";
$result = mysqli_query($connection,$sql);

 }
 if ($result) {
	echo "$sql";
header("location:../list.php?ref=list");
}else{
	$error = $connection->error;
}
 


}

if(isset($_POST['editq'])){
	  $cid = $_GET['cid'];
$qid = $_GET['qid'];
	$question = $_POST['question'];
	$option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
	$option3 =$_POST['option3'];
	$option4 = $_POST['option4'];
	$answer = $_POST['answer'];

	$sql = "UPDATE questions SET question='$question', option1='$option1', option2='$option2', option3='$option3', option4='$option4', answer='$answer' WHERE  question_id = $qid and create_id = $cid" ;
 mysqli_query($connection,$sql);
 echo "$sql";
 header("location:../list.php?ref=edit&id=$cid");
}


if(isset($_POST['addque'])){
	$cid = $_GET['cid'];

	$question = $_POST['question'];
	$option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
	$option3 =$_POST['option3'];
	$option4 = $_POST['option4'];
	$answer = $_POST['answer'];
	$qid=rand(10000,99999).'';



$sql = "INSERT INTO questions(question_id, question, option1, option2, option3, option4, answer,create_id) VALUES ('$qid','$question','$option1','$option2','$option3','$option4','$answer',$cid)";
$result = mysqli_query($connection,$sql);
foreach($connection->query("SELECT COUNT(question) FROM questions where create_id = '$cid'") as $row){
      $count = $row['COUNT(question)'] ;
    }
    
    $sql2 = "UPDATE createact set numque = $count WHERE create_id = '$cid'";
$results = mysqli_query($connection,$sql2);
 header("location:../list.php?ref=edit&id=$cid");

 }


?>