<?php
$id = $_SESSION["user_id"];

$new_user_id = $id;

$gen_sql = "SELECT * FROM `reference_no_generator`";

 $gen_result = $conn->query($gen_sql);
 if ($gen_result->num_rows > 0) {
     while ($row = $gen_result->fetch_assoc()) {
        $new_ref = $row["no_ref_gen"];
     }
 }
?>