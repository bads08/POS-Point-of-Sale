<?php 
 session_start();
 include "../config/connection.php"; 
 include "auth.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory</title>
  <link rel="stylesheet" href="../my-css/style.css">
  <?php include "shared/link.php"?>
  <?php include "shared/script.php"?>
<script>
  $(document).ready(function(){



  $("#users").addClass("active");

  $("body").on("click",".edit",function (params) {
	  var val1 = $(this).val();
	  $.ajax({
		     url: "get_user.php",
			 type: "POST",
			 data: {val1: val1},
			 success: function (result) {
				var x =JSON.parse(result);
				$("#id").val(x.users_id);
				$("#fname").val(x.fname);
				$("#lname").val(x.lname); 
				$("#uname").val(x.uname);
				$("#pass").val(x.password); 
				$("#role").val(x.user_type_id); 
			 }})
  })

  $("#btn_user_edit").on("click", function (e) {
		$.ajax({
		  url: "get_user.php",
		  type: "POST",
		  data: $("#userform").serialize(),
		  cache: false,
		  success: function (result) {
			$("#btn_user_edit").hide();
			$("#cont-edit").hide(function () {
				$("#message").html("Edit Successfully!");
			setTimeout(() => {
				location.reload();return;
			}, 3000);
			})
		  }
	  })
	
  })


  $(".delete").on("click", function () {
	  var id = $(this).val();
	  $("#id_delete").val(id);
      $("#delete_user").html("Proceed to delete" + id);
  })

  $("#btn_delete").on("click", function () {
	  var id = $("#id_delete").val();
	  $.ajax({
		  url: "get_user.php",
		  type: "POST",
		  data: {id: id},
		  cache: false,
		  success: function (result) {
			$("#delete_user").hide(function () {
				
				$("#message-delete").html(result);
				$("#btn_delete").hide(function (params) {
					setTimeout(() => {
				location.reload();
			  }, 3000);
				});
			  
			})
			  
		  }
	  })
  })




});
</script>
</head>
<body class="skin-yellow sidebar-mini fixed">
<!-- Site wrapper -->
<div class="overlay">
<div class="loader"></div>
</div>
<div class="wrapper">


  <?php include "shared/header.php"?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include "shared/aside.php"?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1 style="color:gray;">
		Users
	  </h1>
	</section>
     
	<!-- Main content -->
	<section class="content">
	  <!-- Default box -->
	  <div class="box magictime slideRightReturn">
		<div class="box-header with-border">
		  <h3 class="box-title">Users List <button type="button" class="btn btn-sm bg-orange" data-toggle="modal" data-target="#modal-add-users">
				New Entry
			  </button></h3>
		  <div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
					title="Collapse">
			  <i class="fa fa-minus"></i></button>
		  </div>
		</div>
		<div class="box-body table-responsive">
		
		<table id="example2" class="table table-striped">
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
        include "../config/connection.php";
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
				$pass = $row["password"];
				?>
				<tr>
				<td><?php echo $row["users_id"];?></td>
				<td><?php echo ucwords($name);?></td>
				<td><?php echo $row["uname"];?></td>
				<td><?php echo $pass;?></td>
				<td><?php echo $row["type"]?></td>
				<td>
					<div class="btn-group">
                      <button class="btn btn-sm bg-orange edit" data-toggle="modal" data-target="#modal-edit" value="<?php echo $row["users_id"]?>"><i class="fa fa-edit"></i></button>
					  <button class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#del" value="<?php echo $row["users_id"]?>"><i class="fa fa-trash"></i></a>
					</div>
				</td>
				</tr> <?php }} ?>
				</tbody>
			  </table>  
		  
		<!-- /.box-body -->
		</div>
	  <!-- /.box -->

	  <!-- modal -->
	  
		
		<!-- modal edit -->
		
        
	</section>
	<section>
	<form id="userform">
