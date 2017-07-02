
<?php
include 'check_login.php';
  function get_title(){
    echo "EXAM";
  }


  function display_content(){
	?>
	<div>
		<form action="submit_exam.php" method="GET">
			<table style="font-size:15px;">
<?php
	include('../db_config/database.php');
		$sql = "SELECT * FROM exam ORDER BY RAND() limit 20";
		$result = $connection->query($sql);
		if ($result->num_rows > 0) {
			$quesno = 1;
			while($quesno <= 20) {
				while($row = $result->fetch_assoc()) {
echo '   		<tr>
 					<th colspan="2">' .$quesno.". ". $row["question"]. '</th>
 				</tr>
 				<tr>
 					<td><input type="radio" name="q' . $quesno.'" value="' . $row["option1"]. '" required = "true">'." " . $row["option1"]. '
 					</td>
 					<td><input type="radio" name="q' . $quesno.'" value="' . $row["option2"]. '" required = "true">'." " . $row["option2"]. '
 					</td> 
 				</tr>
 				<tr>
 					<td><input type="radio" name="q' . $quesno.'" value="' . $row["option3"]. '" required = "true">'." " . $row["option3"]. '
 					</td>
 					<td><input type="radio" name="q' . $quesno.'" value="' . $row["option4"]. '" required = "true">'." " . $row["option4"]. '
 					</td> 
 				</tr>

 				<tr>
 					<td colspan="10"><hr>
 					</td>
 				</tr>
 				<tr>
 					<td>
 						<input type="hidden" name="'.$quesno.'" value="'.$row["question_id"].'"
 					</td>
 				</tr> 

';
$quesno++;
}
}
		 
} else {
    
}
$connection->close();


?>
			</table>
			<button type="submit" onclick="return confirm('Are you sure you want to submit your assessment ?')"  class="btn btn-primary">Submit Assessment</button>
		</form>

	</div>



  <?php
}

  	require_once('studenttemplate.php');
	?>

  