
<?php
include 'check_login.php';
  function get_title(){
    echo "LIST";
  }
  
function display_content(){
if(@$_GET['q']==1){
  $act_id =$_GET['ref'];
	echo '

    <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./?ref='.$_SESSION['username'].' "><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> List</a></li>
      </ol>
    </section>
    </div>
		<div class="borderStudent">
			<section class="content-header">
      	<h1>List Of Activity</h1>
      		<section class = "content">
      			<div class="row">
              <section class="col-lg-12">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">Activity found on Database</h3>
                  </div>
                  <div class="box-body">
				            <table class="table">
                   		<tbody>
                   			<tr>                
    		                  <th>#</th>
    		                  <th>Title</th>
    		                  <th>Total Question</th>
    						          <th>Status</th>
                          <th>Option</th>                  
                    		</tr>
                      </tbody>
                   		<tbody>';
                      include('../db_config/database.php');
                        error_reporting(0);
		                    $page =$_GET['page'];
                      if ($page=="" || $page=="1"){
								        $page1=0;
		                  }else{
								        $page1=($page*10)-10;
						          }
									   
                        $sql = "SELECT * FROM createact limit $page1,10";
                        $result = mysqli_query($connection,$sql);
                      if ($result->num_rows > 0) {
                        $num =1 ; 
                        while($row = $result->fetch_assoc()) {

echo "
                   			<tr>
                   				<td>".$num."</td>
                   				<td>".$row["title"]."</td>
                   				<td>".$row["numque"]."</td>
                          <td>".$row['status']."</td>		
                          <td>               				
               					    <form method='POST' action='list.php?ref=".$row["create_id"]."&q=2&id=".$act_id."'>
                              <input class = 'btn-default btn-sm' title ='Start " .$row["title"]."' type='submit' name='start' value='Start'>
                            </form>
                          </td>
               			    </tr>
";
                        $num++;
                        }
                      } $connection->close();
echo '              			 
 					            </tbody>
                    </table>
                    <ul class="pagination">';
                      include('../db_config/database.php');
                        $sql = "SELECT * FROM createact";
                        $result = mysqli_query($connection,$sql);
                      if ($result->num_rows > 0) {
                        print '<tr><td colspan="10">';
                        $ragents=mysqli_num_rows($result);
                        $a = $ragents/10;
                        $a = ceil($a);
                      for ($b=1;$b<=$a;$b++){
?>                      <li class="paginate_button">
                          <a href="list.php?q=1&ref=<?php echo $act_id ?>&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
                        </li><?php
                      }
                    }
                    $connection->close();

echo '
                    </ul>
                  </div>  
              </div>  
            </section>
          </div>
        </section>
      </section>
    </div>

 
';
}
	
if(@$_GET['q']==2){

include('../db_config/database.php');
    $act_id = $_GET['ref'];
    $stdid = $_GET['id'];
    $sql = "SELECT * FROM result_info WHERE student_id = '$stdid' and create_id = '$act_id'";
    $result = mysqli_query($connection,$sql);
    $state = "SELECT status from createact WHERE create_id = $act_id";
    $resultstate =  mysqli_query($connection,$state);

    if ($resultstate->num_rows > 0) {
        while($row = $resultstate->fetch_assoc()) {
          $examstate =$row['status'];
        }
    }
      foreach($connection->query("SELECT COUNT(create_id) FROM questions where create_id = '$act_id'") as $row){
        $countcol = $row['COUNT(create_id)'] ;
    }
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

      }
echo '
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./?ref='.$_SESSION['username'].' "><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="list.php?q=1&ref='.$stdid.'">List</a></li>
        <li class="active">Assesment</li>
      </ol>
    </section>
    </div>
    <div>
      <h4>Assessment Taken</h4>
      You have already attempt the activity..
      Click <a href="Result.php?id='.$stdid.'&ref=result1">here</a> to see the Result
    </div>';
    }elseif ($examstate == "locked") {

      echo '        <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./?ref='.$_SESSION['username'].' "><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="list.php?q=1&ref='.$stdid.'">List</a></li>
        <li class="active">Locked</li>
      </ol>
    </section>
    </div>
    <h4>Assessment Locked</h4>
      The activity is locked ..
      Click <a href="list.php?q=1&ref='.$stdid.'&ref=result1">here</a> to go back';
    } elseif ($countcol==0) {
      echo '        <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./?ref='.$_SESSION['username'].' "><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="list.php?q=1&ref='.$stdid.'">List</a></li>
        <li class="active">Locked</li>
      </ol>
    </section>
    </div>
    No questions';      
    }else{
    ?>
  <div>
    <form action="process/check.php" method="post">
      <table class = "act">
<?php
        $sql = "SELECT * FROM `questions` q JOIN createact c ON (q.create_id=c.create_id) WHERE q.create_id = $act_id ORDER BY RAND()";
        $result = mysqli_query($connection,$sql);   
        if ($result->num_rows > 0) {
          $quesno = 1;
          while($row = $result->fetch_assoc()) {
echo '     
        <tr>
          <th colspan="2">' .$quesno.". ". $row["question"]. '</th>
        </tr>
        <tr>
          <td>
            <input type="radio" name="q' . $quesno.'" value="' . $row["option1"]. '" >'." " . $row["option1"]. '
          </td>
          <td>
            <input type="radio" name="q' . $quesno.'" value="' . $row["option2"]. '" >'." " . $row["option2"]. '
          </td> 
        </tr>
        <tr>
          <td>
            <input type="radio" name="q' . $quesno.'" value="' . $row["option3"]. '" >'." " . $row["option3"]. '
          </td>
          <td>
            <input type="radio" name="q' . $quesno.'" value="' . $row["option4"]. '" >'." " . $row["option4"]. '
          </td> 
        </tr>
        <tr>
          <td colspan="10"><hr>
          </td>
        </tr>
        <tr>
          <td>
            <input type="hidden" name="qid'.$quesno.'" value="'.$row["question_id"].'"
          </td>
        </tr> 
';        
      $quesno++;
      }
echo '
        <tr>
          <td>
            <input type="hidden" name="stdid" value="'.
            $stdid.'"
          </td>
          <td>
            <input type="hidden" name="act_id" value="'.
            $act_id.'"
          </td>
          
        </tr> 
';   
  }
?>
      </table>
      <input type="submit" name="chckresult" class="btn btn-primary" value = "Submit Assessment">
    </form>
  </div>
<?php
  }


}
}
	
	require_once('studenttemplate.php');
	?>

