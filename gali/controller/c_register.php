<?php

	require_once "../model/m_register.php";
	require_once "c_validasi.php";	

	if(isset($_POST['submit_register'])){
		 
	 	$url 				= "../index.php?";
		$username 			= $_POST['user_username'];
		$email 				= $_POST['user_email'];
		$password 			= $_POST['user_password'];
		$cpassword 			= $_POST['user_cpassword'];
		$password_encrypted	= md5($password);
		$email 				= $_POST['user_email'];
		$firstname 			= $_POST['user_firstname'];
		$lastname			= $_POST['user_lastname'];
		$birth				= $_POST['user_birth'];
		$gender 			= $_POST['user_gender'];
		$telepon 			= $_POST['user_telepon'];
		$alamat 			= $_POST['user_alamat'];
		$provinsi 			= $_POST['provinsi_id'];
		$kota 				= $_POST['user_kota'];
		$pos 				= $_POST['user_pos'];

		//cek username tidak boleh sama
		CekUsername($url,$username);
		//cek kesamaan password
		CekPassword($url,$password,$cpassword);
		//proses register
		$simpan = register_user($username,$password_encrypted,$email,$firstname,$lastname,$birth,$gender,$telepon,$alamat,$provinsi,$kota,$pos);
		if ($simpan) {
			header("location:".$url."notice=305");
		}
		else{
			header("location:".$url."notice=105");
		}

	}
?>