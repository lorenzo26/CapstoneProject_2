
<?php
include 'check_login.php';
  function get_title(){
    echo "Messages";
}
  
function display_content(){
	if ($_GET['ref']=="student") {

    echo '
    <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class ="active">Student</li>
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
                           <th>Student ID</th>
                          <th>Name</th>
                          <th>Status</th>                        
                          <th>Options</th>
                        </tr>
                      </tbody>
                      <tbody>';
                      include('../db_config/database.php');
                        error_reporting(0);
                        $id =$_GET['id'];
                        $page =$_GET['page'];
                      if ($page=="" || $page=="1"){
                        $page1=0;
                      }else{
                        $page1=($page*10)-10;
                      }
                     
                        $sql = "SELECT * FROM user_info where user_id != '$id' ORDER BY online desc limit $page1,10";
                        $result = mysqli_query($connection,$sql);

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $online= $row['online'];
echo "
                        <tr>
                         <td>".$row["user_id"]."</td>
                          <td>".$row["lastName"].", ".$row["firstName"]." ".$row["middleName"]."</td>
                          <td>";
                          if ($online==1) {
                           echo "<img src='../images/online.png' alt ='online' class ='online'>";
                          }else{
                            echo "<img src='../images/offline.png' alt ='offline' class='offline'>";
                          }
echo "                          </td>
                          <td>                      
                            <form method='POST' action='Messages.php?to=".$row["user_id"]."&id=$id&ref=newmsg'>
            
                              <input class = 'btn-default btn-xs' title ='SEND message to " .$row["lastName"], "," ,$row["firstName"] ."' type='submit' name='sendmsg' value='SEND MESSAGE'>
                            </form>
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
                        $sql = "SELECT * FROM user_info";
                        $result = mysqli_query($connection,$sql);

                      if ($result->num_rows > 0) {
                        print '<tr><td colspan="10">';
                        $ragents=mysqli_num_rows($result);
                        $a = $ragents/10;
                        $a = ceil($a);
                      for ($b=1;$b<=$a;$b++){
?>                      <li class="paginate_button">
                          <a href="messages.php?id=<?php echo "$id";?>&ref=student&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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


  if ($_GET['ref']=="newmsg") {
  $sendTo =$_GET['to'];
    $from =$_GET['id'];
  include('../db_config/database.php');
  $sql = "SELECT concat(lastName,', ',firstName,' ',middleName) as Fullname FROM user_info where user_id='$sendTo'";
    $result = mysqli_query($connection,$sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $name = $row['Fullname'];
            }
        } 
        $connection->close();

?>
<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href ="Messages.php?ref=student&id=<?php echo "$from"; ?>">Student</a></li>
         <li class ="active">Create Message</li>
      </ol>
    </section>
    </div>

    <div class="borderStudent">
      <section class="content-header">
        <h1></h1>
              <section class = "content">
              <div class="row">
                    <section class="col-lg-12">
                      <div class="box box-info">
                        <div class="box-body">
                          <div class="modal-header">
<?php
  echo '                  <form method="POST" action="process/sendmsg.php?from='.$from.'&sendto='.$sendTo.'">';
 ?>       
                          <h4 class="modal-title">Create Message</h4>
                          <h5 class="modal-title"><?php echo "$name"; ?></h>
                    
                        <div class="modal-body">
                            <textarea class = "form-control" placeholder = " write a text" name="newmsg"></textarea>
                        </div>
                        <div class="modal-footer">
                          <input class = "btn-default btn-xs" title ="SEND" type="submit" name="send" value="SEND">
                       </form>
                    </div>  
                          </div>  
                      </div>  
                  </section>
                </div>
            </section>
          </section>
      </div>
<?php
  }


  if ($_GET['ref']=="inbox") {
   echo '
   <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class ="active">Inbox</li>
      </ol>
    </section>
    </div>
  <div class="borderStudent">
    <section class="content-header">
          <h1>Inbox</h1>
          <section class = "content">
            <div class="row">
              <section class="col-lg-12">
                  <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Messages found on Database</h3>
                    </div>
                    <div class="box-body">
                <table class="table">
                          <tbody>
                            <tr>                
                              <th>From</th>
                              <th>Message</th>
                              <th>Date</th>
                              <th>Options</th>
                            </tr>
                          </tbody>  
                          <tbody>';

                            include('../db_config/database.php');
                       error_reporting(0);
                       $id =$_GET['id'];
                       $page =$_GET['page'];
                    
                    if ($page=="" || $page=="1"){
                      $page1=0;
                    }else{
                        $page1=($page*10)-10;
                      }
                     
                      $sql = "SELECT from_id,  concat(lastName,', ',firstName,' ',middleName) as Fullname, sentTo_id, messages ,date  From message JOIN user_info ON (message.from_id = user_info.user_id) WHERE sentTo_id = $id order by time limit $page1,10";

                          $result = mysqli_query($connection,$sql);

                          if ($result->num_rows > 0) {
   
                              while($row = $result->fetch_assoc()) {
echo "
                              <tr>
                                <td>".$row["Fullname"]."</td>
                                <td>".$row["messages"]."</td>
                                <td>".$row["date"]."</td>
                                <td>
                                  
                                  <form method='POST' action='messages.php?ref=reply&from=".$row["from_id"]."&id=$id'>
                      
                            <input class = 'btn-default btn-xs' title ='REPLY " .$row["from_id"]."' type='submit' name='reply' value='REPLY'>
                            
                          </form>

                                </td>
                              </tr>
";
                    }
                  }
                  $connection->close();
echo '                     
                  </tbody>
                </table>
                    <ul class="pagination">';
                      include('../db_config/database.php');
                    $sql = "SELECT * FROM message";
                    $result = mysqli_query($connection,$sql);

                    if ($result->num_rows > 0) {
                      print '<tr><td colspan="10">';
                      $ragents=mysqli_num_rows($result);
                      $a = $ragents/10;
                      $a = ceil($a);
                      
                      for ($b=1;$b<=$a;$b++){
 ?> 
                      <li class="paginate_button">
                        <a href="messages.php?ref=inbox&id=<?php echo $id; ?>&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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


  if ($_GET['ref']=="reply") {

      $from_id =$_GET['from'];
      $id =$_GET['id'];
    echo '
    <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="Messages.php?ref=inbox&id='.$id.'">Inbox</a></li>
          <li class ="active">Reply</li>
      </ol>
    </section>
    </div>
    <div class="borderStudent">
      <section class="content-header">
        <h1>Conversation</h1>
        <section class = "content">
          <div class="row">
            <section class="col-lg-12">
              <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Messages found on Database</h3>
                </div>
                <div class="box-body">
                  <table class="table">
                    <tbody>
                      <tr>                
                        <th>From</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Time</th>
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
                 
                      $sql = "SELECT from_id,  concat(lastName,', ',firstName,' ',middleName) as Fullname, sentTo_id, messages ,date, time  From message JOIN user_info ON (message.from_id = user_info.user_id) WHERE from_id = $from_id or from_id = $id order by time limit $page1,10";

                      $result = mysqli_query($connection,$sql);

                      if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
echo "
                        <tr>
                          <td>".$row["Fullname"]."</td>
                          <td>".$row["messages"]."</td>
                          <td>".$row["date"]."</td>
                          <td>".$row["time"]."</td>
                        </tr>
";
                      }
                    } $connection->close();
echo '                     
                      </tbody>
                    </table>
                  <ul class="pagination">';
                    include('../db_config/database.php');
                      $sql = "SELECT * FROM message";
                      $result = mysqli_query($connection,$sql);

                    if ($result->num_rows > 0) {
                      print '<tr><td colspan="10">';
                      $ragents=mysqli_num_rows($result);
                      $a = $ragents/10;
                      $a = ceil($a);
                      for ($b=1;$b<=$a;$b++){
?>                          <li class="paginate_button">
                          <a href="messages.php?ref=reply&from=<?php echo "$from_id";?>&id=<?php echo "$id";?>&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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
 
<br>
    <div class="modal-header">
    <form method="POST" action="process/sendreplymsg.php?from='.$id.'&sendto='.$from_id.'">       
      <h4 class="modal-title">Reply Message to</h4>
    </div>
    <div class="modal-body">
      <textarea class = "form-control" placeholder = " write a text" name="replymsg"></textarea>
    </div>
    <div class="modal-footer">
                     
        <input class = "btn-default btn-sm" title ="SEND" type="submit" name="send" value="SEND">
      </form>
    </div>  
       </div>
';
  }

  if ($_GET['ref']=="sentbox") {
    echo '
    <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class ="active">Sentbox</li>
      </ol>
    </section>
    </div>
  <div class="borderStudent">
    <section class="content-header">
          <h1>Sentbox</h1>
          <section class = "content">
            <div class="row">
              <section class="col-lg-12">
                  <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Messages found on Database</h3>
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
                           $id =$_GET['id'];
                           $page =$_GET['page'];
                        
                            if ($page=="" || $page=="1"){
                              $page1=0;
                            }else{
                                $page1=($page*10)-10;
                            }
                             
                           $sql = "SELECT from_id,  concat(lastName,', ',firstName,' ',middleName) as Fullname, sentTo_id, messages ,date  From message JOIN user_info ON (message.sentTo_id = user_info.user_id) WHERE from_id = $id limit $page1,10";
                              $result = mysqli_query($connection,$sql);
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
                    $sql = "SELECT * FROM message";
                    $result = mysqli_query($connection,$sql);

                    if ($result->num_rows > 0) {
                      print '<tr><td colspan="10">';
                      $ragents=mysqli_num_rows($result);
                      $a = $ragents/10;
                      $a = ceil($a);
                      
                      for ($b=1;$b<=$a;$b++){
 ?> 
                      <li class="paginate_button">
                        <a href="messages.php?ref=sentbox&id=<?php echo $id; ?>&page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a>
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
}
require_once('admintemplate.php');
	?>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Message</h4>
        </div>
        <div class="modal-body">
          <p>
            <?php
              if(isset($_GET['message'])){
                echo $_GET['message'];
              }
            ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


<?php
    if(isset($_GET['message'])){ ?>
      <script type="text/javascript">
        $('#myModal').modal('show');
     
    <?php } ?>
</script>



