<?php
ob_start();  
require_once "model/m_pembayaran.php";
require_once "controller/c_validasi.php";
//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_pembayaran(){
    $url            = "pembayaran.php?";
    $tampil         = query_tampil_data_pembayaran();
    $aksi           = @$_GET['aksi'];
    $no             = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[bayar_id]</td>
           <td>$data[pesanan_id]</td>
           <td>$data[bayar_tgl]</td>
           <td>$data[bayar_jenis]</td>
           <td>$data[bayar_norekening]</td>
           <td>$data[bayar_atasnama]</td>
           <td>".rupiah($data['bayar_jumlah'])."</td>
           <td><img style='max-height: 100px; max-width:50px;' src='assets/img_upload/bukti_pembayaran_img/$data[bayar_gambar]'/></td>
           <td>";?>
              <?php
              if ($data['bayar_status']=='Terbayar') {
                echo "
                  <span class='label label-info'>$data[bayar_status]</span>
                ";
              }
              elseif ($data['bayar_status']=='Pembayaran Ditolak') {
                echo "
                  <span class='label label-danger'>$data[bayar_status]</span>
                ";
              }
              elseif ($data['bayar_status']=='Pending') {
                echo "
                  <span class='label label-warning'>$data[bayar_status]</span>
                ";
              }
              
              ?>
            <?php echo"
            </td>";?>
           <?php
           if ($data['bayar_status']=='Pembayaran Ditolak') {
            echo"
            <td>
             <a href='pembayarandetail.php?bayar_id=$data[bayar_id]'><button title='Detail Pembayaran' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
             <a href='?aksi=delete&bayar_id=$data[bayar_id]' onclick='return confirm_delete_pembayaran()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
           </td>
         </tr>
         <tbody>";}
         elseif ($data['bayar_status']=='Terbayar') {
            echo"
            <td>
             <a href='pembayarandetail.php?bayar_id=$data[bayar_id]'><button title='Detail Pembayaran' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
             <a target='_blank' href='invoice-print.php?pesanan_id=$data[pesanan_id]'><button title='Print' class='btn btn-info'><i class='fa fa-print'></i></button></a>
           </td>
         </tr>
         <tbody>";}
         elseif ($data['bayar_status']=='Pending') {
            echo"
            <td>
            <a href='?aksi=konfirmasipembayaran&bayar_id=$data[bayar_id]&pesanan_id=$data[pesanan_id]' onclick='return confirm_konfirmasi_pembayaran()'><button title='Konfirmasi' class='btn btn-success'><i class='fa fa-check'></i></button></a>
            <a href='?aksi=tolakpembayaran&bayar_id=$data[bayar_id]&pesanan_id=$data[pesanan_id]' onclick='return confirm_tolak_pembayaran()'><button title='Tolak Pembayaran' class='btn btn-danger'><i class='fa fa-times'></i></button></a>
             <a href='pembayarandetail.php?bayar_id=$data[bayar_id]'><button title='Detail Pembayaran' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
           </td>
         </tr>
         <tbody>";}
        $no++;
    }
    
    if ($aksi == 'edit') {
        
    } elseif ($aksi == 'delete') {
        $bayar_id = @$_GET['bayar_id']; //mengambil id
        $data2    = mysqli_fetch_array(query_select_data_pembayaran($bayar_id));
        unlink("assets/img_upload/bukti_pembayaran_img/$data2[bayar_gambar]");
        $delete = query_delete_data_pembayaran($bayar_id);
        if ($delete) {
            header("location:" . $url . "notice=303");
        }
    }
    elseif ($aksi == 'tolakpembayaran') {
        $bayar_id     = @$_GET['bayar_id']; //mengambil id
        $bayar_status = "Pembayaran Ditolak";
        $data2        = mysqli_fetch_array(query_select_data_pembayaran($bayar_id));
        $update_bayar_status  = query_update_data_pembayaran($bayar_id,$bayar_status);
        $update_pesanan_status= query_update_data_pesanan($data2['pesanan_id'],$bayar_status);
        if ($update_bayar_status && $update_pesanan_status) {
            header("location:" . $url . "notice=302");
        }
    }
    elseif ($aksi == 'konfirmasipembayaran') {
        $bayar_id     = @$_GET['bayar_id']; //mengambil id
        $bayar_status = "Terbayar";
        $data2        = mysqli_fetch_array(query_select_data_pembayaran($bayar_id));
        $update_bayar_status  = query_update_data_pembayaran($bayar_id,$bayar_status);
        $update_pesanan_status= query_update_data_pesanan($data2['pesanan_id'],$bayar_status);
        if ($update_bayar_status && $update_pesanan_status) {
            header("location:" . $url . "notice=302");
        }
    }
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_pembayaran(){
    $url     = "pembayaran.php?";
    $kata    = addslashes($_GET['pembayaran_cari']);
    $tampil  = search_pembayaran($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[bayar_id]</td>
           <td>$data[pesanan_id]</td>
           <td>$data[bayar_tgl]</td>
           <td>$data[bayar_jenis]</td>
           <td>$data[bayar_norekening]</td>
           <td>$data[bayar_atasnama]</td>
           <td>".rupiah($data['bayar_jumlah'])."</td>
           <td><img style='max-height: 100px; max-width:50px;' src='assets/img_upload/bukti_pembayaran_img/$data[bayar_gambar]'/></td>
           <td>";?>
              <?php
              if ($data['bayar_status']=='Terbayar') {
                echo "
                  <span class='label label-info'>$data[bayar_status]</span>
                ";
              }
              elseif ($data['bayar_status']=='Pembayaran Ditolak') {
                echo "
                  <span class='label label-danger'>$data[bayar_status]</span>
                ";
              }
              elseif ($data['bayar_status']=='Pending') {
                echo "
                  <span class='label label-warning'>$data[bayar_status]</span>
                ";
              }
              
              ?>
            <?php echo"
            </td>";?>
           <?php
           if ($data['bayar_status']=='Pembayaran Ditolak') {
            echo"
            <td>
             <a href='pembayarandetail.php?bayar_id=$data[bayar_id]'><button title='Detail Pembayaran' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
             <a href='?aksi=delete&bayar_id=$data[bayar_id]' onclick='return confirm_delete_pembayaran()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
           </td>
         </tr>
         <tbody>";}
         elseif ($data['bayar_status']=='Terbayar') {
            echo"
            <td>
             <a href='pembayarandetail.php?bayar_id=$data[bayar_id]'><button title='Detail Pembayaran' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
             <a target='_blank' href='invoice-print.php?pesanan_id=$data[pesanan_id]'><button title='Print' class='btn btn-info'><i class='fa fa-print'></i></button></a>
           </td>
         </tr>
         <tbody>";}
         elseif ($data['bayar_status']=='Pending') {
            echo"
            <td>
            <a href='?aksi=konfirmasipembayaran&bayar_id=$data[bayar_id]&pesanan_id=$data[pesanan_id]' onclick='return confirm_konfirmasi_pembayaran()'><button title='Konfirmasi' class='btn btn-success'><i class='fa fa-check'></i></button></a>
            <a href='?aksi=tolakpembayaran&bayar_id=$data[bayar_id]&pesanan_id=$data[pesanan_id]' onclick='return confirm_tolak_pembayaran()'><button title='Tolak Pembayaran' class='btn btn-danger'><i class='fa fa-times'></i></button></a>
             <a href='pembayarandetail.php?bayar_id=$data[bayar_id]'><button title='Detail Pembayaran' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
           </td>
         </tr>
         <tbody>";}
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

?>