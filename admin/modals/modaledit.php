  
  <?php
   
   include "../../config/connection.php";

   $sql_edit = "SELECT
   `id_prod`,
   `prodimage`,
   `prodname`,
   `prod_category`,
   `stock`,
   `orig_price`,
   `profit`
FROM
   `products`";
   $result_edit = $conn->query($sql_edit);
   if ($result_edit->num_rows > 0) {
     while ($rowedit=$result_edit->fetch_assoc()) {?>
  <!-- modal -->  
  <form action="function/inventoryupdate.php" method="post">
  <div class="modal fade" id="edit_<?php echo $rowedit["id_prod"]?>">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Inventory Edit</h4>
			  </div>	
			  <div class="modal-body">
                <div class="row">
					<div class="col-md-6">
				      	<div class="form-group">
                  <label class="text-muted">Product name</label>
                  <input type="hidden" name="id" value="<?php echo $rowedit["id_prod"]?>">
                  <input type="text" class="form-control" name="prodname" placeholder="Enter product name" value="<?php echo $rowedit["prodname"];?>" required>
                </div>
                <div class="form-group">
                  <label class="text-muted">Category</label>
                  <select class="form-control" name="category" required>
                    <option selected value="<?php echo $rowedit["prod_category"]?>"><?php echo $rowedit["prod_category"]?></option>
                    <option value="Category 1">Category 1</option>
                    <option value="Category 2">Category 2</option>
                    <option value="Category 3">Category 3</option>
                    <option value="Category 4">Category 4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="text-muted">Stock</label>
                  <input type="number" class="form-control" name="stock" placeholder="Enter stock" value="<?php echo $rowedit["stock"]?>" max="100" min="0" required>
                </div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
                  <label class="text-muted">Original price</label>
                  <input type="number" class="form-control" name="origprice" placeholder="Enter original price" value="<?php echo $rowedit["orig_price"]?>" required>
                </div>
                <div class="form-group">
                  <label class="text-muted">Profit</label>
                  <input type="number" class="form-control" name="profit" placeholder="Enter profit" value="<?php echo $rowedit["profit"]?>" required>
                </div>
					</div>

				</div>
				
			  <div class="modal-footer">
				  <div class="btn-group">
				       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				       <button type="submit" class="btn bg-orange" name="btnupdate">Save</button>
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




    