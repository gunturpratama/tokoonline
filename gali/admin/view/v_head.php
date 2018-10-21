
<!--head-->
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
      <?php
      echo $title;
      require_once "../setting/DB_Setting.php";
      $db = new DB_Setting();
      $con = $db->con;

      ?>
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="assets/css/skins.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!--css admin login-->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/green.css">

<!--tutup head-->
