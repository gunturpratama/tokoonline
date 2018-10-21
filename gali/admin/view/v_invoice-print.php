<?php
$pesanan_id = $_GET['pesanan_id'];
$data = mysqli_fetch_array(query_select_tbpesanan_dan_tbbayar($pesanan_id));
?>
<section class="invoice"> 
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <img src="../assets/img/logo.png"> PT. Gagapan Bali.
          <small class="pull-right">Tgl: <?php echo date("Y-m-d");?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Dari
        <address>
          <strong>PT. Gagapan Bali.</strong><br>
            Jl. Tukad Pakerisan No.97 <br>
          Denpasar Selatan, 80225, Bali <br>
          Telp: (0361) 123-4567<br>
          Email: info@gagapanbali.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Ke:
        <address>
          <strong><?php echo $data['pesanan_penerima']?></strong><br>
          <?php echo $data['pesanan_alamat']?><br>
          <?php echo $data['pesanan_alamat']?><br>
          Telp: <?php echo $data['pesanan_telepon']?><br>
          Email: <?php echo $data['pesanan_email']?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Keterangan:
        <address>
        ID Pesanan: <b># <?php echo $data['pesanan_id']?></b><br>
        ID Pembayaran: <b># <?php echo $data['bayar_id']?></b><br>
        Pembayaran Status: <b><?php echo $data['bayar_status']?>/Lunas</b><br>
        Jenis Pembayaran: <b>Transfer <?php echo $data['bayar_jenis']?></b> <br>
        Kurir Pengiriman: <b><?php echo $data['pesanan_delivery']?></b> <br>
        </address>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

   

    <div class="row">
      <!-- accepted payments column -->
      <!-- /.col -->
      <div class="col-xs-12">
        <p class="lead">Rincian:</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:58%">Total Harga:</th>
              <td>:</td>
              <td><?php echo rupiah($data['pesanan_totharga'])?></td>
            </tr>
            <tr>
              <th>Total Berat</th>
              <td>:</td>
              <td><?php echo $data['pesanan_totberat']?> Kg</td>
            </tr>
            <tr>
              <th>Total Ongkir:</th>
              <td>:</td>
              <td><?php echo rupiah($data['pesanan_biayakirim'])?></td>
            </tr>
            <tr>
              <th>Grand Total:</th>
              <td>:</td>
              <td><?php echo rupiah($data['pesanan_grandtot'])?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>