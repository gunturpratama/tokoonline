<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    if (!isset($_SESSION['user_username']) && !isset($_COOKIE['user_username'])) {
        header("location:index.php");
    }
    require_once "controller/c_basket.php";
    $title="Troli | Gagapan Bali";
    require_once "view/v_head.php";
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
                        <li>Troli</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <?php
                        require_once "view/v_notice.php";
                    ?>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="POST" action="">

                            <h1>Troli</h1>
                            
                                <?php
                                $query = query_select_cart_where_username($user_username);
                                $jumlah = mysqli_num_rows($query);
                                echo "
                                    <p class='text-muted'>".$jumlah." barang di Troli.</p>
                                ";
                                ?>
                                
                            <div class="table-responsive">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Produk</th>
                                            <th>Quantity</th>
                                            <th>Ukuran</th>
                                            <th>Harga/pcs</th>
                                            <th>Subtotal Harga</th>
                                            <th>Berat/pcs</th>
                                            <th colspan="2">Subtotal Berat</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <?php
                                            $sql= query_select_cart_where_username($user_username);
                                            while ($data= mysqli_fetch_array($sql)) {
                                                echo "
                                                <tr>
                                                    <td>
                                                        <img style='max-height: 200px;' src='assets/img_upload/produk/".$data['produk_gambar']."' alt='White Blouse Armani'>
                                                    </td>
                                                    <td>".$data['produk_nama']."</td>
                                                    <td>
                                                        <input type='hidden' name='cart_id' value='".$data['cart_id']."'></input>
                                                        <input type='hidden' name='produk_id[]' value='".$data['produk_id']."'></input>
                                                        <input type='hidden' name='cartproduk_size[]' value='".$data['cartproduk_size']."'></input>
                                                        <input type='number' name='cartproduk_qty[]' value='".$data['cartproduk_qty']."' style='width:56px !important;' class='form-control' min='1'></input>
                                                    </td>
                                                    <td>".$data['cartproduk_size']."</td>
                                                    <td>".rupiah($data['produk_harga'])."</td>
                                                    <td>".rupiah($data['subtotal_harga'])."</td>
                                                    <td>".$data['produk_berat']." Kg</td>
                                                    <td>".$data['subtotal_berat']." Kg</td>
                                                    <td>
                                                        <a href='basket.php?aksi=delete&cart_id=".$data['cart_id']."&produk_id=".$data['produk_id']."&cartproduk_size=".$data['cartproduk_size']."'>
                                                            <i class='fa fa-trash-o'></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                ";
                                            }
                                            ?>
                                        
                                    </tbody>
                                    <tfoot>
  
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                            <div class='box-footer'>
                                <div class='pull-left'>
                                    <a href='category.php?produk_kategori=makanan' class='btn btn-default'><i class='fa fa-chevron-left'></i> Lanjut belanja</a>
                                </div>
                            <?php
                            $sql1= mysqli_fetch_array(query_select_cart_where_username($user_username));
                            $cart_id = $sql1['cart_id'];
                            $cek2 = query_select_apakah_ada_produk_di_cartdet($cart_id);
                            $jumlah = mysqli_num_rows($cek2);
                            if ($jumlah > 0 ) {
                                echo "
                                <div class='pull-right'>
                                    <input type='submit' class='btn btn-default' name='submit_refresh' value='Refresh'></input>
                                    <a href='checkout1.php' class='btn btn-primary'><i class='fa fa-refresh'></i> Lanjut ke Pembayaran</a>
                                </div>
                                ";
                            }

                            
                            ?>
                            </div>
                        </form>

                    </div>
                    <!-- /.box -->




                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Ringkasan Troli</h3>
                        </div>
                        <p class="text-muted">Total harga belum terakumulasi ongkos kirim.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <?php
                                    $isi_tbcart = query_select_tbcart($user_username);
                                    $data1 = mysqli_fetch_array($isi_tbcart); 
                                    echo "
                                    <tr class='total'>
                                        <td>Total Berat</td>
                                        <th>".$data1['cart_totberat']." Kg</th>
                                    </tr>
                                    <tr class='total'>
                                        <td>Total Harga</td>
                                        <th>".rupiah($data1['cart_totharga'])."</th>
                                    </tr>
                                    ";
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER *** -->
        <?php
        require_once "view/v_footer.php";
        ?>
        <!--FOOTER END-->
    </div>
    <!-- /#all -->
</body>

</html>