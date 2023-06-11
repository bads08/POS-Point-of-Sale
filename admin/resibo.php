
<?php
session_start();

include "auth.php";
require('../plugins/fpdf/fpdf.php');
$transaction_no = $_GET["tran"];

$sales = 0;
$fill = true;

$pdf = new FPDF('P','mm','resibo');
$pdf->AddPage();
$pdf->SetLeftMargin(2);
//$pdf = new FPDF();
$pdf->SetX(1);
$pdf->SetTitle('Receipt',true);


//title header
$pdf->SetFont('Arial','B',11);

//set position from left
//$pdf->SetX(0);
$pdf->Cell(40,5,'Receipt','','0','C');
$pdf->Ln();

//$pdf->SetX(-10);
//$pdf->Cell(40,5,'From: '.$from.' to '.$to,'','0','C');
$pdf->Ln();
$pdf->Ln();

//table header
//$pdf->SetLeftMargin(2);

// Colors, line width and bold font
$pdf->SetFillColor(217, 217, 217);
$pdf->SetDrawColor(0);
$pdf->SetLineWidth(0);

$pdf->SetFont('Arial','',7);
$pdf->Cell(18,4,'Reference no:','','0','L');
$pdf->Cell(25,4, $transaction_no,'','0','L');
$pdf->ln();
$pdf->Cell(22,4,'Date Purchased:','','0','L');
$pdf->Cell(25,4, date("M-d-Y"),'','0','L');
$pdf->ln();
$pdf->ln();

$pdf->SetFont('Arial','',7);
$pdf->Cell(27,5,'Item','B','0','L');
$pdf->Cell(11,5,'Price','B','0','C');
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
		WHERE orders.ref_no = '$transaction_no'";
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
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(27,5,$name.'('.$qty.')','','0','L');
			$pdf->Cell(11,5,number_format($show_total,2),'','0','R');
			$pdf->Ln();

			}
		}
		
			//table foteer
			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(27,5,'TOTAL','T','0','R');
			$pdf->Cell(11,5,number_format($sales,2),'T','0','R');
			$pdf->Ln(18);

            $pdf->SetX(4);
			$pdf->SetFont('Helvetica','B',7);
			$pdf->Cell(0, 0, "THIS IS SERVE AS YOUR");
			$pdf->Ln(3);
			$pdf->SetX(6.5);
			$pdf->SetFont('Helvetica','B',7);
			$pdf->Cell(0, 0, "PROOF OF PAYMENT!");
			$pdf->Ln(3);
			$pdf->SetX(3);
			$pdf->SetFont('Helvetica','B',7);
            $pdf->Cell(0, 0, "THANK YOU & COME AGAIN!");


$pdf->Output();
unset($_SESSION['transaction_no']);
?>
