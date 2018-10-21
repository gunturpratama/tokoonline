<?php
require_once "model/m_myorder.php";
require_once "controller/c_validasi.php";


function tampil_myorder(){
	if (isset($_SESSION['user_username'])) {
    	$user_username = $_SESSION['user_username'];
	}
	elseif (isset($_COOKIE['user_username'])) {
	    $user_username = $_COOKIE['user_username'];
	}
	$query = query_tampil_myorder($user_username);
	return $query;
}

 if (isset($_POST['submit_konfirmasi'])) {
 	$url 				= "myorder.php?";
 	$bayar_id			= randomID();
 	$pesanan_id 		= $_POST['pesanan_id'];
 	$bayar_tgl			= date("Y-m-d");
 	$bayar_jenis		= $_POST['bayar_jenis'];
 	$bayar_norekening	= $_POST['bayar_norekening'];
 	$bayar_atasnama		= $_POST['bayar_atasnama'];
 	$bayar_jumlah		= $_POST['bayar_jumlah'];
 	$bayar_gambar		= $_FILES['bayar_gambar'];
    $bayar_status       = "Pending";

 	//persiapan utk upload gambar
    $bayar_gambar_name    	= $bayar_gambar['name'];
    $bayar_gambar_type      = $bayar_gambar['type'];
    $bayar_gambar_size      = $bayar_gambar['size'];
    $bayar_gambar_lokasi    = $bayar_gambar['tmp_name'];
    $newname_foto         	= new_name($bayar_gambar_name); //ganti nama image agar tdk sama dgn image lain
    $bayar_gambar_direktori = "admin/assets/img_upload/bukti_pembayaran_img/$newname_foto"; //direktori upload gambar
    //Cek Ukuran Gambar
    maxsize($url, $bayar_gambar_size);
    // Proses upload Foto
    cek_upload($url, $bayar_gambar_lokasi, $bayar_gambar_direktori);


    //insert ke tb_bayar
    $insert	= query_add_tbbayar($bayar_id,$pesanan_id,$bayar_tgl,$bayar_jenis,$bayar_norekening,$bayar_atasnama,$bayar_jumlah,$newname_foto,$bayar_status);
    if ($insert) {
    	header("location:".$url."notice=308");
    }
 }
?>