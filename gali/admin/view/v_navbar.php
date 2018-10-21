<?php
  //coding untuk menampilkan nama user siapa yang login di navbar
  require_once "../setting/DB_Setting.php";
  ob_start();
  if (@($_COOKIE['admin_username'])) {
    $admin_username = ($_COOKIE['admin_username']);
    $query = mysqli_query($con, "SELECT * FROM tb_admin WHERE admin_username='$admin_username'");
    $hasil = mysqli_fetch_array($query);
    //hasilnya
    $username  = $hasil['admin_username'];
    $firstname = $hasil['admin_firstname'];
    $lastname  = $hasil['admin_lastname'];
    $email     = $hasil['admin_email'];
    $foto      = $hasil['admin_foto'];
    $level     = $hasil['admin_level'];
    $tgl       = $hasil['admin_tgl'];
    $foto      = $hasil['admin_foto'];
  }
  elseif (@($_SESSION['admin_username'])) {
    $admin_username = ($_SESSION['admin_username']);
    $query = mysqli_query($con, "SELECT * FROM tb_admin WHERE admin_username='$admin_username'");
    $hasil = mysqli_fetch_array($query);
    //hasilnya
    $username  = $hasil['admin_username'];
    $firstname = $hasil['admin_firstname'];
    $lastname  = $hasil['admin_lastname'];
    $email     = $hasil['admin_email'];
    $foto      = $hasil['admin_foto'];
    $level     = $hasil['admin_level'];
    $tgl       = $hasil['admin_tgl'];
    $foto      = $hasil['admin_foto'];
  } 
