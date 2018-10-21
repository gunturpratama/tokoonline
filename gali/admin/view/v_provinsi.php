<div class="row">
   <div class="col-xs-12">
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Provinsi</h3>
            <div class="box-tools">
               <div class="input-group input-group-sm" style="width: 250px;">
                  <div class="input-group-btn">
                  <button type="submit" data-toggle="modal" data-target="#modalAddProvinsi" class="btn btn-sm btn-success" style="margin-right:5px;"> <i class="fa fa-plus"> </i> Tambah Provinsi</button>
                  </div>
                  <form action="" method="GET">
                     <input type="search" name="provinsi_cari" value="<?php if(!empty($_GET['kategori_cari'])){echo $_GET['provinsi_cari'];} ?>" class="form-control pull-right" placeholder="Cari dan enter">
                  </form>
               </div>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body table-responsive no-padding">
            <table id="table-member" class="table table-bordered table-hover">
               <tr>
                  <th>No</th>
                  <th>ID Provinsi</th>
                  <th>Nama Provinsi</th>
                  <th>Aksi</th>
               </tr>
               <?php
                  if (isset($_GET['provinsi_cari'])) {
                    cari_provinsi();
                  } 
                  else {
                    tampil_data_provinsi();
                  }
                  ?>
            </table>
         </div>
         <!-- /.box-body -->
         <?php //coding untuk semua modal
            $provinsi_id    = @$_GET['provinsi_id']; //mengambil id
            $query          = query_select_data_provinsi($provinsi_id); //di query berdasarkan where id admin
            $data           = mysqli_fetch_array($query); //jadikan array
            ?>
         <!-- modalEditKategori -->
         <div class="modal fade" id="modalEditProvinsi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Provinsi</h4>
                  </div>
                  <div class="modal-body">
                     <!--FORM-->
                     <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                           <div class="form-group">
                              <label for="#inputKategoriID" class="col-sm-2 control-label">ID Provinsi</label>
                              <div class="col-sm-10">
                                 <input style="text-transform: uppercase;" value="<?php $value = $data['provinsi_id']; echo $value; ?>" name="provinsi_id" type="text" class="form-control" id="inputKategoriID" placeholder="ID Kategori" readonly>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputEmail" class="col-sm-2 control-label">Nama Provinsi</label>
                              <div class="col-sm-10">
                                 <input style="text-transform: capitalize;" value="<?php $value = $data['provinsi_nama']; echo $value; ?>" name="provinsi_nama" type="text" class="form-control" id="inputKategoriNama" placeholder="Nama Provinsi" required maxlength="15">
                              </div>
                           </div>
                           <!--footer-->
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <input type="submit" name="submit_edit" class="btn btn-primary" value="Simpan Perubahan"></input>
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
         <!--END modalEditKategori-->
         <!-- modalAddKategori -->
         <div class="modal fade" id="modalAddProvinsi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Tambah Provinsi</h4>
                  </div>
                  <div class="modal-body">
                     <!--FORM-->
                     <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                           <div class="form-group">
                              <label for="#inputEmail" class="col-sm-2 control-label">Nama Provinsi</label>
                              <div class="col-sm-10">
                                 <input style="text-transform: capitalize;" name="provinsi_nama" type="text" class="form-control" id="inputKategoriNama" placeholder="Nama Provinsi" required maxlength="15">
                              </div>
                           </div>
                           <!--footer-->
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <input type="submit" name="submit_add" class="btn btn-success" value="Tambah"></input>
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
         <!--END modalAddKategori-->
      </div>
      <!-- /.box -->
   </div>
</div>