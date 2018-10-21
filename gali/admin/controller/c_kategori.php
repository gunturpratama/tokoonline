<?php
ob_start(); 
require_once "model/m_kategori.php";
require_once "controller/c_validasi.php";
//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_kategori()
{
    
    $url            = "kategori.php?";
    $tampil         = query_tampil_data_kategori();
    $aksi           = @$_GET['aksi'];
    $no             = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[kategori_id]</td>
           <td>$data[kategori_nama]</td>
           <td>
             <a href='?aksi=edit_kategori&kategori_id=$data[kategori_id]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             
           </td>
         </tr>
         <tbody>";
        $no++;
    }
    
    if ($aksi == 'edit') {
        
    } elseif ($aksi == 'delete') {
        $kategori_id = @$_GET['kategori_id']; //mengambil id
        $delete = query_delete_data_kategori($kategori_id);
        if ($delete) {
            header("location:" . $url . "notice=303");
        }
    }
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_kategori(){
    $url     = "kategori.php?";
    $kata    = addslashes($_GET['kategori_cari']);
    $tampil  = search_kategori($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[kategori_id]</td>
           <td>$data[kategori_nama]</td>
           <td>
             <a href='?aksi=edit_kategori&kategori_id=$data[kategori_id]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>

           </td>
         </tr>
         <tbody>";
        $no++;
    }
    if (mysqli_num_rows($tampil) == 0) {
      echo "
        <tbody>
        <td>Tidak ada data ditemukan</td>
        </tbody>
      ";
    }
}
//===============END FUNCTION PROSES CARI=====================//



//===============PROSES EDIT DATA KATEGORi=============================//

if (@($_POST['submit_edit'])) {
    $url            = "kategori.php?";
    $kategori_id    = $_POST['kategori_id'];
    $kategori_nama  = $_POST['kategori_nama'];

    $update = query_update_data_kategori($kategori_id, $kategori_nama);

    if ($update) {
        header("location:" . $url . "notice=302");
    } elseif ($update != true) {
        header("location:".$url."notice=102");
    }
  
}
//=============== END PROSES EDIT DATA KATEGORI=============================//

//===============PROSES TAMBAH KATEGORi=============================//
/*
if (@($_POST['submit_add'])) {
    $url            = "kategori.php?";
    $kategori_id    = strtoupper($_POST['kategori_id']);
    $kategori_nama  = ucfirst($_POST['kategori_nama']);

    cekIdKategori($url,$kategori_id); //cek id tdk boleh sama
    $tambah = query_add_kategori($kategori_id, $kategori_nama);

    if ($tambah) {
        header("location:" . $url . "notice=302");
    } elseif ($update != true) {
        header("location:".$url."notice=102");
    }
  
}
*/
//=============== END PROSES TAMBAH KATEGORI=============================//



?>