<?php
require_once "../setting/DB_Setting.php";

function query_select_tbpesanan_dan_tbbayar($pesanan_id){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT p.*,b.* FROM tb_pesanan p, tb_bayar b WHERE p.pesanan_id='$pesanan_id' AND b.pesanan_id=p.pesanan_id") or die(mysqli_error($con));
	return $query;
}

?>