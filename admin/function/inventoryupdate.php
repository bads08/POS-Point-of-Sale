<?php
session_start();
include "../../config/connection.php";

$id = $_POST["id"];
$prod_name = $_POST["prodname"];
$prod_category = $_POST["category"];
$prod_stock = $_POST["stock"];
$prod_orig_price = $_POST["origprice"];
$prod_profit = $_POST["profit"];

if (isset($_POST["btnupdate"])) {
    $sql="UPDATE
    `products`
SET
    `prodname` = '$prod_name',
    `prod_category` = '$prod_category',
    `stock` = '$prod_stock',
    `orig_price` = '$prod_orig_price',
    `profit` = '$prod_profit'
WHERE
     `id_prod` = '$id' ";
}
if ($conn->query($sql) === TRUE) {
    $_SESSION["alert-update"] = "fire";
    header("LOCATION: ../inventory.php");
}
?>