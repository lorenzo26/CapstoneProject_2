
<?php
include 'check_login.php';
  function get_title(){
    echo "Home";
  }
  
function display_content(){
echo '
	 <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    </div>


    ';
	include('profile.php');
	}
	require_once('studenttemplate.php');
	?>

	
