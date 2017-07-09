<?php 
 require_once('../../db_config/database.php');
if(isset($_POST['edit'])){   
			$id = $_GET['ref'];
		    $sql="SELECT from createact where create_id = '$id'"
		    $result = mysqli_query($connection, $sql); 
			if(!$result)
		    {
		        echo mysqli_error($connection);
		      
		    }else{
		    	   header("location:../list.php");
		    }
		     
		}
		?>