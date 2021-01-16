-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2021 at 04:23 AM
-- Server version: 5.5.16
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibw01`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin@sibw.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_usr` int(11) NOT NULL,
  `nama_usr` varchar(40) NOT NULL,
  `log_usr` varchar(40) NOT NULL,
  `email_usr` varchar(40) NOT NULL,
  `pas_usr` varchar(40) NOT NULL,
  `almt_usr` varchar(40) NOT NULL,
  `kp_usr` char(8) NOT NULL,
  `kota_usr` varchar(40) NOT NULL,
  `tlp` varchar(40) NOT NULL,
  `rek` varchar(40) NOT NULL,
  `nmrek` varchar(40) NOT NULL,
  `bank` enum('Mandiri','BNI','CIMB','BCA','Bank Jabar','BRI','Danamon','Permata') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_usr`, `nama_usr`, `log_usr`, `email_usr`, `pas_usr`, `almt_usr`, `kp_usr`, `kota_usr`, `tlp`, `rek`, `nmrek`, `bank`) VALUES
(6, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '123456789', 'Yogyakarta', '55281', 'Sleman', '081361548172', '6624777999888', 'Yumita Colinstio', 'Mandiri'),
(8, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '12345678', 'Yogyakarta', '55281', 'Sleman', '081361548172', '6624777999888', 'Yumita Colinstio', 'Mandiri'),
(9, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '12345678', 'Yogyakarta', '55281', 'Sleman', '081361548172', '6624777999888', 'Yumita Colinstio', 'BRI'),
(10, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '12345678', 'Yogyakarta', '55281', 'Sleman', '081361548172', '6624777999888', 'Yumita Colinstio', 'BNI'),
(11, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '12345678', 'Yogyakarta', '55281', 'Sleman', '081361548172', '6624777999888', 'Yumita Colinstio', 'BCA'),
(12, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '12345678', 'Yogyakarta', '55281', 'Sleman', '081361548172', '6624777999888', 'Yumita Colinstio', 'BCA'),
(13, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '12345678', 'Yogyakarta', '55281', 'Sleman', '081361548172', '6624777999888', 'Yumita Colinstio', 'BCA'),
(15, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '12345678', 'Yogyakarta', '55281', 'Sleman', '081361548172', '6624777999888', 'Yumita Colinstio', 'Mandiri'),
(16, 'Satya Haruno', 'satya_haruno', 'satya@gmail.com', '12345678', 'Susukan', '53474', 'Banjarnegara', '088956620766', '6624777999222', 'Satya Haruno', 'BRI'),
(17, 'Customer1', 'customer_satu', 'customer1@gmail.com', '11111111', 'Parung', '55280', 'Bogor, Jawa Barat', '081361542211', '6624777999111', 'Customer1', 'Mandiri'),
(18, 'Customer2', 'customer_dua', 'customer2@gmail.com', '22222222', 'Dago', '77281', 'Bandung', '081361548122', '6624777999222', 'Customer2', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `detail_checkout`
--

CREATE TABLE `detail_checkout` (
  `id_detail_checkout` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_checkout`
--

INSERT INTO `detail_checkout` (`id_detail_checkout`, `checkout_id`, `produk_id`, `qty`) VALUES
(1, 1, 10, 1),
(2, 1, 21, 2),
(3, 2, 10, 1),
(4, 2, 21, 2),
(5, 3, 10, 1),
(6, 3, 21, 2),
(7, 0, 10, 1),
(8, 0, 21, 2),
(9, 4, 10, 1),
(10, 4, 21, 2),
(11, 5, 10, 1),
(12, 5, 21, 2),
(13, 6, 10, 1),
(14, 6, 21, 2),
(15, 7, 10, 1),
(16, 7, 21, 2),
(17, 8, 10, 1),
(18, 8, 21, 2),
(19, 9, 17, 1),
(20, 10, 17, 1),
(21, 11, 17, 2),
(22, 12, 17, 2),
(23, 13, 17, 2),
(24, 14, 17, 2),
(25, 15, 19, 2),
(26, 16, 21, 1),
(27, 17, 17, 1),
(28, 17, 13, 1),
(29, 18, 16, 1),
(30, 18, 15, 1),
(31, 18, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_usr` int(11) NOT NULL,
  `nama_usr` varchar(50) NOT NULL,
  `log_usr` varchar(255) NOT NULL,
  `email_usr` varchar(50) NOT NULL,
  `pas_usr` varchar(50) NOT NULL,
  `almt_usr` varchar(50) NOT NULL,
  `kp_usr` varchar(7) NOT NULL,
  `kota_usr` varchar(50) NOT NULL,
  `tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_usr`, `nama_usr`, `log_usr`, `email_usr`, `pas_usr`, `almt_usr`, `kp_usr`, `kota_usr`, `tlp`) VALUES
(2, 'Satya Haruno', 'satya_haruno', 'satya@gmail.com', '12345678', 'Banjarnegara', '55282', 'Sleman', '081361548172'),
(3, 'Yumita Colinstio', 'yumita_colinstio', 'colinstioyumita77@gmail.com', '77777777', 'Jogja', '55282', 'Sleman', '081361548172'),
(5, 'Customer1', '', 'customer1@gmail.com', '11111111', '', '', '', ''),
(6, 'Customer2', '', 'customer2@gmail.com', '22222222', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `no_pem` char(50) NOT NULL,
  `tgl_pem` date NOT NULL,
  `usr_pem` varchar(50) NOT NULL,
  `norek_pem` int(20) NOT NULL,
  `nmrek_pem` varchar(50) NOT NULL,
  `bankrek_pem` varchar(50) NOT NULL,
  `tot_pem` int(50) NOT NULL,
  `sts_pem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `no_pem`, `tgl_pem`, `usr_pem`, `norek_pem`, `nmrek_pem`, `bankrek_pem`, `tot_pem`, `sts_pem`) VALUES
