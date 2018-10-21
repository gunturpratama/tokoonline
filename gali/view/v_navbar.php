<!-- *** TOPBAR ***
   _________________________________________________________ -->
<div id="top">
   <div class="container">
      <div class="col-md-6 offer">
         <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Tawaran Hari Ini</a>  <a href="#">Dapatkan Diskon 35% Setiap Pembelian Souvenir</a>
      </div>
      <div class="col-md-6">
         <ul class="menu">
            <?php
               if (!isset($_SESSION['user_username']) && !isset($_COOKIE['user_username'])) { //menu jika belum login
                   echo "
                   <li> <a data-toggle='modal' data-target='#modalMemberRegister'>DAFTAR</a></li>
                   <li> <a data-toggle='modal' data-target='#modalMemberLogin'>LOGIN</a></li>
                   ";
               }
               elseif (isset($_SESSION['user_username'])) { //menu jika sudah login with session
                   $session_username  = $_SESSION['user_username'];
                   echo "<li><a style='color:white;' href='myorder.php'>PESANAN SAYA</a></li>";
                   echo "<li><a style='text-transform:uppercase;' href='#'>".$session_username."</a></li>";
                   echo "<li><a href='controller/c_logout.php'>LOGOUT</a></li>";
                       
               }
               elseif (isset($_COOKIE['user_username'])) { //menu jika sudah login with cookies
                   $cookie_username   = $_COOKIE['user_username'];
                   echo "<li><a style='color:white;' href='myorder.php'>PESANAN SAYA</a></li>";
                   echo "<li><a style='text-transform:uppercase;' href='#'>".$cookie_username."</a></li>";
                   echo "<li><a href='controller/c_logout.php'>LOGOUT</a></li>";   
               }      
               ?>
         </ul>
      </div>
      <!-- MODAL MEMBER LOGIN -->
      <div class="modal fade" id="modalMemberLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Member Login</h4>
               </div>
               <div class="modal-body">
                  <!--FORM-->
                  <form action="controller/c_login.php" method="POST" class="form-horizontal">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="#inputUsername" class="col-sm-3 control-label">Username</label>
                           <div class="col-sm-9">
                              <input name="user_username" type="text" class="form-control" id="inputUsername" placeholder="Username" maxlength="20" required autofocus>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="#inputPassword" class="col-sm-3 control-label">Password</label>
                           <div class="col-sm-9">
                              <input name="user_password" type="password" class="form-control" id="inputPassword" placeholder="Password" maxlength="100" required autofocus>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label"></label>
                           <div class="col-sm-9">
                              <input name="remember_me" type="checkbox"> Ingat Saya </input>
                           </div>
                        </div>
                     </div>
               </div>
               <!--modal footer-->
               <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
               <input type="submit" name="submit_login" class="btn btn-primary" value="Login"></input>
               </div>
               <!--modal footer-->
               </form>
               <!--END FORM-->
            </div>
         </div>
      </div>
   </div>
   <!-- END MODAL MEMBER LOGIN-->
   <!-- MODAL MEMBER REGISTER -->
   <div class="modal fade" id="modalMemberRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Member Registration</h4>
            </div>
            <div class="modal-body">
               <!--FORM-->
               <form action="controller/c_register.php" method="POST" class="form-horizontal">
                  <div class="box-body">
                     <div class="form-group">
                        <label for="#inputUsername" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                           <input name="user_username" type="text" class="form-control" id="inputUsername" placeholder="Username" maxlength="20" required autofocus>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="#inputPassword" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-5">
                           <input name="user_password" type="password" class="form-control" id="inputNewPassword" placeholder="Password" maxlength="100" required>
                        </div>
                        <div class="col-sm-5">
                           <input name="user_cpassword" type="password" class="form-control" id="inputNewPassword" placeholder="Confirm password" maxlength="100" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="#inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                           <input name="user_email" type="email" class="form-control" id="inputEmail" placeholder="Email" maxlength="50" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="#inputName" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                           <input name="user_firstname" type="text" class="form-control" id="inputFirstname" placeholder="Firstname" maxlength="30" required>
                        </div>
                        <div class="col-sm-5">
                           <input name="user_lastname" type="text" class="form-control" id="inputLastname" placeholder="Lastname" maxlength="30">
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="#inputBirth" class="col-sm-2 control-label">Lahir & Gender</label>
                        <div class="col-sm-5">
                           <input name="user_birth" type="date" class="form-control" id="inputBirth" placeholder="Tanggal Lahir" required>
                        </div>

                        <div class="col-sm-5">
                            <select name="user_gender" id="inputGender" class="form-control" required>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                     </div>


                     <div class="form-group">
                        <label for="#inputTelepon" class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                           <input name="user_telepon" type="number" class="form-control" id="inputTelepon" placeholder="Telepon" maxlength="999999999999" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="#inputAlamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                           <input name="user_alamat" type="text" class="form-control" id="inputAlamat" placeholder="Alamat" required>
                        </div>
                     </div>
                     <div class="form-group">
                      <label for="#inputProvinsi" class="col-sm-2 control-label">Provinsi</label>
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
                      <label for="#inputKota" class="col-sm-2 control-label">Kota & Pos</label>
                      <div class="col-sm-5">
                           <input name="user_kota" type="text" class="form-control" id="inputKota" placeholder="Kota" maxlength="30" required>
                      </div>
                      <div class="col-sm-5">
                           <input name="user_pos" type="number" class="form-control" id="inputPos" placeholder="Kode Pos" maxlength="99999" required>
                      </div>
                    </div>

                  </div>
                  <!-- /.box-body -->
                  <!--modal footer-->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                     <input type="submit" name="submit_register" class="btn btn-success" value="Daftar"></input>
                  </div>
                  <!--modal footer-->
               </form>
               <!--END FORM-->
            </div>
         </div>
      </div>
   </div>
   <!-- END MODAL MEMBER REGISTER-->
