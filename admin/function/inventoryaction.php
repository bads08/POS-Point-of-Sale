<?php 
session_start();
include "../../config/connection.php";

$prod_name = $_POST["prodname"];
$prod_category = $_POST["category"];
$prod_stock = $_POST["stock"];
$prod_orig_price = $_POST["origprice"];
$prod_profit = $_POST["profit"];


$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["btninventory"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        header("LOCATION: ../inventory.php");
        $uploadOk = 1;
    } else {
        header("LOCATION: ../inventory.php?msg=File is not an image");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    header("LOCATION: ../inventory.php?msg=Sorry, file already exists");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 90000000) {
    header("LOCATION: ../inventory.php?msg=Sorry, your file is too large");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $_SESSION["alert-invalid-image"]="fire";
    header("LOCATION: ../inventory.php");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}else{
// if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $imagename = basename( $_FILES["fileToUpload"]["name"]);

        $insert_sql = "INSERT INTO `products`(
            prodimage,
            prodname,
            prod_category,
            stock,
            orig_price,
            profit
        )
        VALUES('$imagename','$prod_name','$prod_category','$prod_stock','$prod_orig_price',
           '$prod_profit')";
        if ($conn->query($insert_sql) === TRUE) {
            $_SESSION["alert_inserted"] = "fire";
            header("LOCATION: ../inventory.php");
        }
    } 
    else {
        header("LOCATION: ../inventory.php?msg=Sorry, there was an error uploading your file");
    }
}
?>