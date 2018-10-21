<!DOCTYPE html>
<html>
<head> 
  <?php
  $page  = "admin";
  $title = "Akun Admin | Gagapan Bali";
  require_once "controller/c_if_ada_session_atau_cookie.php";
  require_once "controller/c_akun-admin.php";
  require_once "view/v_head.php";
  require_once "view/v_javascript.php";
  ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <!--NAVBAR DAN SIDEBAR-->
    <?php require_once "view/v_navbar.php"; ?>
    <!--END NAVBAR DAN SIDEBAR-->
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Akun Admin<small>Control panel</small></h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>User</li>
          <li class="active">Akun Admin</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
      <?php
    	require_once 'view/v_notice.php';
      require_once "view/v_akun-admin.php";
      ?>
      </section> 
      <!--end maincontent-->
    </div>
    <!-- /.content-wrapper -->

    
    <footer class="main-footer">
      <?php require_once "view/v_footer.php"; ?>
    </footer>

  </div>
  <!-- ./wrapper -->


</body>
</html>