(12, '20210109110103', '2021-01-09', 'Yumita Colinstio', 2147483647, 'Yumita Colinstio', 'BRI', 170000, 'Valid'),
(14, '20210109125506', '2021-01-09', 'Yumita Colinstio', 2147483647, 'Yumita Colinstio', 'BCA', 340000, 'Valid'),
(16, '20210109125756', '2021-01-09', 'Yumita Colinstio', 2147483647, 'Yumita Colinstio', 'BCA', 340000, 'Valid'),
(18, '20210109125917', '2021-01-09', 'Yumita Colinstio', 2147483647, 'Yumita Colinstio', 'Mandiri', 340000, 'Valid'),
(19, '20210111030229', '2021-01-11', 'Satya Haruno', 2147483647, 'Satya Haruno', 'BRI', 197000, 'Valid'),
(20, '20210111052707', '2021-01-11', 'Customer1', 2147483647, 'Customer1', 'Mandiri', 387000, 'Valid'),
(21, '20210111053114', '2021-01-11', 'Customer2', 2147483647, 'Customer2', 'BCA', 537000, 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `br_id` int(11) NOT NULL,
  `br_nm` varchar(100) DEFAULT NULL,
  `br_item` int(11) DEFAULT NULL,
  `br_hrg` double DEFAULT NULL,
  `br_stok` int(11) DEFAULT NULL,
  `br_satuan` varchar(20) DEFAULT NULL,
  `br_sts` char(1) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `br_kat` varchar(20) DEFAULT NULL,
  `br_gbr` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`br_id`, `br_nm`, `br_item`, `br_hrg`, `br_stok`, `br_satuan`, `br_sts`, `ket`, `br_kat`, `br_gbr`) VALUES
(10, 'Basic Shirt-Pink', 1, 177000, 17, 'Pcs', 'Y', 'Bahan Katun Toyobo, Style Casual, Produk Lokal', 'KD001', 'produk_img/basicshirt-dustypink.jpeg'),
(11, 'Basic Shirt-Olive', 1, 177000, 21, 'Pcs', 'Y', 'Bahan Katun Toyobo, Style Casual, Produk Lokal', 'KD001', 'produk_img/basicshirt-olive.jpeg'),
(12, 'Basic Shirt-Mustard', 1, 177000, 27, 'Pcs', 'Y', 'Bahan Katun Toyobo, Style Casual, Produk Lokal', 'KD001', 'produk_img/basicshirt-mustard.jpeg'),
(13, 'Linen Blazer-Blush', 1, 217000, 17, 'Pcs', 'Y', 'Bahan Linen, Style Casual, Produk Lokal', 'KD001', 'produk_img/linenblazer-blush.jpeg'),
(14, 'Linen Blazer-Navy', 1, 217000, 21, 'Pcs', 'Y', 'Bahan Linen, Style Casual, Produk Lokal', 'KD001', 'produk_img/linenblazer-navyblue.jpeg'),
(15, 'Linen Blazer-Olive', 1, 217000, 27, 'Pcs', 'Y', 'Bahan Linen, Style Casual, Produk Lokal', 'KD001', 'produk_img/linenblazer-goldenolive.jpeg'),
(16, 'Flat Shoes-Pink', 1, 170000, 11, 'Pcs', 'Y', 'Material SuÃ©de, Style Casual hingga Semi Formal, Produk Lokal', 'KD003', 'produk_img/flat_shoes-pink.jpeg'),
(17, 'Flat Shoes-Mustard', 1, 170000, 17, 'Pcs', 'Y', 'Material SuÃ©de, Style Casual hingga Semi Formal, Produk Lokal', 'KD003', 'produk_img/flat_shoes-mustard.jpeg'),
(18, 'Flat Shoes-Blue', 1, 170000, 15, 'Pcs', 'Y', 'Material SuÃ©de, Style Casual hingga Semi Formal, Produk Lokal', 'KD003', 'produk_img/flat_shoes-blue.jpeg'),
(19, 'Backpack Mini-Pink', 1, 170000, 7, 'Pcs', 'Y', 'Material Soft Faux Leather, Zipper Gold, Adjustable Strap, Bisa Digunakan Menjadi Model Ransel atau Sling Bag, Dimensi 25 x 20 x 9 cm', 'KD002', 'produk_img/backpack_mini-pink.jpeg'),
(20, 'Tote Bag-Latte', 1, 150000, 2, 'Pcs', 'Y', 'Material Faux Leather Kombinasi Canvas , Full Zipper, Kain Lapisan Dalam, Pocket Zipper, Dimensi 41,5 x 11 x 29 cm', 'KD002', 'produk_img/totebag-latte.jpeg'),
(21, 'Sling Bag-Ivory', 1, 197000, 8, 'Pcs', 'Y', 'Material Faux Leather Kombinasi Leather Texture , Include Pochette Removable, Style Casual', 'KD002', 'produk_img/hand_bag-ivory.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id` int(11) NOT NULL,
  `kategori_kode` varchar(15) DEFAULT NULL,
  `kategori_nama` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`id`, `kategori_kode`, `kategori_nama`) VALUES
(1, 'KD003', 'Flatshoes'),
(2, 'KD002', 'Tas'),
(3, 'KD001', 'Apparel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indexes for table `detail_checkout`
--
ALTER TABLE `detail_checkout`
  ADD PRIMARY KEY (`id_detail_checkout`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detail_checkout`
--
ALTER TABLE `detail_checkout`
  MODIFY `id_detail_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
