<?php

class order{
    public $servername = "localhost";
    public $username   = "root";
    public $password   = "";
    public $dbname     = "orderingdb";

    function __construct(){
        $this->con = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

    }
    function getproducts(){
    $total = 0;
    $product_query = "SELECT 
                        id_prod,prodimage,
                        prodname,prod_category,
                        stock,orig_price,profit 
                      FROM products WHERE stock > 0";
    $product_result = $this->con->query($product_query);
    if($product_result->num_rows > 0){
      while ($row = $product_result->fetch_assoc()) {
        $orig_price   = $row["orig_price"] + $row["profit"];
        $total        = $orig_price;

       echo   "<div class='contain-product magictime swashIn'>
              <div class='cont'>
              <input type='checkbox' value='".$row['id_prod']."' name='product_id[]' style='cursor: pointer;'>
              <center><img src='../uploads/".$row['prodimage']."' alt=''></center>
              <p class='text-yellow'><span class='text-primary'>".$row['prodname']." (".$row['stock'].")</span>
              <br><span class='text-yellow'><span class='text-muted'>".$row['prod_category']."</span> 
              <br>P <strong>".number_format($total,2)."</strong></p>
              </div>
            </div>";
      }
    }else{
      echo "<h3 class='text-red'>No Items Availabale</h3>";
    }
  }

  function category(){
      $sql = "SELECT *
              FROM `products`";
      $query = $this->con->query($sql);
      if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
              echo "<option value='".$row['prod_category']."'>".$row['prod_category']."</option>";
          }
      }
  }
  function sales_today(){
    $date = date("Y-m-d");
    $sell_price=0;
    $sale=0;
    $qty=0;
    $sql = "SELECT
            products.id_prod,
            products.prodimage,
            products.prodname,
            products.prod_category,
            products.stock,
            products.orig_price,
            products.profit,
            orders.id_order,
            orders.ref_no,
            orders.prod_order_id,
            orders.order_qty,
            orders.time_order,
            orders.date_of_order,
            orders.`status`
            FROM
            products
            INNER JOIN orders ON products.id_prod = orders.prod_order_id WHERE `date_of_order` = '$date' AND `status` = 'paid'";
    $query = $this->con->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $qty        = $row["order_qty"];
        $orig_price = $row["orig_price"];
        $profit     = $row["profit"];
        $sell_price = $orig_price + $profit;
        $no         = $sell_price * $qty;
        $sale += $no; 
      }
      echo number_format($sale,2);
    }else{
      echo "0.00";
    }
  }
  function total_profit(){
    //$date = date("Y-m-d");
    $total_profit = 0;
    $sql = "SELECT
    products.id_prod,
    products.prodimage,
    products.prodname,
    products.prod_category,
    products.stock,
    products.orig_price,
    products.profit,
    orders.id_order,
    orders.ref_no,
    orders.prod_order_id,
    orders.order_qty,
    orders.time_order,
    orders.date_of_order,
    orders.`status`
    FROM
    orders
    INNER JOIN products ON products.id_prod = orders.prod_order_id
    WHERE orders.status = 'paid'";
    $query = $this->con->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $profit = $row["profit"];
        $total_profit += $profit;
      }
      echo number_format($total_profit,2);
    }else{
      echo "0.00";
    }
  }
  function products_total_ammount(){
    $total=0;
    $sql = "SELECT
            products.id_prod,
            products.prodimage,
            products.prodname,
            products.prod_category,
            products.stock,
            products.orig_price,
            products.profit
            FROM
            products
            ";
    $query = $this->con->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $stock        = $row["stock"];
        $orig_price = $row["orig_price"] * $stock;
        $total += $orig_price;
      }
      echo number_format($total,2);
    }else{
      echo "0.00";
    }
  }
  function total_sales(){
    $total = 0;
    $add   = 0;
    $no    = 0;
    $sql = "SELECT
    products.id_prod,
    products.prodimage,
    products.prodname,
    products.prod_category,
    products.stock,
    products.orig_price,
    products.profit,
    orders.id_order,
    orders.ref_no,
    orders.prod_order_id,
    orders.order_qty,
    orders.time_order,
    orders.date_of_order,
    orders.`status`
    FROM
    products
    INNER JOIN orders ON products.id_prod = orders.prod_order_id WHERE `status` = 'paid' ";
    $query = $this->con->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $add = $row["orig_price"] + $row["profit"];
        $no  = $add * $row["order_qty"];
        $total += $no;
      }
      echo number_format($total,2);
    }else{
      echo "0.00";
    }
  }
  function recent_transactions(){
    $date = date("Y-m-d");
    $total = 0;
    $add   = 0;
    $no    = 0;
    $sql = "SELECT
    products.id_prod,
    products.prodimage,
    products.prodname,
    products.prod_category,
    products.stock,
    products.orig_price,
    products.profit,
    orders.id_order,
    orders.ref_no,
    orders.prod_order_id,
    orders.order_qty,
    orders.time_order,
    orders.date_of_order,
    orders.`status`
    FROM
    products
    INNER JOIN orders ON products.id_prod = orders.prod_order_id WHERE `status` = 'paid' AND `date_of_order` = '$date'";
    $query = $this->con->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $add = $row["orig_price"] + $row["profit"];
        $no  = $add * $row["order_qty"];
        $total += $no;
        echo   "
                 <tr>
                  <td><a href='#'>".$row["ref_no"]."</a></td>
                  <td>".$row["prodname"]."</td>
                  <td>".$row["order_qty"]."</td>
                 </tr>
                ";
      }
    }else{
      echo "<tr>
             <td></td>
             <td><center>No transction yet.</center></td>
             <td></td>
            <tr>";
    }
  }
    
}

 ?>   
