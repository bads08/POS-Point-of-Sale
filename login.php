<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page bg-orange">
    <div class="login-box">
        <div class="login-logo">
            <a href="index2.html">Simple<b>POS</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>










            <form action="function/login.php" method="post" name="myForm" onsubmit="return validateForm()">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Enter username" name="username" autofocus=""
                        required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?php
      if (isset($_SESSION["user"])){?>
                    <p class="text-red">Username not found.</p>
                    <?php unset($_SESSION["pass"]); } ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Enter password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php
      if (isset($_SESSION["pass"])){?>
                    <p class="text-red">Invalid Password.</p>
                    <?php unset($_SESSION["pass"]); } ?>
                </div>
                <div class="row">

                    <div class="col-xs-12">
                        <button type="submit" id="btnlog" class="btn btn-warning btn-block btn-flat"
                            name="btnlogin">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
    <script>
    function validateForm() {
        var x = document.forms["myForm"]["username"].value;
        var y = document.forms["myForm"]["password"].value;
        if (x == "" || y == "") {
            alert("Name must be filled out");

        } else {
            document.getElementById("btnlog").innerHTML = "Please wait..."
        }
    }
    </script>
</body>

</html>