<?php
include 'check_login.php';
  function get_title(){
    echo "Update Student";
  }

function display_content(){
  if(isset($_GET['ref'])) {
    $stdid = $_GET['ref'];
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
}else{
  header("location:./");
}

echo '
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


require_once('admintemplate.php');
      ?>