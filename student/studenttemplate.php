<?php 
include('../db_config/database.php');
$sql = "SELECT * FROM user_info where user_id='$myusername'";
               $result = $connection->query($sql);

                  if ($result->num_rows > 0) {
        
                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
                 $gender = $row['gender'];
                 $regid = $row['user_id'];
                 $firstname = $row['firstName'];
                 if ($avatar == null) {
                     if ($gender == "Male") {
                         $link = '../images/avatar.png';
                     }else {
                         $link = '../images/avatar3.png';
                     }
                     
                 }
                     }
                   } 
                   $connection->close();



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php get_title(); ?></title>
    <link rel="icon" href="../images/icon.png"/>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<nav class="navbar-default" >
<div class="nav-side-menu">

    <div class="brand"><img src="../images/logo.png">
    </div>
    <div class="navbar-header">
     <button class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content">
 </button> 
        
        </div>
   
    <div class="divAvatar"> 
   <img class="image-round" src="<?php echo "$link"; ?>" alt="avatar">
        <h4><?php echo "$firstname"; ?></h4>

        </div> 
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
        

            <div class="main-nav"><span>Main Navigation</span></div>
            <li data-toggle="collapse" data-target="#products" class="collapsed active">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Examination <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li><a href="exam.php?ref=<?php echo "$regid"; ?>">Exam</a></li>
               
            </ul>
           <li data-toggle="collapse" data-target="#messages" class="collapsed">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Messages <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="messages">
                <li>New Message</li>
                <li><a href="inbox.php?ref=<?php echo "$regid"; ?>">Inbox</a></li>
                <li><a href="sentBox.php?ref=<?php echo "$regid"; ?>">Sent Messages</a></li>
            </ul>      
           
        </ul>
    </div>
</div>

      <div class="container-fluid">        

    <div class="dropdown">

    <button class="btn btn-default dropdown-toggle button-log-prof" type="button" data-toggle="dropdown"><img class="image-round dropdown_avatar" src="<?php echo "$link"; ?>" alt="avatar"><?php echo "$firstname"; ?>
    <span class="caret"></span></button>
    <div class="dropdown-menu ">
        <img class="image-round" src="<?php echo "$link"; ?>" alt="avatar">
        <h4><?php echo "$firstname"; ?></h4>


        <hr>
        <button class="profile"><a href="profile.php?ref=<?php echo "$regid"; ?>">Profile</a></button>
        <button class="signOut"><a href="process/logout.php">Sign out</a></button>
    </div>
  </div>
</div>
      </div>
    </nav>


<div class="container" id="main">

    <div class="row">
        <div class="col-md-12">
            <?php  display_content() ?>
        </div>
    </div>
</div>


 <script src="../jquery/jquery-2.2.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>