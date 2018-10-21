<?php
	require_once "../model/m_userdetail_navbar.php";
	$admin_username_cookie 	= ($_COOKIE['admin_username']);
	$admin_username_session = ($_SESSION); 

	//$login = cek_login($admin_username); 
	//$data=mysqli_fetch_array($login);

	echo $admin_username;
?>