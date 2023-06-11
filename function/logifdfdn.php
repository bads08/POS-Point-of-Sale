<?php
session_start();
include "../config/connection.php";
$success = true;
if (isset($_POST["btnlogin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
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
    WHERE uname = '$username'";
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
    if ($password === $check_un) {
        $success;
    }
    else{
        echo "invalid username<br>";
        
    }
    if ($username === $check_pass) {
        $success;
        
    }else{
        echo "invalid password<br>";  
        
    }if ($success) {
        echo "pasok";
    }
}else{
    echo "Account not identified.";
   
}










}
?>