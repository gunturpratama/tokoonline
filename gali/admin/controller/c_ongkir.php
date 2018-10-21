<?php
ob_start(); 
require_once "model/m_ongkir.php";
require_once "controller/c_validasi.php";
//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_ongkir()
{
    
    $url            = "ongkir.php?";
    $tampil         = query_tampil_data_ongkir();
    $aksi           = @$_GET['aksi'];
    $no             = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[tarif_id]</td>
           <td>$data[provinsi_nama]</td>
           <td>Rp. $data[tarif_harga]</td>
           <td>
             <a href='?aksi=edit_ongkir&ongkir_id=$data[tarif_id]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             <a href='?aksi=delete&ongkir_id=$data[tarif_id]' onclick='return confirm_delete_ongkir()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
           </td>
         </tr>
         <tbody>";
        $no++;
    }
    
    if ($aksi == 'edit') {
        
    } elseif ($aksi == 'delete') {
        $ongkir_id = @$_GET['ongkir_id']; //mengambil id
        $delete = query_delete_data_ongkir($ongkir_id);
        if ($delete) {
            header("location:" . $url . "notice=303");
        }
    }
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_ongkir(){
    $url     = "ongkir.php?";
    $kata    = addslashes($_GET['ongkir_cari']);
    $tampil  = search_ongkir($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[tarif_id]</td>
           <td>$data[provinsi_nama]</td>
           <td>Rp. $data[tarif_harga]</td>
           <td>
             <a href='?aksi=edit_ongkir&ongkir_id=$data[tarif_id]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             <a href='?aksi=delete&ongkir_id=$data[tarif_id]' onclick='return confirm_delete_ongkir()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
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
    $url            = "ongkir.php?";
    $ongkir_id      = $_POST['ongkir_id'];
    $ongkir_harga   = $_POST['ongkir_harga'];

    $update = query_update_data_ongkir($ongkir_id, $ongkir_harga);

    if ($update) {
        header("location:" . $url . "notice=302");
    } elseif ($update != true) {
        header("location:".$url."notice=102");
    }
  
}
//=============== END PROSES EDIT DATA KATEGORI=============================//

//==============PROSES TAMBAH KATEGORi=============================//

if (@($_POST['submit_add'])) {
    $url            = "ongkir.php?";
    $ongkir_id      = randomID();
    $provinsi_id    = $_POST['provinsi_id'];
    $ongkir_harga   = $_POST['ongkir_harga'];

    cekIdOngkir($url,$provinsi_id); //cek id tdk boleh sama
    $tambah = query_add_ongkir($ongkir_id, $provinsi_id,$ongkir_harga);

    if ($tambah) {
        header("location:" . $url . "notice=302");
    } elseif ($update != true) {
        header("location:".$url."notice=102");
    }
  
}

//=============== END PROSES TAMBAH KATEGORI=============================//



?>