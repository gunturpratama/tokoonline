<?php 

require_once "../setting/DB_Setting.php";
 
function search_user($kata){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT SQL_CALC_FOUND_ROWS tb_user.*,tb_provinsi.provinsi_nama as provinsi_nama FROM tb_user INNER JOIN tb_provinsi ON tb_user.provinsi_id = tb_provinsi.provinsi_id WHERE user_username LIKE '%$kata%' OR user_email LIKE '%$kata%' OR user_firstname LIKE '%$kata%' OR user_lastname LIKE '%$kata%' OR user_birth LIKE '%$kata%' OR user_gender LIKE '%$kata%' OR user_telepon LIKE '%$kata%' OR tb_provinsi.provinsi_nama LIKE '%$kata%' OR user_kota LIKE '%$kata%' OR user_pos LIKE '%$kata%'")or die(mysqli_error($con));
	return $query;
}
 
function query_tampil_data_member(){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT tb_user.* , tb_provinsi.provinsi_nama as provinsi_nama FROM tb_user INNER JOIN tb_provinsi ON tb_user.provinsi_id = tb_provinsi.provinsi_id") or die (mysqli_error($con));
	return $query;
}

function query_select_data_user($user_username){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT tb_user.*, tb_provinsi.provinsi_nama as provinsi_nama FROM tb_user INNER JOIN tb_provinsi ON tb_user.provinsi_id=tb_provinsi.provinsi_id WHERE user_username='$user_username'") or die (mysqli_error($con));
	return $query;
}
//delete data
function query_delete_data_user($user_username){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "DELETE FROM tb_user WHERE user_username='$user_username'") or die (mysqli_error($con)) ;
	return $query;
}


function query_update_data_member($user_username, $user_email, $user_firstname,$user_lastname,$user_birth,$user_gender,$user_telepon,$user_alamat,$provinsi_id,$user_kota,$user_pos){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_user SET user_email='$user_email', user_firstname='$user_firstname', user_lastname='$user_lastname', user_birth='$user_birth', user_gender='$user_gender', user_telepon='$user_telepon', user_alamat='$user_alamat', provinsi_id='$provinsi_id', user_kota='$user_kota', user_pos='$user_pos' WHERE user_username='$user_username'") or die (mysqli_error($con));
	return $query;
}

function query_update_password_member($user_username,$user_password){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_user SET user_password='$user_password' WHERE user_username='$user_username'") or die (mysqli_error($con));
	return $query;
}


?>