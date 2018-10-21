<div class="row">
   <div class="col-xs-12">
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Daftar Pembayaran</h3>
            <div class="box-tools">
               <div class="input-group input-group-sm" style="width: 250px;">
                  <form action="" method="GET">
                     <input type="search" name="pembayaran_cari" value="<?php if(!empty($_GET['pembayaran_cari'])){echo $_GET['pembayaran_cari'];} ?>" class="form-control pull-right" placeholder="Cari dan enter">
                  </form>
               </div>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body table-responsive no-padding">
            <table id="table-member" class="table table-bordered table-hover">
               <tr>
                  <th>No</th>
                  <th>ID Bayar</th>
                  <th>ID Pesanan</th>
                  <th>Tgl Konfirmasi</th>
                  <th>Jenis Pembayaran</th>
                  <th>Dari Rekening</th>
                  <th>A/n</th>
                  <th>Jumlah</th>
                  <th>Bukti</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </tr> 
               <?php
                  if (isset($_GET['pembayaran_cari'])) {
                    cari_pembayaran();
                  } 
                  else {
                    tampil_data_pembayaran();
                  }
                  ?>
            </table>
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
</div>