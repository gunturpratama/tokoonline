<?php
require_once "model/m_other_function.php";
$jumlah_produk_makanan = jumlah_produk_makanan();
$jumlah_produk_pakaian = jumlah_produk_pakaian();
$jumlah_produk_souvenir = jumlah_produk_souvenir();

if (@($_GET['produk_kategori'] == 'makanan')) {
    echo "
        <li class='active'>
            <a href='category.php?halaman=$halaman&produk_kategori=makanan'>MAKANAN <span class='badge pull-right'>".$jumlah_produk_makanan."</span></a>
        </li>
        <li>
            <a href='category.php?halaman=$halaman&produk_kategori=pakaian'>PAKAIAN  <span class='badge pull-right'>".$jumlah_produk_pakaian."</span></a>
        </li>
        <li>
            <a href='category.php?halaman=$halaman&produk_kategori=souvenir'>SOUVENIR  <span class='badge pull-right'>".$jumlah_produk_souvenir."</span></a>
        </li>
    ";
}
elseif (@($_GET['produk_kategori'] == 'pakaian')) {
    echo "
        <li>
            <a href='category.php?halaman=$halaman&produk_kategori=makanan'>MAKANAN <span class='badge pull-right'>".$jumlah_produk_makanan."</span></a>
        </li>
        <li class='active'>
            <a href='category.php?halaman=$halaman&produk_kategori=pakaian'>PAKAIAN  <span class='badge pull-right'>".$jumlah_produk_pakaian."</span></a>
        </li>
        <li>
            <a href='category.php?halaman=$halaman&produk_kategori=souvenir'>SOUVENIR  <span class='badge pull-right'>".$jumlah_produk_souvenir."</span></a>
        </li>
    ";
}
if (@($_GET['produk_kategori'] == 'souvenir')) {
    echo "
        <li>
            <a href='category.php?halaman=$halaman&produk_kategori=makanan'>MAKANAN <span class='badge pull-right'>".$jumlah_produk_makanan."</span></a>
        </li>
        <li>
            <a href='category.php?halaman=$halaman&produk_kategori=pakaian'>PAKAIAN  <span class='badge pull-right'>".$jumlah_produk_pakaian."</span></a>
        </li>
        <li class='active'>
            <a href='category.php?halaman=$halaman&produk_kategori=souvenir'>SOUVENIR  <span class='badge pull-right'>".$jumlah_produk_souvenir."</span></a>
        </li>
    ";
}
?>