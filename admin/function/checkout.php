<?php
  session_start();
  include "../../config/connection.php";
  $date2 = date("Ym");
  $generate_ref_no = rand(111111, 999999)."-".$date2;
  $get_the_user = $_GET["get_id"];
  $get_the_ref = $_GET["get_ref"];

 //echo $get_the_user;
 //echo "<br>";
 //echo $get_the_ref;
 //return;
  if (isset($_GET["get_ref"])) {
      $update_sql = "UPDATE orders SET `status` = 'paid' WHERE ref_no = '$get_the_ref'";
      $update_sql2 = "UPDATE reference_no_generator SET no_ref_gen = '$generate_ref_no' WHERE id_ref_gen = '$get_the_user' ";
      if (($conn->query($update_sql) === TRUE ) && ($conn->query($update_sql2) === TRUE )) {
          $_SESSION["alert_success"] = "fire";
          $_SESSION["transaction_no"] = $get_the_ref;
          //echo "<script>window.open('http://localhost/pos/admin/resibo.php');</script>";
          header("LOCATION: ../order.php");
          die();
      }  
  }


  if (!isset($_GET["get_ref"])) {
      header("LOCATION: ../order.php");
  }else{
      header("LOCATION: ../order.php");
  }
?>