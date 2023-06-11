<?php 
 session_start();
 require_once "class/order.php";
 $order = new order();
 include "../config/connection.php"; 
 include "query/reference_generator.php";
 include "auth.php";
 $total_final=0;
 if (isset($_SESSION["transaction_no"])) {
  echo "<script>window.open('http://localhost/pos/admin/resibo.php?tran={$_SESSION['transaction_no']}', 'MsgWindow', 'width=1000,height=1000');</script>";
 } else {
  echo "";
 }
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS</title>
  <?php include "shared/link.php";?>
  <style>
    
  </style>
</head>
<body class="skin-yellow sidebar-mini fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <?php include "shared/header.php";?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include "shared/aside.php";?>
  
  <!-- =============================================== -->

  <?php
    if (isset($_SESSION["welcome_user"]) == "fire") {?>
      <div class="alert magictime slideUp">
        <p>Welcome Back <span class="text-orange"><?php echo $_SESSION["user_lname"]?></span>.</p>
      </div>
    <?php unset($_SESSION["welcome_user"]); } ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:gray;">
        Point of Sale
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
       <form action="function/addtocart.php" method="POST"> 
         <div class="row">
           <div class="col-md-3"> 
           <h3 class="box-title">Select product  <button type="submit" id="btncart" class="btn btn-sm bg-orange btn-add-to-cart" name="btncart"> <i class="fa fa-plus"></i> Add to cart</button></h3>
           </div>
           <div class="col-md-3"> 
          
           </div>
           <div class="col-md-2"> 
           <select name="category" id="category" class="form-control">
          <option disabled selected>Filter</option>
         <?php $order->category();?>
        </select>
           </div>
           
           <div class="col-md-4"> 
           </div>
         </div>
          
        </div>
        <div class="box-body">
          <div class="row">
       <div class="col-md-8 flex-prod scrolly" id="myprod">
        <?php
          $order->getproducts();
        ?>
        </form>
      </div>
        <div class="col-md-4">     
          <div class="callout bg-black">
            <h4 id="totalview"></h4>
           </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding scroll">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Item</th>
                  <th>QTY</th>
                  <th>Price</th>
                </tr>
                <?php 
                  
                  $order_query = "SELECT
                  products.prodimage,
                  products.prodname,
                  products.orig_price,
                  products.profit,
                  orders.id_order,
                  orders.ref_no,
                  orders.prod_order_id,
                  orders.order_qty,
                  orders.time_order,
                  orders.date_of_order,
                  orders.`status`
                  FROM
                  products
                  INNER JOIN orders ON products.id_prod = orders.prod_order_id WHERE ref_no = '$new_ref' AND `status`='pending'";
                  $order_result = $conn->query($order_query);
                  if($order_result->num_rows > 0 ) {
                    while ($row2 = $order_result->fetch_assoc()) {
                    $or_qty = $row2["order_qty"];
                    $price = $row2["orig_price"] + $row2["profit"];  
                    $multiply = $or_qty*$price;            
                    $total_final += $multiply;
                 ?>

                <tr> 
                  <td><?php echo $row2["prodname"];?></td>
                  <td><?php echo $row2["order_qty"];?></td>
                  <td><?php echo number_format($multiply,2);?></td>
                  <td>
                    <a href="function/add_quantity.php?id=<?php echo $row2['prod_order_id']?>" class="btn btn-default btn-sm"><i class="fa fa-plus"></i></a>&nbsp;
                    <a href="function/add_quantity.php?minus=<?php echo $row2['prod_order_id']?>" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></a>
                 </td>
                <tr>
                <?php  }} else {?>
                  <tr> 
                  <td colspan="4" style="color:red;"><center>Select Item First</center></td>
                <tr>
                <?php }?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody></table>
              
            </div>
        
              <p hidden id="total"><?php echo $total_final?></p>
              <button type="button" class="btn bg-orange btn-block" id="checkbtn" data-toggle="modal" data-target="#modal-cash" accesskey="q">
              Proceed to Payment (Alt+Q)
              </button>
              <a href="function/void.php?get_ref=<?php echo $new_ref?> && get_id=<?php echo $new_user_id?>" class="btn btn-danger btn-block" id="voidbtn" accesskey="w">Void (Alt+W)</a>
          </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <section>
      <div class="modal fade" id="modal-cash">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Payment</h4>
                </div>
                <div class="modal-body">
                  <table class="table table-responsive">
                    <tr>
                      <th>Total: </th>
                      <td><input type="text" class="form-control" id="totalview2"></td>
                    </tr>
                    <tr>
                      <th>Cash Tendered: </th>
                      <td><input type="text" class="form-control" id="cash"></td>
                    </tr>
                    <tr>
                      <th>Change: </th>
                      <td><input type="text" class="form-control" id="result"></td>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer">
                  <div class="btn-group">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <a href="function/checkout.php?get_ref=<?php echo $new_ref?> && get_id=<?php echo $new_user_id?>" class="btn bg-yellow" id="paybtn">Proceed to Checkout</a>
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "shared/footer.php";?>

</div>
<!-- ./wrapper -->

<?php include "shared/script.php";?>
<script>
$(document).ready(function(){

  var checkbtn  = $("#checkbtn").html();
  var total     = $("#total").html();
  var view      = $("#totalview").html();
  var txt_total = "TOTAL:";
  var paybtn    = $("#paybtn").val();
  var cash      = $("#cash").val();
  var topay   = $("#totalview2").val();
     
  $("#cash").on("keyup",function (params) {
    var cash      = parseFloat($("#cash").val());
    var topay     = parseFloat($("#totalview2").val());
    var result = cash - topay;
    if (topay > cash) {
      $("#result").val("0");
      $("#paybtn").hide();
    }
    else if (topay <= cash) {
      $("#result").val(result);
      $("#paybtn").show();
    }
    else if(isNaN($("#result").val)){
    $("#result").val("0");
    }
  })  
    $("#paybtn").hide();
    $("#sale").addClass("active");
    $("#btncart").hide();
    $(":input").click(function (params) {
      if ($(":input").is(":checked")) {
      $("#btncart").show();
    }else{
      $("#btncart").hide();
    }
    });
    setTimeout(() => {
      $(".alert").fadeOut();
    }, 8000);
    if (total == "0") {
        $("#checkbtn").hide();
        $("#voidbtn").hide();
    }
    if (total) {
        $("#totalview").html(txt_total+" "+total);
        $("#totalview2").val(total);
    }
    $("#category").change(function() {
    var value = $(this).val().toLowerCase();
    $("#myprod p").parents().filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


});
</script>
</body>
</html>
