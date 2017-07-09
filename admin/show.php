<?php 



include 'check_login.php';
  function get_title(){
    echo "Home";
}

function display_content(){
	
	include('../db_config/database.php');
if ($_GET['ref']=="pass") {
	echo '
		<div class="borderStudent">
			<section class="content-header">
      		<h1>Exam Result</h1>
    			<section class = "content">
    				<div class="row">
            			<section class="col-lg-12">
              				<div class="box box-info">
                				<div class="box-header">
                                    <h3 class="box-title">Exam Result found on Database</h3>
                				</div>
                				<div class="box-body">
				            		<table class="table">
				             			<tbody>
											<tr>
												<th>Student Id</th>
												<th>Name</th>
												<th>Score</th>
												<th>Status</th>
												<th>Option</th>
											</tr>
										</tbody>
					                    <tbody>
';	
										error_reporting(0);
                      					$page =$_GET['page'];

                      					if ($page=="" || $page=="1"){
                        				$page1=0;
                      					}else{
                        				$page1=($page*10)-10;
                      					}
                      					$sql = "SELECT * from result_info where status = 'PASS' limit $page1,10";
										$result = mysqli_query($connection,$sql);
										if ($result->num_rows > 0) {	
											
											while($row = $result->fetch_assoc()) {
echo '
											<tr>
												<td>'.$row['student_id'].'</td>
												<td>'.$row['student_name'].'</td>
												<td>'.$row['score'].'</td>
												<td>'.$row['status'].'</td>
												<td>
													<form method="POST" action="process/deleteResult.php?stid='.$row['student_id'].'&id='.$row['create_id'].'" onSubmit="return ConfirmDelete();">
						
                              							<input class = "btn-default btn-sm" title ="DELETE Result of  '.$row["student_name"].' " type="submit" name="delete" value="DELETE">
                            						</form>
                            					</td>
											</tr>
';
												
											}
										}
										$connection->close();
echo '   								</tbody>
	                  				</table>
	                  				<ul class="pagination">';
                  						include('../db_config/database.php');
                    						$sql = "SELECT * from result_info where status = 'FAILED'' ";
                    						$result = mysqli_query($connection,$sql);

                     						 if ($result->num_rows > 0) {
                       						 	print '<tr><td colspan="10">';
                        						$ragents=mysqli_num_rows($result);
                        						$a = $ragents/10;
                        						$a = ceil($a);

                        						for ($b=1;$b<=$a;$b++){
?>  
                          				<li class="paginate_button">
                            			<a href="show.php?ref=pass&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
                          				</li>
<?php
                        }
                      }
                      $connection->close();
echo '
                  					</ul>
								</div>  
              				</div>  
            			</section>
          			</div>
        		</section>
      		</section>
    	</div>
';


}
if ($_GET['ref']=="fail") {
echo '
		<div class="borderStudent">
			<section class="content-header">
      		<h1>Exam Result</h1>
    			<section class = "content">
    				<div class="row">
            			<section class="col-lg-12">
              				<div class="box box-info">
                				<div class="box-header">
                                    <h3 class="box-title">Exam Result found on Database</h3>
                				</div>
                				<div class="box-body">
				            		<table class="table">
				             			<tbody>
											<tr>
												<th>Student Id</th>
												<th>Name</th>
												<th>Score</th>
												<th>Status</th>
												<th>Option</th>
											</tr>
										</tbody>
					                    <tbody>
';	
										error_reporting(0);
                      					$page =$_GET['page'];

                      					if ($page=="" || $page=="1"){
                        				$page1=0;
                      					}else{
                        				$page1=($page*10)-10;
                      					}
                      					$sql = "SELECT * from result_info where status = 'FAILED' limit $page1,10";
										$result = mysqli_query($connection,$sql);
										if ($result->num_rows > 0) {	
											
											while($row = $result->fetch_assoc()) {
echo '
											<tr>
												<td>'.$row['student_id'].'</td>
												<td>'.$row['student_name'].'</td>
												<td>'.$row['score'].'</td>
												<td>'.$row['status'].'</td>
												<td>
													<form method="POST" action="process/deleteResult.php?stid='.$row['student_id'].'&id='.$row['create_id'].'" onSubmit="return ConfirmDelete();">
						
                              							<input class = "btn-default btn-sm" title ="DELETE Result of  '.$row["student_name"].' " type="submit" name="delete" value="DELETE">
                            						</form>
                            					</td>
											</tr>
';
												
											}
										}
										$connection->close();
echo '   								</tbody>
	                  				</table>
	                  				<ul class="pagination">';
                  						include('../db_config/database.php');
                    						$sql = "SELECT * from result_info where status = 'FAILED'' ";
                    						$result = mysqli_query($connection,$sql);

                     						 if ($result->num_rows > 0) {
                       						 	print '<tr><td colspan="10">';
                        						$ragents=mysqli_num_rows($result);
                        						$a = $ragents/10;
                        						$a = ceil($a);

                        						for ($b=1;$b<=$a;$b++){
?>  
                          				<li class="paginate_button">
                            			<a href="show.php?ref=pass&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
                          				</li>
<?php
                        }
                      }
                      $connection->close();
echo '
                  					</ul>
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
 	require_once('admintemplate.php');
?>
