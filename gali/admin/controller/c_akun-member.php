<?php
ob_start(); 
require_once "model/m_akun-member.php";
require_once "controller/c_validasi.php";
//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_user()
{
    
    $url            = "akun-member.php?";
    $tampil         = query_tampil_data_member();
    $aksi           = @$_GET['aksi'];
    $halaman        = @$_GET['halaman'];
    $no             = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[user_username]</td>
           <td>$data[user_email]</td>
           <td>$data[user_firstname] $data[user_lastname]</td>
           <td>$data[user_birth]</td>
           <td>$data[user_gender]</td>
           <td>$data[user_telepon]</td>
           <td>$data[user_alamat]</td>
           <td>$data[provinsi_nama] - $data[user_kota] - $data[user_pos]</td>
           <td>
             <a href='?aksi=edit_member&halaman=$halaman&user_username=$data[user_username]'><button title='Edit' class='btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>
             <a href='?aksi=change_password_member&halaman=$halaman&user_username=$data[user_username]'><button title='Change Password' class='btn btn-warning'><i class='fa fa-key'></i></button></a>
             <a href='?aksi=delete&halaman=$halaman&user_username=$data[user_username]' onclick='return confirm_delete_user()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
           </td>
         </tr>
         <tbody>";
        $no++;
    }
    
    if ($aksi == 'edit') {
        
    } elseif ($aksi == 'delete') {
        $user_username = @$_GET['user_username']; //mengambil id
        $delete = query_delete_data_user($user_username);
        if ($delete) {
            header("location:" . $url . "notice=303");
        }
    }
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_user(){
    $url     = "akun-member.php?";
    $kata    = addslashes($_GET['user_cari']);
    $halaman = @$_GET['halaman'];
    $tampil  = search_user($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[user_username]</td>
           <td>$data[user_email]</td>
           <td>$data[user_firstname] $data[user_lastname]</td>
           <td>$data[user_birth]</td>
           <td>$data[user_gender]</td>
           <td>$data[user_telepon]</td>
           <td>$data[user_alamat]</td>
           <td>$data[provinsi_nama] - $data[user_kota] - $data[user_pos]</td>
           <td>
             <a href='?aksi=edit_member&halaman=$halaman&user_username=$data[user_username]'><button class='btn btn-primary'>Edit</button></a>
             <a href='?aksi=change_password_member&halaman=$halaman&user_username=$data[user_username]'><button class='btn btn-warning'>Change Password</button></a>
             <a href='?aksi=delete&halaman=$halaman&user_username=$data[user_username]' onclick='return confirm_delete_user()'><button class='btn btn-danger'>Delete</button></a>
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



//===============PROSES EDIT DATA MEMBER=============================//

if (@($_POST['submit_edit'])) {
    $url            = "akun-member.php?";
    $user_username  = $_POST['user_username'];
    $user_email     = $_POST['user_email'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname  = $_POST['user_lastname'];
    $user_birth     = $_POST['user_birth'];
    $user_gender    = $_POST['user_gender'];
    $user_telepon   = $_POST['user_telepon'];
    $user_alamat    = $_POST['user_alamat'];
    $provinsi_id    = $_POST['provinsi_id'];
    $user_kota      = $_POST['user_kota'];
    $user_pos       = $_POST['user_pos'];

    $update = query_update_data_member($user_username, $user_email, $user_firstname,$user_lastname,$user_birth,$user_gender,$user_telepon,$user_alamat,$provinsi_id,$user_kota,$user_pos);

    if ($update) {
        header("location:" . $url . "notice=302");
    } elseif ($update1 != true) {
        header("location:akun-admin.php?notice=102");
    }
  
}
//=============== END PROSES EDIT DATA MEMBER=============================//

//===============PROSES CHANGE PASSWORD MEMBER=============================//

if (@($_POST['submit_change_password'])) {
    $url             = "akun-member.php?";
    $user_username  = $_GET['user_username'];
    $password_baru   = $_POST['user_password'];
    $password_baru_encrypted = md5($password_baru);
    $cpassword_baru  = $_POST['user_cpassword'];

    CekPassword($url,$password_baru,$cpassword_baru);
    $update = query_update_password_member($user_username,$password_baru_encrypted);
        if ($update) {
            header("location:" . $url . "notice=302");
        } elseif ($upload && $update != true) {
            header("location:akun-admin.php?notice=102");
        }
    
}
//=============== END PROSES CHANGE PASSWORD MEMBER=============================//


?>