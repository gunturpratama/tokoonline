<?php
require_once "model/m_basket.php";
require_once "controller/c_validasi.php";


if (isset($_SESSION['user_username'])) {
    $user_username = $_SESSION['user_username'];
}
elseif (isset($_COOKIE['user_username'])) {
    $user_username = $_COOKIE['user_username'];
}
if (@($_GET['aksi'])=='delete') {
    $url             = "basket.php?";
    $cart_id	     = $_GET['cart_id'];
    $produk_id       = $_GET['produk_id'];
    $cartproduk_size = $_GET['cartproduk_size'];
    $delete = query_delete_tbcartdet($cart_id,$produk_id,$cartproduk_size,$url);

    //update ke tb_Cart
	$cart_totberat = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(subtotal_berat) AS total_berat FROM tb_cartdet WHERE cart_id='$cart_id'"));
	$cart_totharga = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(subtotal_harga) AS total_harga FROM tb_cartdet WHERE cart_id='$cart_id'")); 
	$update_tbcart = query_update_tbcart($cart_id,$cart_totberat['total_berat'],$cart_totharga['total_harga']);
}
if (@($_POST['submit_refresh'])) {
    $url             = "basket.php";
    $cart_id       	 = $_POST['cart_id'];

    $row=array();
	foreach ($_POST['produk_id'] as $row => $produk_id) {
		$produk_id=mysqli_real_escape_string($con,$produk_id);
		$cartproduk_qty=mysqli_real_escape_string($con,$_POST['cartproduk_qty'][$row]);
		$cartproduk_size=mysqli_real_escape_string($con,$_POST['cartproduk_size'][$row]);
		
		$query_produk = query_produk($produk_id,$cartproduk_size);
		$rowa		  = mysqli_fetch_array($query_produk);
		// Cek Stok Produk Sesuai Dengan Size yang dipilih
		if($rowa['produk_stok'] < $cartproduk_qty){
			header("location:".$url."?notice=214");
			exit();
		}

		$update_subberat = ($rowa['produk_berat'] * $cartproduk_qty);
		$update_subharga = ($rowa['produk_harga'] * $cartproduk_qty);
		$update_tbcartdet = query_update_tbcartdet($cartproduk_qty,$update_subberat,$update_subharga,$cart_id,$produk_id,$cartproduk_size);
	}
		//update ke tb_Cart
		$cart_totberat = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(subtotal_berat) AS total_berat FROM tb_cartdet WHERE cart_id='$cart_id'"));
		$cart_totharga = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(subtotal_harga) AS total_harga FROM tb_cartdet WHERE cart_id='$cart_id'")); 
		$update_tbcart = query_update_tbcart($cart_id,$cart_totberat['total_berat'],$cart_totharga['total_harga']);

		if ($update_tbcartdet && $update_tbcart) {
			header("location:".$url."");
		}
}

?>