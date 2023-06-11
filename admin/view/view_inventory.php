<table id="example2" class="table table-striped table-hover">
				<thead class="bg-gray">
				<tr>
				  <th>Image</th>
				  <th>Name</th>
				  <th>Category</th>
				  <th>Stock</th>
				  <th>Original price</th>
				  <th>Profit</th>
				  <th>Sell price</th>
				  <th><i class="fa fa-cogs"></i> Option</th>
				</tr>
				</thead>
				<tbody>
        <?php
        include "../../config/connection.php";
		$inventory_query = "SELECT
		`id_prod`,
		`prodimage`,
		`prodname`,
		`prod_category`,
		`stock`,
		`orig_price`,
		`profit`
	FROM
		`products`";
		$inventory_result = $conn->query($inventory_query);
		if ($inventory_result->num_rows > 0) {
			while ($row = $inventory_result->fetch_assoc()) {
				$sell_price = $row["orig_price"]+$row["profit"];
				$show_sell_price = number_format($sell_price,2);
				?>
				<tr>
				<td><img src="../uploads/<?php echo $row["prodimage"];?>" alt="image" width="50px"></td>
				<td><?php echo $row["prodname"];?></td>
				<td><?php echo $row["prod_category"];?></td>
				<td><?php 
				if($row["stock"] == 0){
					echo '<span class="badge bg-red">Out of stock</span>';
				}else{
					if ($row["stock"]<=5) {
						echo "<span class='badge bg-orange'>(".$row["stock"].")"." "."Low stock</span>";
					}else{
						echo "<span class='badge bg-green'>".$row["stock"]."</span>";
					}
				}
				?></td>
				<td>P <?php echo number_format($row["orig_price"],2)?></td>
				<td>P <?php echo number_format($row["profit"],2);?></td>
				<td>P <?php echo $show_sell_price;?></td>
				<td>
					<div class="btn-group">
                      <button class="btn btn-sm bg-orange" data-toggle="modal" data-target="#edit_<?php echo $row["id_prod"]?>"><i class="fa fa-edit"></i></button>
					  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#del_<?php echo $row["id_prod"]?>"><i class="fa fa-trash"></i></button>
					</div>
				</td>
				</tr> <?php }} ?>
				</tbody>
			  </table>   
              
<script>
  $(function () {
    //$('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>