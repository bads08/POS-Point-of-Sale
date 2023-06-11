<?php

include "../../config/connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$uname = $_POST["uname"];
$pass = $_POST["pass"];
$role = $_POST["role"];

$date2 = date("Ym");
$generate_ref_no = rand(111111, 999999)."-".$date2;

if (isset($_POST["btnuser"])) {
    $sql = "INSERT INTO `users`(
        `fname`,
        `lname`,
        `uname`,
        `password`,
        `user_type_id`
    )
    VALUES('$fname', '$lname', '$uname', '$pass', '$role')";

        $query2 = $conn->query($sql);
        
        if ($query2 === true) {
            $_SESSION["alert-user-added"] = "fire";
            header("LOCATION: ../users.php");
        }
   

}
?>