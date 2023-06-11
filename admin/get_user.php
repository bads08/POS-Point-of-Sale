<?php
include "../config/connection.php";

if (isset($_POST["val1"])) {
    $val1=$_POST["val1"];
    $sql ="SELECT
    users.users_id,
    users.fname,
    users.lname,
    users.uname,
    users.`password`,
    users.user_type_id
    FROM
    users WHERE users_id = '$val1'";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            echo JSON_encode($row);
        }
        return;
    }
}

if (isset($_POST['fname'])) {
    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $role = $_POST["role"];

    $sql = "UPDATE `users`
    SET `fname` ='$fname', `lname` ='$lname', `uname` ='$uname', `password` ='$pass', `user_type_id` ='$role'
    WHERE
        users_id = '$id'";
    $query = $conn->query($sql);
    if ($query === true) {
        echo "updated!";
        return;
    }

}

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "DELETE
    FROM
        `users`
    WHERE `users_id` = '$id'";
    $query = $conn->query($sql);
    if ($query === true) {
        echo "Deleted Successfully.";
        return;
    }
}
?>