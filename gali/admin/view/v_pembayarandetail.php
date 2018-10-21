<!-- Default box -->
<?php
  $bayar_id      = @$_GET['bayar_id']; //mengambil id
  $query          = query_select_data_pembayaran($bayar_id);
  $data           = mysqli_fetch_array($query); //jadikan array
  ?>
  <div class="box box-warning box-solid">
    <div class="box-header with-border">
      <h4 class="box-title">Detail Pembayaran  - <?php echo $data['bayar_id'];?>  </h4>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        </div>
      </div> 
      <div class="box-body">
        <div class="row">
          <div class="container">
          <div class="container">
          <div class="col-sm-3">
              <div class="row">
                <h4 class="text-kuning"><b>Status : </b></h4>
                <p> <?php echo $data['bayar_status']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>ID Pembayaran : </b></h4>
                <p> <?php echo $data['bayar_id']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>ID Pesanan : </b></h4>
                <p> <?php echo $data['pesanan_id']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Tgl. Konfirmasi : </b></h4>
                <p> <?php echo $data['bayar_tgl']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Jenis Pembayaran : </b></h4>
                <p> <?php echo $data['bayar_jenis']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Dari Rekening :</b></h4>
                <p> <?php echo $data['bayar_norekening']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>A/n :</b></h4> 
                <p> <?php echo $data['bayar_atasnama']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Jumlah : </b></h4>
                <p> <?php echo rupiah($data['bayar_jumlah'])?>  </p>
              </div>
            </div>
            <div class="col-sm-8">
              <h4 class="text-kuning"><b>Bukti Pembayaran :</b></h4>
              <img style="max-height: 504px; max-width: 355px;" src="assets/img_upload/bukti_pembayaran_img/<?php echo $data['bayar_gambar']?>">
            </div>
          </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">

      </div>
      <!-- /.box-footer-->
    </div>
<!-- /.box -->