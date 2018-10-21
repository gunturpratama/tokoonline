<!--footer-->
<div id="footer">
            <div class="container">
                <div class="row">
<!--                    <div class="col-md-3 col-sm-6">-->
<!--                        <h4>&nbsp;</h4>-->
<!--                        <img src="assets/img/logo.png" width="200px">-->
<!--                        <ul>-->
<!--                        </ul>-->
<!---->
<!--                        <hr>-->
<!---->
<!---->
<!--                        <hr class="hidden-md hidden-lg hidden-sm">-->
<!---->
<!--                    </div>-->
<!--                    <!-- /.col-md-3 -->

                    <div class="col-md-4 col-sm-6">

                        <h4>PT. Gagapan Bali</h4>

                       <p class="text-muted">
                           Kami adalah perintis e-commerce (online shopping) di Bali dengan pertumbuhan tercepat yang menawarkan pengalaman belanja online cepat, aman dan nyaman dengan produk-produk dalam kategori mulai dari makanan, pakaian, dan souvenir.
                       </p>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-4 col-sm-6">

                        <h4>Temukan kami di:</h4>

                        <p><strong>STMIK STIKOM Indonesia.</strong>
                            <br>Jl. Tukad Pakerisan No.97
                            <br>Denpasar Selatan
                            <br>Bali, 80225
                            <br>Indonesia
                        </p>

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-4 col-sm-6">

                        <h4>Dapatkan berita:</h4>

                        <p class="text-muted">Dapatkan berita terbaru di sosial media kami.</p>

                        <hr>
                        <p class="social">
                            <a href="http://facebook.com" target="_blank" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="http://twitter.com" target="_blank" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="http://instagram.com" target="_blank" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="http://plus.google.com" target="_blank" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

                <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2018 PT. Gagapan Bali.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Website by Wahyu & Panji
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->

        <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/front.js"></script>
    <script>

$(document).ready(function(){
    <?php
        if (@$_GET['aksi']=='konfirmasi') {
        echo "
            $(window).load(function(){
                    $('#modalKonfirmasiPembayaran').modal('show');
                });
        ";
        }
    ?>
});
</script>