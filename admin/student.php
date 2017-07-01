<?php
 require_once("check_login.php");
  function get_title(){
    echo "List Of Student";
  }


function display_content(){

	echo '
		<div class="borderStudent">
			<section class="content-header">
      	<h1>List Of Student</h1>
      		<section class = "content">
      			<div class="row">
              <section class="col-lg-12">
                <div class="box box-info">
                  <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Students found on Database</h3>
                  </div>
                  <div class="box-body">
				            <table class="table">
                   		<tbody>
                   			<tr>                
    		                  <th>Student ID</th>
    		                  <th>Last Name</th>
    		                  <th>First Name</th>
    		                  <th>Middle Name</th>
    		                  <th>Gender</th>
    						          <th>Email</th>
            						  <th>Address</th>
            						
            						  <th>Options</th>
                    		</tr>
                      </tbody>
                   		<tbody>';
                      include('../db_config/database.php');
                        error_reporting(0);
		                    $page =$_GET['page'];
                      if ($page=="" || $page=="1"){
								        $page1=0;
		                  }else{
								        $page1=($page*10)-10;
						          }
									   
                        $sql = "SELECT * FROM user_info where role = 'Student' ORDER BY lastName limit $page1,10";
                        $result = $connection->query($sql);

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
echo "
                   			<tr>
                   				<td>".$row["user_id"]."</td>
                   				<td>".$row["lastName"]."</td>
                   				<td>".$row["firstName"]."</td>
                   				<td>".$row["middleName"]."</td>
                   				<td>".$row["gender"]."</td>
                   				<td>".$row["email"]."</td>
                   				<td>".$row["address"]."</td>
                          <td>
               					    <a title ='EDIT " .$row["lastName"], "," ,$row["firstName"] ."' class = 'btn-primary btn-xs' href = 'updateStudent.php?ref=".$row["user_id"]."'> EDIT
               					    </a>
               				
               					    <form method='POST' action='process/deleteStd.php?ref=".$row["user_id"]."' onSubmit='return ConfirmDelete();'>
						
                              <input class = 'btn-default btn-xs' title ='DELETE " .$row["lastName"], "," ,$row["firstName"] ."' type='submit' name='delete' value='DELETE'>
                            </form>
                          </td>
               			    </tr>
";
                        }
                      } $connection->close();
echo '              			 
 					            </tbody>
                    </table>
                    <ul class="pagination">';
                      include('../db_config/database.php');
                        $sql = "SELECT * FROM user_info";
                        $result = $connection->query($sql);

                      if ($result->num_rows > 0) {
                        print '<tr><td colspan="10">';
                        $ragents=mysqli_num_rows($result);
                        $a = $ragents/10;
                        $a = ceil($a);
                      for ($b=1;$b<=$a;$b++){
?>                      <li class="paginate_button">
                          <a href="student.php?page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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
require_once('admintemplate.php');

?>
<script type="text/javascript">
	function ConfirmDelete(){
   		var d = confirm('Do you really want to delete data?');
   		
    	if(d == false){
        	return false;
    }
}
</script>