<?php

	require_once "../../setting/DB_Setting.php";

	function cek_login($admin_username){
        $db = new DB_Setting();
        $con = $db->con;

        $login = mysqli_query($con, "SELECT * FROM tb_admin WHERE admin_username='$admin_username'") or die(mysqli_error($con));
		return $login;
	}

?>