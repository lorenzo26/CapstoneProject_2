
<?php
include 'check_login.php';
  function get_title(){
    echo "Inbox";
  }
  
function display_content(){
echo '
	<div class="borderStudent">
		<section class="content-header">
      		<h1>List Of Messages</h1>
      		<section class = "content">
      			<div class="row">
        			<section class="col-lg-12">
          				<div class="box box-info">
            				<div class="box-header">
              					<i class="fa fa-users"></i>
              					<h3 class="box-title">Messages found on Database</h3>
            				</div>
            				<div class="box-body">
								<table class="table">
               						<tbody>
				               			<tr>                
						                  <th>From</th>
						                  <th>Message</th>
						                  <th>Date</th>
						                  <th>Options</th>
				                		</tr>
				                	</tbody>	
               						<tbody>';

               		 					include('../db_config/database.php');
										   error_reporting(0);
										   $id =$_GET['ref'];
										   $page =$_GET['page'];
										
										if ($page=="" || $page=="1"){
											$page1=0;
										}else{
										    $page1=($page*10)-10;
			 						    }
									   
			   							$sql = "SELECT from_id,  concat(lastName,', ',firstName,' ',middleName) as Fullname, sentTo_id, messages ,date  From message JOIN user_info ON (message.from_id = user_info.user_id) WHERE sentTo_id = $id limit $page1,10";

             							$result = $connection->query($sql);

             							if ($result->num_rows > 0) {
   
              								while($row = $result->fetch_assoc()) {
echo "
					               			<tr>
					               				<td>".$row["Fullname"]."</td>
					               				<td>".$row["messages"]."</td>
					               				<td>".$row["date"]."</td>
					               				<td>
					               					
					               					<form method='POST' action='reply.php?ref=".$row["from_id"]."&id=$id' onSubmit='return ConfirmDelete();'>
											
														<input class = 'btn-default btn-xs' title ='REPLY " .$row["from_id"]."' type='submit' name='reply' value='REPLY'>
														
													</form>

					               				</td>
					               			</tr>
";
										}
									}
								 	$connection->close();
echo '              			 
 									</tbody>
 								</table>
        						<ul class="pagination">';
        							include('../db_config/database.php');
										$sql = "SELECT * FROM message";
										$result = $connection->query($sql);

										if ($result->num_rows > 0) {
											print '<tr><td colspan="10">';
											$ragents=mysqli_num_rows($result);
											$a = $ragents/10;
											$a = ceil($a);
											
											for ($b=1;$b<=$a;$b++){
 ?> 
 											<li class="paginate_button">
 												<a href="inbox.php?ref=<?php echo $id; ?>&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
 											</li><?php
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
	require_once('studenttemplate.php');
	?>
