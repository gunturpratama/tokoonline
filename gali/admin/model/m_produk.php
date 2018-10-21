<?php 

require_once "../setting/DB_Setting.php";

function search_produk($kata){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT SQL_CALC_FOUND_ROWS p.*, k.*, GROUP_CONCAT(d.produk_size SEPARATOR ', ') 
		as produk_size, sum(d.produk_stok) 
		as produk_stok FROM tb_produk p, tb_kategori k, tb_produkdet d 
		WHERE p.kategori_id=k.kategori_id 
		AND p.produk_id=d.produk_id 
		AND (p.produk_id LIKE '%$kata%' 
		OR k.kategori_nama LIKE '%$kata%' 
		OR p.produk_nama LIKE '%$kata%' 
		OR p.produk_warna LIKE '%$kata%' 
		OR d.produk_size LIKE '%$kata%' 
		OR d.produk_stok LIKE '%$kata%' 
		OR p.produk_harga LIKE '%$kata%') 
		GROUP BY d.produk_id
		ORDER BY produk_tgl DESC")or die(mysqli_error($con));
	return $query;
}

function query_tampil_data_produk(){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT p.*, k.*, GROUP_CONCAT(d.produk_size) as produk_size, sum(d.produk_stok) as produk_stok FROM tb_produk p, tb_kategori k, tb_produkdet d WHERE p.kategori_id=k.kategori_id AND p.produk_id=d.produk_id GROUP BY d.produk_id ORDER BY produk_tgl DESC") or die (mysqli_error($con));
	return $query;
}

function query_select_data_produk($produk_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT p.*,k.*,d.* FROM tb_produk p, tb_kategori k, tb_produkdet d WHERE p.produk_id='$produk_id' AND p.kategori_id=k.kategori_id AND p.produk_id=d.produk_id") or die (mysqli_error($con));
	return $query;
}
//delete data
function query_delete_data_produk($produk_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "DELETE FROM tb_produk WHERE produk_id='$produk_id'") or die (mysqli_error($con)) ;
	return $query;
}
function query_select_kategori(){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_kategori") or die (mysqli_error($con)) ;
	return $query;
}
function query_select_produkdet($produk_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_produkdet WHERE produk_id='$produk_id'") or die (mysqli_error($con)) ;
	return $query;
}
//tambah data
function query_add_data_produk($produk_id,$kategori_id,$produk_tgl,$produk_nama,$produk_warna,$produk_bahan,$produk_berat,$produk_harga,$produk_deskripsi,$produk_gambar){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "INSERT INTO tb_produk VALUES ('$produk_id','$kategori_id','$produk_tgl','$produk_nama','$produk_warna','$produk_bahan','$produk_berat','$produk_harga','$produk_deskripsi','$produk_gambar')") or die (mysqli_error($con));
	return $query;
}

function query_update_data_produk($produk_id,$kategori_id,$produk_nama,$produk_warna,$produk_bahan,$produk_berat,$produk_harga,$produk_deskripsi,$produk_gambar){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_produk SET kategori_id='$kategori_id', produk_nama='$produk_nama', produk_warna='$produk_warna', produk_bahan='$produk_bahan', produk_berat='$produk_berat',produk_harga='$produk_harga', produk_deskripsi='$produk_deskripsi', produk_gambar='$produk_gambar' WHERE produk_id='$produk_id'") or die (mysqli_error($con));
	return $query;
}

function query_update_data_produk_without_gambar($produk_id,$kategori_id,$produk_nama,$produk_warna,$produk_bahan,$produk_berat,$produk_harga,$produk_deskripsi){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_produk SET kategori_id='$kategori_id', produk_nama='$produk_nama', produk_warna='$produk_warna', produk_bahan='$produk_bahan', produk_berat='$produk_berat',produk_harga='$produk_harga', produk_deskripsi='$produk_deskripsi' WHERE produk_id='$produk_id'") or die (mysqli_error($con));
	return $query;
}

function query_select_produk_where($produk_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_produk WHERE produk_id='$produk_id'") or die (mysqli_error($con));
	return $query;
}

function query_hitung_total_stok($produk_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT SUM(produk_stok) AS produk_stok_total FROM tb_produkdet WHERE produk_id='$produk_id'") or die (mysqli_error($con));
	return $query;
}
?>