<?php
require_once "setting/DB_Setting.php";

function query_select_cart_where_username($user_username){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con,"SELECT c.*,cd.*,p.* FROM tb_cart c, tb_cartdet cd, tb_produk p WHERE c.user_username='$user_username' AND c.cart_id=cd.cart_id AND cd.produk_id=p.produk_id");
	return $query;
}

function query_select_apakah_ada_produk_di_cartdet($cart_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con,"SELECT * FROM tb_cartdet WHERE cart_id='$cart_id'");
	return $query;
}


function query_produk($produk_id,$cartproduk_size){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT p.*, d.* FROM tb_produk p, tb_produkdet d WHERE p.produk_id='$produk_id' AND p.produk_id=d.produk_id AND d.produk_size='$cartproduk_size'");
	return $query;
}

function query_update_tbcartdet($cartproduk_qty,$update_subberat,$update_subharga,$cart_id,$produk_id,$cartproduk_size){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"UPDATE tb_cartdet SET cartproduk_qty='$cartproduk_qty', subtotal_berat='$update_subberat', subtotal_harga='$update_subharga' WHERE cart_id='$cart_id' AND produk_id='$produk_id' AND cartproduk_size='$cartproduk_size'")or die(mysqli_error($con));
	return $query;
}
function query_update_tbcart($cart_id,$cart_totberat,$cart_totharga){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"UPDATE tb_cart SET cart_totberat='$cart_totberat', cart_totharga='$cart_totharga' WHERE cart_id='$cart_id'")or die(mysqli_error($con));
	return $query;
}

function query_select_tbcart($user_username){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"SELECT * FROM tb_cart WHERE user_username='$user_username'");
	return $query; 
}

function query_delete_tbcartdet($cart_id,$produk_id,$cartproduk_size,$url){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con,"DELETE FROM tb_cartdet WHERE cart_id='$cart_id' AND produk_id='$produk_id' AND cartproduk_size='$cartproduk_size'") or die (mysqli_error($con));
	if ($query) {
		header("location:".$url."notice=303");
	}
}

?>