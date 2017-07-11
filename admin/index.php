
<?php
include 'check_login.php';
  function get_title(){
    echo "Home";
}
  
function display_content(){
 include('../db_config/database.php');

	echo '

	 <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    </div>

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 ">
<div class="container border student-reg">
';
		foreach($connection->query("SELECT COUNT(user_id) FROM user_info where role = 'Student'") as $row) {  
		$count = $row['COUNT(user_id)'] ;  
		
	}
	echo "
	<div>
	<h3> $count </h3>
	<h4>Registered Students</h4>
	</div>
	<a href = 'student.php?ref=list' class='small-box-footer'>more info<i class='fa fa-arrow-circle-right'></i></a>
	<div class='icon'>
	<i class='fa fa-user fa-5x' aria-hidden='true'></i>
	</div>
	
	
	
	";

echo '	</div></div>
	<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 ">
	<div class="container border passmark">';

	foreach($connection->query("SELECT COUNT(title) FROM  createact") as $row) {  
		$count = $row['COUNT(title)'] ;  
		
	}
	echo "
	<div>
	<h3> $count </h3>
	<h4>Activities</h4>
	</div>
	<a href = 'list.php?ref=list' class='small-box-footer'>more info<i class='fa fa-arrow-circle-right'></i></a>
	<div class='icon'>
	<i class='fa fa-sticky-note-o fa-5x' aria-hidden='true'></i>
	</div>
	
	";
echo '	</div></div>
	<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 ">
	<div class="container border passmark">';

	foreach($connection->query("SELECT COUNT(status) FROM result_info where status = 'PASS'") as $row) {  
		$count = $row['COUNT(status)'] ;  
		
	}
	echo "
	<div>
	<h3> $count </h3>
	<h4>Pass Students</h4>
	</div>
	<a href = 'show.php?ref=pass' class='small-box-footer'>more info<i class='fa fa-arrow-circle-right'></i></a>
	<div class='icon'>
	<i class='fa fa-thumbs-up fa-5x' aria-hidden='true'></i>
	</div>
	";
echo '		</div></div>

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 r">
	<div class="container border fail">';
	foreach($connection->query("SELECT COUNT(status) FROM result_info where status = 'FAILED'") as $row) {  
		$count = $row['COUNT(status)'] ;  
		
	}
		echo "
		<div>
	<h3> $count </h3>
	<h4>Fail Students</h4>
	</div>
	<a href ='show.php?ref=fail' class='small-box-footer'>more info<i class='fa fa-arrow-circle-right'></i></a>
	<div class='icon'>
	<i class='fa fa-thumbs-down fa-5x' aria-hidden='true'></i>
	</div>
	";
echo '		</div></div>	<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 ">
	<div class="container border passmark">';

	foreach($connection->query("SELECT COUNT(status) FROM result_info where status = 'PASS'") as $row) {  
		$count = $row['COUNT(status)'] ;  
		
	}
	echo "
	<div>
	<h3> $count </h3>
	<h4>Inbox</h4>
	</div>
	<a href = 'show.php?ref=pass' class='small-box-footer'>more info<i class='fa fa-arrow-circle-right'></i></a>
	<div class='icon'>
	<i class='fa fa-envelope-o fa-5x' aria-hidden='true'></i>
	</div>
	";
echo '		</div></div>

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 r">
	<div class="container border fail">';
	foreach($connection->query("SELECT COUNT(status) FROM result_info where status = 'FAILED'") as $row) {  
		$count = $row['COUNT(status)'] ;  
		
	}
		echo "
		<div>
	<h3> $count </h3>
	<h4>Email</h4>
	</div>
	<a href ='show.php?ref=fail' class='small-box-footer'>more info<i class='fa fa-arrow-circle-right'></i></a>
	<div class='icon'>
	<i class='fa fa-envelope-o fa-5x' aria-hidden='true'></i>
	</div>
	";
echo '		</div></div>';
	

}


require_once('admintemplate.php');
	?>
