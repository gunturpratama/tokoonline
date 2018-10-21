<?php
require_once "setting/DB_Setting.php";

function query_tbcart($user_username){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT * FROM tb_cart WHERE user_username='$user_username'") or die(mysqli_error($con));
	return $query;
}
function query_delete_tbcart($user_username){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"DELETE FROM tb_cart WHERE user_username='$user_username'") or die(mysqli_error($con));
	return $query;
}

function query_tbtarif($provinsi_id){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT * FROM tb_tarif WHERE provinsi_id='$provinsi_id'") or die(mysqli_error($con));
	return $query;
}
function query_provinsi($provinsi_id){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT * FROM tb_provinsi WHERE provinsi_id='$provinsi_id'") or die(mysqli_error($con));
	return $query;
}
function query_add_tbpesanan($pesanan_id,$user_username,$pesanan_tgl,$pesanan_totberat,$pesanan_totharga,$pesanan_biayakirim,$pesanan_grandtot,$pesanan_penerima,$pesanan_telepon,$pesanan_email,$pesanan_alamat,$pesanan_status,$pesanan_delivery){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"INSERT INTO tb_pesanan VALUES('$pesanan_id','$user_username','$pesanan_tgl','$pesanan_totberat','$pesanan_totharga','$pesanan_biayakirim','$pesanan_grandtot','$pesanan_penerima','$pesanan_telepon','$pesanan_email','$pesanan_alamat','$pesanan_status','$pesanan_delivery','','')") or die(mysqli_error($con));
	return $query;
}

function query_select_persiapan_add_tbpesanandet($cart_id){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT cd.*,p.*,pd.* FROM tb_cartdet cd, tb_produk p, tb_produkdet pd WHERE cd.cart_id='$cart_id' AND p.produk_id=cd.produk_id AND pd.produk_id=p.produk_id AND pd.produk_size=cd.cartproduk_size") or die(mysqli_error($con));
	return $query;
}

function query_add_tbpesanandet($pesanan_id,$produk_id,$produk_size,$produk_qty,$produk_harga,$produk_berat,$subtotal_berat,$subtotal_harga){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"INSERT INTO tb_pesanandet VALUES('$pesanan_id','$produk_id','$produk_size','$produk_qty','$produk_harga','$produk_berat','$subtotal_berat','$subtotal_harga')") or die(mysqli_error($con));
	return $query;
}
?>