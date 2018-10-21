<!DOCTYPE html>
<html lang="en">
 
<head>
    <?php
    session_start();
    $title ="Gagapan Bali | Oleh-Oleh Khas Bali";
    require_once "view/v_head.php";
    ?>
</head>

<body>

<!--NAVBAR-->
    <?php
    require_once "view/v_navbar.php";
    ?>
<!--END NAVBAR-->
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                <?php
                require_once "view/v_notice.php";
                ?>
                    <!--slider-->
                    <div id="main-slider">
                        <div class="item">
                            <img src="assets/img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="assets/img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="assets/img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="assets/img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /end slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">Kenyamanan Pengunjung</a></h3>
                                <p>Kami mengutamakan kenyaman pengunjung dan melayani sepenuh hati.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Harga Terbaik</a></h3>
                                <p>Jika menemukan produk sama yang lebih murah dibandingkan toko kami, kami ganti selisihnya!</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">Garansi 100% uang kembali</a></h3>
                                <p>Jika produk yang anda terima rusak, 100% uang Anda kami ganti.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->




        </div>
        <!-- content end-->

        <!--FOOTER ***
            <?php
                require_once "view/v_footer.php";
            ?>
        <!--FOOTER END -->

    </div>
    <!-- /#all -->

</body>

</html>