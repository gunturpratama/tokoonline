<?php 
	session_start();
	require_once "../model/m_login.php";

	if (isset($_POST['login_admin'])) {
	
		$admin_username 	= $_POST['admin_username'];
		$admin_password		= md5($_POST['admin_password']);
		$remember_me 		= isset($_POST['remember_me'])?$_POST['remember_me']:'';

		//cek login databse
		$login 	= cek_login($admin_username, $admin_password);
		$jml	= mysqli_num_rows($login);


		if ($jml==1 && $remember_me==true){
			$data=mysqli_fetch_array($login);
			//Membuat cookies;
			//cookies username
			$cookie_admin_username 			= "admin_username"; //cookie name
			$cookie_admin_username_value	= $data['admin_username']; //cookie value
			setcookie($cookie_admin_username, $cookie_admin_username_value, time() + 315569260, "/"); //
			//cookies password
			$cookie_admin_password 			= "admin_password"; //cookie name
			$cookie_admin_password_value	= md5($data['admin_password']); //cookie value
			setcookie($cookie_admin_password, $cookie_admin_password_value, time() + 315569260, "/"); //

			header("location:../index.php");
		}
		elseif($jml==1){
			$data=mysqli_fetch_array($login);
			// Membuat SESSION
			$_SESSION['admin_username'] = $data['admin_username'];
			header("location:../index.php");
		}
		else{
			header("location:../login.php?notice=208");
		}
	}
  

?>