<?php 

require_once "../setting/DB_Setting.php";
 
function search_pesanan($kata){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_pesanan WHERE pesanan_id LIKE '%$kata%' OR user_username LIKE '%$kata%' OR pesanan_tgl LIKE '%$kata%' OR pesanan_totberat LIKE '%$kata%' OR pesanan_totharga LIKE '%$kata%' OR pesanan_biayakirim LIKE '%$kata%' OR pesanan_grandtot LIKE '%$kata%' OR pesanan_penerima LIKE '%$kata%' OR pesanan_telepon LIKE '%$kata%' OR pesanan_email LIKE '%$kata%' OR pesanan_alamat LIKE '%$kata%' OR pesanan_status LIKE '%$kata%'")or die(mysqli_error($con));
	return $query;
}
 
function query_tampil_data_pesanan(){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_pesanan") or die (mysqli_error($con));
	return $query;
}

function query_select_data_pesanan($pesanan_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query=mysqli_query($con, "SELECT p.*, d.*, pr.* FROM tb_pesanan p, tb_pesanandet d, tb_produk pr WHERE p.pesanan_id=d.pesanan_id AND d.produk_id=pr.produk_id AND p.pesanan_id='$pesanan_id'") or die (mysqli_error($con));
	return $query;
}
//delete data
function query_delete_data_pesanan($pesanan_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "DELETE FROM tb_pesanan WHERE pesanan_id='$pesanan_id'") or die (mysqli_error($con)) ;
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