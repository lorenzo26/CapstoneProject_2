
<?php
include 'check_login.php';
  function get_title(){
    echo "Create Message";
}
  
function display_content(){
	$sendTo =$_GET['ref'];
    $from =$_GET['id'];
	include('../db_config/database.php');
	$sql = "SELECT concat(lastName,', ',firstName,' ',middleName) as Fullname FROM user_info where user_id='$sendTo'";
    $result = mysqli_query($connection,$sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
	            $name = $row['Fullname'];
            }
        } 
        $connection->close();

?>
		<div class="borderStudent">
			<section class="content-header">
				<h1></h1>
      	   		<section class = "content">
      				<div class="row">
              			<section class="col-lg-12">
               				<div class="box box-info">
               					<div class="box-body">
               						<div class="modal-header">
<?php
  echo '  								<form method="POST" action="process/sendmsg.php?from='.$from.'&sendto='.$sendTo.'">';
 ?>       
      										<h4 class="modal-title">Create Message</h4>
      										<h5 class="modal-title"><?php echo "$name"; ?></h>
    								
    										<div class="modal-body">
      											<textarea class = "form-control" placeholder = " write a text" name="newmsg"></textarea>
    										</div>
   											<div class="modal-footer">
   												<input class = "btn-default btn-xs" title ="SEND" type="submit" name="send" value="SEND">
     									 </form>
    								</div>  
                  				</div>  
              				</div>  
            			</section>
          			</div>
        		</section>
      		</section>
   		</div>
<?php

}
require_once('studenttemplate.php');
	?>


