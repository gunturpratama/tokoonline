<?php 
    require_once "../setting/DB_Setting.php";
    function cek_login($url,$user_username,$user_password){
        $db = new DB_Setting();
        $con = $db->con;

        $login = mysqli_query($con,"SELECT * FROM tb_user WHERE user_username='$user_username' AND user_password='$user_password'") or die(mysqli_error($con)());
		return $login;
	}

?>