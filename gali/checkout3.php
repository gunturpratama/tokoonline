<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Checkout | Gagapan Bali";
    require_once "view/v_head.php";
    require_once "controller/c_checkout1.php";
    ?>
</head>

<body>

<!-- *** NAVBAR ***-->
<?php
session_start();
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
                    <li>Checkout - Metode Pembayaran</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="post" action="checkout4.php">
                        <h1>Checkout - Metode pembayaran</h1>
                        <?php
                        $page = "checkout3";
                        require_once "view/v_checkout-header.php";
                        ?>
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box payment-method">
                                        <h4>Transfer Bank BNI</h4>
                                        <p>BNI : <b>022345654</b></p>
                                        <p>A/n : <b>Gagapan Bali, PT</b></p>
                                        <div class="box-footer text-center">
                                            <input type="radio" name="payment" value="payment1" checked>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box payment-method">
                                        <h4>Transfer Bank BCA</h4>
                                        <p>BCA : <b>2534434334</b></p>
                                        <p>A/n : <b>Gagapan Bali, PT</b></p>
                                        <div class="box-footer text-center">
                                            <input type="radio" name="payment" value="payment1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="checkout2.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali
                                    ke Metode pengiriman</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Lanjut ke Ulasan Pesanan<i
                                            class="fa fa-chevron-right"></i>
                                </button>
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
</body>

</html>