</div>
</div>
<!-- *** TOP BAR END *** -->
<!-- *** NAVBAR ***
   _________________________________________________________ -->
<div class="navbar navbar-default yamm" role="navigation" id="navbar">
   <div class="container">
      <div class="navbar-header">
         <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
         <img src="assets/img/logo.png" alt="Gagapan Bali logo" class="hidden-xs">
         <img src="assets/img/logo-small.png" alt="Gagapan Bali logo" class="visible-xs"><span class="sr-only">Gagapan Bali </span>
         </a>
         <div class="navbar-buttons">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-align-justify"></i>
            </button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
            <span class="sr-only">Toggle search</span>
            <i class="fa fa-search"></i>
            </button>
            <a class="btn btn-default navbar-toggle" href="basket.php">
            <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">2 barang</span>
            </a>
         </div>
      </div>
      <!--/.navbar-header -->
      <?php
      //************************** PROSES PAGING **************************//
      $batas=6;
      $halaman=@$_GET['halaman'];
      if(empty($halaman)){
        $posisi=0;
        $halaman=1;
      }else{
        $posisi=($halaman-1) * $batas;
      }
      //***********************END PROSES PAGING ************************//
    ?>
      <div class="navbar-collapse collapse" id="navigation">
         <ul class="nav navbar-nav navbar-left">
            <?php 
                if (@($_GET['produk_kategori'] == 'makanan')) {
                    echo "
                        <li>
                            <a href='index.php'>Home</a>
                        </li>
                        <li class='active'>
                           <a href='category.php?halaman=$halaman&produk_kategori=makanan'>MAKANAN</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=pakaian'>PAKAIAN</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=souvenir'>SOUVENIR</a>
                        </li>
                    ";
                }
                elseif (@($_GET['produk_kategori'] == 'pakaian')) {
                    echo "
                        <li> 
                            <a href='index.php'>Home</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=makanan'>MAKANAN</a>
                        </li>
                        <li class='active'>
                           <a href='category.php?halaman=$halaman&produk_kategori=pakaian'>PAKAIAN</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=souvenir'>SOUVENIR</a>
                        </li>
                    ";
                }
                elseif (@($_GET['produk_kategori'] == 'souvenir')) {
                    echo "
                        <li>
                            <a href='index.php'>Home</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=makanan'>MAKANAN</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=pakaian'>PAKAIAN</a>
                        </li>
                        <li class='active'>
                           <a href='category.php?halaman=$halaman&produk_kategori=souvenir'>SOUVENIR</a>
                        </li>
                    ";
                }
                else {
                    echo "
                        <li class='active'>
                            <a href='index.php'>Home</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=makanan'>MAKANAN</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=pakaian'>PAKAIAN</a>
                        </li>
                        <li>
                           <a href='category.php?halaman=$halaman&produk_kategori=souvenir'>SOUVENIR</a>
                        </li>
                    ";
                }
            ?>
            
         </ul>
      </div>
      <!--/.nav-collapse -->
      <div class="navbar-buttons">
            <?php
              //==========================KERANJANG BELANJA========================//
             if (isset($_SESSION['user_username']) || isset($_COOKIE['user_username'])) {
                 if (isset($_SESSION['user_username'])) {
                      $user_username = $_SESSION['user_username'];
                  }
                  elseif (isset($_COOKIE['user_username'])) {
                      $user_username = $_COOKIE['user_username'];
                  }
                  
                  $query = mysqli_query($con, "SELECT c.*,cd.*,p.* FROM tb_cart c, tb_cartdet cd, tb_produk p WHERE c.user_username='$user_username' AND cd.cart_id=c.cart_id AND p.produk_id=cd.produk_id");
                  $jumlah = mysqli_num_rows($query);

               echo " 
               <div class='navbar-collapse collapse right' id='basket-overview'>
                  <a href='basket.php' class='btn btn-primary navbar-btn'><i class='fa fa-shopping-cart'></i><span class='hidden-sm'>
                  
                      <b style='background-color:#b75252;padding: 0px 6px;border-radius:5px;'>".$jumlah."</b> Barang di Troli</span></a>
                     
               </div>
              ";
            } 
            //==========================END KERANJANG BELANJA========================//
            ?>
         <!--/.nav-collapse -->
         <div class="navbar-collapse collapse right" id="search-not-mobile">
            <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
            <span class="sr-only">Toggle search</span>
            <i class="fa fa-search"></i>
            </button>
         </div>
      </div>
      <div class="collapse clearfix" id="search">
         <form class="navbar-form" role="search">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Search">
               <span class="input-group-btn">
               <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
               </span>
            </div>
         </form>
      </div>
      <!--/.nav-collapse -->
   </div>
   <!-- /.container -->
</div>
<!-- /#navbar -->
<!-- *** NAVBAR END *** -->