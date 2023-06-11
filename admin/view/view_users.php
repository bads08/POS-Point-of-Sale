<table id="example3" class="table table-striped table-hover">
				<thead class="bg-gray">
				<tr>
				  <th>Users ID</th>
				  <th>Name</th>
				  <th>Username</th>
				  <th>Passsword</th>
				  <th>User Type</th>
				  <th><i class="fa fa-cogs"></i> Option</th>
				</tr>
				</thead>
				<tbody>
        <?php
        include "../../config/connection.php";
		$inventory_query = "SELECT
		users.users_id,
		users.fname,
		users.lname,
		users.uname,
		users.`password`,
		users.user_type_id,
		user_type.type,
		user_type.user_type_id
		FROM
		users
		INNER JOIN user_type ON user_type.user_type_id = users.user_type_id
		";
		$inventory_result = $conn->query($inventory_query);
		if ($inventory_result->num_rows > 0) {
			while ($row = $inventory_result->fetch_assoc()) {
				$name = $row["fname"]." ".$row["lname"];
				$pass = md5($row["password"]);
				?>
				<tr>
				<td><?php echo $row["users_id"];?></td>
				<td><?php echo ucwords($name);?></td>
				<td><?php echo $row["uname"];?></td>
				<td><?php echo $pass;?></td>
				<td><?php echo $row["type"]?></td>
				<td>
					<div class="btn-group">
                      <button class="btn btn-sm bg-orange edit" data-toggle="modal" data-target="#modal-edi" id="edit"><i class="fa fa-edit"></i></button>
					  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#del_<?php echo $row["users_id"]?>"><i class="fa fa-trash"></i></a>
					</div>
				</td>
				</tr> <?php }} ?>
				</tbody>
			  </table>   
              
<script>
  $(function () {
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>