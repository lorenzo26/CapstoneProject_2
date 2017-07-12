<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOG IN</title>
	<link rel="icon" href="images/icon.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body onload="myNavBar(),mybanner(),content(),myFooter()">

	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">ERROR LOGIN</h4>
	      </div>
	      <div class="modal-body">
	        <p>
	        	<?php
	        		if(isset($_GET['login_err'])){
	        			echo $_GET['login_err'];
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


	<script src="javascript/navbar.js"></script>
	<script src="javascript/banner.js"></script>
	<script src="javascript/content.js"></script>
	<script src="javascript/footer.js"></script>
	<script src="jquery/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<?php
		if(isset($_GET['login_err'])){ ?>
			<script type="text/javascript">
				$('#myModal').modal('show');
			</script>
		<?php	} ?>
	  
</body>
</html>