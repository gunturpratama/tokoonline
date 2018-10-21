<div class="row">
   <div class="col-xs-12">
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Daftar Member</h3>
            <div class="box-tools">
               <div class="input-group input-group-sm" style="width: 250px;">
                  <form action="" method="GET">
                     <input type="search" name="user_cari" value="<?php if(!empty($_GET['user_cari'])){echo $_GET['user_cari'];} ?>" class="form-control pull-right" placeholder="Cari dan enter">
                  </form>
               </div>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body table-responsive no-padding">
            <table id="table-member" class="table table-bordered table-hover">
               <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Nama</th>
                  <th>Lahir</th>
                  <th>JK</th>
                  <th>Telp</th>
                  <th>Alamat</th>
                  <th>Asal</th>
                  <th>Aksi</th>
               </tr>
               <?php
                  if (isset($_GET['user_cari'])) {
                    cari_user();
                  } 
                  else {
                    tampil_data_user();
                  }
                  ?>
            </table>
         </div>
         <!-- /.box-body -->
         <?php //coding untuk semua modal
            $user_username = @$_GET['user_username']; //mengambil id
            $query          = query_select_data_user($user_username); //di query berdasarkan where id admin
            $data           = mysqli_fetch_array($query); //jadikan array
            ?>
         <!-- modalEditMember -->
         <div class="modal fade" id="modalEditMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Akun Member</h4>
                  </div>
                  <div class="modal-body">
                     <?php
                        require_once "view/v_notice.php";
                        ?>
                     <!--FORM-->
                     <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                           <div class="form-group">
                              <label for="#inputUsername" class="col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                 <input value="<?php $value = $data['user_username']; echo $value; ?>" name="user_username" type="text" class="form-control" id="inputUsername" placeholder="Username" readonly>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputEmail" class="col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                 <input value="<?php $value = $data['user_email']; echo $value; ?>" name="user_email" type="email" class="form-control" id="inputEmail" placeholder="Email" required maxlength="50">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputFirstname" class="col-sm-2 control-label">Nama</label>
                              <div class="col-sm-5">
                                 <input value="<?php $value = $data['user_firstname']; echo $value; ?>" name="user_firstname" type="text" class="form-control" id="inputFirstname" placeholder="Nama depan" required maxlength="10">
                              </div>
                              <div class="col-sm-5">
                                 <input value="<?php $value = $data['user_lastname']; echo $value; ?>" name="user_lastname" type="text" class="form-control" id="inputLastname" placeholder="Nama belakang" required maxlength="10">
                              </div>
                           </div>

                           <div class="form-group">
                              <label for="#inputBirth" class="col-sm-2 control-label">Lahir & JK</label>
                              <div class="col-sm-5">
                                 <input value="<?php $value = $data['user_birth']; echo $value; ?>" name="user_birth" type="date" class="form-control" id="inputBirth" required>
                              </div>
                              <div class="col-sm-5">
                                 <select name="user_gender" class="form-control" id="inputGender" required>
                                 <?php
                                    $value = $data['user_gender'];
                                    if ($value =='L') {
                                      echo "
                                        <option value='L' selected>Laki-Laki</option>
                                        <option value='P'>Perempuan</option>
                                      ";
                                    }
                                    elseif ($value =='P') {
                                      echo "
                                        <option value='L'>Laki-Laki</option>
                                        <option value='P' selected>Perempuan</option>
                                      ";
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>

                           <div class="form-group">
                              <label for="#inputTelepon" class="col-sm-2 control-label">Telepon</label>
                              <div class="col-sm-10">
                                 <input name="user_telepon" type="number" class="form-control" id="inputTelepon" placeholder="Telepon" maxlength="999999999999" value="<?php $value = $data['user_telepon']; echo $value; ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputAlamat" class="col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-10">
                                 <input name="user_alamat" type="text" class="form-control" id="inputAlamat" placeholder="Address" value="<?php $value = $data['user_alamat']; echo $value; ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputProvinsi" class="col-sm-2 control-label">Provinsi</label>
                              <div class="col-sm-10">
                                 <select name="provinsi_id" id="inputProvinsi" class="form-control" required>
                                 <?php
                                    require_once "setting/DB_Setting.php";
                                    //untuk tau provinsi user
                                    $value = $data['provinsi_id'];
                                    $query1 = mysqli_query($con, "SELECT * FROM tb_provinsi WHERE provinsi_id='$value'");
                                    $data1 = mysqli_fetch_array($query1);
                                    //tampilkan semua list provinsi dr tb_provinsi
                                    $query2 = mysqli_query($con, "SELECT * FROM tb_provinsi ORDER BY provinsi_nama");
                                    while($data2 = mysqli_fetch_array($query2)){
                                      if ($data1['provinsi_id'] == $data2['provinsi_id']) {
                                        echo "
                                        <option selected value='" . $data2['provinsi_id'] . "'>" . $data2['provinsi_nama'] . "</option>";
                                      }
                                      else{
                                        echo "
                                        <option value='" . $data2['provinsi_id'] . "'>" . $data2['provinsi_nama'] . "</option>";
                                      }
                                    }
                                    ?>    
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputKota" class="col-sm-2 control-label">Kota & Pos</label>
                              <div class="col-sm-5">
                                 <input name="user_kota" type="text" class="form-control" id="inputKota" placeholder="Kota" maxlength="30" value="<?php $value = $data['user_kota']; echo $value; ?>" required>
                              </div>
                              <div class="col-sm-5">
                                 <input name="user_pos" type="number" class="form-control" id="inputPos" value="<?php $value = $data['user_pos']; echo $value; ?>" placeholder="Kode Pos" maxlength="99999" required>
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
         <!--END modalEditMember-->
         <!-- modalChangePasswordMember -->
         <div class="modal fade" id="modalChangePasswordMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Ganti Password Member</h4>
                  </div>
                  <div class="modal-body">
                     <?php
                        require_once "view/v_notice.php";
                        ?>
                     <!--FORM-->
                     <form action="" method="POST" class="form-horizontal">
                        <div class="box-body">
                           <div class="form-group">
                              <label for="#inputPassword" class="col-sm-3 control-label">Password Baru</label>
                              <div class="col-sm-9">
                                 <input name="user_password" type="password" class="form-control" id="inputNewPassword" placeholder="Password Baru">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="#inputPassword" class="col-sm-3 control-label">Konfirmasi Password</label>
                              <div class="col-sm-9">
                                 <input name="user_cpassword" type="password" class="form-control" id="inputNewPassword" placeholder="Konfirmasi Password">
                              </div>
                           </div>
                        </div>
                        <!-- /.box-body -->
                        <!--footer-->
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                           <input type="submit" name="submit_change_password" class="btn btn-warning" value="Ganti Password"></input>
                        </div>
                        <!--end footer-->
                     </form>
                     <!--END FORM-->
                  </div>
               </div>
            </div>
         </div>
         <!--END modalChangePassword-->
      </div>
      <!-- /.box -->
   </div>
</div>