<?php
require_once "model/m_checkout1.php";
require_once "controller/c_validasi.php";

if (isset($_POST['submit_checkout1'])) {
	if (isset($_SESSION['user_username'])) {
    $user_username = $_SESSION['user_username'];
	}
	elseif (isset($_COOKIE['user_username'])) {
	    $user_username = $_COOKIE['user_username'];
	}

	//variabel-variabel
	$pesanan_id 		= randomID();
	$pesanan_tgl 		= date("Y-m-d H:i:s");
	$pesanan_penerima 	= $_POST['nama_penerima'];
	$provinsi_id		= $_POST['provinsi_id'];
	$kode_pos			= $_POST['kode_pos'];
	$pesanan_telepon	= $_POST['telepon'];
	$pesanan_email		= $_POST['email'];
	$pesanan_status		= "Pending";
	$pesanan_delivery	= "JNE REG";

	
	//macam macam query untuk nilai variabel
	$query_cart = mysqli_fetch_array(query_tbcart($user_username));
	$query_tarif = mysqli_fetch_array(query_tbtarif($provinsi_id));
	$query_provinsi = mysqli_fetch_array(query_provinsi($provinsi_id));
	//variabel-variabel inti
	$pesanan_alamat		= $_POST['alamat_pengiriman'].", ".$query_provinsi['provinsi_nama'].", ".$kode_pos;
	$pesanan_totberat 	= $query_cart['cart_totberat'];
	$pesanan_totharga	= $query_cart['cart_totharga'];
	$pesanan_biayakirim	= $query_tarif['tarif_harga'] * $query_cart['cart_totberat']; //ongkir
	$pesanan_grandtot	= $pesanan_totharga + $pesanan_biayakirim;

	//tambah ke tbpesanan
	$tambah_tbpesanan = query_add_tbpesanan($pesanan_id,$user_username,$pesanan_tgl,$pesanan_totberat,$pesanan_totharga,$pesanan_biayakirim,$pesanan_grandtot,$pesanan_penerima,$pesanan_telepon,$pesanan_email,$pesanan_alamat,$pesanan_status,$pesanan_delivery);

	//tambah ke tb_pesanandet
	$cart_id = $query_cart['cart_id'];
	$persiapan = query_select_persiapan_add_tbpesanandet($cart_id);
	while ($data = mysqli_fetch_array($persiapan)) {
		$tambah_tbpesanandet = query_add_tbpesanandet(
			$pesanan_id,
			$data['produk_id'],
			$data['cartproduk_size'],
			$data['cartproduk_qty'],
			$data['produk_harga'],
			$data['produk_berat'],
			$data['subtotal_berat'],
			$data['subtotal_harga']
			);
	}
	
 
	if ($tambah_tbpesanan && $tambah_tbpesanandet) {
		//jika sudah ditambah ke tbpesanan dan tbpesanandet maka hapus troli
		$delete = query_delete_tbcart($user_username);
		// Membuat SESSION
		$_SESSION['pesanan_id'] = $pesanan_id;
		header("location:checkout2.php");
	}
	

}


?>