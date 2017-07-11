
<?php
include 'check_login.php';
  function get_title(){
    echo "LIST";
  }
  
function display_content(){
if ($_GET['ref']=="list") {

	echo '
   <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List</li>
      </ol>
    </section>
    </div>
		<div class="borderStudent">
			<section class="content-header">
      	<h1>List Of Student</h1>
      		<section class = "content">
      			<div class="row">
              <section class="col-lg-12">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">Students found on Database</h3>
                  </div>
                  <div class="box-body">
				            <table class="table">
                   		<tbody>
                   			<tr>                
    		                  <th>#</th>
    		                  <th>Title</th>
    		                  <th>Total Question</th>
    						  <th>Status</th>
                  <th>Options</th>
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
                        while($row = $result->fetch_assoc()) {
                          
echo "
                   			<tr>
                   				<td>".$row["title"]."</td>
                   				<td>".$row["title"]."</td>
                   				<td>".$row["numque"]."</td>
                          <td>".$row['status']."</td>
                          		<td>
                              <div class='inline'>
                          
                            <li>               				   
                            <form method='POST' action='list.php?ref=edit&id=".$row["create_id"]."'>
            
                              <input class = 'btn-default btn-sm' title ='EDIT " .$row["title"]."' type='submit' name='edit' value='EDIT'>
                            </form>
                            </li>  
                            <li>  
               					    <form method='POST' action='process/deletelist.php?ref=".$row["create_id"]."' onSubmit='return ConfirmDelete();'>
            
                              <input class = 'btn-default btn-sm' title ='DELETE " .$row["title"]."' type='submit' name='delete' value='DELETE'>
                            </form>
                            </li> 
                            <li>   
                            <form method='POST' action='process/list.php?ref=".$row["create_id"]."'>";
                         if ($row['status']=="locked") {
                           echo "  <input class = 'btn-default btn-sm' title ='Unlock " .$row["title"]."' type='submit' name='unlock' value='Unlock'>";
                          }else{
                             echo "  <input class = 'btn-default btn-sm' title ='Lock " .$row["title"]."' type='submit' name='lock' value='Lock'>";
                          }
   echo "             

      </form>     
      <li>  
      </div>
                          </td>
               			    </tr>
";
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
                          <a href="list.php?ref=list&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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
	if($_GET['ref']=="edit") {

      include('../db_config/database.php');
       $id = $_GET['id'];

                        error_reporting(0);
                        $page =$_GET['page'];
                      if ($page=="" || $page=="1"){
                        $page1=0;
                      }else{
                        $page1=($page*10)-10;
                      }
                     
    $sql = "SELECT * FROM questions q JOIN createact c ON (q.create_id=c.create_id) where c.create_id = $id limit $page1,10";
     $result =mysqli_query($connection, $sql);
    echo '
    <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="list.php?ref=list">List</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    </div>
    <div class="borderStudent">
      <section class="content-header">
        <h1>List Of Question</h1>
          <section class = "content">
            <div class="row">
              <section class="col-lg-12">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">Students found on Database</h3>
                  </div>
                  <div class="box-body">
                    <table class="table">
                      <tbody>
                        <tr>     
                        <th>#</th>           
                          <th>Question</th>
                          <th>Option1</th>
                          <th>Option2</th>
                          <th>Option3</th>
                          <th>Option4</th>
                          <th>Answer</th>   
                          <th>Options</th>
                        </tr>
                      </tbody>
                      <tbody>';
                      if ($result->num_rows > 0) {
                        $num = 1;
                        while($row = $result->fetch_assoc()) {
                          echo "
                        <tr>
                          <td>".$num."</td>
                          <td>".$row["question"]."</td>
                          <td>".$row["option1"]."</td>
                          <td>".$row["option2"]."</td>
                          <td>".$row["option3"]."</td>
                          <td>".$row["option4"]."</td>
                          <td>".$row["answer"]."</td>
                          <td>
                          <div class='inline'>
                          
                            <li>
                            <a title ='EDIT " .$row["question"]."' class = 'btn-primary btn-sm' href = 'list.php?qid=".$row["question_id"]."&cid=".$row["create_id"]."&ref=editQue'> EDIT
                            </a>
                              </li>
                             <li>
                            
                            <form method='POST' action='process/list.php?qid=".$row["question_id"]."&cid=".$row["create_id"]."' onSubmit='return ConfirmDelete();'>
            
                              <input class = 'btn-default btn-sm' title ='DELETE " .$row["question"]."' type='submit' name='delete' value='DELETE'>
                            </form> 
                             </li>
                             
                            </div>
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
                        $sql = "SELECT * FROM questions q JOIN createact c ON (q.create_id=c.create_id) where c.create_id = $id";
                        $result = mysqli_query($connection,$sql);
                      if ($result->num_rows > 0) {
                        print '<tr><td colspan="10">';
                        $ragents=mysqli_num_rows($result);
                        $a = $ragents/10;
                        $a = ceil($a);
                      for ($b=1;$b<=$a;$b++){
?>                      <li class="paginate_button">
                          <a href="list.php?ref=edit&id=<?php echo "$id"; ?>&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
                        </li><?php
                      }
                    }
                    $connection->close();

echo "
                    </ul>
                  </div>  
              </div>  
            </section>
          </div>
        </section>
      </section>
      <a title ='ADD Question' class = 'add btn-primary btn-lg' href = 'list.php?cid=$id&ref=addq'> ADD</a>
    </div>

 
";
}

if ($_GET['ref']=="editQue") {
  $cid = $_GET['cid'];
  $qid = $_GET['qid'];
 echo ' 

 <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="list.php?ref=list">List</a></li>
        <li><a href="list.php?ref=edit&id='.$cid.'">Edit</a></li>
        <li class="active">Edit Question</li>
      </ol>
    </section>
    </div>
  <div class="row create">
    <span class="title1" "><b>Enter Question Details</b></span><br /><br />
    <div class="col-md-3"></div><div class="col-md-6">
      <form class="form-horizontal title1" name="form" action="process/addques.php?qid='.$qid.'&cid='.$cid.'"  method="POST">
        <fieldset>
';
    include('../db_config/database.php');

      $sql = "SELECT * FROM questions WHERE create_id = $cid AND question_id = $qid";
      $result = mysqli_query($connection,$sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
echo '
            <b>Question number&nbsp;&nbsp;:</><br />
            <div class="form-group">
              <label class="col-md-12 control-label" for="question "></label>  
                <div class="col-md-12">
                  <textarea rows="3" cols="5" name="question" class="form-control" placeholder="Write question number  here..."  required="true" >'.$row["question"].'</textarea>  
                </div>
              </div>
            <div class="form-group">
              <label class="col-md-12 control-label" for="option1"></label>  
              <div class="col-md-12">
                <input id="option1" name="option1" placeholder="Enter option a" class="form-control input-md" type="text" required="true" value = "'.$row["option1"].'">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12 control-label" for="option2"></label>  
              <div class="col-md-12">
                <input id="option2" name="option2" placeholder="Enter option b" class="form-control input-md" type="text" required="true" value = "'.$row["option2"].'">    
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12 control-label" for="option3"></label>  
              <div class="col-md-12">
                <input id="option3" name="option3" placeholder="Enter option c" class="form-control input-md" type="text" required="true" value = "'.$row["option3"].'">   
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12 control-label" for="option4"></label>  
              <div class="col-md-12">
                <input id="option4" name="option4" placeholder="Enter option d" class="form-control input-md" type="text" required="true" value = "'.$row["option4"].'">
              </div>
            </div>
            <br />
            <b>Correct answer</b>:<br />
                <div class="form-group">
                  <label class="col-md-12 control-label" for="option"></label>  
                  <div class="col-md-12">
                    <input id="answer" name="answer" placeholder="Enter option answer" class="form-control input-md" type="text" required="true" value = "'.$row["answer"].'">
    
                  <div>
                </div>
'; 

echo '
            <div class="form-group">
              <label class="col-md-12 control-label" for=""></label>
                <div class="col-md-12"> 
                  <input  type="submit" class="btn btn-primary" value="Submit" class="btn btn-primary" name="editq"/>
              </div>
            </div>
            </fieldset>
          </form>
      </div>';

      }
    }
}
if ($_GET['ref']=="addq") {
  $cid = $_GET['cid'];

  echo '
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="list.php?ref=list">List</a></li>
        <li><a href="list.php?ref=edit&id='.$cid.'">Edit</a></li>
        <li class="active">Add Question</li>
      </ol>
    </section>
    </div>
  <div class="row">
    <span class="title1" ><b>Enter Question Details</b></span><br /><br />
      <div class="col-md-3"></div><div class="col-md-6">
        <form class="form-horizontal title1" name="form" action="process/addques.php?cid='.$cid.'"  method="POST">
        <fieldset>
';
    
  echo '
      <div class="form-group">
        <label class="col-md-12 control-label" for="question "></label>  
          <div class="col-md-12">
            <textarea rows="3" cols="5" name="question" class="form-control" placeholder="Write question number  here..."  required="true" ></textarea>  
          </div>
      </div>

      <div class="form-group">
        <label class="col-md-12 control-label" for="option1"></label>  
          <div class="col-md-12">
            <input id="option1" name="option1" placeholder="Enter option a" class="form-control input-md" type="text" required="true" >
          </div>
      </div>

      <div class="form-group">
        <label class="col-md-12 control-label" for="option2"></label>  
          <div class="col-md-12">
           <input id="option2" name="option2" placeholder="Enter option b" class="form-control input-md" type="text" required="true" >
          </div>
      </div>

      <div class="form-group">
        <label class="col-md-12 control-label" for="option3"></label>  
          <div class="col-md-12">
            <input id="option3" name="option3" placeholder="Enter option c" class="form-control input-md" type="text" required="true" >
          </div>
      </div>

      <div class="form-group">
        <label class="col-md-12 control-label" for="option4"></label>  
          <div class="col-md-12">
            <input id="option4" name="option4" placeholder="Enter option d" class="form-control input-md" type="text" required="true" >
          </div>
      </div>
      <br />
        < b>Correct answer</b>:<br />
      <div class="form-group">
        <label class="col-md-12 control-label" for="option"></label>  
        <div c  lass="col-md-12">
            <input id="answer" name="answer" placeholder="Enter option answer" class="form-control input-md" type="text" required="true" >
          </div>
      </div>
'; 

echo '  
      <div class="form-group">
        <label class="col-md-12 control-label" for=""></label>
          <div class="col-md-12"> 
           <input  type="submit" class="btn btn-primary" value="Submit" class="sub btn btn-primary" name="addque"/>
          </div>
        </div>

        </fieldset>
      </form>
    </div>';
}
}
	
	require_once('admintemplate.php');
	?>
  <script type="text/javascript">
  function ConfirmDelete(){
      var d = confirm('Do you really want to delete data?');
      
      if(d == false){
          return false;
    }
}

</script>