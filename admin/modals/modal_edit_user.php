
<?php
include "../../config/connection.php";
$sql_user_edit = "SELECT
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
INNER JOIN users ON user_type.user_type_id = users.user_type_id";
$query_users_edit = $conn->query($sql_user_edit);
if ($query_users_edit->num_rows > 0) {
    while ($row_edit = $query_users_edit->fetch_assoc()) {?>

<form action="function/add_user.php" method="post">
<div class="modal fade" id="modal-edit-<?php echo $row_edit["users_id"]?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit User</h4>
              </div>
              <div class="modal-body">
			  <div class="form-group">
                  <label class="text-muted">Firstname</label>
                  <input type="hidden" value="<?php echo $row_edit["users_id"]?>">
                  <input type="text" class="form-control" name="fname" value="<?php echo $row_edit["fname"]?>" placeholder="Enter firstname" required>
                </div>
				<div class="form-group">
                  <label class="text-muted">Lastname</label>
                  <input type="text" class="form-control" name="lname" value="<?php echo $row_edit["lname"]?>" placeholder="Enter lastname" required>
                </div>
				<div class="form-group">
                  <label class="text-muted">Username</label>
                  <input type="text" class="form-control" name="uname" value="<?php echo $row_edit["uname"]?>" placeholder="Enter username" required>
                </div>
				<div class="form-group">
                  <label class="text-muted">Password</label>
                  <input type="text" class="form-control" name="pass" value="<?php echo $row_edit["password"]?>" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                  <label class="text-muted">Role</label>
                  <select class="form-control" name="role" required>
                    <?php
				      include "../../config/connection.php";
					  $sql_user = "SELECT
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
					  INNER JOIN users ON user_type.user_type_id = users.user_type_id";
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
                <button type="submit" class="btn bg-orange" name="btn_user_edit">Save</button>
				</div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 </form>
 <?php }} ?>