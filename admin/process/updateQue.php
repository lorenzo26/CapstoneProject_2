<?php


if(isset($_POST['upQue'])){
	require_once('../../db_config/database.php');
	$quid = $_GET['ref'];
    $question = $_POST['question'];
	$option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['answer'];

    $sql =  "UPDATE `exam` SET `question`='$question',`option1`='$option1',`option2`='$option2',`option3`='$option3',`option4`='$option4',`answer`='$answer' WHERE `question_id`='$quid'";

    mysqli_query($connection, $sql);
    echo "$sql";

    header("location:../questions.php");
}
?>