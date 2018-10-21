<div class="row">
 <div class="col-xs-12">
  <div class="box">
   <div class="box-header">
    <h3 class="box-title">Daftar Produk</h3>
    <div class="box-tools">
     <div class="input-group input-group-sm" style="width: 250px;">
      <div class="input-group-btn">
       <button type="submit" data-toggle="modal" data-target="#modalAddProduk" class="btn btn-sm btn-success" style="margin-right:5px;"> <i class="fa fa-plus"> </i> Tambah Produk</button>
     </div>
     <form action="" method="GET">
       <input type="search" name="produk_cari" value="<?php if(!empty($_GET['produk_cari'])){echo $_GET['produk_cari'];} ?>" class="form-control pull-right" placeholder="Cari dan enter">
     </form>
   </div>
 </div>
</div>
<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
   <tr>
    <th>No</th>
    <th>ID</th>
    <th>Kategori</th>
    <th>Nama</th>
    <th>Warna</th>
    <th>Ukuran</th>
    <th>Stok</th> 
    <th>Harga</th>
    <th>Foto</th>
    <th>Aksi</th>
  </tr>
  <?php
  if (isset($_GET['produk_cari'])) {
    cari_produk();
  } 
  else {
    tampil_data_produk();
  }
  ?>
</table>
</div>
<!-- /.box-body --> 

