<?php
	session_start();
	require_once "../model/m_login.php";

	if (isset($_POST['submit_login'])) { //jika tombol login di klik
		$url 				  	 = "../index.php?";
		$user_username 		  	 = $_POST['user_username']; //variabel untuk tahu inputan username
		$user_password 		  	 = $_POST['user_password']; //variabel untuk tahu inputan password
		$user_password_encrypted = md5($user_password);
		$remember_me 			 = isset($_POST['remember_me'])?$_POST['remember_me']:'';


		 $hasil		= cek_login($url,$user_username,$user_password_encrypted);
		 $jml  		= mysqli_num_rows($hasil);
		 
		if($jml==1 && $remember_me==true){
			$data = mysqli_fetch_array($hasil);
			//Membuat COOKIES;
			//cookies username
			$cookie_user_username 			= "user_username"; //cookie name
			$cookie_user_username_value		= $data['user_username']; //cookie value
			setcookie($cookie_user_username, $cookie_user_username_value, time() + 315569260, "/"); //
			header("location:".$url."notice=304"); //notice sukses login
		}
		elseif ($jml==1) {
			$data=mysqli_fetch_array($hasil);
			// Membuat SESSION
			$_SESSION['user_username'] = $data['user_username'];
			header("location:".$url."notice=304"); //notice sukses login
		}
		else{
			header("location:".$url."notice=204"); //notice gagal login
		}

	}

?>