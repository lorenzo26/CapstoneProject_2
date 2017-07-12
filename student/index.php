
<?php
include 'check_login.php';
  function get_title(){
    echo "Home";
  }
  
function display_content(){
echo '
	 <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    </div>


    ';
	include('profile.php');
	}
	require_once('studenttemplate.php');
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


	
