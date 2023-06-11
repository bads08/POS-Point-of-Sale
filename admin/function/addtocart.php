<?php
session_start();
include "../../config/connection.php"; 
include "../query/reference_generator.php";

$user_id = $_SESSION["user_id"];
$date = date("Y-m-d");
$time = date("h:i:sa");
if (isset($_POST["btncart"])) {
    if (empty($_POST["product_id"])) {
        $_SESSION["alert_empty"] = "fire";
        header("LOCATION: ../order.php");
    }else{
        $productid = $_POST["product_id"];
    }
 
                 

    if ($productid) {
        foreach ($productid as $new_productid) {
            $check_query = "SELECT
                  products.prodimage,
                  products.prodname,
                  products.orig_price,
                  orders.id_order,
                  orders.ref_no,
                  orders.prod_order_id,
                  orders.order_qty,
                  orders.time_order,
                  orders.date_of_order,
                  orders.`status`
                  FROM
                  products
                  INNER JOIN orders ON products.id_prod = orders.prod_order_id WHERE prod_order_id = '$new_productid' AND ref_no = '$new_ref' AND `status`='pending' ";
                  $order_result = $conn->query($check_query);
                  if($order_result->num_rows > 0 ) {
                    while ($row2 = $order_result->fetch_assoc()) {
                        $check_id = $row2["prod_order_id"];
                    }
                }
            if ($check_id == $new_productid ) {
                $update_qty_sql = "UPDATE orders SET order_qty = order_qty + 1 WHERE prod_order_id = '$new_productid' AND ref_no = '$new_ref' ";
                $update_qty2_sql = "UPDATE products SET stock = stock - 1 WHERE id_prod = '$new_productid'";
                if ($conn->query($update_qty_sql) === true) {
                    if ($conn->query($update_qty2_sql) === true) {
                        header("LOCATION: ../order.php");
                    }
                    
                }
            }
            else{
                $order_sql = "INSERT INTO orders (ref_no,prod_order_id,order_qty,time_order,date_of_order,status, user_id) VALUES ('$new_ref','$new_productid','1','$time','$date','pending', '$user_id')";
                $update_qty_sql = "UPDATE products SET stock = stock - 1 WHERE id_prod = '$new_productid'";
            if ($conn->query($order_sql) === true){
                
                if ($conn->query($update_qty_sql) === true) {
                    header("LOCATION: ../order.php");
                }
                
            }
            }
        }
    }
}

if (!isset($_POST["btncart"])) {
    header("LOCATION: ../order.php");
}else{
    echo "error";
}
?>