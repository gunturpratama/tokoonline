<div class="row">
   <div class="col-xs-12">
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Ongkir</h3>
            <div class="box-tools">
               <div class="input-group input-group-sm" style="width: 250px;">
                  <div class="input-group-btn">
                  <button type="submit" data-toggle="modal" data-target="#modalAddOngkir" class="btn btn-sm btn-success" style="margin-right:5px;"> <i class="fa fa-plus"> </i> Tentukan Ongkir</button>
                  </div>
                  <form action="" method="GET">
                     <input type="search" name="ongkir_cari" value="<?php if(!empty($_GET['ongkir_cari'])){echo $_GET['ongkir_cari'];} ?>" class="form-control pull-right" placeholder="Cari dan enter">
                  </form>
               </div>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body table-responsive no-padding">
            <table id="table-member" class="table table-bordered table-hover">
               <tr>
                  <th>No</th>
                  <th>ID Ongkir</th>
                  <th>Provinsi</th>
                  <th>Harga Ongkir</th>
                  <th>Aksi</th>
               </tr>
               <?php
                  if (isset($_GET['ongkir_cari'])) {
                    cari_ongkir();
                  } 
                  else {
                    tampil_data_ongkir();
                  }
                  ?>
            </table>
         </div>
         <!-- /.box-body -->
         <?php //coding untuk semua modal
            $ongkir_id      = @$_GET['ongkir_id']; //mengambil id
            $query          = query_select_data_ongkir($ongkir_id); //di query berdasarkan where id admin
            $data           = mysqli_fetch_array($query); //jadikan array
            ?>
         <!-- modalEditOngkir -->
         <div class="modal fade" id="modalEditOngkir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Ongkir</h4>
                  </div>
                  <div class="modal-body">
                     <!--FORM-->
                     <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                           <div class="form-group">
                              <label for="#inputKategoriID" class="col-sm-2 control-label">ID Ongkir</label>
                              <div class="col-sm-10">
                                 <input style="text-transform: uppercase;" value="<?php $value = $data['tarif_id']; echo $value; ?>" name="ongkir_id" type="text" class="form-control" id="inputKategoriID" placeholder="ID Kategori" readonly>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputEmail" class="col-sm-2 control-label">Provinsi</label>
                              <div class="col-sm-10">
                                 <input style="text-transform: capitalize;" value="<?php $value = $data['provinsi_nama']; echo $value; ?>" name="provinsi_nama" type="text" class="form-control" id="inputKategoriNama" placeholder="Nama Provinsi" readonly>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputEmail" class="col-sm-2 control-label">Ongkir</label>
                              <div class="col-sm-10">
                                 <input style="text-transform: capitalize;" value="<?php $value = $data['tarif_harga']; echo $value; ?>" name="ongkir_harga" type="number" class="form-control" id="inputKategoriNama" placeholder="Ongkir Harga">
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
         <!--END modalEditOngkir-->
         <!-- modalAddOngkir -->
         <div class="modal fade" id="modalAddOngkir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Tentukan Ongkir</h4>
                  </div>
                  <div class="modal-body">
                     <!--FORM-->
                     <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                        <div class="form-group">
                              <label for="#inputEmail" class="col-sm-2 control-label">Nama Provinsi</label>
                              <div class="col-sm-10">
                                 <select name="provinsi_id" id="inputProvinsi" class="form-control" required>
                                     <?php
                                     $query = mysqli_query($con, "SELECT * FROM tb_provinsi ORDER BY provinsi_nama");
                                     while($data = mysqli_fetch_array($query)){
                                     echo "
                                     <option value='".$data['provinsi_id']."'>".$data['provinsi_nama']."</option>";
                                     }
                                     ?>    
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputEmail" class="col-sm-2 control-label">Ongkir</label>
                              <div class="col-sm-10">
                                 <input style="text-transform: capitalize;" name="ongkir_harga" type="number" class="form-control" id="inputKategoriNama" placeholder="Rp." required maxlength="15">
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
         <!--END modalAddOngkir-->
      </div>
      <!-- /.box -->
   </div>
</div>