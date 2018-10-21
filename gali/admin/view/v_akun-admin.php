<div class="row"> 
 <div class="col-xs-12">
  <div class="box">
   <div class="box-header">
    <h3 class="box-title">Daftar Admin</h3>

    <div class="box-tools">
     <div class="input-group input-group-sm" style="width: 250px;">
      <div class="input-group-btn">
       <button type="submit" data-toggle="modal" data-target="#modalAddAdmin" class="btn btn-sm btn-success" style="margin-right:5px;"> <i class="fa fa-plus"> </i> Tambah Admin</button>
     </div>

      <form action="" method="GET">
         <input type="search" name="admin_cari" value="<?php if(!empty($_GET['admin_cari'])){echo $_GET['admin_cari'];} ?>" class="form-control pull-right" placeholder="Cari dan enter">
     </form>

   </div>
 </div> 
</div>
<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
   <tr>
    <th>No</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Level</th>
    <th>Bergabung</th>
    <th>Foto</th>
    <th>Aksi</th>
  </tr>
  <?php
    if (isset($_GET['admin_cari'])) {
      cari_admin();
    } 
    else {
      tampil_data_admin();
    }
  ?>
</table>
</div>
<!-- /.box-body -->

<?php //coding untuk semua modal
    $admin_username = @$_GET['admin_username']; //mengambil id
    $query          = query_select_data_admin($admin_username); //di query berdasarkan where id admin
    $data           = mysqli_fetch_array($query); //jadikan array
?>
<!-- modalEditAdmin -->
<div class="modal fade" id="modalEditAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Akun Admin</h4>
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
                <input value="<?php $value = $data['admin_username']; echo $value; ?>" name="admin_username" type="text" class="form-control" id="inputUsername" placeholder="Username" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="#inputFirstname" class="col-sm-2 control-label">Firstname</label>
              <div class="col-sm-10">
                <input value="<?php $value = $data['admin_firstname']; echo $value; ?>" name="admin_firstname" type="text" class="form-control" id="inputFirstname" placeholder="Firstname" required maxlength="10">
              </div>
            </div>

            <div class="form-group">
              <label for="#inputLastname" class="col-sm-2 control-label">Lastname</label>
              <div class="col-sm-10">
                <input value="<?php $value = $data['admin_lastname']; echo $value; ?>" name="admin_lastname" type="text" class="form-control" id="inputLastname" placeholder="Lastname" required maxlength="10">
              </div>
            </div>

            <div class="form-group">
              <label for="#inputEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input value="<?php $value = $data['admin_email']; echo $value; ?>" name="admin_email" type="email" class="form-control" id="inputEmail" placeholder="Email" required maxlength="50">
              </div>
            </div>

            <div class="form-group">
              <label for="#inputLevel" class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                <select name="admin_level" id="inputLevel" class="form-control" required>
                    <?php
                      $value = $data['admin_level'];
                      if ($value == 'Super Admin') {
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Sales Handling'>Sales Handling</option>
                          <option value='Product Inventory'>Product Inventory</option>
                          <option value='Customer Service'>Customer Service</option> ";           
                      }
                      elseif ($value == 'Admin') {
                        echo "
                          <option value='Super Admin'>Super Admin</option>
                          <option value='Admin' selected>Admin</option>
                          <option value='Sales Handling'>Sales Handling</option>
                          <option value='Product Inventory'>Product Inventory</option>
                          <option value='Customer Service'>Customer Service</option> ";           
                      }
                      elseif ($value == 'Sales Handling') {
                        echo "
                          <option value='Super Admin'>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Sales Handling' selected>Sales Handling</option>
                          <option value='Product Inventory'>Product Inventory</option>
                          <option value='Customer Service'>Customer Service</option> ";           
                      }
                      elseif ($value == 'Product Inventory') {
                        echo "
                          <option value='Super Admin'>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Sales Handling'>Sales Handling</option>
                          <option value='Product Inventory' selected>Product Inventory</option>
                          <option value='Customer Service'>Customer Service</option> ";           
                      }
                      elseif ($value == 'Customer Service') {
                        echo "
                          <option value='Super Admin'>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Sales Handling'>Sales Handling</option>
                          <option value='Product Inventory'>Product Inventory</option>
                          <option value='Customer Service' selected>Customer Service</option> ";
                      }
                    ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="#InputFile" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-2">
                <img style='max-width:85px;' src='assets/img_upload/profile_img/<?php $value = $data['admin_foto']; echo $value; ?>'>
              </div>
              <div class="col-sm-7">
                Pilih gambar untuk di upload: 
                <input style="padding-top: 6px;" name="admin_foto" type="file" id="InputFile" accept=".jpg, .jpeg, .png, .gif">
                <p class="help-block">Max-size: 2Mb  -  Type: .jpg .jpeg .png .gif</p>
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
<!--END modalEditAdmin-->

