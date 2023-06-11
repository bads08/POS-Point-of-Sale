<?php 
 
 session_start();
 include "../config/connection.php"; 
 include "auth.php";
 $fromr = $_GET["from"];
 $tor = $_GET["to"];
 $_SESSION["from"] = $fromr;
 $_SESSION["to"] = $tor;
 $sales = 0;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sales Report</title>
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
		Sales Report <a href="report.php" target="blank" class="btn bg-orange btn-sm"><i class="fa fa-print"></i> Print/Download</a>
	  </h1>
	</section>
     
	<!-- Main content -->
	<section class="content">
	  <!-- Default box -->
	  <div class="box magictime slideRightReturn">
		<div class="box-header with-border">
		  <h3 class="box-title">Sales Report List</h3>
		  <div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
					title="Collapse">
			  <i class="fa fa-minus"></i></button>
		  </div>
		</div>
		<div class="box-body">
		
		<table id="example" class="table table-striped table-hover">
				<thead class="bg-gray">
				<tr>
				  <th>Transaction No.</th>
          <th>Product ID</th>
				  <th>Item</th>
				  <th>Category</th>
          <th style="text-align: right;">Sell price(per item)</th>
          <th>QTY</th>
				  <th style="text-align: right;">Subtotal</th>
          <th>Date placed</th>
				</tr>
				</thead>
				<tbody>
        <?php
        include "../config/connection.php";
		$inventory_query = "SELECT
        orders.id_order,
        orders.ref_no,
        orders.prod_order_id,
        orders.order_qty,
        orders.time_order,
        orders.date_of_order,
        orders.`status`,
        products.id_prod,
        products.prodimage,
        products.prodname,
        products.prod_category,
        products.orig_price,
        products.profit
        FROM
        orders
        INNER JOIN products ON orders.prod_order_id = products.id_prod
        WHERE date_of_order BETWEEN '$fromr' AND '$tor' AND `status` = 'paid'
        ";
		$inventory_result = $conn->query($inventory_query);
		if ($inventory_result->num_rows > 0) {
			while ($row = $inventory_result->fetch_assoc()) {
        $date=date_create($row["date_of_order"]);
				$sell_price = $row["orig_price"]+$row["profit"];
				$show_sell_price = $sell_price;
                $times = $show_sell_price * $row["order_qty"];
                $show_total = $times;
                $sales += $show_total;?>
				<tr>
				<td><?php echo $row["ref_no"];?></td>
        <td><?php echo $row["prod_order_id"];?></td>
				<td><?php echo $row["prodname"];?></td>
				<td><?php echo $row["prod_category"];?></td>
        <td style="text-align: right;"><?php echo number_format($show_sell_price,2)?></td>
				<td><?php echo $row["order_qty"];?></td>
        <td style="text-align: right; color: green;"><?php echo number_format($show_total,2);?></td>
        <td><?php echo date_format($date,"Y/F/d,D");?></td>
				</tr> 

        <?php }}
				else if ($inventory_result->num_rows === 0) {?>
					<tr>
				<td></td>
                <td></td>
				<td></td>
				<td><strong>no result</strong></td>
                <td></td>
				<td></td>
                <td></td>
                <td></td>
				</tr>
				<?php } ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>TOTAL</strong></td>
                <td style="text-align: right;color: green;"><strong><?php echo number_format($sales,2)?></strong></td>
                <td></td>
				</tbody>
			  </table>
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
  $("#inventory").addClass("active");
});
</script>

</body>
</html>
