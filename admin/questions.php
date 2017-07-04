<?php
 require_once("check_login.php");
  function get_title(){
    echo "List Of Questions";
  }


function display_content(){

	echo '
		<div class="borderStudent">
			<section class="content-header">
      	<h1>List Of Question</h1>
    		<section class = "content">
    			<div class="row">
            <section class="col-lg-12">
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-users"></i>
                  <h3 class="box-title">Questions found on Database</h3>
                </div>
                <div class="box-body">
			            <table class="table">
                    <tbody>
             			    <tr>                
	                      <th>#</th>
	                      <th>Question</th>
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
                      $sql = "SELECT * FROM questions limit $page1,10";
	             	      $result = mysqli_query($connection,$sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
echo "
                      <tr>
                 				<td>".$row["question_id"]."</td>
                 				<td>".$row["question"]."</td>
                 				<td>
             					    <a title ='EDIT " .$row["question_id"]."' class = 'btn-primary btn-xs' href = 'updateQuestion.php?ref=".$row["question_id"]."'> EDIT
             					    </a>
                        </td>
                      </tr>
";
                      }
                    }$connection->close();
echo '
                    </tbody>
                  </table>
                  <ul class="pagination">';
                  include('../db_config/database.php');
                    $sql = "SELECT * FROM questions";
                    $result = mysqli_query($connection,$sql);

                      if ($result->num_rows > 0) {
                        print '<tr><td colspan="10">';
            						$ragents=mysqli_num_rows($result);
            						$a = $ragents/10;
            						$a = ceil($a);
                        for ($b=1;$b<=$a;$b++){
?>  
                          <li class="paginate_button">
						                <a href="examination.php?page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
                          </li>
<?php
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
require_once('admintemplate.php');

?>
