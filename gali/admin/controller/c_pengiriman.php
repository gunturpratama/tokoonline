<?php
ob_start();  
require_once "model/m_pengiriman.php"; 
require_once "controller/c_validasi.php";
//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_pengiriman(){
    $url            = "pengiriman.php?";
    $tampil         = query_tampil_data_pengiriman();
    $aksi           = @$_GET['aksi'];
    $no             = 1;
    if (mysqli_num_rows($tampil) > 0) {
          while ($data = mysqli_fetch_array($tampil)) {
          echo "
           <tbody>
             <tr>
             <td>$no</td>
             <td>$data[pesanan_id]</td>
             <td>$data[pesanan_tgl]</td>
             <td>$data[pesanan_status]</td>
              <td>
               <a href='?aksi=konfirmasi_pengiriman&pesanan_id=$data[pesanan_id]'><button class='btn btn-success'><i class='fa fa-truck'></i> &nbsp Konfirmasi Pengiriman</button></a>
              </td>
           </tr>
           <tbody>";
        $no++;
        }
    }
    else{
      echo "
        <tbody>
          <tr>
             <td>Belum ada data terbaru</td>
          </tr>
        <tbody>
      ";
    }
    
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_pengiriman(){
    $url     = "pengiriman.php?";
    $kata    = addslashes($_GET['pengiriman_cari']);
    $tampil  = search_pengiriman($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[pesanan_id]</td>
           <td>$data[pesanan_tgl]</td>
           <td>$data[pesanan_status]</td>
            <td>
             <a href='?aksi=konfirmasi_pengiriman&pesanan_id=$data[pesanan_id]'><button class='btn btn-success'><i class='fa fa-truck'></i> &nbsp Konfirmasi Pengiriman</button></a>
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

//===============PROSES KONFIRMASI=====================//
if (isset($_POST['submit_konfirmasi'])) {
  $url          = "pengiriman.php?";
  $pesanan_id   = $_POST['pesanan_id'];
  $pesanan_resi = $_POST['pesanan_resi'];
  $pesanan_status = "Terkirim";

  //update tb_pesanan
  $update = query_update_pesanan($pesanan_id,$pesanan_resi,$pesanan_status);

  if ($update) {
    header("location:".$url."notice=304");
  }
}

//===============END PROSES KONFIRMASI=====================//




?>