<?php
session_start();
include "../config/connection.php";

$username = $_POST["username"];
$password = $_POST["password"];
$check_un = "";
$check_pass = "";
$check_type = "";
$check;

if (isset($_POST["btnlogin"])) {
    $sql = "SELECT
    user_type.user_type_id,
    user_type.type,
    users.users_id,
    users.fname,
    users.lname,
    users.uname,
    users.`password`,
    users.user_type_id
    FROM
    user_type
    INNER JOIN users ON user_type.user_type_id = users.user_type_id
    WHERE uname = '$username' ";
    $result = $conn->query($sql);
if ($result->num_rows > 0 ) {
    while ($row = $result->fetch_assoc()){
        $check_un = $row["uname"];
        $check_pass = $row["password"];
        $check_type = $row["type"];
        $_SESSION["user_id"] = $row["users_id"];
        $_SESSION["user"] = $check_un;
        $_SESSION["type"] = $check_type;
        $_SESSION["user_lname"] = $row["lname"];
        $_SESSION["user_fname"] = $row["fname"];
    }
    if ($username != $check_un) {
        $check = 0;
    }
    if ($password != $check_pass) {
        $check = 1;
    }
    if ($username != $check_un && $password != $check_pass) {
        $check = 3;
    }
    if ($check === 0) {
        echo "invalid username";
    }
    if ($check === 1) {
        $_SESSION["pass"] = "alert";
        header("LOCATION: ../login.php");
    }
    if ($check === 3) {
        $_SESSION["alert-error"] = "alert";
        header("LOCATION: ../login.php");
    }else{
        if ($username === $check_un && $password === $check_pass && $check_type === "administrator") {
            $_SESSION["welcome_user"] = "fire";
            header("LOCATION: ../admin/order.php");
        }
        if ($username === $check_un && $password == $check_pass && $check_type === "staff") {
            $_SESSION["welcome_user"] = "fire";
            header("LOCATION: ../admin/order.php");
        }else{
            if (!isset($_POST["btnlogin"])) {
                echo "opps! youre out of range";
            }
        }
    }
}else{
    $_SESSION["user"] = "alerts";
    header("LOCATION: ../login.php");
}

}
?>