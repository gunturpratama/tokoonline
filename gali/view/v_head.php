
<!--head-->
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gagapan Bali">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
 
    <title> 
        <?php
            echo $title;

            require_once "setting/DB_Setting.php";
            $db = new DB_Setting();
            $con = $db->con;
        ?>
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
    <link href="assets/plugins/iCheck/square/green.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="assets/css/style.green.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="assets/css/custom.css" rel="stylesheet">

    <script src="assets/js/respond.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    

    <link rel="shortcut icon" href="assets/img/favicon.png">


<!--tutup head-->
