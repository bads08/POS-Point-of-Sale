<?php
$cprod_sql = "SELECT users_id
FROM users";
$cprod_result = $conn->query($cprod_sql);
$rowcontuser = mysqli_num_rows($cprod_result);
echo $rowcontuser;
?>