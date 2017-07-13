<?php
 require_once("check_login.php");
  function get_title(){
    echo "Results";
  }

function display_content(){
include('../db_config/database.php');
	if ($_GET['ref']=="result1") {
		
	
	$stdid = $_GET['id'];
	
	$sql = "SELECT * from createact c JOIN result_info r ON (c.create_id=r.create_id) Where r.student_id = $stdid";
	$result = mysqli_query($connection,$sql);
echo '
		<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./?ref='.$_SESSION['username'].' "><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Result</a></li>
      </ol>
    </section>
    </div>
		<div class="borderStudent">
			<section class="content-header">
      		<h1>Result</h1>
    			<section class = "content">
    				<div class="row">
            			<section class="col-lg-12">
              				<div class="box box-info">
                				<div class="box-header">
                                    <h3 class="box-title">Result found on Database</h3>
                				</div>
                				<div class="box-body">
				            		<table class="table">
				             			<tbody>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Score</th>
												<th>Result</th>
												<th>Option</th>
											</tr>
										</tbody>
					                    <tbody>
';	
										if ($result->num_rows > 0) {	
										$num =1 ;		
											while($row = $result->fetch_assoc()) {
echo '
											<tr>
												<td>'.$num.'</td>
												<td>'.$row['title'].'</td>
												<td>'.$row['score'].'</td>
												<td>'.$row['status'].'</td>
												<td>
												 <a title ="REVIEW" class = "btn-primary btn-sm" href = "Result.php?id='.$stdid.'&cid='.$row['create_id'].'&ref=result2"> REVIEW
               					    </a>
												</td>
											</tr>
';
												$num++;
											}
										}
										$connection->close();
echo '   								</tbody>
	                  				</table>
								</div>  
              				</div>  
            			</section>
          			</div>
        		</section>
      		</section>
    	</div>
';
}

if ($_GET['ref']=="result2") {

	$cid = $_GET['cid'];
	$id = $_GET['id'];
	$sql = "SELECT * FROM questions q JOIN result r ON (q.question_id=r.question_id) Where r.create_id = $cid AND student_id = $id";
	$result = mysqli_query($connection,$sql);
	echo '

		<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./?ref='.$_SESSION['username'].' "><i class="fa fa-dashboard"></i> Home</a></li>
        <li> <a href="Result.php?ref=result1&id='.$id.'"> Result</a></li>
         <li class="active"> Review</a></li>
      </ol>
    </section>
    </div>
		<div class="borderStudent">
			<section class="content-header">
      		<h1>Result</h1>
    			<section class = "content">
    				<div class="row">
            			<section class="col-lg-12">
              				<div class="box box-info">
                				<div class="box-header">
                                    <h3 class="box-title">Result found on Database</h3>
                				</div>
                				<div class="box-body">
				            		<table class="table">
				             			<tbody>
											<tr>
												<th>#</th>
												<th>Questions</th>
												<th>Your Answer</th>
												<th>Correct Answer</th>
												<th>Mark</th>
											</tr>
										</tbody>
					                    <tbody>
';	
										if ($result->num_rows > 0) {	
										$num =1 ;		
											while($row = $result->fetch_assoc()) {
echo '
											<tr>
												<td>'.$num.'</td>
												<td>'.$row['question'].'</td>
												<td>'.$row['student_answer'].'</td>
												<td>'.$row['answer'].'</td>
												<td>';
													if ($row['mark']=='Correct') {
														echo '<i class="fa fa-check" aria-hidden="true"></i>';
													}else{
														echo '<i class="fa fa-times" aria-hidden="true"></i>';
													}


echo '											
												</td>
												
											</tr>
';
												$num++;
											}
										}
										$connection->close();
echo '   								</tbody>
	                  				</table>
								</div>  
              				</div>  
            			</section>
          			</div>
        		</section>
      		</section>
    	</div>
';

}
}
  	require_once('studenttemplate.php');
?>

