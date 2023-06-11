  
  <?php
   
   include "../../config/connection.php";

   $sql_del = "SELECT
   `id_prod`,
   `prodimage`,
   `prodname`,
   `prod_category`,
   `stock`,
   `orig_price`,
   `profit`
FROM
   `products`";
   $result_del = $conn->query($sql_del);
   if ($result_del->num_rows > 0) {
     while ($rowdel=$result_del->fetch_assoc()) {?>
  <!-- modal -->  
<form action="function/inventorydelete.php" method="post">
  <div class="modal fade" id="del_<?php echo $rowdel["id_prod"]?>">
		  <div class="modal-dialog modal-sm">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span></button>
				<center><h4 class="modal-title">Notification</h4></center>
			  </div>	
			  <div class="modal-body">					
                  <input type="hidden" class="form-control" name="id" value="<?php echo $rowdel["id_prod"]?>" required>                      			
				  <center><p>You want to delete <span><strong><?php echo $rowdel["prodname"]?></strong><span>?</p></center>
			  <div class="modal-footer">
				  <div class="btn-group">
				       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
				       <button type="submit" class="btn bg-orange" name="btndel">Yes</button>
				 </div>	
			  </div>
			</div>
			<!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
     </div>
	 </form>
    <?php } } ?>




    