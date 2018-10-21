<!-- Default box -->
<?php
  $pesanan_id      = @$_GET['pesanan_id']; //mengambil id
  $query          = query_select_data_pesanan($pesanan_id);
  $data           = mysqli_fetch_array($query); //jadikan array
  ?>
  <div class="box box-warning box-solid">
    <div class="box-header with-border">
      <h4 class="box-title">Detail Pesanan  - <?php echo $data['pesanan_id'];?>  </h4>

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
                <h4 class="text-kuning"><b>ID Pemesanan : </b></h4>
                <p> <?php echo $data['pesanan_id']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Tgl. Pemesanan : </b></h4>
                <p> <?php echo $data['pesanan_tgl']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Nama Penerima : </b></h4>
                <p> <?php echo $data['pesanan_penerima']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Alamat Pengiriman :</b></h4>
                <p> <?php echo $data['pesanan_alamat']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Telpon :</b></h4> 
                <p> <?php echo $data['pesanan_telepon']?>  </p>
              </div>
              <div class="row">
                <h4 class="text-kuning"><b>Status : </b></h4>
                <p> <?php echo $data['pesanan_status']?>  </p>
              </div>
            </div>
            <div class="col-sm-8">
              <h4><b>Detail Pemesanan</b></h4>
              <table class="table table-condensed table-hover" style="border: 1px solid #e0e0e0">
                      <thead>
                          <tr> 
                              <th class="cart_description item">Gambar</th>
                              <th class="cart_description item">Nama Produk</th>
                              <th class="cart_ref item">Ukuran</th>
                              <th class="cart_quantity item">Qty</th>
                              <th class="cart_weight item">Berat / Pcs</th>
                              <th class="cart_unit item">Harga / Pcs</th>
                              <th class="cart_total item">Subtotal Harga</th>
                          </tr>
                      </thead>
                      <?php
                      $query1 = query_select_data_pesanan($pesanan_id);
                      while ($data1=mysqli_fetch_array($query1)) {
                        echo "
                          <tbody>
                          <tr>
                          <td><img style='max-height: 100px;' src='../assets/img_upload/produk/".$data1['produk_gambar']."'></td>
                          <td>".$data1['produk_nama']."</td>
                          <td>".$data1['produk_size']."</td>
                          <td>".$data1['produk_qty']."</td>
                          <td>".$data1['produk_berat']." Kg</td>
                          <td>".rupiah($data1['produk_harga'])."</td>
                          <td>".rupiah($data1['subtotal_harga'])."</td>
                          <tr>
                          </tbody>
                        ";
                      }
                      
                      ?>
                      <tfoot>
                          <tr>
                              <td class="table-success" colspan="6"><b class="pull-right">Total Harga :</b></td>
                              <td colspan="2"><?php echo rupiah($data['pesanan_totharga']); ?>
                              </td>
                          </tr>
                          <tr class="cart_total_voucher">
                              <td colspan="6"> <b class="pull-right">Total Berat :</b> </td>
                              <td colspan="2"><?php echo $data['pesanan_totberat'];?> Kg</td>
                          </tr>
                          <tr>
                              <td class="table-success" colspan="6"><b class="pull-right">Total Ongkir :</b></td>
                              <td colspan="2"><?php echo rupiah($data['pesanan_biayakirim']);?></td>
                          </tr>
                          <tr>
                              <td colspan="6"> </td>
                              <td colspan="2" style="background-color: #424242; color: white;"> <h4>Grand Total</h4> 
                                  <h5><?php echo rupiah($data['pesanan_grandtot']);?></h5>
                              </td>
                          </tr>
                      </tfoot>
              </table>
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