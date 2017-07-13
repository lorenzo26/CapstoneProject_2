<?php

    $myusername = $_GET['ref'];
    include('../db_config/database.php');
    $sql = "SELECT * FROM user_info where user_id='$myusername'";
    $result = mysqli_query($connection,$sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $avatar = $row['avatar'];
        $gender = $row['gender'];
        $regid = $row['user_id'];
        $firstname = $row['firstName'];
        $middlename = $row['middleName'];
        $lastname = $row['lastName'];
        $address = $row['address'];
        $email = $row['email'];
        $regdate = $row['regdate'];
          if ($avatar == null) {
            if ($gender == "Male") {
              $link = '../images/avatar.png';
            }else {
              $link = '../images/avatar3.png';
            }
          }else{
            $link = "data:image/jpeg;base64,".base64_encode($row['avatar'] )."";
          }
     }
  } 
$connection->close();


?>

<h3>User Profile</h3>
  <div class="row">
    <section class="col-lg-5 col-md-5 col-xl-5">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="image-round" src="<?php echo "$link"; ?>" alt="avatar">
          <h3 class="profile-username text-center"></h3>
          <p class="text-muted text-center"><?php echo "$email"; ?></p>          
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Gender</b> <a class="pull-right"><?php echo "$gender"; ?></a>
            </li>
            <li class="list-group-item">
              <b>Address</b> <a class="pull-right"><?php echo "$address"; ?></a>
            </li>
            <li class="list-group-item">
              <b>Member Since</b> <a class="pull-right"><?php echo "$regdate"; ?></a>
            </li>
          </ul>
            <form action="process/update_profilepics.php?ref=<?php echo "$regid"; ?>";" method="POST" enctype="multipart/form-data">
              <input type="file" name="f1" accept="image/*" required><br>     
              <button type="submit" class="pull-right btn btn-default" name="uplogo">Update Avatar
                  <i class="fa fa-arrow-circle-up"></i>
              </button>
            </form>
        </div>
      </div>
    </section>
    <section class="col-lg-7 col-md-7 col-xl-7">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <h3>User Information</h3>
          <form action="process/update_userInfo.php?ref=<?php echo "$regid"; ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="lastname" value="<?php echo "$lastname"; ?>" placeholder="Enter your lastname" required>
              <input type="text" class="form-control" name="firstname" value="<?php echo "$firstname"; ?>" placeholder="Enter your firstname" required>
              <input type="text" class="form-control" name="middlename" value="<?php echo "$middlename"; ?>" placeholder="Enter your middlename" required>    
              <input type="text" class="form-control" name="address" value="<?php echo "$address"; ?>" placeholder="Enter your address" required>          
              <input type="email" class="form-control" name="email" value="<?php echo "$email" ?>" placeholder="Enter your email" required>           
              <input type="password" class="form-control" id="password" name="newpass"  placeholder="New Password" required>    
              <input type="password" class="form-control" id="confirm_password" name="conpass"  placeholder="confirm new password" required>
            </div>      
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" name="upschool">Update Information
                <i class="fa fa-arrow-circle-up"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>    
  </div>
  
  
