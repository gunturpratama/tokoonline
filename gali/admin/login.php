<!DOCTYPE html>
<html>
<head>
  <?php
    //jika ada session atau cookie 
    session_start();
    $ada_session = isset($_SESSION['admin_username']);
    $ada_cookie  = isset($_COOKIE['admin_username']) && isset($_COOKIE['admin_password']);
    if($ada_session || $ada_cookie) {
      header("location: index.php");
    }
    $title = "Admin Login | Gagapan Bali";
    require_once "view/v_head.php";
  ?> 
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="../assets/img/logo.png">
    </div>
    <!-- /.login-logo -->

    <div class="login-box-body">
      <div class="login-logo">
      <b style="color:#00a65a;">Admin</b> Login
      </div>
          <!--END TULIS EROR DISINI-->
    <h4 style="color:#dd4b39;margin:0px 0px 15px 0px;"><b><?php require_once "view/v_notice.php"; ?></b></h4>
    <!--END TULIS EROR DISINI-->
      <form action="controller/c_login.php" method="post">
        <div class="form-group has-feedback">
          <input name="admin_username" type="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="admin_password" type="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input name="remember_me" type="checkbox"> Ingat Saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <input name="login_admin" type="submit" class="btn btn-success btn-block btn-flat" value="Sign In"></input>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
    });
  </script>
</body>
</html>
