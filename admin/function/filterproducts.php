<?php

require_once "../class/order.php";
$order = new order();
if (isset($_POST["category"])) {
    $getcat = $_POST["category"];
    $order->getproductsbyfilter($getcat);
}
?>