<?php
ini_set('max_execution_time', 300);
	include('../../db_config/database.php');
	if (isset($_POST['chckresult'])) {
		$stdid= $_POST['stdid'];
		$id = $_POST['act_id'];
		foreach($connection->query("SELECT COUNT(create_id) FROM questions where create_id = '$id'") as $row) {  
		$count = $row['COUNT(create_id)'] ;  
		$q_id = 1;
	}

	while ( $q_id <= $count) {	
		$qid = $_POST['qid'.$q_id];
		$answer = $_POST['q'.$q_id];
		$answer = "INSERT INTO result(student_answer, question_id,student_id, question_num) VALUES ('$answer','$qid','$stdid',$q_id)";
		$results = mysqli_query($connection,$answer);
		$sql2 = "SELECT * from questions q JOIN result r ON (q.question_id=r.question_id) Where r.student_id = $stdid";
		$result = mysqli_query($connection,$sql2);
		$q_id++;


	if ($result->num_rows > 0) {			
		while($row = $result->fetch_assoc()) {
			$student_answer = $row['student_answer'];
			$correct_answer = $row['answer'];
			if ($student_answer==$correct_answer) {
				$mark = "UPDATE  result SET mark ='Correct' where question_id = '$qid'";
				$markresults = mysqli_query($connection,$mark);
			}elseif ($student_answer!=$correct_answer) {	
				$mark = "UPDATE  result SET mark ='WRONG' where question_id = '$qid'";
				$markresults = mysqli_query($connection,$mark);
			}
			}
		}
	}




	if ($results) {
		foreach($connection->query('SELECT COUNT(mark) FROM result where mark = "correct"') as $row){
			$countcorrect = $row['COUNT(mark)'] ;
			foreach($connection->query('SELECT COUNT(question_num) FROM result') as $row){
				$countnumques = $row['COUNT(question_num)'] ;  
				$percent = (($countcorrect/$countnumques)*100);
				if ($percent>=75) {
					$status="PASS";
				}else{
					$status="FAILED";
				}
				$name = "SELECT concat(lastName,', ',firstName,' ',middleName) as fullname from user_info where user_id = $stdid";
				$resultname = mysqli_query($connection,$name);
				if ($resultname->num_rows > 0) {			
					while($row = $resultname->fetch_assoc()) {
						$fullname = $row['fullname'];
						$sql = "INSERT INTO result_info(student_id,student_name, score, status, create_id) VALUES ('$stdid','$fullname', '$percent','$status','$id') ";
						$result = mysqli_query($connection,$sql);
						echo "$sql<br>";
					}
				}
			}
		}
			header("location:../Result.php?id=$stdid&ref=result1");		
		
		}else{
			$error = $connection->error;
    		header("location:../Result.php?err=$error");
		}
	$connection->close();
		
	}





?>
