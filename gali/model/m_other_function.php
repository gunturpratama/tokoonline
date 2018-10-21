<?php
require_once "setting/DB_Setting.php";
function jumlah_produk_makanan(){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT * FROM tb_produk WHERE kategori_id='M01'");
	$jumlah = mysqli_num_rows($query);
	return $jumlah;
}
function jumlah_produk_pakaian(){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT * FROM tb_produk WHERE kategori_id='P01'");
	$jumlah = mysqli_num_rows($query);
	return $jumlah;
}
function jumlah_produk_souvenir(){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT * FROM tb_produk WHERE kategori_id='S01'");
	$jumlah = mysqli_num_rows($query);
	return $jumlah;
}
?>                               
                                