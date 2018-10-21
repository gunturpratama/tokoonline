<?php
	//hancurkan session
	session_start();
	session_destroy();
	unset($_SESSION['user_username']);

	//hancurkan cookies
	setcookie('user_username', null, -1, '/');

	//jika sudah, redirect ke halaman sebelumnya
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
?> 