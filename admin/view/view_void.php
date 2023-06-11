<table id="example2" class="table table-striped table-hover">
				<thead class="bg-gray">
				<tr>
				  <th>Transaction No.</th>
                  <th>Product ID</th>
				  <th>Item</th>
				  <th>Category</th>
                  <th>Sell price(per item)</th>
                  <th>QTY</th>
				  <th>Subtotal</th>
                  <th>Date voided</th>
                  <th>Action</th>
				</tr>
				</thead>
				<tbody>
        <?php
        include "../../config/connection.php";
		$inventory_query = "SELECT
        orders.id_order,
        orders.ref_no,
        orders.prod_order_id,
        orders.order_qty,
        orders.time_order,
        orders.date_of_order,
        orders.`status`,
        products.id_prod,
        products.prodimage,
        products.prodname,
        products.prod_category,
        products.orig_price,
        products.profit
        FROM
        orders
        INNER JOIN products ON orders.prod_order_id = products.id_prod
        WHERE `status` = 'void'
        ";
		$inventory_result = $conn->query($inventory_query);
		if ($inventory_result->num_rows > 0) {
			while ($row = $inventory_result->fetch_assoc()) {


				$sell_price = $row["orig_price"]+$row["profit"];
				$show_sell_price = $sell_price;
                $times = $show_sell_price * $row["order_qty"];
                $show_total = $times;

                
				?>
				<tr>
				<td><?php echo $row["ref_no"];?></td>
                <td><?php echo $row["prod_order_id"];?></td>
				<td><?php echo $row["prodname"];?></td>
				<td><?php echo $row["prod_category"];?></td>
                <td><?php echo number_format($show_sell_price,2)?></td>
				<td><?php echo $row["order_qty"];?></td>
                <td><?php echo number_format($show_total,2);?></td>
                <td><?php echo $row["date_of_order"];?></td>
                <td><a href="function/re_stock.php?id=<?php echo $row["prod_order_id"];?>&qty=<?php echo $row["order_qty"];?>&ref=<?php echo $row["ref_no"];?>" class="btn bg-orange">Re-Stock</a></td>
				</tr> <?php }} ?>
				</tbody>
			  </table>   
              