<?php
require_once "model/m_detail.php";
require_once "controller/c_validasi.php";
require_once "setting/DB_Setting.php";

$db = new DB_Setting();
$con = $db->con;

function select_produk_where_id($produk_id)
{
    $query = query_select_produk_where_id($produk_id);
    return $query;
}

if (isset($_POST['submit_addtocart'])) {

    $url = "detail.php?produk_kategori=" . ($_GET['produk_kategori']) . "&produk_id=" . $_GET['produk_id'] . "";

    if (!isset($_SESSION['user_username']) && !isset($_COOKIE['user_username'])) {
        header("location:" . $url . "&notice=213");
    } else {
        if (isset($_SESSION['user_username'])) {
            $user_username = $_SESSION['user_username'];
        } elseif (isset($_COOKIE['user_username'])) {
            $user_username = $_COOKIE['user_username'];
        }
        $cart_tgl = date("Y-m-d");
        $produk_id = $_GET['produk_id'];
        $size = $_POST['input_ukuran'];
        $qty = $_POST['input_quantity'];
        $cart_id = "";


        // Cek apakah ada data yang cocok di table produk dan detail produk
        $rowa = mysqli_fetch_array(mysqli_query($con, "SELECT p.*, d.* FROM tb_produk p, tb_produkdet d WHERE p.produk_id=d.produk_id AND p.produk_id='$produk_id' AND d.produk_size='$size'"));
        if ($rowa['produk_stok'] < $qty or $rowa['produk_stok'] < 1) {
            header("location:" . $url . "&notice=214");
            exit();
        }

        //cek apakah member ini sudah ada buat cart atau blm
        $cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_cart WHERE user_username='$user_username'"));

        if ($cek == 0) {//JIKA SEBELUMNYA MEMBER BELUM MEMILIKI CART
            //proses tambah ke table "cart"
            $add_tbcart = mysqli_query($con, "INSERT INTO tb_cart (user_username,cart_tgl) VALUES ('$user_username','$cart_tgl')") or die(mysqli_error($con));

            //select biar tau cart_id
            $query = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_cart WHERE user_username='$user_username'")); //biar tau ID cart
            $cart_id = $query['cart_id']; //biar tau ID cart

            //proses tambah ke table "cartdet"
            $subtotal_berat = $rowa['produk_berat'] * $qty;
            $subtotal_harga = $rowa['produk_harga'] * $qty;
            $add_tbcartdet = mysqli_query($con, "INSERT INTO tb_cartdet VALUES ('$cart_id','$produk_id','$size','$qty','$subtotal_berat','$subtotal_harga')") or die(mysqli_error($con));

            //update ke tb_Cart lagi bro (insert total berat dan total harga)
            $cart_totberat = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(subtotal_berat) AS total_berat FROM tb_cartdet WHERE cart_id='$cart_id'"));
            $cart_totharga = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(subtotal_harga) AS total_harga FROM tb_cartdet WHERE cart_id='$cart_id'"));
            $update_tbcart = query_update_tbcart($cart_id, $cart_totberat['total_berat'], $cart_totharga['total_harga']);

            if ($update_tbcart) {
                header("location: basket.php?notice=306");
            }
        }
        else { //JIKA SEBELUMNYA MEMBER SUDAH MEMILIKI CART
            //select biar tau cart_id
            $query = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_cart WHERE user_username='$user_username'")); //biar tau ID cart
            $cart_id = $query['cart_id']; //biar tau ID cart

            $sqld = mysqli_query($con, "SELECT * FROM tb_cartdet WHERE cart_id='$cart_id' AND produk_id='$produk_id' AND cartproduk_size='$size'") or die(mysqli_error($con));
            $cek1 = mysqli_num_rows($sqld);

            if ($cek1 == 1) { //jika produk yang sama ditambahkan
                $rowd = mysqli_fetch_array($sqld);
                $edit_qty = ($rowd['cartproduk_qty'] + $qty);
                // Cek Stok Produk Sesuai Dengan Size yang dipilih
                if ($rowa['produk_stok'] < $edit_qty) {
                    header("location:" . $url . "&notice=214");
                    exit();
                }
                $edit_subberat = ($rowa['produk_berat'] * $edit_qty);
                $edit_subharga = ($rowa['produk_harga'] * $edit_qty);
                $edit = mysqli_query($con, "UPDATE tb_cartdet SET cartproduk_qty='$edit_qty', subtotal_berat='$edit_subberat', subtotal_harga='$edit_subharga' WHERE cart_id='$cart_id' AND produk_id='$produk_id' AND cartproduk_size='$size'") or die(mysqli_error($con));
            } else { //jika tidak produk sama
                //proses tambah ke table "cartdet"
                $query = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_cart WHERE user_username='$user_username'")); //biar tau ID cart
                $cart_id = $query['cart_id']; //biar tau ID cart
                $subtotal_berat = $rowa['produk_berat'] * $qty;
                $subtotal_harga = $rowa['produk_harga'] * $qty;
                $add_tbcartdet = mysqli_query($con, "INSERT INTO tb_cartdet VALUES ('$cart_id','$produk_id','$size','$qty','$subtotal_berat','$subtotal_harga')") or die(mysqli_error($con));
            }


            //update ke tb_Cart lagi bro (insert total berat dan total harga)
            $cart_totberat = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(subtotal_berat) AS total_berat FROM tb_cartdet WHERE cart_id='$cart_id'"));
            $cart_totharga = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(subtotal_harga) AS total_harga FROM tb_cartdet WHERE cart_id='$cart_id'"));
            $update_tbcart = query_update_tbcart($cart_id, $cart_totberat['total_berat'], $cart_totharga['total_harga']);

            if ($update_tbcart) {
                header("location: basket.php?notice=306");
            }
        }

    }
} //end submit add to cart


?>