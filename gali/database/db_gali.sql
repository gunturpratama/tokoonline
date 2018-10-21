-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2018 at 04:26 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gali`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_firstname` varchar(10) NOT NULL,
  `admin_lastname` varchar(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_level` varchar(25) NOT NULL,
  `admin_tgl` date NOT NULL,
  `admin_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_username`, `admin_password`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_level`, `admin_tgl`, `admin_foto`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '', 'admin@gali.com', 'Admin', '2018-06-11', '6070avatar3.png'),
('customerservice', '2995cc7d3abbc615a9203427f9b2cf33', 'Customer', 'Service', 'customerservice@gali.com', 'Customer Service', '2018-06-11', '3120avatar3.png'),
('productinventory', '601830d2fa6ad1c8f5d9edff51d6a5ce', 'Product', 'Inventory', 'productinventory@gali.com', 'Product Inventory', '2018-06-11', '72041126.gif'),
('saleshandling', 'a2353cafa3da62621e49c8e176a76b96', 'Sales', 'Handling', 'saleshandling@gali.com', 'Sales Handling', '2018-06-11', '9212avatar2.png'),
('superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Super', 'Admin', 'superadmin@gali.com', 'Super Admin', '2018-06-11', '2487giphy (2).gif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `bayar_id` int(10) NOT NULL,
  `pesanan_id` int(10) NOT NULL,
  `bayar_tgl` date NOT NULL,
  `bayar_jenis` varchar(20) NOT NULL,
  `bayar_norekening` int(11) NOT NULL,
  `bayar_atasnama` varchar(50) NOT NULL,
  `bayar_jumlah` double NOT NULL,
  `bayar_gambar` varchar(100) NOT NULL,
  `bayar_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cart_id` int(10) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `cart_tgl` date NOT NULL,
  `cart_totberat` decimal(6,2) NOT NULL,
  `cart_totharga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cartdet`
--

CREATE TABLE `tb_cartdet` (
  `cart_id` int(10) NOT NULL,
  `produk_id` varchar(10) NOT NULL,
  `cartproduk_size` varchar(10) NOT NULL,
  `cartproduk_qty` smallint(6) NOT NULL,
  `subtotal_berat` decimal(5,2) NOT NULL,
  `subtotal_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` varchar(3) NOT NULL,
  `kategori_nama` varchar(10) NOT NULL,
  `kategori_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`, `kategori_status`) VALUES
('M01', 'Makanan', 'Disable'),
('P01', 'Pakaian', 'Active'),
('S01', 'Souvenir', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `pesanan_id` int(10) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `pesanan_tgl` datetime NOT NULL,
  `pesanan_totberat` decimal(6,2) NOT NULL,
  `pesanan_totharga` double NOT NULL,
  `pesanan_biayakirim` double NOT NULL,
  `pesanan_grandtot` double NOT NULL,
  `pesanan_penerima` varchar(30) NOT NULL,
  `pesanan_telepon` varchar(12) NOT NULL,
  `pesanan_email` varchar(50) NOT NULL,
  `pesanan_alamat` text NOT NULL,
  `pesanan_status` varchar(20) NOT NULL,
  `pesanan_delivery` varchar(12) NOT NULL,
  `pesanan_pembayaran` varchar(20) NOT NULL,
  `pesanan_resi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanandet`
--

CREATE TABLE `tb_pesanandet` (
  `pesanan_id` int(10) NOT NULL,
  `produk_id` varchar(10) NOT NULL,
  `produk_size` varchar(8) NOT NULL,
  `produk_qty` smallint(6) NOT NULL,
  `produk_harga` double NOT NULL,
  `produk_berat` decimal(4,2) NOT NULL,
  `subtotal_berat` decimal(5,2) NOT NULL,
  `subtotal_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` varchar(10) NOT NULL,
  `kategori_id` varchar(6) NOT NULL,
  `produk_tgl` datetime NOT NULL,
  `produk_nama` varchar(50) NOT NULL,
  `produk_warna` varchar(10) NOT NULL,
  `produk_bahan` text NOT NULL,
  `produk_berat` decimal(4,2) NOT NULL,
  `produk_harga` double NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `kategori_id`, `produk_tgl`, `produk_nama`, `produk_warna`, `produk_bahan`, `produk_berat`, `produk_harga`, `produk_deskripsi`, `produk_gambar`) VALUES
('121246', 'P01', '2017-01-30 10:19:26', 'kaos oblong', 'Hitam', 'Katun', '0.35', 85000, 'Kaos oblong kualitas bagus', '6394bajukaos.jpg'),
('14984', 'P01', '2017-01-30 10:25:40', 'Baju bintang', 'Hitam', 'Katun', '0.30', 85000, 'Baju bintang kualitas bagus', '2131aguig.jpg'),
('155426', 'S01', '2017-01-31 02:06:07', 'Gelang Peace Boni', 'Pink', 'Benang Wol', '0.25', 6000, 'Gelang antik kualitas terbaik', '8650GL-101_gelang-peace-boni_6rb.jpg'),
('162414', 'P01', '2017-01-30 10:21:43', 'Baju barong', 'Putih', 'katun', '0.25', 75000, 'Baju barong kualitas bagus', '1736bajubarong3.jpg'),
('197540', 'S01', '2017-01-31 02:15:23', 'Topeng Barong', 'Hitam', 'Kayu', '0.75', 135000, 'Topeng antik kualitas terbaik', '3930Wood-Barong-mask-Bali-souvenir.jpg'),
('214416', 'M01', '2017-01-31 01:53:39', 'Pia Barong Aneka Rasa', 'Coklat', 'Tepung', '0.70', 35000, 'Pia enak harga murah', '2168pia-barong_1.jpg'),
('214935', 'P01', '2017-01-30 10:39:45', 'Baju cewek balinese is a better half', 'Hitam', 'Katun', '0.20', 75000, 'Baju khas bali kualitas bagus', '6328baju-hitam.jpg'),
('220581', 'M01', '2017-01-31 01:44:13', 'Kacang Disco Aneka Rasa', 'Coklat', 'Kacang', '0.50', 15000, 'Kacang enak harga murah', '9825kacang-disco-rajawali_2.jpg'),
('242218', 'P01', '2017-01-30 10:31:00', 'Baju I love Bali', 'Putih', 'katun', '0.35', 90000, 'Baju I Love Bali kualitas bagus', '3878baju-putih1.gif'),
('309143', 'M01', '2017-01-31 01:39:19', 'Kacang Disco Khas Bali', 'Coklat', 'Kacang', '1.00', 10000, 'Kacang enak harga murah', '420awd.jpg'),
('329986', 'P01', '2017-01-30 10:35:23', 'Baju lengan panjang', 'Putih', 'katun', '0.25', 85000, 'Baju khas bali kualitas bagus', '5171bajupanjang.jpg'),
('353302', 'P01', '2017-01-30 10:42:53', 'Baju Barong', 'Coklat', 'Katun', '0.15', 80000, 'Baju barong kualitas bagus', '6210bajubarong1.jpg'),
('39642', 'S01', '2017-01-31 02:14:27', 'Tas Slempang Barong', 'Putih', 'Kanvas', '0.20', 75000, 'Tas murah kualitas mantap', '2758souvenir-bali-tas-bali-O1103.jpg'),
('428344', 'M01', '2017-01-31 01:52:08', 'Kopi Bali Original', 'Hitam', 'Kopi', '0.75', 30000, 'Kopi nomor satu di bali', '2538kopibali.jpg'),
('468353', 'M01', '2017-01-31 02:01:23', 'Kacang Khas Bali', 'Putih', 'Kacang', '0.50', 50000, 'Kacang enak harga murah', '5053sfw.jpg'),
('494598', 'S01', '2017-01-31 02:04:13', 'Dompet Monte Motif Kribo', 'Pink', 'Kain', '0.30', 75000, 'Dompet antik khas Bali', '4285dompet-monte-Bali-motif-kribo-S-02-wa.jpg'),
('501220', 'M01', '2017-01-31 01:48:04', 'Kacang Kapri Khas Bali', 'Coklat', 'Kacang Kapri', '0.80', 15000, 'Kacang enak, murah dan berkualitas', '3847kacang-tari-bali.jpg'),
('524230', 'M01', '2017-01-31 01:46:48', 'Kacang Polong Cenang Bali', 'Kuning', 'Kacang', '0.75', 20000, 'Kacang enak harga murah', '3616Kacang-Polong.jpg'),
('567047', 'S01', '2017-01-31 02:07:18', 'Topeng Khas Bali', 'Hitam', 'Kayu', '1.00', 120000, 'Topeng antik kualitas terbaik', '9817handicraft-mask-souvenir-bali-indonesia-33467256.jpg'),
('61309', 'M01', '2017-01-31 01:40:54', 'Pie Susu Bunga', 'Coklat', 'Tepung & susu', '0.50', 15000, 'Pie susu enak dan murah', '2938images.jpg'),
('691131', 'S01', '2017-01-31 02:11:34', 'Sendal Khas Bali', 'Biru', 'Karet', '0.50', 85000, 'Sendal murah kualitas terbaik', '2257sandal-like-bali.jpg'),
('691375', 'M01', '2017-01-31 01:42:43', 'Kacang Rasa Rumput Laut', 'Coklat', 'Kacang', '0.75', 15000, 'Kacang enak, murah dan berkualitas', '1273index.jpg'),
('695831', 'S01', '2017-01-31 02:10:29', 'Dompet Khas Bali', 'Merah', 'Benang Wol', '0.30', 50000, 'Dompet antik khas Bali', '5817Kerajinan-Manik-manik-Bali.jpg'),
('696685', 'M01', '2017-01-31 02:00:14', 'Kopi Luwak Khas Bali', 'Putih', 'Kopi', '0.55', 50000, 'Kopi enak harga murah', '7373sachet-ORI-1170x775.jpg'),
('788513', 'P01', '2017-01-30 10:32:56', 'Baju kucing', 'Putih', 'katun', '0.30', 95000, 'Baju bali kualitas bagus dengan bahan terbaik', '3559bajuputih1.jpg'),
('845703', 'M01', '2017-01-31 01:55:00', 'Pia Eiji', 'Coklat', 'Tepung', '0.70', 40000, 'Pia murah, enak, kualitas terbaik', '5583pia-eiji_1.jpg'),
('850555', 'P01', '2017-01-30 10:46:17', 'Celana Pendek', 'Abu-abu', 'Parasut', '0.20', 110000, 'Celana kualitas bagus', '9779celana.jpg'),
('916412', 'S01', '2017-01-31 02:12:58', 'Tali Rambut Berbentuk Bunga Jepun', 'Pink', 'Karet', '0.15', 10000, 'Tali rambut bagus harga murah', '1875SouvenirBali_TaliRambutA4705.jpg'),
('922210', 'P01', '2017-01-30 10:28:25', 'Baju I love Bali', 'Biru', 'katun', '0.30', 80000, 'Baju khas bali kualitas bagus', '6008bajubiru.jpg'),
('928894', 'M01', '2017-01-31 01:50:28', 'Kembang Goyang Khas Bali', 'Coklat', 'Tepung Terigu', '0.50', 25000, 'Kembang goyang enak harga murah', '7824kembang-goyang.jpg'),
('97045', 'M01', '2017-01-31 01:59:05', 'Kacang Disco Extra Pedas', 'Coklat', 'Kacang', '0.50', 15000, 'Kacang enak harga murah', '7672qhiqhi.jpg'),
('974548', 'M01', '2017-01-31 01:58:04', 'Pie Susu Khas Bali', 'Coklat', 'Tepung & susu', '0.50', 25000, 'Pie susu enak dan murah', '3837Pie-Susu-Khas-Bali-Di-Tegal.jpg'),
('981292', 'S01', '2017-01-31 02:08:42', 'Topeng Khas Bali', 'Hitam', 'Kayu', '1.50', 150000, 'Topeng antik kualitas terbaik', '7907Hiasan-Dinding-Topeng-Lukis50-cm.jpg'),
('M0001', 'M01', '2017-01-15 20:14:06', 'Kripik Kaki Ayam', 'Biru', 'Ayam tiren', '1.00', 23000, 'Kripik kaki ayam enak dan gurih', 'product3.jpg'),
('M0004', 'M01', '2017-01-16 00:00:00', 'Kacang Kapri', 'Hitam', 'kacang', '1.00', 10000, 'Kacang kapri asli bali yang dibuat dengan rasa pedas alami', '9421M0004.png'),
('M0006', 'M01', '2017-01-16 00:00:00', 'Pie Susu Cocochips', 'Kuning', 'tepung', '1.00', 20000, 'Pie susu dengan krim susu asli yang lumer di mulut dan ditaburi dengan chococpis diatasnya', 'M0006.png'),
('M0007', 'M01', '2017-01-16 00:00:00', 'Pie Premium Legong', 'Hijau', 'Tepung', '1.00', 15000, 'Pie Premium Legong dengan varian rasa yang asli serta lumer dimulut, setiap varian rasanya memiliki rasa yang khas', 'M0007.png'),
('M0008', 'M01', '2017-01-16 00:00:00', 'Jaje Kuping', 'Coklat', 'Tepung', '1.00', 30000, 'Jaje Kuping dengan rasa coklat vanila', 'M0008.png'),
('P0001', 'P01', '2017-01-15 20:14:06', 'Baju Barong Bali', 'Biru', 'Katun', '1.00', 23000, 'Baju barong bali nyaman dan sejuk digunakan', 'product2.jpg'),
('P0008', 'P01', '2017-01-16 00:00:00', 'Kain Pantai', 'Hitam', 'Kain sari', '0.50', 10000, 'Kain pantai lembut', 'P0001.png'),
('P0009', 'P01', '2017-01-16 00:00:00', 'Kain Pantai', 'Orange', 'Kain', '0.50', 10000, '', 'P0009.png'),
('P0010', 'P01', '2017-01-16 00:00:00', 'Baju Barong', 'Merah', 'Kain Katun', '0.50', 15000, '', 'P0010.png'),
('P0011', 'P01', '2017-01-16 00:00:00', 'Sandal Mote', 'Pink', 'Karet', '0.50', 12000, '', 'P0011.png'),
('P0012', 'P01', '2017-01-16 00:00:00', 'Udeng ', 'Merah', 'Kain', '0.65', 5000, 'Udeng bagus', '1123P0012.png'),
('S0001', 'S01', '2017-01-15 20:14:06', 'Kepet', 'Biru', 'Kayu dan Kain', '1.00', 34000, 'Kipas bali dibuat berdasarkan hasrat seni ynag tinggi', 'product1.jpg'),
('S0002', 'S01', '2017-01-16 00:00:00', 'Kotak Kayu', 'Coklat', 'Kayu Jati', '1.00', 50000, '', 'S0002.png'),
('S0003', 'S01', '2017-01-16 00:00:00', 'Keropak Kayu', 'Coklat', 'Kayu', '1.00', 50000, '', 'S0003.png'),
('S0004', 'S01', '2017-01-16 00:00:00', 'Kotak Kayu Kupu - kupu', 'coklat', 'kayu jati', '1.00', 50000, '', 'S0004.png'),
('S0005', 'S01', '2017-01-16 00:00:00', 'Gantungan kunci kanao', 'Merah', '', '0.20', 2000, '', 'S0005.png'),
('S0006', 'S01', '2017-01-16 00:00:00', 'Gatungan kunci barong', 'Hijau', 'Kayu', '0.20', 3000, '', 'S0006.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produkdet`
--

CREATE TABLE `tb_produkdet` (
  `produk_id` varchar(10) NOT NULL,
  `produk_size` varchar(10) NOT NULL,
  `produk_stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produkdet`
--

INSERT INTO `tb_produkdet` (`produk_id`, `produk_size`, `produk_stok`) VALUES
('P0001', 'L', 32),
('M0001', 'One size', 45),
('P0001', 'M', 2),
('M0007', 'L', 45),
('M0008', 'S', 6),
('P0009', 'S', 32),
('P0010', 'L', 21),
('P0011', 'S', 43),
('S0002', 'M', 23),
('S0003', 'L', 23),
('S0004', 'S', 23),
('S0005', 'L', 34),
('S0006', 'S', 23),
('P0012', 'L', 21),
('M0006', 'L', 45),
('P0008', 'S', 35),
('M0004', 'L', 5),
('M0004', 'S', 56),
('M0004', 'M', 23),
('S0001', 'One Size', 12),
('121246', 'M', 10),
('121246', 'l', 12),
('162414', 's', 10),
('162414', 'm', 11),
('162414', 'l', 20),
('14984', 'm', 15),
('14984', 'l', 20),
('922210', 's', 16),
('922210', 'm', 17),
('922210', 'l', 18),
('242218', 'm', 20),
('242218', 'l', 30),
('329986', 'm', 15),
('329986', 'l', 10),
('850555', 'M', 20),
('850555', 'L', 18),
('353302', 'M', 10),
('353302', 'L', 15),
('309143', 'M', 10),
('309143', 'L', 10),
('61309', 'M', 15),
('61309', 'L', 13),
('691375', 'S', 10),
('691375', 'M', 15),
('220581', 'S', 15),
('220581', 'M', 13),
('220581', 'L', 20),
('524230', 'M', 10),
('524230', 'L', 20),
('501220', 'S', 10),
('501220', 'M', 15),
('501220', 'L', 20),
('928894', 'S', 20),
('928894', 'M', 15),
('928894', 'L', 25),
('428344', 'S', 15),
('428344', 'M', 10),
('428344', 'L', 20),
('214416', 'S', 15),
('214416', 'M', 10),
('214416', 'L', 15),
('845703', 'S', 20),
('845703', 'M', 15),
('845703', 'L', 10),
('974548', 'S', 10),
('974548', 'M', 15),
('974548', 'L', 20),
('97045', 'S', 10),
('97045', 'M', 20),
('97045', 'L', 15),
('696685', 'S', 5),
('696685', 'M', 25),
('696685', 'L', 30),
('468353', 'M', 20),
('468353', 'L', 25),
('494598', 'M', 30),
('494598', 'L', 45),
('155426', 'S', 10),
('155426', 'M', 35),
('155426', 'L', 20),
('567047', 'M', 20),
('567047', 'L', 30),
('981292', 'M', 15),
('981292', 'L', 20),
('695831', 'M', 20),
('695831', 'L', 25),
('691131', 'S', 25),
('691131', 'M', 30),
('691131', 'L', 35),
('916412', 'S', 30),
('916412', 'M', 25),
('916412', 'L', 20),
('39642', 'S', 20),
('39642', 'M', 30),
('39642', 'L', 40),
('197540', 'S', 40),
('197540', 'M', 35),
('197540', 'L', 50),
('214935', 'M', 15),
('214935', 'L', 20),
('788513', 'm', 15),
('788513', 'l', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `provinsi_id` varchar(6) NOT NULL,
  `provinsi_nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`provinsi_id`, `provinsi_nama`) VALUES
('000001', 'Bali'),
('000002', 'Jawa Tengah'),
('000003', 'Jawa Barat'),
('000004', 'Jawa Timur'),
('000006', 'Papua');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `tarif_id` varchar(6) NOT NULL,
  `provinsi_id` varchar(6) NOT NULL,
  `tarif_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tarif`
--

INSERT INTO `tb_tarif` (`tarif_id`, `provinsi_id`, `tarif_harga`) VALUES
('285583', '000003', 20000),
('465332', '000001', 10000),
('762634', '000004', 20000),
('785125', '000006', 50000),
('847930', '000002', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_birth` date NOT NULL,
  `user_gender` varchar(1) NOT NULL,
  `user_telepon` varchar(12) NOT NULL,
  `user_alamat` text NOT NULL,
  `provinsi_id` varchar(6) NOT NULL,
  `user_kota` varchar(30) NOT NULL,
  `user_pos` mediumint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_username`, `user_password`, `user_email`, `user_firstname`, `user_lastname`, `user_birth`, `user_gender`, `user_telepon`, `user_alamat`, `provinsi_id`, `user_kota`, `user_pos`) VALUES
('wahyu', '32c9e71e866ecdbc93e497482aa6779f', 'wahyucrazy@gmail.com', 'wahyu', 'wahyu', '2017-01-19', 'L', '81999589207', 'Jalan Tukad Yeh Aya Gang XI No 1 Renon', '000001', 'Denpasar', 80226);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`bayar_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `tb_cartdet`
--
ALTER TABLE `tb_cartdet`
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `user_username` (`user_username`),
  ADD KEY `user_username_2` (`user_username`);

--
-- Indexes for table `tb_pesanandet`
--
ALTER TABLE `tb_pesanandet`
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `tb_produkdet`
--
ALTER TABLE `tb_produkdet`
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`provinsi_id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indexes for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`tarif_id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_username`),
  ADD KEY `user_username` (`user_username`),
  ADD KEY `provinsi_id` (`provinsi_id`),
  ADD KEY `user_username_2` (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `bayar_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=939088;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD CONSTRAINT `tb_bayar_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `tb_pesanan` (`pesanan_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_cartdet`
--
ALTER TABLE `tb_cartdet`
  ADD CONSTRAINT `tb_cartdet_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_cartdet_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `tb_cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`user_username`) REFERENCES `tb_user` (`user_username`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pesanandet`
--
ALTER TABLE `tb_pesanandet`
  ADD CONSTRAINT `tb_pesanandet_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`produk_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pesanandet_ibfk_3` FOREIGN KEY (`pesanan_id`) REFERENCES `tb_pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_produkdet`
--
ALTER TABLE `tb_produkdet`
  ADD CONSTRAINT `tb_produkdet_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD CONSTRAINT `tb_tarif_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `tb_provinsi` (`provinsi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `tb_provinsi` (`provinsi_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
