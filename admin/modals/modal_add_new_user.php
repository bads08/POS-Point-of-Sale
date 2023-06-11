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