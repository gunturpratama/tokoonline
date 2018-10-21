<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $title = "Checkout | Gagapan Bali";
    require_once "controller/c_checkout1.php";
    require_once "view/v_head.php";
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
                    <li>Checkout - Metode pengiriman</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="POST" action="checkout3.php">
                        <h1>Checkout - Metode Pengiriman</h1>
                        <?php
                        $page = "checkout2";
                        require_once "view/v_checkout-header.php";
                        ?>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box shipping-method">

                                        <h4>JNE Regular</h4>

                                        <p>Kurir pengiriman tercepat di Indonesia.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="metode_pengiriman" value="JNE Reg" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-right">
                                <input name="submit_checkout2" type="submit" class="btn btn-primary"
                                       value="Lanjut ke Metode Pembayaran"/>
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