<?php 
  $produk_id       = @$_GET['produk_id']; //mengambil id
  $query          = query_select_data_produk($produk_id); //di query berdasarkan id produk
  $data           = mysqli_fetch_array($query); //jadikan array
  ?>
  <!-- modalEditProduk -->
  <div class="modal fade" id="modalEditProduk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Produk</h4>
        </div>
        <div class="modal-body">
          <!--FORM-->
          <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="#inputID" class="col-sm-2 control-label">ID</label>
                <div class="col-sm-10">
                  <input value="<?php $value = $data['produk_id']; echo $value; ?>" name="produk_id" type="text" class="form-control" id="inputID" placeholder="ID Produk" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                  <select name="kategori_id" class="form-control" required>
                    <?php 
                    $query_kategori = query_select_kategori();
                    while($kategori=mysqli_fetch_array($query_kategori)){
                      if($data['kategori_id']==$kategori['kategori_id']){
                        echo"<option value=".$kategori['kategori_id']." selected> ".$kategori['kategori_nama']." </option>";
                      }else{
                        echo"<option value=".$kategori['kategori_id']."> ".$kategori['kategori_nama']." </option>"; 
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input style="text-transform: capitalize;" value="<?php $value = $data['produk_nama']; echo $value; ?>" name="produk_nama" type="text" class="form-control" placeholder="Nama Produk" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Warna</label>
                <div class="col-sm-10">
                  <select name="produk_warna" class="form-control" required> 
                    <option value="Hitam" <?php if($data['produk_warna']=="Hitam"){echo"selected";} ?>>Hitam</option>
                    <option value="Putih" <?php if($data['produk_warna']=="Putih"){echo"selected";} ?>>Putih</option>
                    <option value="Merah" <?php if($data['produk_warna']=="Merah"){echo"selected";} ?>>Merah</option>
                    <option value="Kuning" <?php if($data['produk_warna']=="Kuning"){echo"selected";} ?>>Kuning</option>
                    <option value="Hijau" <?php if($data['produk_warna']=="Hijau"){echo"selected";} ?>>Hijau</option>
                    <option value="Biru" <?php if($data['produk_warna']=="Biru"){echo"selected";} ?>>Biru</option>
                    <option value="Abu-abu" <?php if($data['produk_warna']=="Abu-abu"){echo"selected";} ?>>Abu-abu</option>
                    <option value="Ungu" <?php if($data['produk_warna']=="Ungu"){echo"selected";} ?>>Ungu</option>
                    <option value="Pink" <?php if($data['produk_warna']=="Pink"){echo"selected";} ?>>Pink</option>
                    <option value="Orange" <?php if($data['produk_warna']=="Orange"){echo"selected";} ?>>Orange</option>
                    <option value="Coklat" <?php if($data['produk_warna']=="Coklat"){echo"selected";} ?>>Coklat</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Bahan</label>
                <div class="col-sm-10">
                  <input style="text-transform: capitalize;" value="<?php $value = $data['produk_bahan']; echo $value; ?>" name="produk_bahan" type="text" class="form-control" placeholder="Bahan Produk" required>
                </div>
              </div>

              <div class="form-group">
                <!--<label class="col-sm-2 control-label">Ukuran</label>-->
                <div id="dynamicInput">
                  <?php

                  $produk_id = $data['produk_id'];
                  $produkdet = query_select_produkdet($produk_id);
                  while ($datau = mysqli_fetch_array($produkdet)) {
                    echo "
                    <label class='col-sm-2 control-label'>Ukuran</label>
                    <div class='col-sm-5'>
                      <input style='text-transform:uppercase;' value='".$datau['produk_size']."' name='produk_size[]' type='text' class='col-sm 10 form-control' placeholder='Ukuran'>
                    </div>
                    <div class='col-sm-5'>
                      <input value='".$datau['produk_stok']."' name='produk_stok[]' type='number' class='col-sm-10 form-control' placeholder='Ukuran'>
                    </div>
                    ";
                  }
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                  <input class="btn btn-success" type="button" name="addsize" value="Tambah Ukuran" onClick="addInput('dynamicInput');">
                </div>
              </div>
              


              <div class="form-group">
                <label class="col-sm-2 control-label">Berat (Kg)</label>
                <div class="col-sm-10">
                  <input value="<?php $value = $data['produk_berat']; echo $value; ?>" name="produk_berat" type="number" step="0.01" class="form-control" placeholder="Berat Produk" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga (Rp)</label>
                <div class="col-sm-10">
                  <input value="<?php $value = $data['produk_harga']; echo $value; ?>" name="produk_harga" type="number" class="form-control" placeholder="Harga Produk" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-10">
                  <input value="<?php $value = $data['produk_deskripsi']; echo $value; ?>" name="produk_deskripsi" type="text" class="form-control" placeholder="Deskripsi Produk" required>
                </div>
              </div>


              <div class="form-group">
                <label for="#InputFile" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-3">
                  <img style='max-width:85px;' src='../assets/img_upload/produk/<?php $value = $data['produk_gambar']; echo $value; ?>'>
                </div>
                <div class="col-sm-7">
                  Pilih gambar untuk di upload: 
                  <input name="produk_gambar" style="padding: 12px 0px;" type="file" id="InputFile"
                  accept="image/png,image/gif,image/jpeg,image/jpg">
                  Max-size: 2MB. Type: .png .jpg .jpeg 
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <!--footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input type="submit" name="submit_edit" class="btn btn-primary" value="Simpan Perubahan"></input>
            </div>
            <!--end footer-->
          </form>
          <!--END FORM-->
        </div>
        
      </div>
    </div>
  </div>
  <!--END modalEditAdmin-->

  <!-- modalAddProduk -->
  <div class="modal fade" id="modalAddProduk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Tambah Produk</h4>
        </div>
        <div class="modal-body">
          <!--FORM-->
          <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                  <select name="kategori_id" class="form-control" required>
                    <?php 
                    $query_kategori = query_select_kategori();
                    while($kategori=mysqli_fetch_array($query_kategori)){
                      if($data['kategori_id']==$kategori['kategori_id']){
                        echo"<option value=".$kategori['kategori_id']." selected> ".$kategori['kategori_nama']." </option>";
                      }else{
                        echo"<option value=".$kategori['kategori_id']."> ".$kategori['kategori_nama']." </option>"; 
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input style="text-transform: capitalize;" name="produk_nama" type="text" class="form-control" placeholder="Nama Produk" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Warna</label>
                <div class="col-sm-10">
                  <select name="produk_warna" class="form-control" required> 
                    <option value="Hitam" <?php if($data['produk_warna']=="Hitam"){echo"selected";} ?>>Hitam</option>
                    <option value="Putih" <?php if($data['produk_warna']=="Putih"){echo"selected";} ?>>Putih</option>
                    <option value="Merah" <?php if($data['produk_warna']=="Merah"){echo"selected";} ?>>Merah</option>
                    <option value="Kuning" <?php if($data['produk_warna']=="Kuning"){echo"selected";} ?>>Kuning</option>
                    <option value="Hijau" <?php if($data['produk_warna']=="Hijau"){echo"selected";} ?>>Hijau</option>
                    <option value="Biru" <?php if($data['produk_warna']=="Biru"){echo"selected";} ?>>Biru</option>
                    <option value="Abu-abu" <?php if($data['produk_warna']=="Abu-abu"){echo"selected";} ?>>Abu-abu</option>
                    <option value="Ungu" <?php if($data['produk_warna']=="Ungu"){echo"selected";} ?>>Ungu</option>
                    <option value="Pink" <?php if($data['produk_warna']=="Pink"){echo"selected";} ?>>Pink</option>
                    <option value="Orange" <?php if($data['produk_warna']=="Orange"){echo"selected";} ?>>Orange</option>
                    <option value="Coklat" <?php if($data['produk_warna']=="Coklat"){echo"selected";} ?>>Coklat</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Bahan</label>
                <div class="col-sm-10">
                  <input style="text-transform: capitalize;" name="produk_bahan" type="text" class="form-control" placeholder="Bahan Produk" required>
                </div>
              </div>
 
                <div class="form-group">
                <div id="dynamicInput1">
                  <label class="col-sm-2 control-label">Ukuran</label>
                  <div class="col-sm-5">
                    <input style="text-transform:uppercase;" name="produk_size[]" type="text" class="col-sm 10 form-control" placeholder="Ukuran" required>
                  </div>
                  <div class="col-sm-5"> 
                    <input name="produk_stok[]" type="number" class="col-sm-10 form-control" placeholder="Stok" required>
                  </div>  
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                  <input class="btn btn-success" type="button" name="addsize" value="Tambah Ukuran" onClick="addInput('dynamicInput1');">
                </div>
              </div>
              

              <div class="form-group">
                <label class="col-sm-2 control-label">Berat (Kg)</label>
                <div class="col-sm-10">
                  <input name="produk_berat" type="number" step="0.01" class="form-control" placeholder="Berat Produk" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga (Rp)</label>
                <div class="col-sm-10">
                  <input name="produk_harga" type="number" class="form-control" placeholder="Harga Produk" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-10">
                  <input name="produk_deskripsi" type="text" class="form-control" placeholder="Deskripsi Produk" required>
                </div>
              </div>


              <div class="form-group">
                <label for="#InputFile" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                  Pilih gambar untuk di upload: 
                  <input name="produk_gambar" style="padding: 12px 0px;" type="file" id="InputFile"
                  accept="image/png,image/gif,image/jpeg,image/jpg" required>
                  Max-size: 2MB. Type: .png .jpg .jpeg (450x600)
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <!--footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input type="submit" name="submit_add" class="btn btn-primary" value="Simpan Perubahan"></input>
            </div>
            <!--end footer-->
          </form>
          <!--END FORM-->
        </div>
        
      </div>
    </div>
  </div>
  <!--END modalAddProduk-->

</div>
<!-- /.box -->
</div>
</div>