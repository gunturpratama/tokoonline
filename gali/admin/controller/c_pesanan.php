<?php
ob_start();  
require_once "model/m_pesanan.php";
require_once "controller/c_validasi.php";
//===============FUNCTION PROSES TAMPIL DATA KE TABLE=====================//
function tampil_data_pesanan()
{
    
    $url            = "pesanan.php?";
    $tampil         = query_tampil_data_pesanan();
    $aksi           = @$_GET['aksi'];
    $no             = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[pesanan_id]</td>
           <td>$data[user_username]</td>
           <td>$data[pesanan_tgl]</td>
           <td>$data[pesanan_totberat]</td>
           <td>$data[pesanan_totharga]</td>
           <td>$data[pesanan_biayakirim]</td>
           <td>$data[pesanan_grandtot]</td>
           <td>$data[pesanan_penerima]</td>
           <td>$data[pesanan_telepon]</td>
           <td>$data[pesanan_email]</td>
           <td>$data[pesanan_alamat]</td>
           <td>";?>
              <?php
              if ($data['pesanan_status']=='Terkirim') {
                echo "
                  <span class='label label-success'>$data[pesanan_status]</span>
                ";
              }
              elseif ($data['pesanan_status']=='Terbayar') {
                echo "
                  <span class='label label-info'>$data[pesanan_status]</span>
                ";
              }
              elseif ($data['pesanan_status']=='Pembayaran Ditolak') {
                echo "
                  <span class='label label-danger'>$data[pesanan_status]</span>
                ";
              }
              elseif ($data['pesanan_status']=='Pending') {
                echo "
                  <span class='label label-warning'>$data[pesanan_status]</span>
                ";
              }
              
              ?>
            <?php echo"
            </td>
           ";?>
           <?php
            if ($data['pesanan_status']=='Terkirim' || $data['pesanan_status']=='Terbayar') {
              echo "
                <td>
                 <a href='pesanandetail.php?pesanan_id=$data[pesanan_id]'><button title='Detail Pesanan' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
               </td>
               ";}

            elseif ($data['pesanan_status']=='Pending' || $data['pesanan_status']=='Pembayaran Ditolak') {
            echo "
              <td>
               <a href='pesanandetail.php?pesanan_id=$data[pesanan_id]'><button title='Detail Pesanan' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
               <a href='?aksi=delete&pesanan_id=$data[pesanan_id]' onclick='return confirm_delete_pesanan()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
             </td>
             ";}?>
        <?php echo"
         </tr>
         <tbody>";
        $no++;
    }
    
    if ($aksi == 'edit') {
        
    } elseif ($aksi == 'delete') {
        $pesanan_id = @$_GET['pesanan_id']; //mengambil id
        $delete = query_delete_data_pesanan($pesanan_id);
        if ($delete) {
            header("location:" . $url . "notice=303");
        }
    }
}
//===============END FUNCTION PROSES TAMPIL DATA KE TABLE=====================// 

//===============FUNCTION PROSES CARI=====================//
function cari_pesanan(){
    $url     = "pesanan.php?";
    $kata    = addslashes($_GET['pesanan_cari']);
    $tampil  = search_pesanan($kata);
    $no      = 1;
    while ($data = mysqli_fetch_array($tampil)) {
        echo "
       <tbody>
         <tr>
           <td>$no</td>
           <td>$data[pesanan_id]</td>
           <td>$data[user_username]</td>
           <td>$data[pesanan_tgl]</td>
           <td>$data[pesanan_totberat]</td>
           <td>$data[pesanan_totharga]</td>
           <td>$data[pesanan_biayakirim]</td>
           <td>$data[pesanan_grandtot]</td>
           <td>$data[pesanan_penerima]</td>
           <td>$data[pesanan_telepon]</td>
           <td>$data[pesanan_email]</td>
           <td>$data[pesanan_alamat]</td>
           <td>";?>
              <?php
              if ($data['pesanan_status']=='Terkirim') {
                echo "
                  <span class='label label-success'>$data[pesanan_status]</span>
                ";
              }
              elseif ($data['pesanan_status']=='Terbayar') {
                echo "
                  <span class='label label-info'>$data[pesanan_status]</span>
                ";
              }
              elseif ($data['pesanan_status']=='Pembayaran Ditolak') {
                echo "
                  <span class='label label-danger'>$data[pesanan_status]</span>
                ";
              }
              elseif ($data['pesanan_status']=='Pending') {
                echo "
                  <span class='label label-warning'>$data[pesanan_status]</span>
                ";
              }
              
              ?>
            <?php echo"
            </td>
           <td>
             <a href='pesanandetail.php?pesanan_id=$data[pesanan_id]'><button title='Detail Pesanan' class='btn btn-warning'><i class='fa fa-eye'></i></button></a>
             <a href='?aksi=delete&pesanan_id=$data[pesanan_id]' onclick='return confirm_delete_pesanan()'><button title='Delete' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
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

?>