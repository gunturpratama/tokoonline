<?php 

require_once "../setting/DB_Setting.php";
  
function search_pembayaran($kata){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_bayar WHERE bayar_id LIKE '%$kata%' OR pesanan_id LIKE '%$kata%' OR bayar_tgl LIKE '%$kata%' OR bayar_jenis LIKE '%$kata%' OR bayar_norekening LIKE '%$kata%' OR bayar_atasnama LIKE '%$kata%' OR bayar_jumlah LIKE '%$kata%' OR bayar_status LIKE '%$kata%'")or die(mysqli_error($con));
	return $query;
}
 
function query_tampil_data_pembayaran(){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_bayar") or die (mysqli_error($con));
	return $query;
}

function query_select_data_pembayaran($bayar_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_bayar WHERE bayar_id='$bayar_id'") or die (mysqli_error($con));
	return $query;
}

//delete data
function query_delete_data_pembayaran($bayar_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "DELETE FROM tb_bayar WHERE bayar_id='$bayar_id'") or die (mysqli_error($con)) ;
	return $query;
}


function query_update_data_pembayaran($bayar_id,$bayar_status){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_bayar SET bayar_status='$bayar_status' WHERE bayar_id='$bayar_id'") or die (mysqli_error($con));
	return $query;
}

function query_update_data_pesanan($pesanan_id,$pesanan_status){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_pesanan SET pesanan_status='$pesanan_status' WHERE pesanan_id='$pesanan_id'") or die (mysqli_error($con));
	return $query;
}



?>