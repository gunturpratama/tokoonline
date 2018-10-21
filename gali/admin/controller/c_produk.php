<?php
ob_start();
require_once "model/m_produk.php";
require_once "controller/c_validasi.php";
require_once "../setting/DB_Setting.php";

$db = new DB_Setting();
$con = $db->con;



//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_produk()
{
    
    $url            = "produk.php?";
    $tampil         = query_tampil_data_produk();
    $aksi           = @$_GET['aksi'];
    $no             = 1; 
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[produk_id]</td>
           <td>$data[kategori_nama]</td>
           <td>$data[produk_nama]</td>
           <td>$data[produk_warna]</td>
           <td>$data[produk_size]</td>
           <td>$data[produk_stok]</td>
           <td>Rp. $data[produk_harga]</td>
           <td><img style='max-width:50px;' src='../assets/img_upload/produk/$data[produk_gambar]'></td>
           <td>
             <a href='?aksi=edit_produk&produk_id=$data[produk_id]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             <a href='produkdetail.php?produk_id=$data[produk_id]'><button title='Detail' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
             <a href='?aksi=delete&produk_id=$data[produk_id]' onclick='return confirm_delete_produk()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
           </td>
         </tr>
         <tbody>";
        $no++;
    }
    
    if ($aksi == 'edit') {
        
    } elseif ($aksi == 'delete') {
        $produk_id  = @$_GET['produk_id']; //mengambil id
        $query      = query_select_produk_where($produk_id);
        $data1      = mysqli_fetch_array($query);
        unlink("../assets/img_upload/produk/$data1[produk_gambar]");
        //proses delete
        $delete     = query_delete_data_produk($produk_id);
        if ($delete) {
            header("location:" . $url . "notice=303");
        }
    }
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_produk(){
    $url     = "produk.php?";
    $kata    = addslashes($_GET['produk_cari']);
    $tampil  = search_produk($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
           <tbody>
         <tr>
           <td>$no</td>
           <td>$data[produk_id]</td>
           <td>$data[kategori_nama]</td>
           <td>$data[produk_nama]</td>
           <td>$data[produk_warna]</td>
           <td>$data[produk_size]</td>
           <td>$data[produk_stok]</td>
           <td>Rp. $data[produk_harga]</td>
           <td><img style='max-width:50px;' src='../assets/img_upload/produk/$data[produk_gambar]'></td>
           <td>
             <a href='?aksi=edit_produk&produk_id=$data[produk_id]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             <a href='produkdetail.php?produk_id=$data[produk_id]'><button title='Detail' class='btn btn-warning'><i class='fa fa-info-circle'></i></button></a>
             <a href='?aksi=delete&produk_id=$data[produk_id]' onclick='return confirm_delete_produk()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
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


//=========PROSES TAMBAH DATA PRODUK============//
if (@$_POST['submit_add']) {
    $url             = "produk.php?";
    $produk_id       = randomID();
    $kategori_id     = $_POST['kategori_id'];
    $produk_tgl      = date("Y-m-d H:i:s");
    $produk_nama     = $_POST['produk_nama'];
    $produk_warna    = $_POST['produk_warna'];
    $produk_bahan    = $_POST['produk_bahan'];
    $produk_berat    = $_POST['produk_berat'];
    $produk_harga    = $_POST['produk_harga'];
    $produk_deskripsi= $_POST['produk_deskripsi'];
    $produk_gambar   = $_FILES['produk_gambar'];

    //persiapan untuk upload gambar
        $produk_gambar_name= $produk_gambar['name'];
        $produk_gambar_type= $produk_gambar['type'];
        $produk_gambar_size= $produk_gambar['size'];
        $produk_gambar_lokasi = $produk_gambar['tmp_name'];
         //New Images Name
        $newname_foto            = new_name($produk_gambar_name);
        $produk_gambar_direktori = "../assets/img_upload/produk/$newname_foto";
        //Cek Ukuran Gambar
        maxsize($url, $produk_gambar_size);
        // Upload Foto
        $upload = cek_upload($url, $produk_gambar_lokasi, $produk_gambar_direktori);
    //end persiapan upload gambar
    
    $tambah = query_add_data_produk($produk_id,$kategori_id,$produk_tgl,$produk_nama,$produk_warna,$produk_bahan,$produk_berat,$produk_harga,$produk_deskripsi,$newname_foto);
    
    if ($tambah) {
        //header("location:" . $url . "notice=301");
        $row_data=array();
            foreach ($_POST["produk_size"] as $row => $ukuran) {
                $size=mysqli_real_escape_string($con, $ukuran);
                $stok=mysqli_real_escape_string($con, $_POST['produk_stok'][$row]);
                
                $row_data[]="('$produk_id','$size','$stok')";
            }
            $values=implode(',',$row_data);
            if(!empty($row_data)){
                $tambah_baru=mysqli_query($con, "INSERT INTO tb_produkdet VALUES $values")or die(mysqli_error($con));
                if($tambah_baru){
                    header("location:" . $url . "notice=302");
                }else{
                    header("location:" . $url . "notice=102");
                }
            }

    } else {
        header("location:" . $url . "notice=102");
    }
    
}
//=========END PROSES TAMBAH DATA PRODUK============//


//===============PROSES EDIT DATA PRODUK=============================//
if (@($_POST['submit_edit'])) {
    $url             = "produk.php?";
    $produk_id       = $_POST['produk_id'];
    $kategori_id     = $_POST['kategori_id'];
    $produk_nama     = $_POST['produk_nama'];
    $produk_warna    = $_POST['produk_warna'];
    $produk_bahan    = $_POST['produk_bahan'];
    //$produk_size   =
    //$produk_stok   =
    $produk_berat    = $_POST['produk_berat'];
    $produk_harga    = $_POST['produk_harga'];
    $produk_deskripsi= $_POST['produk_deskripsi'];
    
    if (!empty($_FILES['produk_gambar']['name'])) {
        $produk_gambar     = $_FILES['produk_gambar'];
        $produk_gambar_name= $produk_gambar['name'];
        $produk_gambar_type= $produk_gambar['type'];
        $produk_gambar_size= $produk_gambar['size'];
        $produk_gambar_lokasi = $produk_gambar['tmp_name'];
        
        //New Images Name
        $newname_foto            = new_name($produk_gambar_name);
        $produk_gambar_direktori = "../assets/img_upload/produk/$newname_foto";
        //Cek Ukuran Gambar
        maxsize($url, $produk_gambar_size);
        // Upload Foto
        $upload = cek_upload($url, $produk_gambar_lokasi, $produk_gambar_direktori);
        //proses delete foto sebelumnya
        $query  = query_select_produk_where($produk_id);
        $data   = mysqli_fetch_array($query);
        unlink("../assets/img_upload/produk/$data[produk_gambar]");
        
        //update data produk
        $update = query_update_data_produk($produk_id,$kategori_id,$produk_nama,$produk_warna,$produk_bahan,$produk_berat,$produk_harga,$produk_deskripsi,$newname_foto);
        
        if ($update) {
            //header("location:" . $url . "notice=302");
            $row_data=array();
            foreach ($_POST["produk_size"] as $row => $ukuran) {
                $size=mysqli_real_escape_string($con, $ukuran);
                $stok=mysqli_real_escape_string($con, $_POST['produk_stok'][$row]);
                
                $row_data[]="('$produk_id','$size','$stok')";
            }
            $values=implode(',',$row_data);
            if(!empty($row_data)){
                $hapus_lama=mysqli_query($con, "DELETE FROM tb_produkdet WHERE produk_id='$produk_id'")or die(mysqli_error($con));
                $tambah_baru=mysqli_query($con, "INSERT INTO tb_produkdet VALUES $values")or die(mysqli_error($con));
                if($tambah_baru){
                    header("location:" . $url . "notice=302");
                }else{
                    header("location:" . $url . "notice=102");
                }
            }

        } elseif ($upload && $update != true) {
            header("location:".$url."notice=102");
        }
        
    } //end upload  foto true
    
    else {
        //update data produk
        $update = query_update_data_produk_without_gambar($produk_id,$kategori_id,$produk_nama,$produk_warna,$produk_bahan,$produk_berat,$produk_harga,$produk_deskripsi);
        
        if ($update) {
            //header("location:" . $url . "notice=302");
            $row_data=array();
            foreach ($_POST["produk_size"] as $row => $ukuran) {
                $size=mysqli_real_escape_string($con, $ukuran);
                $stok=mysqli_real_escape_string($con, $_POST['produk_stok'][$row]);
                
                $row_data[]="('$produk_id','$size','$stok')";
            }
            $values=implode(',',$row_data);
            if(!empty($row_data)){
                $hapus_lama=mysqli_query($con, "DELETE FROM tb_produkdet WHERE produk_id='$produk_id'")or die(mysqli_error($con));
                $tambah_baru=mysqli_query($con, "INSERT INTO tb_produkdet VALUES $values")or die(mysqli_error($con));
                if($tambah_baru){
                    header("location:" . $url . "notice=302");
                }else{
                    header("location:" . $url . "notice=102");
                }
            }
        } 
    
    }//end upload foto false
}
//=============== END PROSES EDIT DATA PRODUK=============================//


?>