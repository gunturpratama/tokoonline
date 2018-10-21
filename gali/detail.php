<?php
session_start();
require_once "controller/c_detail.php";
$produk_id = $_GET['produk_id'];
$sql = select_produk_where_id($produk_id);
$data1 = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = $data1['produk_nama'];
    require_once "view/v_head.php";
    ?>
</head>

<body>

<!-- *** NAVBAR ***
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
                    <li><a href="#">Pakaian</a>
                    </li>
                    <li>Baju Barong Bali</li>
                </ul>

            </div>
            <div class="col-md-12">
                <?php
                require_once "view/v_notice.php";
                ?>
            </div>

            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS ***-->
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
                <!-- *** MENUS AND FILTERS END *** -->
            </div>

            <div class="col-md-9">

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <img src="assets/img_upload/produk/<?php echo $data1['produk_gambar'] ?>" alt=""
                                 class="img-responsive">
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"><?php echo $data1['produk_nama']; ?></h1>
                            <p class="goToDescription"><a href="#details" class="scroll-to">Scroll untuk melihat detail
                                    dan info produk.</a>
                            </p>
                            <p class="price"><?php echo rupiah($data1['produk_harga']) ?></p>
                        </div>
                        <div class="box">
                            <form action="" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <label for="#inputUkuran" class="col-sm-3 control-label">Ukuran</label>
                                    <div class="col-sm-9">
                                        <select name="input_ukuran" class="form-control" required>
                                            <?php
                                            $sql2 = select_produk_where_id($produk_id);
                                            while ($data2 = mysqli_fetch_array($sql2)) {
                                                echo "
                                                        <option value='" . $data2['produk_size'] . "'>" . $data2['produk_size'] . "</option>
                                                    ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#inputQuantity" class="col-sm-3 control-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input name="input_quantity" type="number" class="form-control"
                                               id="inputQuantity" placeholder="Quantity" value="1" min="1" required>
                                    </div>
                                </div>

                                <p class="text-center buttons">
                                    <input type="submit" class="btn btn-success" name="submit_addtocart"
                                           value="Tambah ke Troli">
                                </p>
                            </form>
                        </div>
                    </div>

                </div>


                <div class="box" id="details">
                    <p>
                    <h4>Deskripsi</h4>
                    <p><?php echo $data1['produk_deskripsi']; ?></p>

                    <h4>Bahan</h4>
                    <ul>
                        <li><?php echo $data1['produk_bahan'] ?></li>
                    </ul>
                    <h4>Ukuran</h4>
                    <ul>
                        <?php
                        $sql2 = select_produk_where_id($produk_id);
                        while ($data2 = mysqli_fetch_array($sql2)) {
                            echo "
                                            <li>" . $data2['produk_size'] . "</li>
                                        ";
                        }
                        ?>

                    </ul>
                    <h4>Berat</h4>
                    <ul>
                        <li><?php echo $data1['produk_berat'] ?> Kg</li>
                    </ul>

                    <blockquote>
                        <p><em>Kami tidak bertanggung jawab apabila barang yang Anda beli tidak sesuai keinginan Anda. Cermati produk terlebih dahulu.</em></p>
                    </blockquote>

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
    <!-- *** FOOTER ***-->
</div>
<!-- /#all -->
</body>

</html>