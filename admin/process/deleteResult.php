<?php 
 require_once('../../db_config/database.php');
if(isset($_POST['delete'])){   
			$stdid = $_GET['stid'];
			$id = $_GET['id'];		
			$delete_info =  "delete from result_info where student_id = $stdid and create_id = '$id' "; 
		    $delete_result = mysqli_query($connection, $delete_info); 
		    $sql =  "delete from result where student_id = $stdid and create_id = '$id' "; 
		    $result = mysqli_query($connection, $sql); 		
		   
			if(!$result)
		    {
		        echo mysqli_error($connection);
		      
		    }else{
		    	   header("location:../Result.php?message=Result have been deleted");
		    }
		     
		}
		?>