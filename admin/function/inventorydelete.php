<?php
session_start();
include_once "../../config/connection.php";
$id = $_POST["id"];
if (isset($_POST["btndel"])) {
    

    $sql = "DELETE
    FROM
        `products`
    WHERE
        `id_prod` = '$id'";
        if ($conn->query($sql) === TRUE) {
            $_SESSION["alert_delete"] = "fire";
            $_SESSION["get_id"] = $id;
            header("LOCATION: ../inventory.php");
        }
}
?>