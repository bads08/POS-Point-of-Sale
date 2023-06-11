<?php 
 session_start();
 include "../config/connection.php"; 
 include "auth.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Paid Transactions</title>
  <link rel="stylesheet" href="../my-css/style.css">
  <?php include "shared/link.php"?>
</head>
<body class="skin-yellow sidebar-mini fixed">
<!-- Site wrapper -->
<div class="overlay">
<div class="loader"></div>
</div>
<div class="wrapper">

  <?php include "shared/header.php"?>
  
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include "shared/aside.php"?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1 style="color:gray;">
		Transactions
	  </h1>
	</section>
     
	<!-- Main content -->
	<section class="content">
	  <!-- Default box -->
	  <div class="box magictime slideRightReturn">
		<div class="box-header with-border">
		  <h3 class="box-title label bg-orange">Paid Transaction List</h3>
		  <div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
					title="Collapse">
			  <i class="fa fa-minus"></i></button>
		  </div>
		</div>
		<div class="box-body">
		
		  <div id="loadpaid"></div>
		<!-- /.box-body -->
		</div>
	  <!-- /.box -->

	  <!-- modal -->
	  
		
		<!-- modal edit -->
		
        
	</section>
	
	<!-- /.content -->
	
  </div>

  <!-- /.content-wrapper -->
  
  <?php include "shared/footer.php"?>
  
</div>
<!-- ./wrapper -->


<?php include "shared/script.php"?>
<script>
  $(document).ready(function(){
  $("#paid").addClass("active");
});
</script>
</body>
</html>
