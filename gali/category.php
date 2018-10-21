<!DOCTYPE html>
<html lang="en">
   <head>
      <?php
      session_start();
      $title="Kategori | Gagapan Bali";
      require_once "view/v_head.php";
      require_once "controller/c_validasi.php";
      ?>
   </head>
   <body>
      <!--NAVBAR-->
      <?php
         require_once "view/v_navbar.php";
         ?>
      <!-- *** NAVBAR END *** -->
      <div id="all">
         <div id="content">
            <div class="container">
               <div class="col-md-12">
                  <ul class="breadcrumb">
                     <li><a href="#">Home</a>
                     </li>
                     <li>Pakaian</li>
                  </ul>
               </div>
               <div class="col-md-3">
                  <!-- *** MENUS SIDEBAR AND FILTERS ***
                     _________________________________________________________ -->
                  <div class="panel panel-default sidebar-menu">
                     <div class="panel-heading">
                        <h3 class="panel-title">Kategori</h3>
                     </div>
                     <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                           <?php
                            require_once "view/v_sidebar.php";
                           ?>
                        </ul>
                     </div>
                  </div>



                   <div class="panel panel-default sidebar-menu">

                       <div class="panel-body">

                               <div class="col-lg-11 col-md-11">
                                   <div class="center dropdown">
                                       <button class="btn btn-success dropdown-toggle pull-right" type="button" data-toggle="dropdown">Urut berdasarkan&nbsp;<i class="fa fa-chevron-down"></i></button>
                                       <?php
                                       if (@($_GET['produk_kategori']=='makanan')) {
                                           echo"
                                            <ul class='dropdown-menu pull-right'>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=makanan&sort=harga_tertinggi'>Harga Tertinggi</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=makanan&sort=harga_terendah'>Harga Terendah</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=makanan&sort=nama_ascending'>Nama (Ascending)</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=makanan&sort=nama_descending'>Nama (Descending)</a></li>
                                            <ul>
                                            ";
                                       }
                                       elseif (@($_GET['produk_kategori']=='pakaian')) {
                                           echo"
                                            <ul class='dropdown-menu pull-right'>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=pakaian&sort=harga_tertinggi'>Harga Tertinggi</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=pakaian&sort=harga_terendah'>Harga Terendah</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=pakaian&sort=nama_ascending'>Nama (Ascending)</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=pakaian&sort=nama_descending'>Nama (Descending)</a></li>
                                            <ul>
                                            ";
                                       }
                                       elseif (@($_GET['produk_kategori']=='souvenir')) {
                                           echo"
                                            <ul class='dropdown-menu pull-right'>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=souvenir&sort=harga_tertinggi'>Harga Tertinggi</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=souvenir&sort=harga_terendah'>Harga Terendah</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=souvenir&sort=nama_ascending'>Nama (Ascending)</a></li>
                                            <li><a href='category.php?halaman=$halaman&produk_kategori=souvenir&sort=nama_descending'>Nama (Descending)</a></li>
                                            <ul>
                                            ";
                                       }

                                       ?>

                                   </div>
                               </div>


                       </div>
                   </div>




               </div>
               <div class="col-md-9">
                  <div class="box">
                     <?php
                        if (@($_GET['produk_kategori'] == 'makanan')) {
                            echo "
                                <h1>Makanan</h1>
                                <p>Temukan ratusan makanan khas Bali, harga terjangkau dan kualitas terjamin.</p>
                            ";
                        }
                        elseif (@($_GET['produk_kategori'] == 'pakaian')) {
                            echo "
                                <h1>Pakaian</h1>
                                <p>Temukan ratusan pakaian khas Bali, harga terjangkau dan kualitas terjamin.</p>
                            ";
                        }
                        elseif (@($_GET['produk_kategori'] == 'souvenir')) {
                            echo "
                                <h1>Souvenir</h1>
                                <p>Temukan ratusan souvenir khas Bali, harga terjangkau dan kualitas terjamin.</p>
                            ";
                        }
                        ?>
                  </div>


                  <!---PRODUK-->
                  <div class="row products">
                     <?php
                        if (@($_GET['produk_kategori'] == 'makanan')) {
                          if (@($_GET['sort']=='harga_terendah')) {
                           $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='M01' ORDER BY produk_harga ASC LIMIT $posisi, $batas");
                          }
                          elseif (@($_GET['sort']=='harga_tertinggi')) {
                           $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='M01' ORDER BY produk_harga DESC LIMIT $posisi, $batas");
                          }
                          elseif (@($_GET['sort']=='nama_ascending')) {
                           $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='M01' ORDER BY produk_nama ASC LIMIT $posisi, $batas");
                          }
                          elseif (@($_GET['sort']=='nama_descending')) {
                           $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='M01' ORDER BY produk_nama DESC LIMIT $posisi, $batas");
                          }
                          else {
                            $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='M01' LIMIT $posisi, $batas");
                          }
                        $jumlah_data=mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='M01'"));
                        $jumlah_halaman=ceil($jumlah_data/$batas);
                        while ($data = mysqli_fetch_array($query)) {
                        echo "
                            <div class='col-md-4 col-sm-6'>
                                <div class='product'>
                                    <div class='flip-container'>
                                        <div class='flipper'>
                                            <div class='front'>
                                                <a href='detail.php?produk_kategori=".($_GET['produk_kategori'])."&produk_id=".$data['produk_id']."'>
                                                    <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                                </a>
                                            </div>
                                            <div class='back'>
                                                <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."'>
                                                    <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."' class='invisible'>
                                        <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                    </a>
                                    <div class='text'>
                                        <h3><a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."'>".$data['produk_nama']."</a></h3>
                                        <p class='price'>".rupiah($data['produk_harga'])."</p>
                                        <p class='buttons'>
                                            <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."' class='btn btn-success'>Detail</a>
                                        </p>
                                    </div>
                                    <!-- /.text -->
                        
                                    <!--ribbon
                                    <div class='ribbon sale'>
                                        <div class='theribbon'>PROMO</div>
                                        <div class='ribbon-background'></div>
                                    </div>
                                    --ribbon -->
                        
                                    <!--ribbon
                                    <div class='ribbon new'>
                                        <div class='theribbon'>BARU</div>
                                        <div class='ribbon-background'></div>
                                    </div>
                                    --ribbon -->
                        
                                </div>
                                <!-- /.product -->
                            </div>
                            "; }
                        }
                        elseif (@($_GET['produk_kategori'] == 'pakaian')) {
                            if (@($_GET['sort']=='harga_terendah')) {
                             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='P01' ORDER BY produk_harga ASC LIMIT $posisi, $batas");
                            }
                            elseif (@($_GET['sort']=='harga_tertinggi')) {
                             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='P01' ORDER BY produk_harga DESC LIMIT $posisi, $batas");
                            }
                            elseif (@($_GET['sort']=='nama_ascending')) {
                             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='P01' ORDER BY produk_nama ASC LIMIT $posisi, $batas");
                            }
                            elseif (@($_GET['sort']=='nama_descending')) {
                             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='P01' ORDER BY produk_nama DESC LIMIT $posisi, $batas");
                            }
                            else {
                              $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='P01' LIMIT $posisi, $batas");
                            }
                            $jumlah_data=mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='P01'"));
                            $jumlah_halaman=ceil($jumlah_data/$batas);
                            while ($data = mysqli_fetch_array($query)) {
                            echo "
                            <div class='col-md-4 col-sm-6'>
                                <div class='product'>
                                    <div class='flip-container'>
                                        <div class='flipper'>
                                            <div class='front'>
                                                <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."'>
                                                    <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                                </a>
                                            </div>
                                            <div class='back'>
                                                <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."'>
                                                    <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."' class='invisible'>
                                        <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                    </a>
                                    <div class='text'>
                                        <h3><a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."'>".$data['produk_nama']."</a></h3>
                                        <p class='price'>".rupiah($data['produk_harga'])."</p>
                                        <p class='buttons'>
                                            <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."' class='btn btn-success'>Detail</a>
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                    <!--ribbon
                                    <div class='ribbon sale'>
                                        <div class='theribbon'>PROMO</div>
                                        <div class='ribbon-background'></div>
                                    </div>
                                    --ribbon -->
                        
                                    <!--ribbon
                                    <div class='ribbon new'>
                                        <div class='theribbon'>BARU</div>
                                        <div class='ribbon-background'></div>
                                    </div>
                                    --ribbon -->
                        
                                </div>
                                <!-- /.product -->
                            </div>
                            "; }
                        }
                        elseif (@($_GET['produk_kategori'] == 'souvenir')) {
                            if (@($_GET['sort']=='harga_terendah')) {
                             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='S01' ORDER BY produk_harga ASC LIMIT $posisi, $batas");
                            }
                            elseif (@($_GET['sort']=='harga_tertinggi')) {
                             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='S01' ORDER BY produk_harga DESC LIMIT $posisi, $batas");
                            }
                            elseif (@($_GET['sort']=='nama_ascending')) {
                             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='S01' ORDER BY produk_nama ASC LIMIT $posisi, $batas");
                            }
                            elseif (@($_GET['sort']=='nama_descending')) {
                             $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='S01' ORDER BY produk_nama DESC LIMIT $posisi, $batas");
                            }
                            else {
                              $query = mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='S01' LIMIT $posisi, $batas");
                            }
                            $jumlah_data=mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_produk WHERE kategori_id='S01'"));
                            $jumlah_halaman=ceil($jumlah_data/$batas);
                            while ($data = mysqli_fetch_array($query)) {
                            echo "
                            <div class='col-md-4 col-sm-6'>
                                <div class='product'>
                                    <div class='flip-container'>
                                        <div class='flipper'>
                                            <div class='front'>
                                                <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."'>
                                                    <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                                </a>
                                            </div>
                                            <div class='back'>
                                                <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."'>
                                                    <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."' class='invisible'>
                                        <img src='assets/img_upload/produk/".$data['produk_gambar']."' alt='' class='img-responsive'>
                                    </a>
                                    <div class='text'>
                                        <h3><a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."'>".$data['produk_nama']."</a></h3>
                                        <p class='price'>".rupiah($data['produk_harga'])."</p>
                                        <p class='buttons'>
                                            <a href='detail.php?produk_kategori=".$_GET['produk_kategori']."&produk_id=".$data['produk_id']."' class='btn btn-success'>Detail</a>
                                        </p>
                                    </div>
                                    <!-- /.text -->
                        
                                    <!--ribbon
                                    <div class='ribbon sale'>
                                        <div class='theribbon'>PROMO</div>
                                        <div class='ribbon-background'></div>
                                    </div>
                                    --ribbon -->
                        
                                    <!--ribbon
                                    <div class='ribbon new'>
                                        <div class='theribbon'>BARU</div>
                                        <div class='ribbon-background'></div>
                                    </div>
                                    --ribbon -->
                        
                                </div>
                                <!-- /.product -->
                            </div>
                            "; }
                        }
                        ?>
                  </div>
                  <!-- /.END PRODUK -->
                  <div class="pages">
                     <ul class="pagination">
                      <?php
                        $kategori=@$_GET['produk_kategori'];
                        $sort=@$_GET['sort'];
                        //Link previous
                        if ($halaman > 1) {
                          $prev = $halaman-1;
                          echo "
                            <li><a href='?halaman=$prev&produk_kategori=$kategori&sort=$sort'>&laquo;</a>
                            </li>
                          ";
                        }else{
                          echo"
                            <li class='disabled'><a href=''>&laquo;</a></li>
                          ";
                        }

                        //1,2,3,4.....dst
                        for($i=1; $i <= $jumlah_halaman; $i++){ 
                            if($i != $halaman){
                            echo"<li> <a href='?halaman=$i&produk_kategori=$kategori&sort=$sort'>$i </a></li>";
                            }else{
                            echo "<li class='active'><a href=''> $i </a></li>";
                            }
                        }

                        // Link Next
                        if($halaman < $jumlah_halaman){
                          $next=$halaman+1;
                          echo "<li><a href='?halaman=$next&produk_kategori=$kategori&sort=$sort'> &raquo;</a></li>";
                        }else{
                          echo "<li class='disabled'><a href=''>&raquo;</a></li>";
                        }
                      ?>            
                     </ul>
                  </div>
               </div>
               <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
         </div>
         <!-- /#content -->
         <!-- *** FOOTER ***-->
         <?php
            require_once "view/v_footer.php";
            ?>
         <!-- *** FOOTER END *** -->
      </div>
      <!-- /#all -->
   </body>
</html>