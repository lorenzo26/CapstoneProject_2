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
		$qid[$q_id] = $_POST['qid'.$q_id];
		$answer = $_POST['q'.$q_id];
		$answer = "INSERT INTO result(student_answer, question_id,student_id, question_num,create_id) VALUES ('$answer','".$_POST['qid'.$q_id]."','$stdid',$q_id,$id)";
		$results = mysqli_query($connection,$answer);
		$q_id++;
	}
	
		$sql2 = "SELECT * from result r JOIN questions q ON (q.question_id=r.question_id) Where r.student_id = $stdid and r.create_id = $id";
		$result = mysqli_query($connection,$sql2);
		$cnt = 1;


	if ($result->num_rows > 0) {			
		while($row = $result->fetch_assoc()) {
			$student_answer = $row['student_answer'];
			$correct_answer = $row['answer'];
			print_r($qid);
			echo "$student_answer==$correct_answer <BR>";
			if ($student_answer==$correct_answer) {
				$mark = "UPDATE  result SET mark ='Correct' where question_id = '".$row['question_id']."' AND student_id = $stdid";
				$markresults = mysqli_query($connection,$mark);
				echo "$mark <br>";
			}else {	
				$mark = "UPDATE  result SET mark ='Wrong' where question_id = '".$row['question_id']."' AND student_id = $stdid";
				$markresults = mysqli_query($connection,$mark);
				echo "$mark <br>";
			}
			
			$cnt++;
			}
		}




	if ($results) {
		foreach($connection->query("SELECT COUNT(r.mark) FROM result r JOIN questions q ON (r.question_id=q.question_id) where r.mark = 'correct' AND r.student_id = $stdid AND q.create_id = $id ") as $row){
			$countcorrect = $row['COUNT(r.mark)'] ;
			foreach($connection->query("SELECT COUNT(question_id) FROM questions where create_id = $id ") as $row){
				$countnumques = $row['COUNT(question_id)'] ;  
				$percent = (($countcorrect/$countnumques)*100);
				if ($percent>=70) {
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
