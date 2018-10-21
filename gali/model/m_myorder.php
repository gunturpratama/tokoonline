<?php
require_once "setting/DB_Setting.php";

function query_tampil_myorder($user_username){
    $db = new DB_Setting();
    $con = $db->con;

    $query=mysqli_query($con,"SELECT * FROM tb_pesanan WHERE user_username='$user_username' ORDER BY pesanan_tgl DESC") or die (mysqli_error($con));
	return $query;
}

function query_tampil_orderDetail($pesanan_id){
    $db = new DB_Setting();
    $con = $db->con;

    $query=mysqli_query($con,"SELECT pd.*,pr.* FROM tb_pesanandet pd, tb_produk pr WHERE pd.pesanan_id='$pesanan_id' AND pr.produk_id=pd.produk_id") or die (mysqli_error($con));
	return $query;
}

function query_add_tbbayar($bayar_id,$pesanan_id,$bayar_tgl,$bayar_jenis,$bayar_norekening,$bayar_atasnama,$bayar_jumlah,$newname_foto,$bayar_status){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"INSERT INTO tb_bayar VALUES('$bayar_id','$pesanan_id','$bayar_tgl','$bayar_jenis','$bayar_norekening','$bayar_atasnama','$bayar_jumlah','$newname_foto','$bayar_status')") or die(mysqli_error($con));
	return $query;
}

?> 