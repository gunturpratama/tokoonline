<?php
require_once '../setting/DB_Setting.php';

	// CEK USERNAME
	function CekUsername($url,$username){
        $db = new DB_Setting();
        $con = $db->con;

        $cek=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_user WHERE user_username='$username'"));
		if($cek!=0){
			header("location:".$url."notice=202");
			exit();
		}
	}

	// SIMPAN KE TB_USER
	function register_user($username,$password,$email,$firstname,$lastname,$birth,$gender,$telepon,$alamat,$provinsi_id,$kota,$pos){
        $db = new DB_Setting();
        $con = $db->con;

		$register=mysqli_query($con,"INSERT INTO tb_user VALUES ('$username','$password','$email','$firstname','$lastname','$birth','$gender','$telepon','$alamat','$provinsi_id','$kota','$pos')")or die(mysqli_error($con));
		return $register;
	}

?>