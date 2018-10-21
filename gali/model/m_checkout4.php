<?php
require_once "setting/DB_Setting.php";

function query_select_data_pesanan($pesanan_id){
    $db = new DB_Setting();
    $con = $db->con;

    $query=mysqli_query($con,"SELECT p.*, d.*, pr.* FROM tb_pesanan p, tb_pesanandet d, tb_produk pr WHERE p.pesanan_id=d.pesanan_id AND d.produk_id=pr.produk_id AND p.pesanan_id='$pesanan_id'") or die (mysqli_error($con));
	return $query;
}

?>