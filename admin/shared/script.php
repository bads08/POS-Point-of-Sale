<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- sweet alert -->
<script src="../plugins/sweet-alert/dist/sweetalert2.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script>
  
  <?php 
    if (isset($_SESSION["alert_empty"]) == "fire") { ?>
        Swal.fire('You`ve not select an Item.', 'Select atleast one(1) item.', 'error');
  <?php unset($_SESSION["alert_empty"]); }?>
  <?php 
    if (isset($_SESSION["success"]) == "fire") { ?>
        Swal.fire('Message', 'Success.', 'success');
  <?php unset($_SESSION["success"]); }?>
  <?php 
    if (isset($_SESSION["quantity"]) == "fire") { ?>
        Swal.fire('Message', 'Quantity Updated!', 'success');
  <?php unset($_SESSION["quantity"]); }?>
  <?php 
    if (isset($_SESSION["err"]) == "fire") { ?>
        Swal.fire('Message', 'Invalid, Quantity Cannot be zero.', 'error');
  <?php unset($_SESSION["err"]); }?>
  <?php 
    if (isset($_SESSION["alert-invalid-image"]) == "fire") { ?>
        Swal.fire('Youre data not save! Only JPG, JPEG, PNG & GIF files are allowed.', 'Please try again.', 'error');
  <?php unset($_SESSION["alert-invalid-image"]); }?>
  <?php 
    if (isset($_SESSION["alert_success"]) == "fire") { ?>
        Swal.fire('Transaction complete.', 'Transaction no. <?php echo $_SESSION["transaction_no"]?>.', 'success');
  <?php unset($_SESSION["alert_success"]); unset($_SESSION["transaction_no"]); }?>
  <?php 
    if (isset($_SESSION["alert_void"]) == "fire") { ?>
        Swal.fire('Transaction Void.', 'Transaction no. <?php echo $_SESSION["transaction_num"]?>.', 'error');
  <?php unset($_SESSION["alert_void"]); unset($_SESSION["transaction_no"]); }?>
  <?php 
    if (isset($_SESSION["alert_delete"]) == "fire") { ?>
        Swal.fire('Data Deleted.', 'Product id. <?php echo $_SESSION["get_id"]?>', 'success');
  <?php unset($_SESSION["alert_delete"]); unset($_SESSION["get_id"]); }?>
  <?php 
    if (isset($_SESSION["alert_inserted"]) == "fire") { ?>
        Swal.fire('Inserted.', '', 'success');
  <?php unset($_SESSION["alert_inserted"]); unset($_SESSION["get_id"]); }?>
  <?php 
    if (isset($_SESSION["alert-update"]) == "fire") { ?>
        Swal.fire('Data Updated.', '', 'success');
  <?php unset($_SESSION["alert-update"]); }?>
</script>

<script>
  $("#loadedit").load("modals/modaledit.php");
  $("#loadadd").load("modals/modaladd.php");
  $("#load_users_add").load("modals/modal_add_new_user.php");
  $("#loadinventory").load("view/view_inventory.php");
  $("#load_delete").load("modals/modal_delete.php");
  $("#load_users").load("view/view_users.php");
  $("#loadpaid").load("view/view_paid.php");
  $("#loadvoid").load("view/view_void.php");
  $("#load_sales").load("view/view_report_paid.php");
  //$("#edit_user").load("modals/modal_edit_user.php");
</script>
<script>
  $(window).on("load",function(){
    $(".overlay").fadeOut("slow");
  });
</script>
<script>
  function logout() {
  Swal.fire({
  title: 'You want to logout?',
  text: 'You will be exit from this system',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, I want to logout.',
  cancelButtonText: 'No, I want to stay.'
}).then((result) => {
  if (result.value) {
      window.location.assign("function/logout.php");
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Cancelled',
      '',
      'error'
    )
  }
});
}
</script>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 5000
    });
  });
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });
  });
</script>