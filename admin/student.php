<?php
 require_once("check_login.php");
  function get_title(){
    echo "Student";
  }


function display_content(){

if($_GET['ref']=="reg"){
  echo '
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class ="active">Register Student</li>
      </ol>
    </section>
    </div>
  <h3> Register Student </h3>
  <div class = "border_registerform">
    <form action="process/regStudent.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="firstname"  placeholder="First Name" required>
        
        <input type="text" class="form-control" name="middlename"  placeholder="Middle Name" required>
                  
        <input type="text" class="form-control" name="lastname"  placeholder="Last Name" required>               
               
        <input type="email" class="form-control" name="email"  placeholder="Email" required>
              
        <input type="text" class="form-control" name="address"  placeholder="Address" required>
            
        <select class="form-control" name="gender" required>
          <option value="" disabled selected>Select gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div> 

      <div class="box-footer clearfix">
        <button type="submit" class="pull-right btn btn-default" name="newstd" id="sendEmail">Add Student
        </button>
      </div>
    </form>
  </div>';
}

if($_GET['ref']=="list"){
	echo '
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class ="active">Registered Student</li>
      </ol>
    </section>
    </div>
		<div class="borderStudent">
			<section class="content-header">
      	<h1>List Of Student</h1>
      		<section class = "content">
      			<div class="row">
              <section class="col-lg-12">
                <div class="box box-info">
                  <div class="box-header">
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
                        $result = mysqli_query($connection,$sql);
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
                        
                        <div class= 'inline'>                     
                            <li>    
               					    <a title ='EDIT " .$row["lastName"], "," ,$row["firstName"] ."' class = 'btn-primary btn-sm' href = 'student.php?id=".$row["user_id"]."&ref=update'> EDIT
               					    </a>
               				 </li>  
                        <li>  
               					    <form method='POST' action='process/deleteStd.php?ref=".$row["user_id"]."' onSubmit='return ConfirmDelete();'>
						
                              <input class = 'btn-default btn-sm' title ='DELETE " .$row["lastName"], "," ,$row["firstName"] ."' type='submit' name='delete' value='DELETE'>
                            </form>
                             </li>  
                              </div>
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
                        $sql = "SELECT * FROM user_info where role = 'Student' ";
                        $result = mysqli_query($connection,$sql);
                      if ($result->num_rows > 0) {
                        print '<tr><td colspan="10">';
                        $ragents=mysqli_num_rows($result);
                        $a = $ragents/10;
                        $a = ceil($a);
                      for ($b=1;$b<=$a;$b++){
?>                      <li class="paginate_button">
                          <a href="student.php?ref=list&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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

  if($_GET['ref']=="update") {
    $stdid = $_GET['id'];
    include('../db_config/database.php');
    $sql = "SELECT * FROM user_info where user_id = '$stdid'";
    $result = mysqli_query($connection,$sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $firstname = $row['firstName'];
        $middlename = $row['middleName'];
        $lastname = $row['lastName'];
        $email = $row['email'];
        $address = $row['address'];
        $gender = $row['gender'];
      }
    } else {
  }
$connection->close();
// }else{
//   header("location:./");
// }

echo '

<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="student.php?ref=list">Registered Student</a></li>
         <li class ="active"></i>Update Student</li>
      </ol>
    </section>
    </div>
  <h3> Update Student '.$stdid.' </h3>
  <div class = "border_registerform">
    <form action="process/updateStd.php?ref='.$stdid.'" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="firstname"  placeholder="First Name" required value = "'.$firstname.'">
        
        <input type="text" class="form-control" name="middlename"  placeholder="Middle Name" required  value = "'.$middlename.'">
                  
        <input type="text" class="form-control" name="lastname"  placeholder="Last Name" required  value = "'.$lastname.'">               
               
        <input type="email" class="form-control" name="email"  placeholder="Email" required  value = "'.$email.'">
              
        <input type="text" class="form-control" name="address"  placeholder="Address" required  value = "'.$address.'"> 

        <input type="hidden" class="form-control" name="id"  placeholder="id" required  value = "'.$stdid.'"> 
'; 
          if ($gender == "Male") {
            print '<select name="gender" class="form-control">
                    <option>Female</option>
                    <option selected>Male</option>
                  </select>';
          }else{
            print '<select name="gender" class="form-control">
                    <option selected>Female</option>
                    <option>Male</option>              
                  </select>
            ';
          }
          echo '
       
      </div> 

      <div class="box-footer clearfix">
        <button type="submit" class="pull-right btn btn-default" name="upstd" >Update Student
        </button>
      </div>
    </form>
  </div>';
} 


}
require_once('admintemplate.php');

?>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Message</h4>
        </div>
        <div class="modal-body">
          <p>
            <?php
              if(isset($_GET['message'])){
                echo $_GET['message'];
              }
            ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


<?php
    if(isset($_GET['message'])){ ?>
      <script type="text/javascript">
        $('#myModal').modal('show');
     
    <?php } ?>
    </script>
      <script type="text/javascript">  
	function ConfirmDelete(){
   		var d = confirm('Do you really want to delete data?');
   		
    	if(d == false){
        	return false;
    }
}
</script>