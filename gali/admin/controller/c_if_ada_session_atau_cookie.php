<?php
	//jika tidak ada session dan cookie
    session_start();
    $ada_session = isset($_SESSION['admin_username']);
    $ada_cookie  = isset($_COOKIE['admin_username']) && isset($_COOKIE['admin_password']);
    if(!$ada_session && !$ada_cookie){
      header("location: login.php");
    }

?>