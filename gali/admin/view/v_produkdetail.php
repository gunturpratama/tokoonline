<!-- Default box -->
<?php
  $produk_id      = @$_GET['produk_id']; //mengambil id
  $query          = query_select_data_produk($produk_id); //di query berdasarkan id produk
  $data           = mysqli_fetch_array($query); //jadikan array
?>
<div class="box box-warning box-solid">
  <div class="box-header with-border">
    <h4 class="box-title">Detail Produk  - <?php echo $data['produk_id'];?>  </h4>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
    <div class="row">
    <div class="container">
      <div class="col-sm-4">
        <img style="max-height: 432px" src="../assets/img_upload/produk/<?php echo $data['produk_gambar'];?>">
      </div>
      <div class="col-sm-2">
        <div class="row">
        <h4 class="text-kuning"><b>ID Produk : </b></h4>
        <p> <?php echo $data['produk_id']?>  </p>
        </div>
        <div class="row">
        <h4 class="text-kuning"><b>Kategori :</b></h4>
        <p> <?php echo $data['kategori_nama']?>  </p>
        </div>
        <div class="row">
        <h4 class="text-kuning"><b>Nama :</b></h4> 
        <p> <?php echo $data['produk_nama']?>  </p>
        </div>
        <div class="row">
        <h4 class="text-kuning"><b>Warna : </b></h4>
        <p> <?php echo $data['produk_warna']?>  </p>
        </div>
        <div class="row">
        <h4 class="text-kuning"><b>Bahan :</b></h4> 
        <p> <?php echo $data['produk_bahan']?>  </p>
        </div>
        <div class="row">
        <h4 class="text-kuning"><b>Berat : </b></h4> 
        <p> <?php echo $data['produk_berat']?>  kg</p>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="row">
        <h4 class="text-kuning"><b>Harga :</b></h4> 
        <p> Rp. <?php echo $data['produk_harga']?>  </p>
        </div>
        <div class="row">
        <h4 class="text-kuning"><b>Deskripsi :</b></h4> 
        <p> <?php echo $data['produk_deskripsi']?>  </p>
        </div>
        <div class="row">
        <h4 class="text-kuning"><b>Ukuran & Stok:</b></h4> 
        <?php
          $query1 = query_select_produkdet($produk_id);
          while ($data1 = mysqli_fetch_array($query1)) {
            echo "
                <p><b> ".$data1['produk_size']."</b>   stok:  <b>".$data1['produk_stok']."</b>   </p> 
            ";
          } ?>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="row">
        <h4 class="text-kuning"><b>Total Stok :</b></h4> 
        <?php
          $query2 = query_hitung_total_stok($produk_id);
          $data2 = mysqli_fetch_array($query2);
          echo "
            <p><b>".$data2['produk_stok_total']." pcs</b> </p>
          ";
        ?>
        
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