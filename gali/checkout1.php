<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    require_once "controller/c_checkout1.php";
    $title="Checkout | Gagapan Bali";
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
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Checkout - Alamat</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="POST" action="">
                            <h1>Checkout</h1>
                            <?php
                                $page   = "checkout1";
                                require_once "view/v_checkout-header.php";
                            ?>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="firstname">Nama Penerima</label>
                                            <input name="nama_penerima" type="text" class="form-control" id="firstname" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="street">Alamat Pengiriman</label>
                                            <input name="alamat_pengiriman" type="text" class="form-control" id="street" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="state">Provinsi</label>
                                            <select name="provinsi_id" class="form-control" id="state" required>
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
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="zip">Kode Pos</label>
                                            <input name="kode_pos" type="number" class="form-control" id="zip" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Telepon</label>
                                            <input name="telepon" type="number" class="form-control" id="phone" min="0" required>
                                        </div>
                                    </div>

                                    
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input name="email" type="text" class="form-control" id="email" required>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali ke Troli</a>
                                </div>
                                <div class="pull-right">
                                    <input name="submit_checkout1" type="submit" class="btn btn-primary" value="Lanjut ke Metode Pengiriman"></input>
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