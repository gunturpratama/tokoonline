<?php
require_once "setting/DB_Setting.php";

function query_select_produk_where_id($produk_id){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT p.*,d.* FROM tb_produk p, tb_produkdet d WHERE p.produk_id='$produk_id' AND d.produk_id='$produk_id' AND d.produk_stok > 0");
	return $query;
}

function query_update_tbcart($cart_id,$cart_totberat,$cart_totharga){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"UPDATE tb_cart SET cart_totberat='$cart_totberat', cart_totharga='$cart_totharga' WHERE cart_id='$cart_id'")or die(mysqli_error($con));
	return $query;
}

?>