?>
<!--MODAL-->
<!-- modalEditProfile -->
<div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Profile</h4>
      </div>
      <div class="modal-body">
      <!--FORM-->
        <form action="controller/c_edit-profile.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="#inputUsername" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input value="<?php echo $username;?>" name="admin_username" type="text" class="form-control" id="inputUsername" placeholder="Username" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="#inputFirstname" class="col-sm-2 control-label">Firstname</label>
              <div class="col-sm-10">
                <input value="<?php echo $firstname; ?>" name="admin_firstname" type="text" class="form-control" id="inputFirstname" placeholder="Firstname" required maxlength="10">
              </div>
            </div>

            <div class="form-group">
              <label for="#inputLastname" class="col-sm-2 control-label">Lastname</label>
              <div class="col-sm-10">
                <input value="<?php echo $lastname; ?>" name="admin_lastname" type="text" class="form-control" id="inputLastname" placeholder="Lastname" required maxlength="10">
              </div>
            </div>

            <div class="form-group">
              <label for="#inputEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input value="<?php echo $email; ?>" name="admin_email" type="email" class="form-control" id="inputEmail" placeholder="Email" required maxlength="50">
              </div>
            </div>

            <div class="form-group">
              <label for="#inputLevel" class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                <select name="admin_level" id="inputLevel" class="form-control" required>
                    <?php
                      if ($level == 'Super Admin') {
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Sales Handling'>Sales Handling</option>
                          <option value='Product Inventory'>Product Inventory</option>
                          <option value='Customer Service'>Customer Service</option> ";           
                      }
                      elseif ($level == 'Admin') {
                        echo "
                          <option value='Super Admin'>Super Admin</option>
                          <option value='Admin' selected>Admin</option>
                          <option value='Sales Handling'>Sales Handling</option>
                          <option value='Product Inventory'>Product Inventory</option>
                          <option value='Customer Service'>Customer Service</option> ";           
                      }
                      elseif ($level == 'Sales Handling') {
                        echo "
                          <option value='Super Admin'>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Sales Handling' selected>Sales Handling</option>
                          <option value='Product Inventory'>Product Inventory</option>
                          <option value='Customer Service'>Customer Service</option> ";           
                      }
                      elseif ($level == 'Product Inventory') {
                        echo "
                          <option value='Super Admin'>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Sales Handling'>Sales Handling</option>
                          <option value='Product Inventory' selected>Product Inventory</option>
                          <option value='Customer Service'>Customer Service</option> ";           
                      }
                      elseif ($level == 'Customer Service') {
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
                <img style='max-width:85px;' src='assets/img_upload/profile_img/<?php echo $foto; ?>'>
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
              <input type="submit" name="submit_edit_profile" class="btn btn-primary" value="Simpan Perubahan"></input>
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
<!--END MODAL-->

<!-- modalChangePassword ADMIN YANG LOGIN -->
<div class="modal fade" id="modalChangePasswordAdminYangLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Ganti Password Admin</h4>
      </div>
      <div class="modal-body">

      <!--FORM-->
        <form action="controller/c_edit-profile.php" method="POST" class="form-horizontal">
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
              <input type="submit" name="submit_change_password_admin_yang_login" class="btn btn-warning" value="Ganti Password"></input>
            </div>
            <!--end footer-->
        </form>
        <!--END FORM-->
      </div>
    </div>
  </div>
</div>
<!--END modalChangePassword-->

    <!-- *** HEADER ***
 _________________________________________________________ -->
      
<header class="main-header">
<!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>LI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GAGAPAN </b>BALI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a id="clock" href="#" class="dropdown-toggle" data-toggle="dropdown">
              <script type="text/javascript">
                function showTime() {
                    var a_p = "";
                    var today = new Date();
                    var curr_hour = today.getHours();
                    var curr_minute = today.getMinutes();
                    var curr_second = today.getSeconds();
                    if (curr_hour < 12) {
                        a_p = "AM";
                    } else {
                        a_p = "PM";
                    }
                    if (curr_hour == 0) {
                        curr_hour = 12;
                    }
                    if (curr_hour > 12) {
                        curr_hour = curr_hour - 12;
                    }
                    curr_hour = checkTime(curr_hour);
                    curr_minute = checkTime(curr_minute);
                    curr_second = checkTime(curr_second);
                 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                    }

                function checkTime(i) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    return i;
                }
                setInterval(showTime, 500);
              </script>
            </a>
          </li>

          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <script type='text/javascript'>
          
              var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
              var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
              var date = new Date();
              var day = date.getDate();
              var month = date.getMonth();
              var thisDay = date.getDay(), 
                  thisDay = myDays[thisDay];
              var yy = date.getYear();
              var year = (yy < 1000) ? yy + 1900 : yy;
              document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
            </script>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/img_upload/profile_img/<?php echo $foto;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $firstname." ".$lastname;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/img_upload/profile_img/<?php echo $foto;?>" class="img-circle" alt="User Image">

                <p><?php echo $firstname." ".$lastname." - ".$level;?>
                  <small>Member sejak <?php echo $tgl; ?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a data-toggle="modal" data-target="#modalEditProfile" class="btn btn-info btn-flat">Edit Profile</a>
                  <a data-toggle="modal" data-target="#modalChangePasswordAdminYangLogin" class="btn btn-warning btn-flat">Password</a>
                </div>
                <div class="pull-right">
                  <a href="controller/c_logout.php" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    </header>



    <!------SIDEBARRR------>
        <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="assets/img_upload/profile_img/<?php echo $foto;?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $firstname." ".$lastname;?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">UTAMA</li>
          <li class="<?php if ($page=='dashboard'){echo "active";} ?>">
            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          </li>
          <li class="<?php if ($page=='pesanan'){echo "active";} ?>">
            <a href="pesanan.php">
              <i class="fa fa-shopping-cart"></i>
              <span>Pesanan</span>
              <span class="pull-right-container">
                <?php
                  $jumlahps  = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pesanan WHERE pesanan_status='Pending'"));
                  if ($jumlahps > 0) {
                    echo "
                      <span class='label label-warning pull-right'>".$jumlahps."</span>
                    ";
                  }
                ?>
              </span>
            </a>
          </li>
          <li class="<?php if ($page=='pembayaran'){echo "active";} ?>">
            <a href="pembayaran.php">
              <i class="fa fa-money"></i>
              <span>Pembayaran</span>
              <span class="pull-right-container">
                <?php
                  $jumlahb  = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_bayar WHERE bayar_status='Pembayaran Ditolak'"));
                  if ($jumlahb > 0) {
                    echo "
                      <span class='label label-danger pull-right'>".$jumlahb."</span>
                    ";
                  }
                ?>
              </span>
            </a>
          </li>
          <li class="<?php if ($page=='pengiriman'){echo "active";} ?>">
            <a href="pengiriman.php">
              <i class="fa fa-truck"></i>
              <span>Pengiriman</span>
              <span class="pull-right-container">
                <?php
                  $jumlahp  = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pesanan WHERE pesanan_status='Terbayar'"));
                  if ($jumlahp > 0) {
                    echo "
                      <span class='label label-primary pull-right'>".$jumlahp."</span>
                    ";
                  }
                ?>
              </span>
            </a>
          </li>
          <li class="<?php if ($page=='produk'){echo "active";} ?>">
            <a href="produk.php">
              <i class="fa fa-dropbox"></i>
              <span>Produk</span>
            </a>
          </li>
          <li class="header">PENGATURAN</li>
          <li class="<?php if ($page=='kategori'){echo "active";} ?>">
            <a href="kategori.php">
              <i class="fa fa-list"></i>
              <span>Kategori</span>
            </a>
          </li>
          <li class="<?php if ($page=='provinsi'){echo "active";} ?>">
            <a href="provinsi.php">
              <i class="fa fa-map-o"></i>
              <span>Provinsi</span>
            </a>
          </li>
          <li class="<?php if ($page=='ongkir'){echo "active";} ?>">
            <a href="ongkir.php">
              <i class="fa fa-usd"></i>
              <span>Ongkir</span>
            </a>
          </li>
          <!--<li class="<?php if ($page=='tampilan'){echo "active";} ?>">
            <a href="#">
              <i class="fa fa-desktop"></i>
              <span>Tampilan</span>
            </a>
          </li>-->
          <li class="<?php if ($page=='admin' || $page=='member'){echo "treeview active";} ?>"">
            <a href="">
              <i class="fa fa-user"></i> <span>Akun</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if ($page=='admin'){echo "active";} ?>"><a href="akun-admin.php"><i class="fa fa-circle-o text-blue"></i> Admin</a></li>
              <li class="<?php if ($page=='member'){echo "active";} ?>"><a href="akun-member.php"><i class="fa fa-circle-o text-green"></i> Member</a></li>
            </ul>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!------SIDEBAR-------->

    <!-- *** HEADER END *** -->