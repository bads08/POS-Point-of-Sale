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
  <?php //include "shared/aside.php"?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1 style="color:gray;">
		Sales Report <a href="sales-report2.php" class="btn bg-orange btn-sm"><i class="fa fa-print"></i> Print/Download</a>
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
        <?php

require('../plugins/fpdf/fpdf.php');

$from = $_SESSION["from"];
$to = $_SESSION["to"];
$sales = 0;
$fill = true;


$pdf = new FPDF('P','mm','a4');
//$pdf = new FPDF();
$pdf->SetTitle('Sales Report',true);
$pdf->AddPage();

//title header
$pdf->SetFont('Arial','B',16);

//set position from left
$pdf->SetX(80);
$pdf->Cell(40,5,'Sales Report','','0','C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->SetX(80);
$pdf->Cell(40,5,'From: '.$from.' to '.$to,'','0','C');
$pdf->Ln();
$pdf->Ln();

//table header
$pdf->SetLeftMargin(25);

// Colors, line width and bold font
$pdf->SetFillColor(217, 217, 217);
$pdf->SetDrawColor(0);
$pdf->SetLineWidth(0);




$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Product ID','1','0','L',$fill);
$pdf->Cell(40,5,'Product Name','1','0','L',$fill);
$pdf->Cell(40,5,'Quantity','1','0','C',$fill);
$pdf->Cell(40,5,'Price','1','0','C',$fill);
$pdf->Ln();

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
		WHERE date_of_order BETWEEN '$from' AND '$to' AND status = 'paid'
        ";
		$inventory_result = $conn->query($inventory_query);
		if ($inventory_result->num_rows > 0) {
			while ($row = $inventory_result->fetch_assoc()) {
                
				$orderid = $row["prod_order_id"];
				$name = $row["prodname"];
				$qty = $row["order_qty"];
			
				

				$sell_price = $row["orig_price"]+$row["profit"];
				$show_sell_price = $sell_price;
                $times = $show_sell_price * $row["order_qty"];
                $show_total = $times;
                
                $sales += $show_total;
				
			      
			
	
			//table row
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(40,5,$orderid,'LR','0','L');
			$pdf->Cell(40,5,$name,'R','0','L');
			$pdf->Cell(40,5,$qty,'R','0','C');
			$pdf->Cell(40,5,number_format($show_total,2),'R','0','R');
			$pdf->Ln();

			}
		}
		
			//table foteer
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(40,5,'','LTB','0','L');
			$pdf->Cell(40,5,'','TB','0','L');
			$pdf->Cell(40,5,'TOTAL','TB','0','R');
			$pdf->Cell(40,5,number_format($sales,2),'1','0','R');
			$pdf->Ln();
            $pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();

			//$pdf->SetFont('Arial','b',10);
			//$pdf->SetX(130);
			//$pdf->Write(10, 'Generated By:'.' '.ucfirst($_SESSION['user_fname']).' '.ucfirst($_SESSION['user_lname']));
   

$pdf->Output();
unset($from);
unset($to);
?>
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
