<?php

include "../../config/connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$uname = $_POST["uname"];
$pass = $_POST["pass"];
$role = $_POST["role"];

if (isset($_POST["btnuser"])) {
    $sql = "INSERT INTO `users`(
        `fname`,
        `lname`,
        `uname`,
        `password`,
        `user_type_id`
    )
    VALUES('$fname', '$lname', '$uname', '$pass', '$role')";
    if ($conn->query($sql) === true) {
        $_SESSION["alert-user-added"] = "fire";
        header("LOCATION: ../users.php");
    }

}
?>