<?php
  session_start();
  require_once "../model/m_edit-profile.php";
  require_once "../controller/c_validasi.php";

  

if (@($_POST['submit_edit_profile'])) {
    $url             = "../index.php?";
    $admin_username  = $_POST['admin_username'];
    $admin_firstname = $_POST['admin_firstname'];
    $admin_lastname  = $_POST['admin_lastname'];
    $admin_email     = $_POST['admin_email'];
    $admin_level     = $_POST['admin_level'];
   

    if(!empty($_FILES['admin_foto']['name'])) {
        $admin_foto      = $_FILES['admin_foto'];
        $admin_foto_name  = $admin_foto['name'];
        $admin_foto_type  = $admin_foto['type'];
        $admin_foto_size  = $admin_foto['size'];
        $admin_foto_lokasi= $admin_foto['tmp_name'];

        //New Images Name
        $newname_foto         =  new_name($admin_foto_name);
        $admin_foto_direktori = "../assets/img_upload/profile_img/$newname_foto";
        //Cek Ukuran Gambar
        maxsize($url,$admin_foto_size);      
        // Upload Foto
        $upload = cek_upload($url,$admin_foto_lokasi,$admin_foto_direktori);
        //proses delete foto sebelumnya
        $query = query_tampil_data_admin();
        $data  = mysqli_fetch_array($query);
        @unlink("assets/img_upload/profile_img/$data[admin_foto]");
        //update data admin
        $update = query_update_data_admin($admin_username,$admin_firstname,$admin_lastname,$admin_email,$admin_level,$newname_foto);

        if ($update) {
          header("location:".$url."notice=302");
        } elseif ($upload && $update != true) {
         header("location:akun-admin.php?notice=102");
        }

    } //end upload  foto true

    else { 

 
        $update1 = query_update_data_admin_without_foto($admin_username,$admin_firstname,$admin_lastname,$admin_email,$admin_level);

        if ($update1) {
          header("location:".$url."notice=302");
        } elseif ($update1 != true) {
          header("location:akun-admin.php?notice=102");
        }
    }//end upload foto false
      
}

if (@($_POST['submit_change_password_admin_yang_login'])) {
    if (isset($_SESSION['admin_username'])) {
        $admin_username = $_SESSION['admin_username'];
    } elseif (isset($_COOKIE['admin_username'])) {
        $admin_username = isset($_COOKIE['admin_username']);
    }

    $url             = "../index.php?";
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
?>