<?php
require_once "../setting/DB_Setting.php";

function query_update_data_admin($admin_username,$admin_firstname,$admin_lastname,$admin_email,$admin_level,$admin_foto){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "UPDATE tb_admin SET admin_firstname='$admin_firstname', admin_lastname='$admin_lastname', admin_email='$admin_email', admin_level='$admin_level', admin_foto='$admin_foto' WHERE admin_username='$admin_username'") or die (mysqli_error($con));
    return $query;
}

function query_update_data_admin_without_foto($admin_username,$admin_firstname,$admin_lastname,$admin_email,$admin_level){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "UPDATE tb_admin SET admin_firstname='$admin_firstname', admin_lastname='$admin_lastname', admin_email='$admin_email', admin_level='$admin_level' WHERE admin_username='$admin_username'") or die (mysqli_error($con));
    return $query;
}

function query_tampil_data_admin(){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_admin") or die (mysqli_error($con));
	return $query;
}
function query_update_password_admin($admin_username,$admin_password){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_admin SET admin_password='$admin_password' WHERE admin_username='$admin_username'") or die (mysqli_error($con));
	return $query;
}

?>