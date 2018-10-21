<div class="row">
   <div class="col-xs-12">
      <div class="box">
         <div class="box-header"> 
            <h3 class="box-title">Daftar Pengiriman</h3>
            <div class="box-tools">
               <div class="input-group input-group-sm" style="width: 250px;">
                  <form action="" method="GET">
                     <input type="search" name="pengiriman_cari" value="<?php if(!empty($_GET['pengiriman_cari'])){echo $_GET['pengiriman_cari'];} ?>" class="form-control pull-right" placeholder="Cari dan enter">
                  </form>
               </div>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body table-responsive no-padding">
            <table id="table-member" class="table table-bordered table-hover">
               <tr>
                  <th>No</th>
                  <th>ID Pesanan</th>
                  <th>Tgl Pemesanan</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </tr>
               <?php
               if (isset($_GET['pengiriman_cari'])) {
                  cari_pengiriman();
               } 
               else {
                  tampil_data_pengiriman();
               }
               ?>
            </table>
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
</div>

<?php
   //untuk keperluan MODAL 
  $pesanan_id     = @$_GET['pesanan_id']; //mengambil id
  $query          = query_select_data_pesanan($pesanan_id); //di query berdasarkan id produk
  $data           = mysqli_fetch_array($query); //jadikan array
  ?>
  <!-- modalKonfirmasiPEngiriman -->
  <div class="modal fade" id="modalKonfirmasiPengiriman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-truck"></i> Konfirmasi Pengiriman</h4>
         </div>
         <div class="modal-body">
            <!--FORM-->
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
               <div class="box-body">
                  <div class="form-group">
                     <label for="#inputEmail" class="col-sm-2 control-label">ID Pesanan</label>
                     <div class="col-sm-10">
                        <input style="text-transform: capitalize;" name="pesanan_id" type="text" class="form-control" id="inputKategoriNama" required value="<?php echo $data['pesanan_id']?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="#inputEmail" class="col-sm-2 control-label">Kurir</label>
                     <div class="col-sm-10">
                        <select class="form-control" name="pesanan_delivery">
                           <option value="JNE REG">JNE REG</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="#inputEmail" class="col-sm-2 control-label">No. Resi</label>
                     <div class="col-sm-10">
                        <input class="form-control" style="text-transform: uppercase;" type="text" name="pesanan_resi" maxlength="30" placeholder="No. Resi" autofocus required>
                     </div>
                  </div>
                  <!--footer-->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                     <input type="submit" name="submit_konfirmasi" class="btn btn-success" value="Konfirmasi"></input>
                  </div>
                  <!--end footer-->
               </div>
               <!-- /.box-body -->
            </form>
            <!--END FORM-->
         </div>
      </div>
   </div>
</div>
<!--END modalKonfirmasiPengiriman-->









