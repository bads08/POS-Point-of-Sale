<table id="example2" class="table table-striped table-hover">
				<thead class="bg-gray">
				<tr>
				  <th>Transaction No.</th>
                  <th>Product ID</th>
				  <th>Item</th>
				  <th>Category</th>
                  <th>Sell price(per item)</th>
                  <th>QTY</th>
				  <th>Total</th>
                  <th>Date placed</th>
				</tr>
				</thead>
				<tbody>
        <?php
        include "../../config/connection.php";
        $tor = $_GET["to"];
        $fromr = $_GET["from"];
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
        WHERE date_of_order BETWEEN '$tor' AND '$fromr'
        ";
		$inventory_result = $conn->query($inventory_query);
		if ($inventory_result->num_rows > 0) {
			while ($row = $inventory_result->fetch_assoc()) {


				$sell_price = $row["orig_price"]+$row["profit"];
				$show_sell_price = $sell_price;
                $times = $show_sell_price * $row["order_qty"];
                $show_total = $times;
                
                $sales += $show_total;
                
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
				</tr> <?php }} ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $sales;?></td>
                <td></td>
				</tbody>
			  </table>   
              
