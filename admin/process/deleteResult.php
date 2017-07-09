<?php 
 require_once('../../db_config/database.php');
if(isset($_POST['delete'])){   
			$stdid = $_GET['ref'];
			$type = $_GET['type'];


			if ($type=='Exam') {
			$delete_info =  "delete from result_info where student_id = $stdid and type = '$type' "; 
		    $delete_result = mysqli_query($connection, $delete_info); 
		    $sql =  "delete from resultexam where student_id = $stdid"; 
		    $result = mysqli_query($connection, $sql); 
		   
			}
		   
			if(!$result)
		    {
		        echo mysqli_error($connection);
		      
		    }else{
		    	   header("location:../Result.php");
		    }
		     
		}
		?>