<!DOCTYPE html> 
<html>
<head>
  <?php
         $title = "Cetak Pengiriman | Gagapan Bali";
         require_once "controller/c_if_ada_session_atau_cookie.php";
         require_once "view/v_head.php";
         require_once "model/m_invoice-print.php";
         require_once "controller/c_validasi.php";
      ?>
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <?php
    require_once "view/v_invoice-print.php";
  ?>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
