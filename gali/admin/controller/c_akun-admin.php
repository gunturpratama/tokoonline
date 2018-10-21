<?php
ob_start();
require_once "model/m_akun-admin.php";
require_once "controller/c_validasi.php";
//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_admin()
{
    //if untuk menentukan value variabel $yang_login
    if (isset($_SESSION['admin_username'])) {
        $yang_login = $_SESSION['admin_username'];
    } elseif (isset($_COOKIE['admin_username'])) {
        $yang_login = $_COOKIE['admin_username'];
    }
    
    $url            = "akun-admin.php?";
    $tampil         = query_tampil_data_admin_with_where($yang_login);
    $aksi           = @$_GET['aksi'];
    $halaman        = @$_GET['halaman'];
    $admin_username = @$_GET['admin_username'];
    $no             = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[admin_username]</td>
           <td>$data[admin_firstname]</td>
           <td>$data[admin_lastname]</td>
           <td>$data[admin_email]</td>
           <td>$data[admin_level]</td>
           <td>$data[admin_tgl]</td>
           <td><img style='max-width:50px;' src='assets/img_upload/profile_img/$data[admin_foto]'></td>
           <td>
             <a href='?aksi=edit_admin&halaman=$halaman&admin_username=$data[admin_username]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             <a href='?aksi=change_password_admin&halaman=$halaman&admin_username=$data[admin_username]'><button title='Change Password' class='btn btn-warning'><i class='fa fa-key'></i></button></a>
             <a href='?aksi=delete&halaman=$halaman&admin_username=$data[admin_username]' onclick='return confirm_delete()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
           </td>
         </tr>
         <tbody>";
        $no++;
    }
    
    if ($aksi == 'edit') {
        
    } elseif ($aksi == 'delete') {
        $delete = query_delete_data_admin($admin_username);
        if ($delete) {
            header("location:" . $url . "notice=303");
        }
    }
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_admin(){
    $url     = "akun-admin.php?";
    $kata    = addslashes($_GET['admin_cari']);
    $halaman = @$_GET['halaman'];
    $tampil  = search_admin($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
           <tbody>
             <tr>
               <td>$no</td>
               <td>$data[admin_username]</td>
               <td>$data[admin_firstname]</td>
               <td>$data[admin_lastname]</td>
               <td>$data[admin_email]</td>
               <td>$data[admin_level]</td>
               <td>$data[admin_tgl]</td>
               <td><img style='max-width:50px;' src='assets/img_upload/profile_img/$data[admin_foto]'></td>
               <td>
                 <a href='?aksi=edit_admin&halaman=$halaman&admin_username=$data[admin_username]'><button class='btn btn-primary'>Edit</button></a>
                 <a href='?aksi=change_password_admin&halaman=$halaman&admin_username=$data[admin_username]'><button class='btn btn-warning'>Change Password</button></a>
                 <a href='?aksi=delete&halaman=$halaman&admin_username=$data[admin_username]' onclick='return confirm_delete()'><button class='btn btn-danger'>Delete</button></a>
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


//=========PROSES TAMBAH DATA ADMIN============//
if (@$_POST['submit_add']) {
    $url                = "akun-admin.php?"; //digunakan di c_validasi
    $admin_username     = $_POST['admin_username'];
    $admin_password     = $_POST['admin_password'];
    $admin_cpassword    = $_POST['admin_cpassword'];
    $password_encrypted = md5($admin_password);
    $admin_firstname    = $_POST['admin_firstname'];
    $admin_lastname     = $_POST['admin_lastname'];
    $admin_email        = $_POST['admin_email'];
    $admin_level        = $_POST['admin_level'];
    $admin_tgl          = date("y-m-d");
    $admin_foto         = $_FILES['admin_foto'];
    
    //persiapan utk upload image
    $admin_foto_name      = $admin_foto['name'];
    $admin_foto_type      = $admin_foto['type'];
    $admin_foto_size      = $admin_foto['size'];
    $admin_foto_lokasi    = $admin_foto['tmp_name'];
    $newname_foto         = new_name($admin_foto_name); //ganti nama image agar tdk sama dgn image lain
    $admin_foto_direktori = "assets/img_upload/profile_img/$newname_foto"; //direktori upload gambar
    //Cek Ukuran Gambar
    maxsize($url, $admin_foto_size);
    // Proses upload Foto
    cek_upload($url, $admin_foto_lokasi, $admin_foto_direktori);
    //Cek Username
    cekUsernameAdmin($url, $admin_username);
    //Cek Kesamaan Password
    CekPassword($url, $admin_password, $admin_cpassword);
    
    $tambah = query_add_data_admin($admin_username, $password_encrypted, $admin_firstname, $admin_lastname, $admin_email, $admin_level, $admin_tgl, $newname_foto);
    
    if ($tambah) {
        header("location:" . $url . "notice=301");
    } else {
        header("location:" . $url . "notice=102");
    }
    
}
//=========END PROSES TAMBAH DATA ADMIN============//


//===============PROSES EDIT DATA ADMIN=============================//

if (@($_POST['submit_edit'])) {
    $url             = "akun-admin.php?";
    $admin_username  = $_POST['admin_username'];
    $admin_firstname = $_POST['admin_firstname'];
    $admin_lastname  = $_POST['admin_lastname'];
    $admin_email     = $_POST['admin_email'];
    $admin_level     = $_POST['admin_level'];
    
    
    if (!empty($_FILES['admin_foto']['name'])) {
        $admin_foto        = $_FILES['admin_foto'];
        $admin_foto_name   = $admin_foto['name'];
        $admin_foto_type   = $admin_foto['type'];
        $admin_foto_size   = $admin_foto['size'];
        $admin_foto_lokasi = $admin_foto['tmp_name'];
        
        //New Images Name
        $newname_foto         = new_name($admin_foto_name);
        $admin_foto_direktori = "assets/img_upload/profile_img/$newname_foto";
        //Cek Ukuran Gambar
        maxsize($url, $admin_foto_size);
        // Upload Foto
        $upload = cek_upload($url, $admin_foto_lokasi, $admin_foto_direktori);
        //proses delete foto sebelumnya
        $query  = query_tampil_data_admin();
        $data   = mysqli_fetch_array($query);
        @unlink("assets/img_upload/profile_img/$data[admin_foto]");
        //update data admin
        $update = query_update_data_admin($admin_username, $admin_firstname, $admin_lastname, $admin_email, $admin_level, $newname_foto);
        
        if ($update) {
            header("location:" . $url . "notice=302");
        } elseif ($upload && $update != true) {
            header("location:akun-admin.php?notice=102");
        }
        
    } //end upload  foto true
    
    else {
        
        
        $update1 = query_update_data_admin_without_foto($admin_username, $admin_firstname, $admin_lastname, $admin_email, $admin_level);
        
        if ($update1) {
            header("location:" . $url . "notice=302");
        } elseif ($update1 != true) {
            header("location:akun-admin.php?notice=102");
        }
    } //end upload foto false
    
}
//=============== END PROSES EDIT DATA ADMIN=============================//

//===============PROSES CHANGE PASSWORD ADMIN=============================//

if (@($_POST['submit_change_password'])) {
    $url             = "akun-admin.php?";
    $admin_username  = $_GET['admin_username'];
    $password_baru   = $_POST['admin_password'];
    $password_baru_encrypted = md5($password_baru);
    $cpassword_baru  = $_POST['admin_cpassword'];

    CekPassword($url,$password_baru,$cpassword_baru);
    $update = query_update_password_admin($admin_username,$password_baru_encrypted);
        if ($update) {
            header("location:" . $url . "notice=302");
        } elseif ($upload && $update != true) {
            header("location:akun-admin.php?notice=102");
        }
    
}
//=============== END PROSES CHANGE PASSWORD ADMIN=============================//


?>