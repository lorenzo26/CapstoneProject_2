<?php 
 require_once('../../db_config/database.php');
if(isset($_POST['delete'])){   
			$stdid = $_GET['ref'];
		    $sql =  "delete from user_info where user_id = $stdid"; 
		    $result = mysqli_query($connection, $sql); 
		   
			if(!$result)
		    {
		        echo mysqli_error($connect);
		      
		    }else{
		    	   header("location:../student.php");
		    }
		     
		}
		?>