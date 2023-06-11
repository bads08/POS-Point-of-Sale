<?php
session_start();
include "../../config/connection.php";


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stock = $conn->query("SELECT * FROM products WHERE id_prod = '$id'");
    $row = $stock->fetch_assoc();
    
    if ($row["stock"] == 0) {
        $_SESSION["quantity"] = "fire";
        header("LOCATION: ../order.php");
    } else {
        $query = $conn->query("UPDATE `orders` 
        SET 
        `order_qty`=`order_qty` + 1
         WHERE prod_order_id = '$id'");
    
        if ($query === TRUE) {
            $query = $conn->query("UPDATE `products` 
            SET 
            `stock`=`stock` - 1
             WHERE id_prod = '$id'");
                $_SESSION["quantity"] = "fire";
                header("LOCATION: ../order.php");
        }else{
            echo "invalid";
        }
    }
} 

if (isset($_GET["minus"])) {
    $id = $_GET["minus"];

    $stock = $conn->query("SELECT * FROM `orders` WHERE prod_order_id = '$id'");
    $row = $stock->fetch_assoc();
    
    if ($row["order_qty"] == 1) {
        $_SESSION["err"] = "fire";
        header("LOCATION: ../order.php");
    } else {
        $query = $conn->query("UPDATE `orders` 
        SET 
        `order_qty`=`order_qty` - 1
         WHERE prod_order_id = '$id'");
    
        if ($query === TRUE) {
            $query = $conn->query("UPDATE `products` 
            SET 
            `stock`=`stock` + 1
             WHERE id_prod = '$id'");
                $_SESSION["quantity"] = "fire";
                header("LOCATION: ../order.php");
        }else{
            echo "invalid";
        }
    }
}

