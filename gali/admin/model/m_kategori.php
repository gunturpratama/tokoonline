<?php

require_once "../setting/DB_Setting.php";

function search_kategori($kata)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT * FROM tb_kategori WHERE kategori_id LIKE '%$kata%' OR kategori_nama LIKE '%$kata%'") or die(mysqli_error($con));
    return $query;
}

function query_tampil_data_kategori()
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT * FROM tb_kategori") or die (mysqli_error($con));
    return $query;
}

function query_select_data_kategori($kategori_id)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "SELECT * FROM tb_kategori WHERE kategori_id='$kategori_id'") or die (mysqli_error($con));
    return $query;
}

//delete data
function query_delete_data_kategori($kategori_id)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "DELETE FROM tb_kategori WHERE kategori_id='$kategori_id'") or die (mysqli_error($con));
    return $query;
}


function query_update_data_kategori($kategori_id, $kategori_nama)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "UPDATE tb_kategori SET kategori_nama='$kategori_nama' WHERE kategori_id='$kategori_id'") or die (mysqli_error($con));
    return $query;
}

function query_add_kategori($kategori_id, $kategori_nama)
{
    $db = new DB_Setting();
    $con = $db->con;

    $query = mysqli_query($con, "INSERT INTO tb_kategori VALUES ('$kategori_id','$kategori_nama')") or die (mysqli_error($con));
    return $query;
}

function cekIdKategori($url, $kategori_id)
{
    $db = new DB_Setting();
    $con = $db->con;

    $cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_kategori WHERE kategori_id='$kategori_id'"));
    if ($cek != 0) {
        header("location:" . $url . "notice=213");
        exit();
    }
}


?>