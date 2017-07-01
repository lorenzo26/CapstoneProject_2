

<?php
include 'check_login.php';
  function get_title(){
    echo "Register Student";
  }

function display_content(){
echo '
  <h3> Register Student </h3>
  <div class = "border_registerform">
    <form action="process/scriptAdmin.php" method="post">
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
        <button type="submit" class="pull-right btn btn-default" name="newstd" id="sendEmail">Register Student
        </button>
      </div>
		</form>
  </div>';
}

require_once('admintemplate.php');
      ?>