<!-- modalChangePassword -->
<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Ganti Password Admin</h4>
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
                <input name="admin_password" type="password" class="form-control" id="inputNewPassword" placeholder="Password Baru">
              </div>
            </div>

            <div class="form-group">
              <label for="#inputPassword" class="col-sm-3 control-label">Konfirmasi Password</label>
              <div class="col-sm-9">
                <input name="admin_cpassword" type="password" class="form-control" id="inputNewPassword" placeholder="Konfirmasi Password">
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

<!-- modalAddAdmin -->
<div class="modal fade" id="modalAddAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Tambah Admin</h4>
      </div>
      <div class="modal-body">
      <!--FORM-->
        <form enctype="multipart/form-data" action="" method="POST" class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="#inputUsername" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input name="admin_username" type="text" class="form-control" id="inputUsername" placeholder="Username" maxlength="20" required autofocus>
              </div>
            </div>

            <div class="form-group">
              <label for="#inputPassword" class="col-sm-2 control-label">Password</label>
               <div class="col-sm-5">
                <input name="admin_password" type="password" class="form-control" id="inputNewPassword" placeholder="Password" maxlength="100" required>
              </div>
              <div class="col-sm-5">
                <input name="admin_cpassword" type="password" class="form-control" id="inputNewPassword" placeholder="Confirm password" maxlength="100" required>
              </div>
            </div>

            <div class="form-group">
              <label for="#inputFirstname" class="col-sm-2 control-label">Firstname</label>
               <div class="col-sm-10">
                <input name="admin_firstname" type="text" class="form-control" id="inputFirstname" placeholder="Firstname" maxlength="10" required>
              </div>
            </div>

            <div class="form-group">
              <label for="#inputLastname" class="col-sm-2 control-label">Lastname</label>
               <div class="col-sm-10">
                <input name="admin_lastname" type="text" class="form-control" id="inputLastname" placeholder="Lastname" maxlength="10">
              </div>
            </div>

            <div class="form-group">
              <label for="#inputEmail" class="col-sm-2 control-label">Email</label>
               <div class="col-sm-10">
                <input name="admin_email" type="text" class="form-control" id="inputEmail" placeholder="Email" maxlength="50" required>
              </div>
            </div>

            <div class="form-group">
              <label for="#inputLevel" class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                <select name="admin_level" id="inputLevel" class="form-control" required>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Admin">Admin</option>
                    <option value="Sales Handling">Sales Handling</option>
                    <option value="Product Inventory">Product Inventory</option>
                    <option value="Customer Service">Customer Service</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="#InputFile" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10"> 
                <input style="padding-top: 6px;" name="admin_foto" type="file" id="InputFile" accept=".jpg, .jpeg, .png, .gif" required>
                <p class="help-block">Max-size: 2Mb  -  Type: .jpg .jpeg .png .gif</p>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input type="submit" name="submit_add" class="btn btn-success" value="Tambah Admin"></input>
          </div>
        </form>
        <!--END FORM-->
      </div>
      
    </div>
  </div>
</div>
<!--END modalAddAdmin-->

</div>
<!-- /.box -->
</div>
</div>