<div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit User</h4>
              </div>
              <div class="modal-body">
			  <h4 id="message" class="text-green"></h4>
			 <div id="cont-edit">
			 <div class="form-group">
                  <label class="text-muted">Firstname</label>
                  <input type="hidden" value="" id="id" name="id">
                  <input type="text" class="form-control" id="fname" name="fname" value="" placeholder="Enter firstname">
                </div>
				<div class="form-group">
                  <label class="text-muted">Lastname</label>
                  <input type="text" class="form-control" id="lname" name="lname" value="" placeholder="Enter lastname">
                </div>
				<div class="form-group">
                  <label class="text-muted">Username</label>
                  <input type="text" class="form-control" id="uname" name="uname" value="" placeholder="Enter username">
                </div>
				<div class="form-group">
                  <label class="text-muted">Password</label>
                  <input type="text" class="form-control" id="pass" name="pass" value="" placeholder="Enter password">
                </div>
                <div class="form-group">
                  <label class="text-muted">Role</label>
                  <select class="form-control" id="role" name="role">
                    <?php
				      include "../config/connection.php";
					  $sql_user = "SELECT
					  *
				  FROM
					  `user_type`";
					  $query_users = $conn->query($sql_user);
					  if ($query_users->num_rows > 0) {
						  while ($rows = $query_users->fetch_assoc()) {?>
							<option value="<?php echo $rows["user_type_id"]?>"><?php echo $rows["type"]?></option> 
						
					<?php }} ?>
                  </select>
                </div>
			 </div>
              </div>
              <div class="modal-footer">
                <div class="btn-group">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-orange" id="btn_user_edit">Save</button>
				</div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 </form>

 <form id="">
<div class="modal fade" id="del">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Notification</h4>
              </div>
              <div class="modal-body">
			  <h4 id="message-delete" class="text-green"></h4>
			  <div class="form-group">
                  <input type="hidden" value="" id="id_delete" name="id_delete">
                  <center><p id="delete_user"></p></center>
                </div>
				
              </div>
              <div class="modal-footer">
                <div class="btn-group">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-orange" id="btn_delete">Delete</button>
				</div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 </form>
 <form action="function/add_user.php" method="post" id="myForm" onsubmit="return validateForm()">
<div class="modal fade" id="modal-add-users">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add User</h4>
              </div>
              <div class="modal-body">
			  <div class="form-group">
                  <label class="text-muted">Firstname</label>
                  <input type="text" class="form-control" name="fname" placeholder="Enter firstname" required>
                </div>
				<div class="form-group">
                  <label class="text-muted">Lastname</label>
                  <input type="text" class="form-control" name="lname" placeholder="Enter lastname" required>
                </div>
				<div class="form-group">
                  <label class="text-muted">Username</label>
                  <input type="text" class="form-control" name="uname" placeholder="Enter username" required>
                </div>
				<div class="form-group">
                  <label class="text-muted">Password</label>
                  <input type="text" class="form-control" name="pass" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                  <label class="text-muted">Role</label>
                  <select class="form-control" name="role" required>
                    <?php
				      include "../../config/connection.php";
					  $sql_user = "SELECT
            `user_type_id`,
            `type`
        FROM
            `user_type`";
					  $query_users = $conn->query($sql_user);
					  if ($query_users->num_rows > 0) {
						  while ($rows = $query_users->fetch_assoc()) {?>
							<option value="<?php echo $rows["user_type_id"]?>"><?php echo $rows["type"]?></option> 
						
					<?php }} ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <div class="btn-group">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" id="btnsave" class="btn bg-orange" name="btnuser">Save</button>
				</div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		</form>

<script>
function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  var y = document.forms["myForm"]["lname"].value;
  if (x == "" || y == "") {
    alert("Name must be filled out");
    
  }else{
    document.getElementById("btnsave").innerHTML = "Saving..."
  }
}
</script>
	</section>
	<!-- /.content -->
	
  </div>

  <!-- /.content-wrapper -->
  
  <?php include "shared/footer.php"?>
  
</div>
<!-- ./wrapper -->



</body>
</html>
