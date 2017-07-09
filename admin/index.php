
<?php
include 'check_login.php';
  function get_title(){
    echo "Home";
}
  
function display_content(){
 include('../db_config/database.php');

	echo '
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
<div class="container border">
';
		foreach($connection->query("SELECT COUNT(user_id) FROM user_info where role = 'Student'") as $row) {  
		$count = $row['COUNT(user_id)'] ;  
		
	}
	echo "<h3> $count </h3>
	<h4>Registered Students</h4>
	<a href = 'student.php?ref=list'>more info</a>
	";

echo '	</div></div>
	<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
	<div class="container border">';

	foreach($connection->query("SELECT COUNT(status) FROM result_info where status = 'PASS'") as $row) {  
		$count = $row['COUNT(status)'] ;  
		
	}
	echo "<h3> $count </h3>
	<h4>Pass Students</h4>
	<a href = 'show.php?ref=pass'>more info</a>";
echo '		</div></div>
	<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 r">
	<div class="container border">';
	foreach($connection->query("SELECT COUNT(status) FROM result_info where status = 'FAILED'") as $row) {  
		$count = $row['COUNT(status)'] ;  
		
	}
		echo "<h3> $count </h3>
	<h4>Fail Students</h4>
	<a href ='show.php?ref=fail'>more info</a>";
echo '		</div></div>';
	

}


require_once('admintemplate.php');
	?>
