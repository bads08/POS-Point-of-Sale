<form action="function/inventoryaction.php" method="POST" enctype="multipart/form-data">
	  <div class="modal fade" id="modal-add">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Inventory Add Form</h4>
			  </div>	
			  <div class="modal-body">
                <div class="row">
					<div class="col-md-6">
					<div class="form-group">
                  <label class="text-muted">Product name</label>
                  <input type="text" class="form-control" name="prodname" placeholder="Enter product name" required>
                </div>
                <div class="form-group">
                  <label class="text-muted">Category</label>
                  <select class="form-control" name="category" required>
                    <option selected disabled>---Select category---</option>
                    <option value="Category 1">Category 1</option>
                    <option value="Category 2">Category 2</option>
                    <option value="Category 3">Category 3</option>
                    <option value="Category 4">Category 4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="text-muted">Stock</label>
                  <input type="number" class="form-control" name="stock" placeholder="Enter stock" required>
                </div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
                  <label class="text-muted">Original price</label>
                  <input type="number" class="form-control" name="origprice" placeholder="Enter original price" required>
                </div>
                <div class="form-group">
                  <label class="text-muted">Profit</label>
                  <input type="number" class="form-control" name="profit" placeholder="Enter profit" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile" class="text-muted">Upload Image</label>
                  <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
                </div>
					</div>

				</div>
				
			  <div class="modal-footer">
				<div class="btn-group">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn bg-orange" name="btninventory">Save</button>
				</form>
				</div>	
			  </div>
			</div>
			<!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>