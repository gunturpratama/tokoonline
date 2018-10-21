<?php

require_once "../setting/DB_Setting.php";

function search_provinsi($kata)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT * FROM tb_provinsi WHERE provinsi_id LIKE '%$kata%' OR provinsi_nama LIKE '%$kata%' ORDER BY provinsi_nama ASC") or die(mysqli_error($con));
    return $query;
}

function query_tampil_data_provinsi()
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT * FROM tb_provinsi ORDER BY provinsi_nama ASC") or die (mysqli_error($con));
    return $query;
}

function query_select_data_provinsi($provinsi_id)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT * FROM tb_provinsi WHERE provinsi_id='$provinsi_id'") or die (mysqli_error($con));
    return $query;
}

//delete data
function query_delete_data_provinsi($provinsi_id)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "DELETE FROM tb_provinsi WHERE provinsi_id='$provinsi_id'") or die (mysqli_error($con));
    return $query;
}


function query_update_data_provinsi($provinsi_id, $provinsi_nama)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "UPDATE tb_provinsi SET provinsi_nama='$provinsi_nama' WHERE provinsi_id='$provinsi_id'") or die (mysqli_error($con));
    return $query;
}

function query_add_provinsi($provinsi_id, $provinsi_nama)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "INSERT INTO tb_provinsi VALUES ('$provinsi_id','$provinsi_nama')") or die (mysqli_error($con));
    return $query;
}

function cekIdProvinsi($url, $provinsi_id)
{
    $db = new DB_Setting();
    $con = $db->con;

    $cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_provinsi WHERE provinsi_id='$provinsi_id'"));
    if ($cek != 0) {
        header("location:" . $url . "notice=213");
        exit();
    }
}


?>