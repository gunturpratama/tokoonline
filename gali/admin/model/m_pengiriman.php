<?php 

require_once "../setting/DB_Setting.php";
  
function search_pengiriman($kata){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_pesanan WHERE pesanan_id LIKE '%$kata%' OR pesanan_tgl LIKE '%$kata%' OR pesanan_status LIKE '%$kata%'")or die(mysqli_error($con));
	return $query;
}
 
function query_tampil_data_pengiriman(){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_pesanan WHERE pesanan_status='Terbayar'") or die (mysqli_error($con));
	return $query;
}

function query_select_data_pesanan($pesanan_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_pesanan WHERE pesanan_id='$pesanan_id'") or die (mysqli_error($con));
	return $query;
}
function query_update_pesanan($pesanan_id,$pesanan_resi,$pesanan_status){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_pesanan SET pesanan_resi='$pesanan_resi', pesanan_status='$pesanan_status' WHERE pesanan_id='$pesanan_id'") or die (mysqli_error($con));
	return $query;
}



?>