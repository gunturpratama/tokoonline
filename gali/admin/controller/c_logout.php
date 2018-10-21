<?php
	session_start();
	session_destroy();
	unset($_SESSION['admin_username']);


		setcookie('admin_username', null, -1, '/');
		setcookie('admin_password', null, -1, '/');

	header("location:../login.php");
	exit;
?>