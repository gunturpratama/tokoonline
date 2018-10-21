<!DOCTYPE html>
<html>
<head> 
  <?php
  $page  = "pesanan";
  $title = "Pesanan Detail | Gagapan Bali";
  require_once "controller/c_if_ada_session_atau_cookie.php";
  require_once "controller/c_pembayaran.php";
  require_once "view/v_head.php";
  require_once "view/v_javascript.php";
  ?>
</head>
<style type="text/css">
  .text-kuning {
    color: #f39c12 !important;
  }
</style>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <!--NAVBAR DAN SIDEBAR-->
    <?php require_once "view/v_navbar.php"; ?>
    <!--END NAVBAR DAN SIDEBAR-->
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <a href="pembayaran.php"><button class="btn btn-large btn-success"><i class="fa fa-chevron-left"></i> Kembali</button></a>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="pesanan.php" class="active">Pembayaran</a></li>
          <li class="active">Pembayaran Detail</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
      <?php
    	require_once 'view/v_notice.php';
      require_once "view/v_pembayarandetail.php";
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
