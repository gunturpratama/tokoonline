<?php
ob_start(); 
require_once "model/m_provinsi.php";
require_once "controller/c_validasi.php";
//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_provinsi()
{
    
    $url            = "provinsi.php?";
    $tampil         = query_tampil_data_provinsi();
    $aksi           = @$_GET['aksi'];
    $no             = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[provinsi_id]</td>
           <td>$data[provinsi_nama]</td>
           <td>
             <a href='?aksi=edit_provinsi&provinsi_id=$data[provinsi_id]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             <a href='?aksi=delete&provinsi_id=$data[provinsi_id]' onclick='return confirm_delete_provinsi()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
           </td>
         </tr>
         <tbody>";
        $no++;
    }
    
    if ($aksi == 'edit') {
        
    } elseif ($aksi == 'delete') {
        $provinsi_id = @$_GET['provinsi_id']; //mengambil id
        $delete = query_delete_data_provinsi($provinsi_id);
        if ($delete) {
            header("location:" . $url . "notice=303");
        }
    }
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_provinsi(){
    $url     = "provinsi.php?";
    $kata    = addslashes($_GET['provinsi_cari']);
    $tampil  = search_provinsi($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[provinsi_id]</td>
           <td>$data[provinsi_nama]</td>
           <td>
             <a href='?aksi=edit_provinsi&provinsi_id=$data[provinsi_id]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             <a href='?aksi=delete&provinsi_id=$data[provinsi_id]' onclick='return confirm_delete_kategori()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
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
    $url            = "provinsi.php?";
    $provinsi_id    = $_POST['provinsi_id'];
    $provinsi_nama  = $_POST['provinsi_nama'];

    $update = query_update_data_provinsi($provinsi_id, $provinsi_nama);

    if ($update) {
        header("location:" . $url . "notice=302");
    } elseif ($update != true) {
        header("location:".$url."notice=102");
    }
  
}
//=============== END PROSES EDIT DATA KATEGORI=============================//

//==============PROSES TAMBAH KATEGORi=============================//

if (@($_POST['submit_add'])) {
    $url            = "provinsi.php?";
    $provinsi_id    = randomID();
    $provinsi_nama  = ucfirst($_POST['provinsi_nama']);

    cekIdProvinsi($url,$provinsi_id); //cek id tdk boleh sama
    $tambah = query_add_provinsi($provinsi_id, $provinsi_nama);

    if ($tambah) {
        header("location:" . $url . "notice=302");
    } elseif ($update != true) {
        header("location:".$url."notice=102");
    }
  
}

//=============== END PROSES TAMBAH KATEGORI=============================//



?>