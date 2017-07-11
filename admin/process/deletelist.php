<?php 
 require_once('../../db_config/database.php');
if(isset($_POST['delete'])){   
			$id = $_GET['ref'];
		    $sql =  "delete from createact where create_id = $id"; 
		    $result = mysqli_query($connection, $sql); 
		    $sql2 = "delete from questions where create_id = $id";
		   	$result2 = mysqli_query($connection, $sql2); 
			if(!$result)
		    {
		        echo mysqli_error($connection);
		      
		    }else{
		    	   header("location:../list.php?ref=list");
		    }
		     
		}
		?>