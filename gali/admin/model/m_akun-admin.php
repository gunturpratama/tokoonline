<?php 

require_once "../setting/DB_Setting.php";

function search_admin($kata){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT SQL_CALC_FOUND_ROWS * FROM tb_admin WHERE admin_username LIKE '%$kata%' OR admin_firstname LIKE '%$kata%' OR admin_lastname LIKE '%$kata%' OR admin_email LIKE '%$kata%' OR admin_level LIKE '%$kata%' OR admin_tgl LIKE '%$kata%'")or die(mysqli_error($con));
	return $query;
}
 
function query_tampil_data_admin_with_where($yang_login){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT * FROM tb_admin WHERE admin_username != '$yang_login'") or die (mysqli_error($con));
	return $query;
}

function query_tampil_data_admin(){
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT * FROM tb_admin") or die (mysqli_error($con));
	return $query;
}

function query_select_data_admin($admin_username){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "SELECT * FROM tb_admin WHERE admin_username='$admin_username'") or die (mysqli_error($con));
	return $query;
}
//delete data
function query_delete_data_admin($admin_username){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "DELETE FROM tb_admin WHERE admin_username='$admin_username'") or die (mysqli_error($con)) ;
	return $query;
}
//tambah data
function query_add_data_admin($admin_username,$admin_password,$admin_firstname,$admin_lastname,$admin_email,$admin_level,$admin_tgl,$admin_foto){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "INSERT INTO tb_admin VALUES ('$admin_username','$admin_password','$admin_firstname','$admin_lastname','$admin_email','$admin_level','$admin_tgl','$admin_foto')") or die (mysqli_error($con));
	return $query;
}

function query_update_data_admin($admin_username,$admin_firstname,$admin_lastname,$admin_email,$admin_level,$admin_foto){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_admin SET admin_firstname='$admin_firstname', admin_lastname='$admin_lastname', admin_email='$admin_email', admin_level='$admin_level', admin_foto='$admin_foto' WHERE admin_username='$admin_username'") or die (mysqli_error($con));
	return $query;
}

function query_update_password_admin($admin_username,$admin_password){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_admin SET admin_password='$admin_password' WHERE admin_username='$admin_username'") or die (mysqli_error($con));
	return $query;
}

function query_update_data_admin_without_foto($admin_username,$admin_firstname,$admin_lastname,$admin_email,$admin_level){
    $db = new DB_Setting();
    $con = $db->con;

	$query = mysqli_query($con, "UPDATE tb_admin SET admin_firstname='$admin_firstname', admin_lastname='$admin_lastname', admin_email='$admin_email', admin_level='$admin_level' WHERE admin_username='$admin_username'") or die (mysqli_error($con));
	return $query;
}

function cekUsernameAdmin($url,$admin_username){
    $db = new DB_Setting();
    $con = $db->con;

		$cek=mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_admin WHERE admin_username='$admin_username'"));
		if($cek!=0){
			header("location:".$url."notice=202");
			exit();
		}
	}

?>