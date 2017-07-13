  
<?php
include 'check_login.php';
  function get_title(){
    echo "Create";
  }
  
function display_content(){
	if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo '	
<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class ="active"<i class="fa fa-dashboard"></i>Create</li>
      </ol>
    </section>
    <div class="borderStudent">
  <div class="row create">
    <span class="title1" ><b>Create Activity</b></span><br /><br />
      <div class="col-md-3"></div><div class="col-md-6">    
      <form class="form-horizontal title1" name="form" action="process/update_create.php?q=addquiz"  method="POST">
      <fieldset>

        <div class="form-group">
          <label class="col-md-12 control-label" for="name"></label>  
          <div class="col-md-12">
            <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text" required="true">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12 control-label" for="total"></label>  
          <div class="col-md-12">
            <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number" required="true">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12 control-label" for=""></label>
          <div class="col-md-12"> 
            <input  type="submit"  class="btn btn-primary" value="Submit" class="sub btn btn-primary"/>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
  </div>';
}

if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href ="create.php?q=4">Create</a></li>
         <li class ="active">Enter Question</li>
      </ol>
    </section>
    <div class="borderStudent">
      <div class="row">
        
          <div class="col-md-3"></div><div class="col-md-6">

          <form class="form-horizontal title1" name="form" action="process/addques.php?eid='.@$_GET['eid'].'&n='.@$_GET['n'].'"  method="POST">
          <fieldset>
      ';

      for($i=1;$i<=@$_GET['n'];$i++)
      {
      echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br />
          <div class="form-group">
            <label class="col-md-12 control-label" for="question "></label>  
            <div class="col-md-12">
              <textarea rows="3" cols="5" name="question'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."  required="true"></textarea>  
             </div>
           </div>

          <div class="form-group">
            <label class="col-md-12 control-label" for="option1"></label>  
            <div class="col-md-12">
              <input id="option1" name="option1'.$i.'" placeholder="Enter option a" class="form-control input-md" type="text" required="true">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-12 control-label" for="option2"></label>  
            <div class="col-md-12">
              <input id="option2" name="option2'.$i.'" placeholder="Enter option b" class="form-control input-md" type="text" required="true">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-12 control-label" for="option3"></label>  
            <div class="col-md-12">
              <input id="option3" name="option3'.$i.'" placeholder="Enter option c" class="form-control input-md" type="text" required="true">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-12 control-label" for="option4"></label>  
            <div class="col-md-12">
              <input id="option4" name="option4'.$i.'" placeholder="Enter option d" class="form-control input-md" type="text" required="true">
            </div>
          </div>
          <br />
          <b>Correct answer</b>:<br />
          <div class="form-group">
            <label class="col-md-12 control-label" for="option"></label>  
            <div class="col-md-12">
              <input id="answer" name="answer'.$i.'" placeholder="Enter option answer" class="form-control input-md" type="text" required="true">
            </div>
        </div>
      '; 
      }
echo '    
        <div class="form-group">
          <label class="col-md-12 control-label" for=""></label>
            <div class="col-md-12"> 
              <input  type="submit"class="btn btn-primary" value="Submit" class="btn btn-primary" name="addq"/>
            </div>
        </div>

        </fieldset>
      </form>
    </div>
    </div>';

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
