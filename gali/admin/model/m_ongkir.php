<?php 

require_once "../setting/DB_Setting.php";
 
function search_ongkir($kata){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT tb_tarif.*,tb_provinsi.* FROM tb_tarif INNER JOIN tb_provinsi ON tb_tarif.provinsi_id=tb_provinsi.provinsi_id WHERE tarif_id LIKE '%$kata%' OR provinsi_nama LIKE '%$kata%' OR tarif_harga LIKE '%$kata%' ORDER BY provinsi_nama ASC")or die(mysqli_error($con));
	return $query;
}
 
function query_tampil_data_ongkir(){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT tb_tarif.*,tb_provinsi.* FROM tb_tarif INNER JOIN tb_provinsi ON tb_tarif.provinsi_id=tb_provinsi.provinsi_id ORDER BY provinsi_nama") or die (mysqli_error($con));
	return $query;
}

function query_select_data_ongkir($ongkir_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT tb_tarif.*,tb_provinsi.* FROM tb_tarif INNER JOIN tb_provinsi ON tb_tarif.provinsi_id=tb_provinsi.provinsi_id WHERE tarif_id='$ongkir_id'") or die (mysqli_error($con));
	return $query;
}
//delete data
function query_delete_data_ongkir($ongkir_id){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "DELETE FROM tb_tarif WHERE tarif_id='$ongkir_id'") or die (mysqli_error($con)) ;
	return $query;
}


function query_update_data_ongkir($ongkir_id, $ongkir_harga){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_tarif SET tarif_harga='$ongkir_harga' WHERE tarif_id='$ongkir_id'") or die (mysqli_error($con));
	return $query;
}

function query_add_ongkir($ongkir_id, $provinsi_id,$ongkir_harga){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "INSERT INTO tb_tarif VALUES ('$ongkir_id','$provinsi_id','$ongkir_harga')") or die (mysqli_error($con));
	return $query;
}
function cekIdOngkir($url,$ongkir_id){
    $db = new DB_Setting();
    $con = $db->con;

    $cek=mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_tarif WHERE tarif_id='$ongkir_id'"));
    if($cek!=0){
        header("location:".$url."notice=213");
        exit();
    }
}
?>