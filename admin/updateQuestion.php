<?php
 require_once("check_login.php");
  function get_title(){
    echo "Update Question";
  }


function display_content(){
	if(isset($_GET['ref'])) {
  		$quid = $_GET['ref'];
  		
 		include('../db_config/database.php');  
  		$sql = "SELECT * FROM exam where question_id = '$quid'";
		$result = mysqli_query($connection, $sql);

		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
		     	$question = $row['question'];
				$opt1 = $row['option1'];
				$opt2 = $row['option2'];
				$opt3 = $row['option3'];
				$opt4 = $row['option4'];
				$answer = $row['answer'];
    		}
		} else {
  
	}

	$connection->close();

	}else{
  	header("location:./");
}
echo'
	<form action="process/updateQue.php?ref='.$quid.'" method ="POST">
		<div class="form-group">
			<h4>Question</h4>
	    	<textarea class="form-control" rows="3" name="question" placeholder="Question" required>'.$question.'</textarea>
	    </div>
	    <div class="form-group">
	    	<h4>Option 1</h4>
	    	<textarea class="form-control" rows="3" name="option1" placeholder="Option 1" required>'.$opt1.'</textarea>
	    </div>
		<div class="form-group">
			<h4>Option 2</h4>
	    	<textarea class="form-control" rows="3" name="option2" placeholder="Option 2"  required>'.$opt2.'</textarea>
	    </div>
		<div class="form-group">
			<h4>Option 3</h4>
	    	<textarea class="form-control" rows="3" name="option3" placeholder="Option 3"  required>'.$opt3.'</textarea>
	    </div>
		<div class="form-group">
			<h4>Option 4</h4>
	    	<textarea class="form-control" rows="3" name="option4" placeholder="Option 4"  required>'.$opt4.'</textarea>
	    </div>
		<div class="form-group">
			<h4>Answer</h4>
	    	<textarea class="form-control" rows="3" name="answer" placeholder="Answer"  required>'.$answer.'</textarea>
	    </div>	  
	
		<div class="box-footer clearfix">
	  		<button type="submit" class="pull-right btn btn-default" name="upQue">Update Question
	    		<i class="fa fa-arrow-circle-up"></i>
	    	</button>
		</div>		
	</form>

';
	
}
require_once('admintemplate.php');

?>
