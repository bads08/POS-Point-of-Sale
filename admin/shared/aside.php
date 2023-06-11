<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($_SESSION["user_lname"])?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dash"><a href="dashboard.php"><i class="fa fa-th-large text-red"></i><span>Dashboard </span><span class="label label-primary pull-right"></span></a></li>
        <li id="sale"><a href="order.php"><i class="fa fa-desktop text-red"></i><span>POS </span><span class="label label-primary pull-right"></span></a></li>
        <li id="inventory"><a href="inventory.php"><i class="fa fa-cubes text-red"></i><span>Inventory</span><span class="label bg-yellow pull-right"><?php include "query/count_products.php";?></span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-exchange text-red"></i> <span>Transactions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="paid"><a href="paid.php"><i class="fa fa-circle-o"></i> Paid Transactions</a></li>
            <li id="void"><a href="void.php"><i class="fa fa-circle-o"></i> Void Transactions</a></li>
          </ul>
        </li>
        <li id="users"><a href="users.php"><i class="fa fa-users text-red"></i><span>Users </span><span class="label bg-yellow pull-right"><?php include "query/count_users.php";?></span></a></li>
        <li id="report"><a href="#" data-toggle="modal" data-target="#modal-report"><i class="fa fa-files-o text-red"></i><span>Sales Report</span><span class="label label-primary pull-right"></span></a></li>

        <li class="header">OTHERS</li>
        <li><a href="#" onclick="logout()"><i class="fa fa-circle-o-notch text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 <form action="sales-report.php" method="get">
  <div class="modal fade in" id="modal-report">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Sales Report <small>Select date range</small></h4>
              </div>
              <div class="modal-body">
                <div class="form-cotrol">
                  <label for="">From</label>
                  <input type="date" class="form-control" name="from" required> 
                  <br>
                  <label for="">To</label>
                  <input type="date" class="form-control" name="to" required>
                </div>
              </div>
              <div class="modal-footer">
                <div class="btn-group">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-orange" name="">Generate Report</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>