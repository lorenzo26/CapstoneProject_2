<?php 
 require_once('../../db_config/database.php');
if(isset($_POST['delete'])){   
			$id = $_GET['ref'];
		    $sql =  "delete from createact where create_id = $id"; 
		    $result = mysqli_query($connection, $sql); 
		    $sql2 = "delete from questions where create_id = $id";
		   	$result2 = mysqli_query($connection, $sql2); 
		   	$show = "SELECT * from createact Where create_id = $id";
    		$showresult=mysqli_query($connection, $show);
    			if ($showresult->num_rows > 0) {
        			while($row = $showresult->fetch_assoc()) {
        				$title = $row['title'];
        			}
    		 }		
			if(!$result)
		    {
		        echo mysqli_error($connection);
		      
		    }else{
		    	   header("location:../list.php?ref=list&message=$title have been deleted");
		    }
		     
		}
		?>