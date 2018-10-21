<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $title = "Checkout | Gagapan Bali";
    require_once "view/v_head.php";
    require_once "controller/c_checkout1.php";
    require_once "controller/c_checkout4.php";
    ?>
</head>

<body>
<!-- *** NAVBAR ***-->
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
                    <li>Checkout - Ulasan pesanan</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="post" action="">
                        <h1>Checkout - Ulasan order</h1>
                        <?php
                        $page = "checkout4";
                        require_once "view/v_checkout-header.php";
                        ?>

                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover" style="border: 1px solid #e0e0e0">
                                    <thead>
                                    <tr>
                                        <th class="cart_description item">Gambar</th>
                                        <th class="cart_description item">Nama Produk</th>
                                        <th class="cart_ref item">Ukuran</th>
                                        <th class="cart_quantity item">Qty</th>
                                        <th class="cart_weight item">Berat / Pcs</th>
                                        <th class="cart_unit item">Harga / Pcs</th>
                                        <th class="cart_total item">Subtotal Harga</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $pesanan_id = $_SESSION['pesanan_id'];
                                    $query1 = query_select_data_pesanan($pesanan_id);
                                    while ($data1 = mysqli_fetch_array($query1)) {
                                        echo "
                                          <tbody>
                                          <tr>
                                          <td><img style='max-height: 100px;' src='assets/img_upload/produk/" . $data1['produk_gambar'] . "'></td>
                                          <td>" . $data1['produk_nama'] . "</td>
                                          <td>" . $data1['produk_size'] . "</td>
                                          <td>" . $data1['produk_qty'] . "</td>
                                          <td>" . $data1['produk_berat'] . " Kg</td>
                                          <td>" . rupiah($data1['produk_harga']) . "</td>
                                          <td>" . rupiah($data1['subtotal_harga']) . "</td>
                                          <tr>
                                          </tbody>
                                        ";
                                    }

                                    ?>
                                    <tfoot>
                                    <?php
                                    $pesanan_id = $_SESSION['pesanan_id']; //mengambil id
                                    $query = query_select_data_pesanan($pesanan_id);
                                    $data = mysqli_fetch_array($query); //jadikan array
                                    ?>
                                    <tr>
                                        <td class="table-success" colspan="6"><b class="pull-right">Total Harga :</b>
                                        </td>
                                        <td colspan="2"><?php echo rupiah($data['pesanan_totharga']); ?>
                                        </td>
                                    </tr>
                                    <tr class="cart_total_voucher">
                                        <td colspan="6"><b class="pull-right">Total Berat :</b></td>
                                        <td colspan="2"><?php echo $data['pesanan_totberat']; ?> Kg</td>
                                    </tr>
                                    <tr>
                                        <td class="table-success" colspan="6"><b class="pull-right">Total Ongkir :</b>
                                        </td>
                                        <td colspan="2"><?php echo rupiah($data['pesanan_biayakirim']); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6"></td>
                                        <td colspan="2" style="background-color: #424242; color: white;"><h4>Grand
                                                Total</h4>
                                            <h5><?php echo rupiah($data['pesanan_grandtot']); ?></h5>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="checkout3.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali
                                    ke Metode Pembayaran</a>
                            </div>
                            <div class="pull-right">
                                <input name="submit_checkout4" type="submit" class="btn btn-primary"
                                       value="Selesai"></input>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


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


<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/bootstrap-hover-dropdown.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/front.js"></script>


</body>

</html>