<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    $title = "Pesanan Saya | Oleh-Oleh Khas Bali";
    require_once "view/v_head.php";
    require_once "controller/c_myorder.php";
    if (!isset($_SESSION['user_username']) && !isset($_COOKIE['user_username'])) {
        header("location:index.php");
    }
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
            </div>
            <div class="col-md-3">

                <!-- *** MENUS SIDEBAR AND FILTERS ***
                   _________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Menu</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li class='active'>
                                <a href='myorder.php'>Pesanan Saya</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <h1>Pesanan Saya</h1>
                </div>
                <!---PESANAN-->
                <div class="box">
                    <div class="row products">
                        <div class='col-md-12 col-sm-6'>
                            <!--CONTENT-->
                            <?php
                            $query = tampil_myorder();
                            $collapse = 1;
                            if (mysqli_num_rows($query) < 1) {
                                echo "Anda belum memiliki pesanan.";
                            } else {
                            while ($data = mysqli_fetch_array($query)) {
                            echo "
                          <div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>
                           <div class='panel "; ?>
                            <?php if ($data['pesanan_status'] == 'Pending') {
                                echo " panel-warning";
                            } elseif ($data['pesanan_status'] == 'Terbayar') {
                                echo " panel-info";
                            } elseif ($data['pesanan_status'] == 'Terkirim') {
                                echo " panel-success";
                            } elseif ($data['pesanan_status'] == 'Pembayaran Ditolak') {
                                echo " panel-danger";
                            } ?> <?php echo " with-border'>
                              <div class='panel-heading' role='tab' id='headingOne'>
                                 <h4 class='panel-title'>
                                    <a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse" . $collapse . "' aria-expanded='true' aria-controls='collapse" . $collapse . "'>
                                    <b>ID. Pemesanan # " . $data['pesanan_id'] . "</b>
                                    </a>
                                 </h4>
                                 <br> Tgl. Pemesanan : <b>" . $data['pesanan_tgl'] . "</b>
                                 <br> Status Pemesanan : <b>" . $data['pesanan_status'] . "</b>
                              </div>
                              <div id='collapse" . $collapse . "' class='panel-collapse collapse out' role='tabpanel' aria-labelledby='headingOne'>
                                 <div class='panel-body'>" ?>
                            <?php if ($data['pesanan_status'] == 'Pending') {
                                echo "
                                  <p class='text-warning'>Silahkan melakukan proses pembayaran ke Rekening PT. Gagapan Gali, lalu klik tombol Konfirmasi Pembayaran di bawah.<br><b>BNI : 022345654 (Gagapan Bali, PT)</b><br><b>BCA : 2534434334 (Gagapan Bali, PT)</b><br>NB: Jika Anda sudah melakukan proses pembayaran dan konfirmasi, abaikan pesan ini. </br></p>
                                  ";
                            } elseif ($data['pesanan_status'] == 'Terbayar') {
                                echo "
                                  <b><p class='text-info'>Pembayaran Anda sudah kami terima, kami sedang memproses pengiriman dan akan menginformasikan Anda jika pesanan sudah terkirim.</p></b>
                                  ";
                            } elseif ($data['pesanan_status'] == 'Terkirim') {
                                echo "
                                  <p class='text-success'>Pesanan Anda sudah kami kirimkan.<br><b>Kurir Pengiriman: " . $data['pesanan_delivery'] . "<br>No. Resi: " . $data['pesanan_resi'] . "</b></p>
                                  ";
                            } elseif ($data['pesanan_status'] == 'Pembayaran Ditolak') {
                                echo "
                                  <p class='text-danger'><b>Konfimasi pembayaran pesanan Anda kami tolak karena pembayaran tidak valid. Silahkan konfimasi ulang pembayaran.</b></p>
                                  ";
                            }
                            ?>
                            <?php
                            echo "
                                 <h4><b>Detail Pemesanan</b></h4>
                                    <table class='table table-striped table-condensed table-hover'>
                                            <thead>
                                                <tr> 
                                                    <th class='cart_description item'>Gambar</th>
                                                    <th class='cart_description item'>Nama Produk</th>
                                                    <th class='cart_ref item'>Ukuran</th>
                                                    <th class='cart_quantity item'>Qty</th>
                                                    <th class='cart_weight item'>Berat / Pcs</th>
                                                    <th class='cart_weight item'>Subtotal Berat</th>
                                                    <th class='cart_unit item'>Harga / Pcs</th>
                                                    <th class='cart_total item'>Subtotal Harga</th>
                                                </tr>
                                            </thead>"; ?>
                            <?php
                            $detail = query_tampil_orderDetail($data['pesanan_id']);
                            while ($data1 = mysqli_fetch_array($detail)) {
                                echo "
                                            <tbody>
                                                <td><img style='max-height:70px;' src='assets/img_upload/produk/" . $data1['produk_gambar'] . "'</td>
                                                <td>" . $data1['produk_nama'] . "</td>
                                                <td>" . $data1['produk_size'] . "</td>
                                                <td>" . $data1['produk_qty'] . "</td>
                                                <td>" . $data1['produk_berat'] . " Kg</td>
                                                <td>" . $data1['subtotal_berat'] . " Kg</td>
                                                <td>" . rupiah($data1['produk_harga']) . "</td>
                                                <td>" . rupiah($data1['subtotal_harga']) . "</td>
                                            </tbody>";
                            }
                            ?>
                            <tfoot>
                            <tr>
                                <td class='table-success' colspan='7'><b class='pull-right'>Total Harga :</b></td>
                                <td colspan='2'><?php echo rupiah($data['pesanan_totharga']); ?>
                                </td>
                            </tr>
                            <tr class='cart_total_voucher'>
                                <td colspan='7'><b class='pull-right'>Total Berat :</b></td>
                                <td colspan='2'><?php echo $data['pesanan_totberat']; ?> Kg</td>
                            </tr>
                            <tr>
                                <td class='table-success' colspan='7'><b class='pull-right'>Total Ongkir :</b></td>
                                <td colspan='2'><?php echo rupiah($data['pesanan_biayakirim']); ?></td>
                            </tr>
                            <tr>
                                <td colspan='7'></td>
                                <td colspan='2' style='background-color: #212121; color: white;'><h4>Grand Total</h4>
                                    <h5><?php echo rupiah($data['pesanan_grandtot']); ?></h5>
                                </td>
                            </tr>
                            </tfoot>
                            </table>
                            <?php
                            if ($data['pesanan_status'] == 'Pending' || $data['pesanan_status'] == 'Pembayaran Ditolak') {
                                echo "
                                        <a href='myorder.php?aksi=konfirmasi&pesanan_id=" . $data['pesanan_id'] . "'><button type='button' class='pull-right btn btn-default'>Konfirmasi Pembayaran</button></a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $collapse++;
            } //end while pertama
            }//end else
            ?>
            <!--END CONTENT-->
        </div>
    </div>
</div>
<!-- /.END PESANAN-->
</div>
</div>
</div>
<!-- content end-->
<!--FOOTER ***
<?php
require_once "view/v_footer.php";
?>
            <!--FOOTER END -->
</div>
<!-- /#all -->

<!---MODAL KONFIRMASI PEMBAYARAN-->
<div class="modal fade" id="modalKonfirmasiPembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-credit-card"></i> Konfirmasi Pembayaran</h4>
            </div>
            <div class="modal-body">
                <!--FORM-->
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="#inputUsername" class="col-sm-2 control-label">ID Pesanan</label>
                            <div class="col-sm-10">
                                <input name="pesanan_id" type="text" class="form-control" id="inputUsername"
                                       placeholder="ID Pesanan" value="<?php echo $_GET['pesanan_id']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="#inputProvinsi" class="col-sm-2 control-label">Cara Pembayaran</label>
                            <div class="col-sm-10">
                                <select name="bayar_jenis" id="inputProvinsi" class="form-control" required>
                                    <option value="ke BNI">Transfer ke BNI</option>
                                    <option value="ke BCA">Transfer ke BCA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="#inputPassword" class="col-sm-2 control-label">Dari Rekening</label>
                            <div class="col-sm-10">
                                <input name="bayar_norekening" type="number" class="form-control" id="inputNewPassword"
                                       placeholder="No Rekening" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="#inputEmail" class="col-sm-2 control-label">A/n</label>
                            <div class="col-sm-10">
                                <input name="bayar_atasnama" type="text" class="form-control" id="inputEmail"
                                       placeholder="Bayar atas nama" maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="#inputName" class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input name="bayar_jumlah" type="number" class="form-control" id="inputFirstname"
                                       placeholder="Rp." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="#InputFile" class="col-sm-2 control-label">Bukti</label>
                            <div class="col-sm-10">
                                Upload bukti pembayaran:
                                <input name="bayar_gambar" style="padding: 12px 0px;" type="file" id="InputFile"
                                       accept="image/png,image/gif,image/jpeg,image/jpg" required>
                                Max-size: 2MB. Type: .png .jpg .jpeg
                            </div>
                        </div>
                    </div>

            </div>
            <!-- /.box-body -->
            <!--modal footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" name="submit_konfirmasi" class="btn btn-success" value="Konfirmasi"></input>
            </div>
            <!--modal footer-->
            </form>
            <!--END FORM-->
        </div>
    </div>
</div>
</div>
<!---MODAL KONFIRMASI PEMBAYARAN-->
</body>
</html>