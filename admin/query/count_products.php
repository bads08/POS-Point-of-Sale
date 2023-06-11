<?php
$cprod_sql = "SELECT id_prod
FROM products";
$cprod_result = $conn->query($cprod_sql);
$rowcont = mysqli_num_rows($cprod_result);
echo $rowcont;
?>