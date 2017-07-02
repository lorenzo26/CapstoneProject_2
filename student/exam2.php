<?php
	
  	function get_title(){
    echo "EXAM";
 }

 	function display_content(){
 		include('../db_config/database.php');
			$sql = "SELECT * FROM exam ORDER BY RAND() limit 20";
			$result = $connection->query($sql);

		echo '		<div>
 			<form action="submit_exam.php" method="GET">
	 			<table  style="font-size:15px;>';
			if ($result->num_rows > 0) {
				$quesno = 1;
				
				while($quesno <= 20) {
					while($row = $result->fetch_assoc()) {
						$question = $row['question'];
						$opt1 = $row['option1'];
						$opt2 = $row['option2'];
						$opt3 = $row['option3'];
						$opt4 = $row['option4'];
						$q_id = $row['question_id'];
						
						// echo '$question';



 		?>
 	
	 				<tr>
	 					<th colspan="2"><?php echo $question; ?></th>
	 				</tr>
	 				<tr>
	 					<td><input type='radio' name='q<?php echo $q_id; ?>' value='<?php echo $opt1; ?>' required = 'true'><?php echo $opt1; ?>
	 					</td>
	 					<td><input type='radio' name='q<?php echo $q_id; ?>' value='<?php echo $opt2; ?>' required = 'true'><?php echo $opt2; ?>
	 					</td> 
	 				</tr>
	 				<tr>
	 					<td><input type='radio' name='q<?php echo $q_id; ?>' value='<?php echo $opt3; ?>' required = 'true'><?php echo $opt3; ?></td>
	 					<td><input type='radio' name='q<?php echo $q_id; ?>' value='<?php echo $opt4; ?>' required = 'true'><?php echo $opt4; ?></td> 
	 				</tr>
	 		
	 	




<?php
}
}
		 
} else {
    
}
$connection->close();
?>
		</table>
<button type="submit" onclick="return confirm('Are you sure you want to submit your assessment ?')"  class="btn btn-primary">Submit Assessment</button><br><br>
</form>

</div>

<?php
 	}
 		require_once('studenttemplate.php');
?>