<?php
session_start();
include "../../config/connection.php";
$user_id = $_SESSION["user_id"];
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $qty = $_GET["qty"];
    $ref = $_GET["ref"];

    $query = $conn->query("UPDATE products SET `stock` = `stock` + '$qty' WHERE `id_prod` = '$id'");

    if ($query === TRUE) {
        $conn->query("DELETE FROM orders WHERE prod_order_id = '$id' AND status = 'void' AND user_id = '$user_id' AND ref_no = '$ref'");
        $_SESSION["success"] = "fire";
        header("location: ../void.php");
    }
}