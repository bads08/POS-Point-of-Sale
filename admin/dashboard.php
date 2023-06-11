<?php 
 session_start();
 require_once "class/order.php";
 $get = new order();
 include "../config/connection.php"; 
 include "query/reference_generator.php";
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
	  <h1 class="text-muted">
		Dashboard
	  </h1>
	</section>
     
	<!-- Main content -->
	<section class="content">
	  <div class="row magictime slideRightReturn">
          <div class="col-md-3">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php $get->sales_today();?></h3>

              <p>Sales Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
          </div>
          <div class="col-md-3">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php $get->total_sales();?></h3>

              <p>Total Sales</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
          </div>
          <div class="col-md-3">
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php $get->total_profit();?></h3>

              <p>Total Profit</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
          </div>
          <div class="col-md-3">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php $get->products_total_ammount()?></h3>

              <p>Current Total Products Amount</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
          </div>

      </div>
      <div class="row magictime slideRightReturn">
        <div class="col-md-6">
          <div class="box">
          <div class="box-header">
           <h3 class="box-title">Latest Transactions</h3>
          </div>
          <div class="box-body">
          <table id="example2" class="table table-condensed">
           <thead class="bg-gray">
           <tr>
            <th>Transaction NO</th>
            <th>Product Name</th>
            <th>Order QTY</th>
           </tr>
           </thead>
           <tbody>
           <tr>
            <?php $get->recent_transactions();?>
           </tr>
           </tbody>
          </table>
          </div>
          </div>
        </div>
        <div class="col-md-6"></div>
      </div>
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
  $("#dash").addClass("active");
});
</script>
</body>
</html>
