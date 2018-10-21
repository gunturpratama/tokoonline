<div class="row">
   <div class="col-xs-12">
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Daftar Pesanan</h3>
            <div class="box-tools">
               <div class="input-group input-group-sm" style="width: 250px;">
                  <form action="" method="GET">
                     <input type="search" name="pesanan_cari" value="<?php if(!empty($_GET['user_cari'])){echo $_GET['pesanan_cari'];} ?>" class="form-control pull-right" placeholder="Cari dan enter">
                  </form>
               </div>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body table-responsive no-padding">
            <table id="table-member" class="table table-bordered table-hover">
               <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Tgl</th>
                  <th>Total Berat</th>
                  <th>Total Harga</th>
                  <th>Ongkir</th>
                  <th>Grand Total</th>
                  <th>Penerima</th>
                  <th>Telp</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </tr>
               <?php
                  if (isset($_GET['pesanan_cari'])) {
                    cari_pesanan();
                  } 
                  else {
                    tampil_data_pesanan();
                  }
                  ?>
            </table>
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
</div>