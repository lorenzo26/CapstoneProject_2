
<?php
include 'check_login.php';
  function get_title(){
    echo "Inbox";
  }
  
function display_content(){
echo '
		<div class="borderStudent">
      <section class="content-header">
        <h1>List Of Messages</h1>
        <section class = "content">
          <div class="row">
            <section class="col-lg-12">
              <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Messages found on Database</h3>
                </div>
                <div class="box-body">
                  <table class="table">
                    <tbody>
                      <tr>                
                        <th>From</th>
                        <th>Message</th>
                        <th>Date</th>
                      </tr>
                    </tbody>  
                    <tbody>';
                      include('../db_config/database.php');
              			   error_reporting(0);
              			   $from_id =$_GET['ref'];
                       $id =$_GET['id'];
              			   $page =$_GET['page'];
							         
                      if ($page=="" || $page=="1"){
								        $page1=0;
                      }else{
								        $page1=($page*10)-10;
							        }
							   
                      $sql = "SELECT from_id,  concat(lastName,', ',firstName,' ',middleName) as Fullname, sentTo_id, messages ,date  From message JOIN user_info ON (message.from_id = user_info.user_id) WHERE from_id = $from_id limit $page1,10";

                      $result = $connection->query($sql);

                      if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
echo "
           			        <tr>
                   				<td>".$row["Fullname"]."</td>
                   				<td>".$row["messages"]."</td>
                   				<td>".$row["date"]."</td>
                   			</tr>
";
                      }
                    } $connection->close();
echo '              			 
				              </tbody>
		                </table>
                  <ul class="pagination">';
                    include('../db_config/database.php');
                      $sql = "SELECT * FROM user_info";
                      $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                      print '<tr><td colspan="10">';
                      $ragents=mysqli_num_rows($result);
                      $a = $ragents/10;
                      $a = ceil($a);
                      for ($b=1;$b<=$a;$b++){
?>                          <li class="paginate_button">
                          <a href="inbox.php?ref=<?php echo $id; ?>&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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
    <div class="borderStudent">
    <section class="content-header">
          <section class = "content">
            <div class="row">
              <section class="col-lg-12">
                  <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="box-body">
                <table class="table">
                          <tbody>
                            <tr>                
                              <th>To</th>
                              <th>Message</th>
                              <th>Date</th>
                            </tr>
                          </tbody>  
                          <tbody>';
                          include('../db_config/database.php');
                       error_reporting(0);
                       $sendTo =$_GET['ref'];
                       $from =$_GET['id'];
                       $page =$_GET['page'];
                    
                    if ($page=="" || $page=="1"){
                      $page1=0;
                    }else{
                        $page1=($page*10)-10;
                      }
                     
                       $sql = "SELECT from_id,  concat(lastName,', ',firstName,' ',middleName) as Fullname, sentTo_id, messages ,date  From message JOIN user_info ON (message.sentTo_id = user_info.user_id) WHERE from_id = $from limit $page1,10";
                          $result = $connection->query($sql);

                          if ($result->num_rows > 0) {
   
                              while($row = $result->fetch_assoc()) {
echo "
                              <tr>
                                <td>".$row["Fullname"]."</td>
                                <td>".$row["messages"]."</td>
                                <td>".$row["date"]."</td
                              </tr>
";
                    }
                  } $connection->close();
echo '                     
                  </tbody>
                </table>
                    <ul class="pagination">';
                      include('../db_config/database.php');
                    $sql = "SELECT * FROM user_info";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                      print '<tr><td colspan="10">';
                      $ragents=mysqli_num_rows($result);
                      $a = $ragents/10;
                      $a = ceil($a);
                      
                      for ($b=1;$b<=$a;$b++){
 ?> 
                      <li class="paginate_button">
                        <a href="inbox.php?ref=<?php echo $id; ?>&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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
                        
<br>
    <div class="modal-header">
    <form method="POST" action="process/sendmsg.php?from='.$from.'&sendto='.$sendTo.'">       
      <h4 class="modal-title">Reply Message to</h4>
    </div>
    <div class="modal-body">
      <textarea placeholder = " write a text" name="replymsg"></textarea>
    </div>
    <div class="modal-footer">
                     
        <input class = "btn-default btn-xs" title ="SEND" type="submit" name="send" value="SEND">
      </form>
    </div>  
';
	}
	require_once('admintemplate.php');
	?>
