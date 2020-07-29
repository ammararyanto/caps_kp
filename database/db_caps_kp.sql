-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 05:08 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_caps_kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `tittle` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag` text NOT NULL,
  `picture` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `uploader` varchar(128) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `tittle`, `category_id`, `product_id`, `tag`, `picture`, `date_created`, `content`, `uploader`, `publish`) VALUES
(1, 'Lorem ipsum', 1, 0, '', 'default.jpg', 1566804847, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Masadi Dwi Kurniawan', 1),
(2, 'Lorem ipsum 2', 2, 1, '', 'default.jpg', 1566804847, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Masadi Dwi Kurniawan', 1),
(3, 'Lorem ipsum 3', 2, 1, '', 'default.jpg', 1566804847, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Masadi Dwi Kurniawan', 1),
(4, 'Contoh Blog', 1, 0, 'blog,okeh', 'ADBQ9913.JPG', 1566969297, '<p>$data[&#39;content&#39;] = $this-&gt;db-&gt;get(&#39;blog&#39;)-&gt;result_array();</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>$this-&gt;load-&gt;view(&#39;admin/header&#39;, $data);</p>\r\n\r\n<p>$this-&gt;load-&gt;view(&#39;admin/sidebar&#39;);</p>\r\n\r\n<p>$this-&gt;load-&gt;view(&#39;admin/topbar&#39;, $data);</p>\r\n\r\n<p>$this-&gt;load-&gt;view(&#39;admin/blog&#39;, $data);</p>\r\n\r\n<p>$this-&gt;load-&gt;view(&#39;admin/footer&#39;);</p>', 'Masadi Dwi Kurniawan', 1),
(5, 'Contoh Blog Tanpa Foto', 1, 0, 'oke', 'default.jpg', 1566984656, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Masadi Dwi Kurniawan', 1),
(6, 'iPhone Service', 2, 1, 'iPhone,Service', 'QDVR5880.JPG', 1566984761, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Masadi Dwi Kurniawan', 1),
(7, 'iPad Service', 2, 2, 'iPad,Contoh', 'PYHX6203.JPG', 1566984856, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Masadi Dwi Kurniawan', 1),
(8, 'MacBook Service', 2, 12, 'Macbook,Service Software', 'IMG_1788.JPG', 1566985379, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Masadi Dwi Kurniawan', 0),
(9, 'iWatch Service', 2, 14, 'iWatch', 'default.jpg', 1566985544, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Masadi Dwi Kurniawan', 0),
(10, 'iPod Service', 2, 0, 'iPod,Service', 'ESTX2617.JPG', 1566986052, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Masadi Dwi Kurniawan', 1),
(11, 'iMac Service', 2, 16, 'tag,imac,iservice', 'LIDA6223.JPG', 1566986764, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Masadi Dwi Kurniawan', 1),
(12, 'Coba Sekali Saja', 1, 0, 'coba', 'default.jpg', 1566987620, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Saitama Sensei', 0),
(13, 'iPhone Service 3', 2, 1, 'iphone,service,kamera,rusak,purwokerto', '240aef93508fb1cfed823fdb5ac23e2d.png', 1567394577, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Masadi Dwi Kurniawan', 1),
(14, 'Contoh Menulis Blog', 1, 0, 'blog,oke,keo', 'Annotation_2019-07-23_074019.png', 1567498820, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<hr />\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://[::1]/50eabe06-afb1-4e4d-9394-444fd8cfb5af\" width=\"1280\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'Saitama Sensei', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `category`) VALUES
(1, 'Blog'),
(2, 'Servis Software'),
(3, 'Servis Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `no_booking` int(11) NOT NULL,
  `id_booking` varchar(15) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `device` int(11) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `tanggal_booking` datetime NOT NULL,
  `tanggal_datang` datetime NOT NULL,
  `tanggal_closing` datetime NOT NULL,
  `kerusakan_awal` text NOT NULL,
  `kerusakan_final` text NOT NULL,
  `status` int(11) NOT NULL,
  `nominal` float NOT NULL,
  `sosmed` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`no_booking`, `id_booking`, `nama`, `device`, `no_hp`, `tanggal_input`, `tanggal_booking`, `tanggal_datang`, `tanggal_closing`, `kerusakan_awal`, `kerusakan_final`, `status`, `nominal`, `sosmed`, `keterangan`) VALUES
(1, 'BK001', 'Sarutobi', 13, '089123456789', '2020-07-07 19:58:16', '2020-07-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bubuarr sorr', '', 1, 0, 'IG', ''),
(2, 'BK001', 'Harada', 4, '089991991', '2020-07-07 20:00:14', '2020-07-24 10:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kecemplung', '', 1, 0, 'WA', ''),
(4, 'BK001', 'Pein', 34, '089772662778', '2020-07-08 09:04:47', '2020-07-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Laptop hilang', '', 1, 0, 'WA', ''),
(5, 'BK001', 'Itachi', 128, '088727626625', '2020-07-08 09:05:57', '2020-07-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Free Fire ngga ada pintunya', '', 1, 0, 'IG', ''),
(6, 'BK001', 'Tobi', 8, '082112342442', '2020-07-08 09:08:02', '2020-07-24 12:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Mati total', '', 1, 0, 'FB', ''),
(7, 'BK71020002', 'Ambur', 8, '087111222333', '2020-07-10 20:35:21', '2020-07-17 00:00:00', '0000-00-00 00:00:00', '2020-07-14 18:00:00', 'Retak', '', 5, 0, 'WA', ''),
(8, 'BK71320001', 'Ammar', 15, '089112334665', '2020-07-13 14:37:28', '2020-07-30 11:00:00', '0000-00-00 00:00:00', '2020-07-14 12:00:00', 'Tidak bisa cas, layar berminyat, body karatan', '', 5, 0, 'LINE', ''),
(9, 'BK71320002', 'Ammar2', 78, '089771661551', '2020-07-13 14:42:01', '2020-07-14 20:17:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Layar lepass', '', 2, 0, 'LINE', ''),
(10, 'BK71320003', 'Ammar2', 26, '089771661771', '2020-07-13 14:43:34', '2020-07-21 12:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Speaker keluar kenangan', '', 6, 0, 'IG', ''),
(11, 'BK71320004', 'Ammar', 17, '0899191919', '2020-07-13 14:50:32', '2020-07-13 20:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Retak', '', 1, 0, 'WA', ''),
(12, 'BK71320005', 'Aryanto', 37, '089123456789', '2020-07-13 14:51:37', '2020-07-13 10:49:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Hancur', '', 1, 0, 'WA', ''),
(13, 'BK71420001', 'Kakashi', 14, '089772772882', '2020-07-14 06:00:38', '2020-07-15 19:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Suara hilang', '', 3, 0, 'LINE', '');

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `nama_checklist` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `id_product`, `nama_checklist`) VALUES
(1, 1, 'Belum Pernah Bongkar'),
(2, 1, 'Sudah Pernah Bongkar'),
(3, 1, 'Tombol Volume'),
(4, 1, 'Switch Getar'),
(5, 1, 'Tombol Power'),
(6, 1, 'Tombol Home'),
(7, 1, 'Finger Print'),
(8, 1, 'Getar/Taptic Enggine'),
(9, 1, 'LCD'),
(10, 1, 'Touch Screen'),
(11, 1, '3D Touch'),
(12, 1, 'Kamera Depan'),
(13, 1, 'Kamera Belakang(Utama)'),
(14, 1, 'Kamera Belakang(Zoom)'),
(15, 1, 'Kamera Belakang(Wide)'),
(16, 1, 'Flash'),
(17, 1, 'Mic Bawah'),
(18, 1, 'Mic Kamera Depan'),
(19, 1, 'Mic Kamera Belakang'),
(20, 1, 'Speaker Telfon'),
(21, 1, 'Speaker Bawah'),
(22, 1, 'Sinyal'),
(23, 1, 'WiFi'),
(24, 1, 'Sensor Telfon(Proximity)'),
(25, 1, 'Jack Audio 3.5'),
(26, 1, 'Konektor Charger'),
(27, 1, 'Baut Bawah'),
(28, 2, 'Belum Pernah Bongkar'),
(29, 2, 'Sudah Pernah Bongkar'),
(30, 2, 'Touch Screen'),
(31, 2, 'Tombol Home'),
(32, 2, 'Tombol Volume'),
(33, 2, 'Switch Rotasi'),
(34, 2, 'Speaker'),
(35, 2, 'WiFi'),
(36, 12, 'Sudah Pernah Bongkar'),
(37, 12, 'Belum Pernah Bongkar'),
(38, 12, 'Mati'),
(39, 12, 'Nyala'),
(40, 21, 'Sudah Pernah Bongkar');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_stock`
--

CREATE TABLE `log_stock` (
  `id_logstock` int(11) NOT NULL,
  `user` varchar(256) NOT NULL,
  `tanggal_diubah` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_transaksi`
--

CREATE TABLE `log_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  `sPembayaran` int(11) NOT NULL,
  `sPengerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_transaksi`
--

INSERT INTO `log_transaksi` (`id`, `id_transaksi`, `id_user`, `datetime`, `sPembayaran`, `sPengerjaan`) VALUES
(127, 40520001, 0, 1586066474, 99, 1),
(128, 40520001, 0, 1586066905, 99, 2),
(129, 40520001, 0, 1586066945, 99, 4),
(130, 40520001, 0, 1586066970, 99, 5),
(131, 40520001, 0, 1586067191, 2, 5),
(132, 40520001, 0, 1586067222, 99, 99),
(133, 40520002, 0, 1586067259, 99, 1),
(134, 40520002, 0, 1586067380, 99, 2),
(135, 40520002, 0, 1586067413, 99, 3),
(136, 40520002, 0, 1586067467, 99, 4),
(137, 40520002, 0, 1586067473, 99, 5),
(138, 40520002, 0, 1586067944, 99, 99),
(139, 40520003, 0, 1586069210, 99, 99),
(140, 40520004, 0, 1586069400, 1, 1),
(141, 40520004, 0, 1586072681, 1, 2),
(142, 40520004, 0, 1586072691, 1, 4),
(143, 40520005, 0, 1586075573, 99, 99),
(144, 40520006, 0, 1586078298, 99, 1),
(145, 40520006, 0, 1586078519, 99, 2),
(146, 40520006, 0, 1586078908, 99, 3),
(147, 40520006, 0, 1586078993, 99, 4),
(148, 40520007, 0, 1586078978, 99, 99),
(149, 40520004, 0, 1586079451, 2, 4),
(150, 40520006, 0, 1586079985, 99, 5),
(151, 40520004, 0, 1586080240, 2, 5),
(152, 40520006, 0, 1586080299, 99, 99),
(153, 40520004, 0, 1586080315, 99, 99),
(154, 40520008, 0, 1586082749, 99, 1),
(155, 40520008, 0, 1586083159, 99, 2),
(156, 40520008, 0, 1586083317, 99, 3),
(157, 40520008, 0, 1586083338, 99, 4),
(158, 40520008, 0, 1586085772, 99, 5),
(159, 40520008, 0, 1586085788, 99, 99),
(160, 40820009, 0, 1586339837, 99, 99),
(161, 40920010, 0, 1586416283, 99, 99),
(162, 40920011, 0, 1586416388, 99, 99),
(163, 40720012, 0, 1586246425, 99, 99),
(164, 40920013, 0, 1586425473, 1, 1),
(165, 40920014, 0, 1586425979, 1, 1),
(166, 40920015, 0, 1586426096, 1, 1),
(167, 40920013, 0, 1586484340, 1, 2),
(168, 40920013, 0, 1586484348, 1, 4),
(169, 40920015, 0, 1586484404, 1, 2),
(170, 40920015, 0, 1586484684, 1, 3),
(171, 40920015, 0, 1586484725, 1, 4),
(172, 40920015, 0, 1586484773, 1, 2),
(173, 40920015, 0, 1586485061, 1, 4),
(174, 40920013, 0, 1586485131, 1, 5),
(175, 40920015, 0, 1586485135, 1, 5),
(176, 40920015, 0, 1586485174, 99, 99),
(177, 40920013, 0, 1586485227, 99, 99),
(180, 41020016, 1, 1586487357, 99, 1),
(181, 40920014, 1, 1586488941, 1, 2),
(182, 40920014, 1, 1586488957, 1, 4),
(183, 40920014, 1, 1586488961, 1, 5),
(184, 40920014, 1, 1586488962, 1, 4),
(185, 40920014, 1, 1586489025, 1, 5),
(186, 41020016, 1, 1586489103, 99, 2),
(187, 41020016, 1, 1586489108, 99, 4),
(188, 41020016, 1, 1586489117, 99, 5),
(189, 41020016, 0, 1586489446, 99, 99),
(190, 40920014, 0, 1586489481, 99, 99),
(191, 41120017, 1, 1586597214, 1, 1),
(192, 41120017, 0, 1586597573, 2, 1),
(193, 41120018, 1, 1586600859, 99, 1),
(194, 41120017, 19, 1586601140, 2, 2),
(195, 41120017, 19, 1586601144, 2, 4),
(196, 41120017, 19, 1586601147, 2, 5),
(197, 41120018, 1, 1586601177, 99, 2),
(198, 41120018, 1, 1586601181, 99, 4),
(199, 41120018, 1, 1586601185, 99, 5),
(200, 41120019, 1, 1586601189, 99, 1),
(201, 41120019, 19, 1586601267, 99, 2),
(202, 41120019, 19, 1586601271, 99, 4),
(203, 41120019, 19, 1586601275, 99, 5),
(204, 41120019, 0, 1586601329, 99, 99),
(205, 41120018, 0, 1586601370, 99, 99),
(206, 41120017, 0, 1586601403, 99, 99),
(207, 41220020, 1, 1586665282, 99, 1),
(208, 41220002, 1, 1586668391, 99, 1),
(209, 41220003, 1, 1586668492, 99, 1),
(210, 41220002, 19, 1586668673, 99, 2),
(211, 41220002, 19, 1586668687, 99, 4),
(212, 41220002, 19, 1586668692, 99, 5),
(213, 41220020, 19, 1586668702, 99, 2),
(214, 41220020, 19, 1586668705, 99, 4),
(215, 41220020, 19, 1586668708, 99, 5),
(216, 41220003, 1, 1586668726, 99, 2),
(217, 41220003, 1, 1586668730, 99, 4),
(218, 41220003, 1, 1586668733, 99, 5),
(219, 41220020, 0, 1586668764, 99, 99),
(220, 41220003, 0, 1586668788, 99, 99),
(221, 41220002, 0, 1586668811, 99, 99),
(222, 41220004, 1, 1586684777, 99, 1),
(223, 41220004, 1, 1586684855, 99, 2),
(224, 41220004, 1, 1586684859, 99, 4),
(225, 41220004, 1, 1586684873, 99, 5),
(226, 41220004, 0, 1586684975, 99, 99),
(227, 41520001, 1, 1586949308, 99, 1),
(228, 41520001, 1, 1586950027, 99, 2),
(229, 41520001, 1, 1586950031, 99, 4),
(230, 41520001, 19, 1586950465, 99, 5),
(231, 41520002, 1, 1586951236, 1, 1),
(232, 41520003, 1, 1586951297, 99, 1),
(233, 41520004, 1, 1586951331, 99, 1),
(234, 41520002, 1, 1586951376, 1, 2),
(235, 41520002, 1, 1586951381, 1, 4),
(236, 41520003, 1, 1586951400, 99, 2),
(237, 41520005, 1, 1586951412, 99, 1),
(238, 41520004, 1, 1586951459, 99, 2),
(239, 41520003, 1, 1586951752, 99, 3),
(240, 41520003, 19, 1586955398, 99, 4),
(241, 41520003, 1, 1586955409, 99, 5),
(242, 41520002, 1, 1586955428, 1, 5),
(243, 41520004, 19, 1586955440, 99, 4),
(244, 41520004, 1, 1586955454, 99, 5),
(245, 41520005, 19, 1586955584, 99, 2),
(246, 41520005, 19, 1586955880, 99, 4),
(247, 41520005, 1, 1586955898, 99, 5),
(248, 41520006, 1, 1586956012, 99, 1),
(249, 41520006, 19, 1586956051, 99, 2),
(250, 41520006, 19, 1586956057, 99, 4),
(251, 41520006, 1, 1586956101, 99, 5),
(252, 41620001, 1, 1587020806, 99, 1),
(253, 41620001, 1, 1587027455, 99, 2),
(254, 41620001, 1, 1587027459, 99, 6),
(255, 41620001, 0, 1587027481, 3, 99),
(256, 41620002, 1, 1587027692, 99, 1),
(257, 41620002, 1, 1587027822, 99, 2),
(258, 41620002, 1, 1587027836, 99, 6),
(259, 41620002, 0, 1587027851, 3, 99),
(260, 41620003, 1, 1587028806, 99, 99),
(262, 41820001, 1, 1587196827, 1, 1),
(263, 41820002, 1, 1587198241, 1, 1),
(264, 41820003, 1, 1587198453, 1, 1),
(265, 41820004, 1, 1587198579, 1, 1),
(266, 41820003, 1, 1587200418, 1, 2),
(267, 41820001, 1, 1587202139, 1, 2),
(268, 50720001, 1, 1588828097, 1, 1),
(269, 50720001, 1, 1588828934, 1, 2),
(270, 50720001, 1, 1588828965, 1, 4),
(271, 50720001, 1, 1588829015, 1, 5),
(272, 50820001, 20, 1588913825, 1, 1),
(273, 50820002, 20, 1588913936, 1, 1),
(274, 50820003, 20, 1588914240, 1, 1),
(275, 50820001, 20, 1588914395, 1, 2),
(276, 50820001, 20, 1588914428, 1, 3),
(277, 50820001, 20, 1588914459, 1, 4),
(278, 50820003, 20, 1588928597, 1, 2),
(279, 50820002, 20, 1588928636, 1, 2),
(280, 50820002, 20, 1588928682, 1, 4),
(281, 50820003, 20, 1588928700, 1, 4),
(282, 41820001, 20, 1588928716, 1, 3),
(283, 41820003, 20, 1588928724, 1, 3),
(284, 50820001, 20, 1588928755, 1, 5),
(285, 50820002, 20, 1588928876, 1, 5),
(286, 50820003, 20, 1589002618, 1, 5),
(287, 41820003, 20, 1589002642, 1, 4),
(288, 41820003, 20, 1589002684, 1, 5),
(289, 50920001, 20, 1589002746, 1, 1),
(290, 50920001, 20, 1589002924, 1, 2),
(291, 50920001, 20, 1589002933, 1, 4),
(292, 50920001, 20, 1589002941, 1, 5),
(293, 50920002, 20, 1589003258, 1, 1),
(294, 50920002, 20, 1589003357, 1, 2),
(295, 50920002, 20, 1589003374, 1, 4),
(296, 50920003, 20, 1589013206, 1, 1),
(297, 51220001, 20, 1589269635, 1, 1),
(298, 51220001, 20, 1589269717, 1, 2),
(299, 51220001, 20, 1589269735, 1, 4),
(300, 51220001, 20, 1589269882, 1, 5),
(301, 50920002, 20, 1589269947, 1, 5),
(302, 41820001, 20, 1589273210, 1, 4),
(303, 41820001, 20, 1589273216, 1, 5),
(304, 50920003, 20, 1589385918, 1, 2),
(305, 50920003, 20, 1589385925, 1, 4),
(306, 50920003, 20, 1589385930, 1, 5),
(307, 41820004, 1, 1589389061, 1, 2),
(308, 41820004, 1, 1589389071, 1, 4),
(309, 41820004, 1, 1589389079, 1, 5),
(310, 51420001, 20, 1589424339, 1, 1),
(311, 51420001, 20, 1589425011, 1, 2),
(312, 51420001, 20, 1589425018, 1, 4),
(313, 51420001, 20, 1589425026, 1, 5),
(314, 51420001, 1, 1589425171, 1, 4),
(315, 51420001, 1, 1589425177, 1, 5),
(316, 51420002, 20, 1589425262, 1, 1),
(317, 51420002, 20, 1589425332, 1, 2),
(318, 51420002, 20, 1589425339, 1, 4),
(319, 51420002, 20, 1589425343, 1, 5),
(320, 41820002, 1, 1589609223, 1, 2),
(321, 41820002, 1, 1589609228, 1, 4),
(322, 41820002, 1, 1589609233, 1, 5),
(323, 51620001, 20, 1589610706, 1, 1),
(324, 51620002, 20, 1589610742, 1, 1),
(325, 51620001, 1, 1589610827, 1, 2),
(326, 51620002, 1, 1589610850, 1, 2),
(327, 51620001, 1, 1589610885, 1, 4),
(328, 51620001, 22, 1589614068, 1, 6),
(329, 51620002, 22, 1589614219, 1, 4),
(330, 51620002, 22, 1589614224, 1, 5),
(331, 51420002, 22, 1589614681, 1, 2),
(332, 51620001, 20, 1589638736, 1, 6),
(333, 51620001, 20, 1589638983, 1, 5),
(334, 51620001, 20, 1589639042, 1, 6),
(335, 51620001, 20, 1589639824, 1, 5),
(336, 51620001, 22, 1589639995, 1, 6),
(337, 51420002, 22, 1589640031, 1, 6),
(338, 51620001, 22, 1589640212, 1, 5),
(339, 51420002, 22, 1589640242, 1, 6),
(340, 51620002, 22, 1589640262, 1, 6),
(341, 51820001, 20, 1589784265, 1, 1),
(342, 51820002, 20, 1589784402, 1, 1),
(343, 51820003, 20, 1589784455, 1, 1),
(344, 51820004, 20, 1589784512, 1, 1),
(345, 51820001, 1, 1589784656, 1, 2),
(346, 51820002, 1, 1589784693, 1, 2),
(347, 51820003, 1, 1589784731, 1, 2),
(348, 51820004, 1, 1589784758, 1, 2),
(349, 51820001, 1, 1589784769, 1, 4),
(350, 51820001, 1, 1589784779, 1, 5),
(351, 51820002, 1, 1589784802, 1, 6),
(352, 51820003, 1, 1589784813, 1, 4),
(353, 51820003, 1, 1589784819, 1, 5),
(354, 51820004, 22, 1589784849, 1, 4),
(355, 51820004, 22, 1589784855, 1, 5),
(356, 51820005, 20, 1589784884, 1, 1),
(357, 51820005, 22, 1589784990, 1, 2),
(358, 51820005, 22, 1589785008, 1, 4),
(359, 51820005, 22, 1589785035, 1, 6),
(360, 51820005, 20, 1589812400, 1, 6),
(361, 51820005, 22, 1589812684, 1, 5),
(362, 41520002, 1, 1590053037, 1, 5),
(363, 41520003, 1, 1590053048, 99, 6),
(364, 41520001, 1, 1590053063, 99, 4),
(365, 41520001, 1, 1590053073, 99, 5),
(366, 41220020, 22, 1590053100, 99, 4),
(367, 41220020, 22, 1590053107, 99, 5),
(368, 51820003, 20, 1590069767, 1, 2),
(369, 51820003, 20, 1590070676, 1, 3),
(370, 52120001, 20, 1590071108, 1, 1),
(371, 52120001, 22, 1590071597, 1, 2),
(372, 51820003, 22, 1590984487, 1, 4),
(373, 51820003, 22, 1590984492, 1, 5),
(374, 52120001, 20, 1590988382, 1, 4),
(375, 52120001, 20, 1590988387, 1, 5),
(376, 52120001, 20, 1590992627, 1, 2),
(377, 52120001, 20, 1590992656, 1, 4),
(378, 52120001, 20, 1591087432, 1, 2),
(379, 52120001, 20, 1591087444, 1, 4),
(380, 52120001, 20, 1591111164, 1, 2),
(381, 52120001, 20, 1591112926, 1, 6),
(382, 51820004, 20, 1591113723, 1, 2),
(383, 51820004, 20, 1591113991, 1, 4),
(384, 51820004, 20, 1591114089, 1, 6),
(385, 52120001, 20, 1591114410, 1, 6),
(386, 51820005, 20, 1591144247, 1, 2),
(387, 51820005, 20, 1591145285, 1, 4),
(388, 51820005, 20, 1591145310, 1, 2),
(389, 51820005, 20, 1591145321, 1, 4),
(390, 51820005, 20, 1591145328, 1, 6),
(391, 51820005, 20, 1591152804, 1, 6),
(392, 51820003, 20, 1591152909, 1, 6),
(393, 51820005, 20, 1591153181, 1, 6),
(394, 52120001, 20, 1591153351, 1, 2),
(395, 52120001, 20, 1591153364, 1, 4),
(396, 52120001, 20, 1591153375, 1, 6),
(397, 52120001, 20, 1591153462, 1, 6),
(398, 51820005, 20, 1591161458, 1, 2),
(399, 51820005, 20, 1591161477, 1, 4),
(400, 51820005, 20, 1591162098, 1, 2),
(401, 51820005, 20, 1591162163, 1, 4),
(402, 51820005, 20, 1591162171, 1, 2),
(403, 51820005, 20, 1591178131, 1, 4),
(404, 51820005, 20, 1591178186, 1, 2),
(405, 51820005, 20, 1591190387, 1, 4),
(406, 60320001, 20, 1591192798, 1, 1),
(407, 60320001, 20, 1591192984, 1, 2),
(408, 60320001, 20, 1591193132, 1, 6),
(409, 60520001, 20, 1591350531, 1, 1),
(410, 60520001, 20, 1591350911, 1, 2),
(411, 60520002, 20, 1591350926, 1, 1),
(412, 60520002, 20, 1591351194, 1, 2),
(413, 60520001, 20, 1591351211, 1, 4),
(414, 60520002, 20, 1591351277, 1, 4),
(415, 60520002, 20, 1591351321, 1, 5),
(416, 60520001, 20, 1591351366, 1, 6),
(417, 51820005, 20, 1591418063, 1, 2),
(418, 51820005, 20, 1591418071, 1, 4),
(419, 60520002, 20, 1591669975, 1, 4),
(420, 60920001, 20, 1591687162, 1, 1),
(421, 51820005, 20, 1591772525, 1, 5),
(422, 60520002, 20, 1591772763, 1, 5),
(423, 60920001, 20, 1591951333, 1, 2),
(424, 51820001, 22, 1591952101, 1, 2),
(425, 51420001, 22, 1591954367, 1, 2),
(426, 51820001, 22, 1591954384, 1, 4),
(427, 51420001, 22, 1591954398, 1, 4),
(428, 51620001, 22, 1591954440, 1, 2),
(429, 51620002, 22, 1591954732, 1, 2),
(430, 50920003, 20, 1591957135, 1, 2),
(431, 60920001, 20, 1591957143, 1, 4),
(432, 60920001, 20, 1591957157, 1, 5),
(433, 60920001, 0, 1591957201, 99, 99),
(434, 51220001, 20, 1591965784, 1, 2),
(435, 50920003, 20, 1591965817, 1, 4),
(436, 50920003, 20, 1591965823, 1, 5),
(437, 61220001, 20, 1591966877, 1, 1),
(438, 61220001, 20, 1591966930, 1, 2),
(439, 61220001, 20, 1591969813, 1, 4),
(440, 61220001, 20, 1591969822, 1, 5),
(441, 61320001, 20, 1592029702, 1, 1),
(442, 61320001, 22, 1592029797, 1, 2),
(443, 61320001, 22, 1592030027, 1, 4),
(444, 61320001, 22, 1592031061, 1, 5),
(445, 61320002, 20, 1592031223, 1, 1),
(446, 61320002, 20, 1592031327, 1, 2),
(447, 61320002, 20, 1592031351, 1, 4),
(448, 61320003, 20, 1592031377, 1, 1),
(449, 61320003, 20, 1592031437, 1, 2),
(450, 61920001, 20, 1592550077, 1, 1),
(451, 61920001, 20, 1592550850, 1, 2),
(452, 61920001, 20, 1592551978, 1, 4),
(453, 61920001, 20, 1592552001, 1, 2),
(454, 61920001, 20, 1592553196, 1, 4),
(455, 61320003, 20, 1592632764, 1, 4),
(456, 61920001, 20, 1592634452, 1, 2),
(457, 61920001, 20, 1592634552, 1, 4),
(458, 61320003, 20, 1592646223, 1, 2),
(459, 61320003, 20, 1592646236, 1, 6),
(460, 62020001, 20, 1592646440, 1, 1),
(461, 62020001, 20, 1592646587, 1, 2),
(462, 62020001, 20, 1592646593, 1, 4),
(463, 62020001, 20, 1592646752, 1, 6),
(464, 62020002, 20, 1592646849, 1, 1),
(465, 62020002, 20, 1592646995, 1, 2),
(466, 62020002, 20, 1592647026, 1, 4),
(467, 62020002, 20, 1592657602, 1, 2),
(468, 61920001, 20, 1592713934, 1, 2),
(469, 61920001, 20, 1592714047, 1, 4),
(470, 61920001, 20, 1592721284, 1, 2),
(471, 61920001, 20, 1592721510, 1, 4),
(472, 61920001, 20, 1592723453, 1, 2),
(473, 61920001, 20, 1592723585, 1, 4),
(474, 62020002, 20, 1592734122, 1, 4),
(475, 62020002, 20, 1592734156, 1, 2),
(476, 61920001, 20, 1592736894, 1, 2),
(477, 62020002, 20, 1592738130, 1, 4),
(478, 60520002, 0, 1592883209, 2, 5),
(479, 61920001, 20, 1592883259, 1, 3),
(480, 61920001, 20, 1592883549, 1, 4),
(481, 62320001, 20, 1592884110, 1, 1),
(482, 62320001, 20, 1592884990, 1, 2),
(483, 62320001, 20, 1592885002, 1, 3),
(484, 62320001, 20, 1592885140, 1, 4),
(485, 62320001, 20, 1592885325, 1, 6),
(486, 62320002, 20, 1592885589, 1, 1),
(487, 62320002, 20, 1592885786, 1, 2),
(488, 62320002, 20, 1592885795, 1, 4),
(489, 62320002, 20, 1592885936, 1, 5),
(490, 62320003, 20, 1592886048, 1, 1),
(491, 62320003, 20, 1592886329, 1, 2),
(492, 62320003, 20, 1592886343, 1, 4),
(493, 62320003, 20, 1592886410, 1, 5),
(494, 62320004, 20, 1592893348, 1, 1),
(495, 62320004, 20, 1592893549, 1, 2),
(496, 62320004, 20, 1592893567, 1, 3),
(497, 62320004, 20, 1592893593, 1, 4),
(498, 62320004, 20, 1592897322, 1, 2),
(499, 62320004, 20, 1592897361, 1, 4),
(500, 62320004, 20, 1592897529, 1, 5),
(501, 62320005, 20, 1592906138, 1, 1),
(502, 62320005, 22, 1592906358, 1, 2),
(503, 62320005, 20, 1592906667, 1, 3),
(504, 51220001, 20, 1592906888, 1, 3),
(505, 62320006, 20, 1592907858, 1, 1),
(506, 62320006, 22, 1592909160, 1, 2),
(507, 62320006, 20, 1592909209, 1, 3),
(508, 62320006, 22, 1592909299, 1, 4),
(509, 62320006, 22, 1592909358, 1, 5),
(510, 62320007, 20, 1592913288, 1, 1),
(511, 62320007, 22, 1592913434, 1, 2),
(512, 62320007, 22, 1592913508, 1, 4),
(513, 62320007, 22, 1592913853, 1, 4),
(514, 62320007, 22, 1592914094, 1, 5),
(515, 62320007, 22, 1592914188, 1, 4),
(516, 62320007, 22, 1592914206, 1, 5),
(517, 62320007, 22, 1592914288, 1, 4),
(518, 62320007, 22, 1592914294, 1, 5),
(519, 62320007, 22, 1592914371, 1, 4),
(520, 62320007, 22, 1592914428, 1, 5),
(521, 62320007, 22, 1592914490, 1, 6),
(522, 62320005, 22, 1592995592, 1, 62320005),
(523, 60520002, 20, 1593006044, 2, 4),
(524, 60520002, 22, 1593006080, 1, 60520002),
(525, 60520002, 22, 1593006151, 2, 2),
(526, 60520002, 22, 1593006175, 2, 4),
(527, 60520002, 22, 1593006189, 2, 5),
(528, 62520001, 20, 1593067796, 1, 1),
(529, 62520002, 20, 1593068300, 1, 1),
(530, 62020002, 20, 1593080726, 1, 5),
(531, 62520001, 20, 1593089078, 1, 1),
(532, 62520002, 20, 1593090117, 1, 1),
(533, 62520003, 20, 1593090204, 1, 1),
(534, 62520001, 20, 1593090862, 1, 2),
(535, 62520001, 20, 1593090876, 1, 2),
(536, 62520001, 20, 1593090894, 1, 2),
(537, 62520001, 20, 1593090938, 1, 2),
(538, 62520001, 20, 1593090968, 1, 2),
(539, 62520001, 20, 1593091069, 1, 4),
(540, 62520001, 20, 1593091098, 1, 5),
(541, 62520003, 20, 1593142306, 1, 2),
(542, 62520002, 20, 1593142371, 1, 2),
(543, 62620001, 20, 1593142480, 1, 1),
(544, 62620001, 20, 1593142541, 1, 2),
(545, 52120001, 20, 1593142604, 1, 4),
(546, 52120001, 20, 1593142617, 1, 2),
(547, 52120001, 20, 1593142630, 1, 4),
(548, 52120001, 20, 1593142863, 1, 2),
(549, 61920001, 20, 1593142997, 1, 2),
(550, 52120001, 20, 1593143033, 1, 4),
(551, 52120001, 20, 1593143043, 1, 2),
(552, 52120001, 20, 1593143059, 1, 4),
(553, 62620002, 20, 1593157876, 1, 1),
(554, 62620001, 22, 1593162335, 1, 62620001),
(555, 61320001, 20, 1593164400, 1, 6),
(556, 61320002, 20, 1593164448, 2, 2),
(557, 61320002, 20, 1593164453, 2, 4),
(558, 61320002, 20, 1593164503, 2, 6),
(559, 52120001, 20, 1593164985, 1, 6),
(560, 62520003, 20, 1593173478, 1, 4),
(561, 62520003, 20, 1593173487, 1, 5),
(562, 60520001, 20, 1593226314, 1, 4),
(563, 62720001, 20, 1593227493, 1, 1),
(564, 62720002, 20, 1593227554, 1, 1),
(565, 62720003, 20, 1593227699, 1, 1),
(566, 62720004, 20, 1593227747, 1, 1),
(567, 62720001, 20, 1593228178, 1, 2),
(568, 62720001, 1, 1593228285, 1, 3),
(569, 62720001, 20, 1593228309, 1, 4),
(570, 62720001, 20, 1593228402, 1, 6),
(571, 62720002, 20, 1593228560, 1, 2),
(572, 62720002, 1, 1593228599, 1, 3),
(573, 62720002, 20, 1593228626, 1, 4),
(574, 62720002, 20, 1593228771, 1, 6),
(575, 62720003, 22, 1593229165, 1, 2),
(576, 62720003, 20, 1593229211, 1, 3),
(577, 62720003, 22, 1593229255, 1, 4),
(578, 62720003, 22, 1593229402, 1, 5),
(579, 62720004, 22, 1593229491, 1, 2),
(580, 62720004, 1, 1593229595, 1, 3),
(581, 62720004, 22, 1593229717, 1, 4),
(582, 62720004, 22, 1593229803, 1, 5),
(583, 62720005, 1, 1593249425, 1, 1),
(584, 62720005, 22, 1593249529, 1, 2),
(585, 62720005, 20, 1593249595, 1, 3),
(586, 62720005, 22, 1593249781, 1, 4),
(587, 62720005, 22, 1593249798, 1, 5),
(588, 62720006, 1, 1593266965, 1, 1),
(589, 51820001, 22, 1593267167, 1, 2),
(590, 51820001, 1, 1593267319, 1, 3),
(591, 51820001, 22, 1593267416, 1, 4),
(592, 51820001, 22, 1593267504, 1, 2),
(593, 51820001, 22, 1593267516, 1, 4),
(594, 51820001, 22, 1593267537, 1, 5),
(595, 61320003, 0, 1593330042, 1, 61320003),
(596, 62720006, 20, 1593330106, 1, 2),
(597, 62320001, 0, 1593338255, 1, 62320001),
(598, 62320001, 20, 1593339032, 1, 62320001),
(599, 62320005, 20, 1593339666, 1, 62320005),
(600, 51620001, 20, 1593339848, 1, 51620001),
(601, 62620001, 22, 1593498576, 1, 4),
(602, 62620001, 22, 1593498605, 1, 5),
(603, 62620002, 22, 1593498821, 1, 2),
(604, 62620002, 1, 1593498986, 1, 3),
(605, 62620002, 20, 1593499144, 1, 62620002),
(606, 62620002, 20, 1593499221, 1, 4),
(607, 62620002, 20, 1593499271, 1, 5),
(608, 63020001, 20, 1593500483, 1, 1),
(609, 63020001, 20, 1593500880, 1, 2),
(610, 63020001, 20, 1593501394, 1, 4),
(611, 63020001, 20, 1593501418, 1, 2),
(612, 63020001, 20, 1593501473, 1, 4),
(613, 63020001, 20, 1593501527, 1, 5),
(614, 63020001, 20, 1593501766, 1, 5),
(615, 63020001, 20, 1593501826, 1, 5),
(616, 63020001, 0, 1593501929, 2, 5),
(617, 63020001, 0, 1593501999, 99, 99),
(618, 62720006, 0, 1593503006, 2, 2),
(619, 61320003, 20, 1593601735, 1, 6),
(620, 60520001, 22, 1593601775, 1, 60520001),
(621, 60520001, 22, 1593601800, 1, 5),
(622, 51420001, 22, 1593602060, 1, 5),
(623, 51420001, 22, 1593602245, 1, 5),
(624, 51620001, 20, 1593667827, 1, 3),
(625, 62720006, 20, 1593709612, 2, 4),
(626, 51620001, 20, 1593710291, 1, 4),
(627, 51620001, 20, 1593710311, 1, 2),
(628, 51620001, 20, 1593710320, 1, 4),
(629, 62720006, 20, 1593711805, 2, 6),
(630, 51620001, 22, 1593759555, 1, 51620001),
(631, 51220001, 22, 1593759725, 1, 4),
(632, 51620001, 22, 1593759756, 1, 2),
(633, 51620001, 22, 1593759774, 1, 4),
(634, 51620001, 22, 1593759806, 1, 5),
(635, 62320005, 20, 1593771502, 1, 4),
(636, 62320005, 20, 1593771512, 1, 5),
(637, 62320001, 20, 1593845017, 1, 4),
(638, 62320001, 22, 1593854182, 1, 62320001),
(639, 70420001, 20, 1593859419, 1, 1),
(640, 70420001, 20, 1593864371, 1, 1),
(641, 70420001, 20, 2020, 1, 1),
(642, 70420002, 20, 2020, 1, 1),
(643, 70420003, 20, 2020, 1, 1),
(644, 70420001, 20, 2020, 1, 1),
(645, 70420002, 20, 2020, 1, 1),
(646, 70420003, 20, 2020, 1, 1),
(647, 70420002, 20, 1593865864, 1, 2),
(648, 70520004, 20, 2020, 1, 1),
(649, 70620001, 20, 1594007474, 1, 1),
(650, 70620002, 20, 1594007851, 1, 1),
(651, 70620003, 20, 1594007989, 1, 1),
(652, 70620001, 20, 1594009158, 1, 2),
(653, 70620001, 1, 1594009445, 1, 3),
(654, 70620001, 22, 1594009502, 1, 70620001),
(655, 70620001, 22, 1594009555, 1, 4),
(656, 70620001, 22, 1594009682, 1, 5),
(657, 70620001, 1, 1594009875, 2, 5),
(658, 62520002, 20, 1594015063, 1, 4),
(659, 62520002, 20, 1594015132, 1, 6),
(660, 61920001, 20, 1594015496, 1, 4),
(661, 61920001, 20, 1594015506, 1, 5),
(662, 70620002, 20, 1594015863, 1, 2),
(663, 70620002, 20, 1594015882, 1, 4),
(664, 70620002, 20, 1594015895, 1, 5),
(665, 70620003, 20, 1594088571, 1, 2),
(666, 70620003, 1, 1594089200, 1, 3),
(667, 70620003, 20, 1594089266, 1, 4),
(668, 70620003, 22, 1594089851, 1, 70620003),
(669, 70620003, 20, 1594103245, 1, 1),
(670, 70620003, 22, 1594103328, 1, 4),
(671, 62320001, 20, 1594103382, 1, 4),
(672, 70620003, 20, 1594103418, 1, 4),
(673, 70620003, 20, 1594106965, 1, 5),
(674, 70420002, 20, 1594208934, 1, 4),
(675, 70420002, 20, 1594208944, 1, 5),
(676, 62320001, 20, 1594208960, 1, 6),
(677, 70420002, 20, 1594209231, 2, 5),
(678, 70420002, 20, 1594209598, 99, 99),
(679, 70420002, 20, 1594209788, 2, 99),
(680, 70820001, 20, 1594211094, 1, 1),
(681, 70820001, 20, 1594211340, 1, 2),
(682, 70820001, 20, 1594211471, 1, 4),
(683, 70820001, 20, 1594214659, 1, 5),
(684, 70820001, 20, 1594214725, 99, 99),
(685, 70820001, 20, 1594216245, 2, 1),
(686, 70820001, 20, 1594251065, 2, 1),
(687, 70820001, 20, 1594251077, 2, 1),
(688, 70820001, 20, 1594251171, 2, 1),
(689, 70620003, 20, 1594256243, 2, 5),
(690, 70620003, 20, 1594256597, 99, 5),
(691, 70620002, 20, 1594257299, 2, 5),
(692, 70620002, 20, 1594258599, 2, 5),
(693, 70620002, 20, 1594258614, 99, 5),
(694, 62020001, 20, 1594258755, 1, 4),
(695, 62020001, 20, 1594258775, 1, 2),
(696, 62020001, 20, 1594258780, 1, 4),
(697, 62020001, 20, 1594258793, 1, 5),
(698, 62020001, 20, 1594259055, 2, 5),
(699, 70820001, 20, 1594259411, 2, 2),
(700, 70820001, 20, 1594259435, 2, 2),
(701, 70520004, 20, 1594279175, 1, 2),
(702, 70520004, 1, 1594279309, 1, 3),
(703, 70520004, 20, 1594279363, 1, 4),
(704, 70520004, 20, 1594279476, 1, 5),
(705, 70520004, 20, 1594279910, 2, 5),
(706, 70520004, 20, 1594280189, 2, 5),
(707, 70520004, 20, 1594280324, 1, 5),
(708, 70520004, 20, 1594280370, 1, 5),
(709, 70520004, 20, 1594280426, 1, 5),
(710, 70520004, 20, 1594281606, 1, 5),
(711, 70520004, 20, 1594281659, 1, 5),
(712, 70520004, 20, 1594281723, 1, 5),
(713, 70520004, 20, 1594281743, 1, 5),
(714, 70520004, 20, 1594282150, 1, 5),
(715, 70520004, 20, 1594282166, 1, 5),
(716, 70520004, 20, 1594282490, 1, 5),
(717, 70520004, 20, 1594282520, 1, 5),
(718, 70520004, 20, 1594282590, 2, 5),
(719, 70520004, 20, 1594282614, 2, 5),
(720, 70520004, 20, 1594282622, 2, 5),
(721, 70520004, 20, 1594283103, 1, 5),
(722, 70520004, 20, 1594283191, 1, 5),
(723, 70520004, 20, 1594283237, 1, 5),
(724, 70520004, 20, 1594283964, 1, 5),
(725, 70520004, 20, 1594283983, 1, 5),
(726, 70520004, 20, 1594284006, 1, 5),
(727, 70520004, 20, 1594284141, 1, 5),
(728, 70520004, 20, 1594284165, 1, 5),
(729, 70520004, 20, 1594284188, 1, 5),
(730, 70520004, 20, 1594284218, 99, 5),
(731, 70520004, 20, 1594284619, 99, 5),
(732, 70520004, 20, 1594284708, 2, 5),
(733, 70520004, 20, 1594284732, 2, 5),
(734, 70520004, 20, 1594284743, 2, 5),
(735, 70520004, 20, 1594284755, 2, 5),
(736, 70520004, 20, 1594284799, 99, 5),
(737, 70520004, 20, 1594286711, 2, 5),
(738, 70520004, 20, 1594287464, 99, 5),
(739, 70520004, 20, 1594296214, 99, 7),
(740, 70420001, 20, 1594296304, 1, 2),
(741, 70420001, 20, 1594296310, 1, 4),
(742, 70420001, 20, 1594296323, 1, 6),
(743, 70420001, 20, 1594296868, 1, 6),
(744, 70420001, 20, 1594297202, 3, 8),
(745, 70920001, 20, 1594300174, 1, 1),
(746, 70920001, 20, 1594300512, 1, 2),
(747, 70920001, 1, 1594300603, 1, 3),
(748, 70920001, 20, 1594300615, 1, 4),
(749, 70920001, 20, 1594300711, 1, 5),
(750, 70920001, 1, 1594300767, 2, 5),
(751, 70920001, 1, 1594300934, 99, 5),
(752, 70920001, 1, 1594301030, 99, 7),
(753, 70920002, 20, 1594301811, 1, 1),
(754, 70920002, 20, 1594301838, 1, 2),
(755, 70920002, 1, 1594301851, 1, 3),
(756, 70920002, 20, 1594301872, 1, 4),
(757, 70920002, 20, 1594301899, 1, 6),
(758, 70920002, 1, 1594301968, 3, 8),
(759, 70620002, 20, 1594366624, 99, 7),
(760, 70620001, 20, 1594368471, 99, 5),
(761, 70820001, 20, 1594368573, 2, 4),
(762, 70820001, 20, 1594368577, 2, 5),
(763, 70820001, 20, 1594369456, 99, 5),
(764, 70820001, 20, 1594369589, 2, 5),
(765, 70820001, 20, 1594369641, 99, 5),
(766, 70820001, 20, 1594372366, 2, 5),
(767, 70820001, 20, 1594372401, 99, 5),
(768, 70820001, 20, 1594372409, 99, 7),
(769, 70820001, 20, 1594372822, 2, 5),
(770, 70820001, 20, 1594373353, 2, 5),
(771, 70820001, 20, 1594374144, 99, 5),
(772, 70820001, 20, 1594374221, 99, 7),
(773, 70820001, 20, 1594374307, 99, 7),
(774, 70820001, 20, 1594374466, 99, 5),
(775, 70820001, 20, 1594375261, 99, 7),
(776, 70820001, 20, 1594375468, 99, 7),
(777, 70820001, 20, 1594375601, 99, 7),
(778, 70820001, 20, 1594375643, 99, 7),
(779, 70820001, 1, 1594375786, 99, 7),
(780, 70820001, 20, 1594376020, 99, 7),
(781, 70820001, 20, 1594383267, 99, 7),
(782, 71020001, 20, 1594383486, 1, 1),
(783, 71020001, 20, 1594623011, 1, 2),
(784, 71020001, 22, 1594642485, 1, 2),
(785, 71020001, 20, 1594806001, 1, 2),
(786, 71520001, 20, 1594815029, 1, 1),
(787, 71520001, 20, 1594815155, 1, 2),
(788, 71520001, 20, 1594815342, 1, 4),
(789, 71520001, 20, 1594815424, 1, 5),
(790, 71520001, 20, 1594815623, 2, 5),
(791, 71520001, 20, 1594815641, 99, 5),
(792, 71520001, 20, 1594815674, 99, 7),
(793, 71620001, 20, 1594912478, 1, 1),
(794, 71620002, 20, 1594912625, 1, 1),
(795, 71620001, 22, 1594913107, 1, 2),
(796, 71620001, 23, 1594913155, 1, 3),
(797, 71620001, 22, 1594913172, 1, 4),
(798, 71620001, 22, 1594913549, 1, 5),
(799, 71620001, 23, 1594913631, 99, 5),
(800, 71620001, 23, 1594913648, 99, 7),
(801, 71720001, 23, 1594949237, 1, 1),
(802, 71720002, 23, 1594949565, 1, 1),
(803, 71720003, 23, 1594949661, 1, 1),
(804, 71720004, 23, 1594949918, 1, 1),
(805, 71720005, 23, 1594949980, 1, 1),
(806, 71720006, 23, 1594950169, 1, 1),
(807, 71720007, 23, 1594950224, 1, 1),
(808, 71720004, 22, 1594950273, 1, 2),
(809, 71720003, 22, 1594950348, 1, 2),
(810, 71620002, 22, 1594950385, 1, 2),
(811, 71720007, 22, 1594950489, 1, 2),
(812, 71720005, 22, 1594950571, 1, 2),
(813, 71720005, 23, 1594950659, 1, 3),
(814, 71620002, 23, 1594950663, 1, 3),
(815, 71720004, 23, 1594950672, 1, 3),
(816, 71720005, 22, 1594950684, 1, 4),
(817, 71720004, 22, 1594950694, 1, 4),
(818, 71720005, 22, 1594950832, 1, 5),
(819, 71720004, 22, 1594952234, 1, 2),
(820, 71720004, 22, 1594952761, 1, 4),
(821, 71620002, 22, 1594953164, 1, 4),
(822, 71720003, 22, 1594953172, 1, 4),
(823, 71720007, 22, 1594953186, 1, 4),
(824, 71720007, 22, 1594953202, 1, 5),
(825, 71720003, 22, 1594953215, 1, 5),
(826, 71620002, 22, 1594953225, 1, 5),
(827, 71720004, 22, 1594953237, 1, 5),
(828, 71720005, 23, 1594953497, 2, 5),
(829, 71720005, 23, 1594953554, 99, 5),
(830, 71720005, 23, 1594953617, 99, 7),
(831, 71720004, 23, 1594953695, 99, 5),
(832, 71720004, 23, 1594953699, 99, 7),
(833, 71720003, 23, 1594953720, 99, 5),
(834, 71720003, 23, 1594953726, 99, 7),
(835, 71720002, 1, 1595179882, 1, 2),
(836, 71720002, 1, 1595179891, 1, 4),
(837, 71720002, 1, 1595180626, 1, 5),
(838, 71720007, 1, 1595180667, 99, 5),
(839, 71720007, 1, 1595180682, 99, 7),
(840, 72720001, 26, 1595833944, 1, 1),
(841, 72720002, 25, 1595835240, 1, 1),
(842, 72720002, 26, 1595835944, 1, 2),
(843, 72720002, 25, 1595836310, 1, 3),
(844, 72720002, 26, 1595836457, 1, 4),
(845, 72720002, 26, 1595836628, 1, 2),
(846, 72720002, 26, 1595836675, 1, 4),
(847, 72720002, 26, 1595836722, 1, 5),
(848, 72720002, 25, 1595837151, 1, 5),
(849, 72720002, 25, 1595837206, 2, 5),
(850, 72720002, 25, 1595837241, 99, 5),
(851, 72720002, 25, 1595837272, 99, 7),
(852, 72720001, 26, 1595837463, 1, 2),
(853, 72720001, 26, 1595837583, 1, 6),
(854, 72720001, 25, 1595838845, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `notif_comment`
--

CREATE TABLE `notif_comment` (
  `id_Ncomment` int(11) NOT NULL,
  `id_TrnsCmnt` int(11) NOT NULL,
  `id_UComment` int(11) NOT NULL,
  `notif_read` tinyint(1) NOT NULL,
  `NR_dateupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_comment`
--

INSERT INTO `notif_comment` (`id_Ncomment`, `id_TrnsCmnt`, `id_UComment`, `notif_read`, `NR_dateupdate`) VALUES
(1, 72720001, 26, 1, '2020-07-27 14:12:57'),
(2, 72720001, 25, 1, '2020-07-27 14:13:15'),
(3, 72720002, 25, 1, '2020-07-27 14:46:25'),
(4, 72720002, 26, 1, '2020-07-27 14:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `is_member` int(1) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama_pelanggan` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `is_member`, `id_member`, `nama_pelanggan`, `no_hp`, `alamat`) VALUES
(67, 0, 1586067382, 'Andra', '8122345678', 'Purwokerto'),
(68, 0, 1586069333, 'Diyan Novita', '8526004772', 'Purwokerto'),
(69, 0, 1586069523, 'Caca', '88882753146', 'Purwokerto'),
(70, 0, 1586075696, 'Diko', '83117250819', 'Purwokerto'),
(71, 0, 1586078421, 'Dimas', '81273871166', 'Semarang'),
(72, 0, 1586079101, 'Caca', '88882753146', 'Purwokerto'),
(73, 0, 1586082872, 'Ali', '85869513513', 'purbalingga'),
(74, 0, 1586339960, 'Mikasa', '891234723948', 'Japan'),
(75, 0, 1586416406, 'Kaneki', '8928374023488', 'Purwokerto'),
(76, 0, 1586416511, 'Wahidin', '8930139439384', 'Pemalang'),
(77, 0, 1586246548, 'Maikel', '89023945839', 'Pemalang'),
(78, 0, 1586246548, 'Maikel', '89023945839', 'Pemalang'),
(79, 0, 1586425596, 'Mitokondria', '89029348345', 'Residence'),
(80, 0, 1586426219, 'Mamaat Supardi', '8923485729', 'Purwokerto'),
(84, 1, 2147483647, 'Mekali', '892358023941', 'Jakarta'),
(85, 0, 1586597337, 'Kempot', '8920934910', 'Purwokerto'),
(86, 0, 1586600982, 'Moli', '823940123957', 'Purwokerto'),
(87, 0, 1586601312, 'Meren', '89029384135', 'Bali'),
(88, 0, 1586665405, 'Morinho', '80923488930', 'German'),
(89, 0, 1586668514, 'Lulaby', '88739823741', 'Jakarta'),
(90, 0, 1586668615, 'Jeremy', '8739837450', 'Jakarta'),
(91, 0, 1586684900, 'Betra', '89023948134', 'Pemalang'),
(92, 0, 1586949431, 'Kora', '89238498379', 'Purwokerto'),
(93, 0, 1586951359, 'Keyra', '8920938480', 'Purwokerto'),
(94, 0, 1586951420, 'Bagas', '890945802345', 'Sokaraja'),
(95, 0, 1586951454, 'Liza', '890937589234', 'Banjar'),
(96, 0, 1586951535, 'Raka', '89034818592', 'Pemalang'),
(97, 0, 1586956135, 'Peter', '89303457293', 'Jombang'),
(98, 0, 1587020929, 'Kore', '89034858430', 'Purwokerto'),
(99, 0, 1587027815, 'Mamat', '89093485920', 'Purwokerto'),
(100, 0, 1587028929, 'Riko', '89093485972', 'Kalimantan'),
(116, 0, 1587196748, 'Mandra', '8123498495045', 'Purbalingga'),
(117, 0, 1587196950, 'Meriam', '89092834957839', 'Pemalang'),
(118, 0, 1587198364, 'Reka', '89094850234', 'Purwokerto'),
(119, 0, 1587198432, 'Lizardo', '890948528496', 'Sokaraja'),
(120, 0, 1587198576, 'Bagaso', '8909589037520', 'Purwokerto'),
(121, 0, 1587198702, 'Rexona', '890975839245', 'Banjar'),
(122, 0, 1587198702, 'Rexona', '890975839245', 'Banjar'),
(123, 0, 1588828220, 'Badru', '89727222666', 'Cilacap'),
(124, 0, 1588913948, 'Abah', '89777666555', 'Jogja'),
(125, 0, 1588914059, 'Oyo', '89777666888', 'Cirebon'),
(126, 0, 1588914363, 'Atok', '87123444555', 'Jakarta'),
(127, 0, 1589002869, 'Sabatu', '89123773837', 'Padang'),
(128, 0, 1589003381, 'Sabati', '87111727827', 'Cirebon'),
(129, 0, 1589013329, 'Sabtu3', '', 'Banyumas'),
(130, 0, 1589269758, 'Selasa1', '85333121458', 'Jogja'),
(131, 0, 1589424462, 'Kamis1', '85121454547', 'Banyumas'),
(132, 0, 1589425385, 'Kamis2', '85645784452', 'Cilacap'),
(133, 0, 1589610829, 'Sabtu Berkah', '85454754222', 'Banyumas'),
(134, 0, 1589610865, 'Sabtu Menggila', '', 'Cilacap'),
(135, 0, 1589784388, 'Ammar1', '85312721245', 'Banyumas'),
(136, 0, 1589784525, 'Ammar2', '84545754548', 'Jogja'),
(137, 0, 1589784578, 'Ammar3', '85454754418', 'ajibarang'),
(138, 0, 1589784635, 'Ammar4', '', 'Purbalingga'),
(139, 0, 1589785007, 'Ammar5', '85454575484', 'Semarang'),
(140, 0, 1590071231, 'Anto', '852254548', 'Purbalingga'),
(141, 0, 1591192921, 'vv', '1212312312313', 'Banyumas'),
(142, 0, 1591350654, 'Sara', '89717716615', 'Cilacap'),
(143, 0, 1591351049, 'Fajira', '89626626626', 'Yogyakarta'),
(144, 0, 1591687285, 'Aruna', '89123345323', 'Ajibarang'),
(145, 0, 1591967000, 'Ompong', '89776776778', 'Cilacap'),
(146, 0, 1592029825, 'coba1', '89929929929', 'Banyumas'),
(147, 0, 1592031346, 'coba2', '828828828828', 'Cilacap'),
(148, 0, 1592031500, 'coba3', '89828827726', 'Cilacap'),
(149, 0, 1592550200, 'stok1', '89777666555', 'Ambon'),
(150, 0, 1592646563, 'Stok2', '89771615516', 'Cila'),
(151, 0, 1592646972, 'Stok3', '89771661551', 'ajibarang'),
(152, 0, 1592725182, 'dfdf', '', ''),
(153, 0, 1592884207, 'A', '', ''),
(154, 0, 1592884223, 'Am', '', ''),
(155, 0, 1592884233, 'Ammar1', '89111112113', 'Yogyakarta'),
(156, 0, 1592885712, 'Ammar2', '89221222223', 'Semarang'),
(157, 0, 1592886171, 'Ammar3', '89331332333', 'Cirebon'),
(158, 0, 1592893471, 'Ammar4', '89441442443', 'Banten'),
(159, 0, 1592906261, 'Ammar5', '89551552553554', 'Ajibarang'),
(160, 0, 1592907981, 'Ammar6', '89661662663', 'Purbalingga'),
(161, 0, 1592913411, 'Ammar7', '8777177273', 'Jogja'),
(162, 0, 1593067919, 'Layla1', '8111819110', 'Banyumas'),
(163, 0, 1593068423, 'Layla2', '82228229220', 'Cilacap'),
(164, 0, 1593069914, 'Layla3', '83337338339', 'ajibarang'),
(165, 0, 1593069982, 'Layla3', '89717716615', 'Banyumas'),
(166, 0, 1593069982, 'Layla3', '89717716615', 'Banyumas'),
(167, 0, 1593089201, 'Caya Caya', '85312111222', 'Bandung'),
(168, 0, 1593090240, 'Tala', '8917116616', 'Yogyakarta'),
(169, 0, 1593090327, 'Santoryu', '81716716616', 'Pemalang'),
(170, 0, 1593142603, 'Asmuna', '8999000986', 'Jakarta'),
(171, 0, 1593157999, 'Owey1', '84115116117', 'Banyumas'),
(172, 0, 1593161438, 'Bagong1', '', ''),
(173, 0, 1593227616, 'Amin1', '87114115116', 'Ajibarang'),
(174, 0, 1593227677, 'Amin2', '87224225226', 'Banyuwangi'),
(175, 0, 1593227822, 'Amin3', '87334335336', 'Cilacap'),
(176, 0, 1593227870, 'Amin4', '86444445446', 'Demak'),
(177, 0, 1593249548, 'Amin5', '89554555556', 'Semarang'),
(178, 0, 1593267088, 'Adi01', '89111222333', 'Cilacap'),
(179, 0, 1593500606, 'Ambun1', '89111222333', 'Ambarawa'),
(180, 0, 1593859542, 'Abuy1', '89771772773', 'Semarang'),
(181, 0, 1593864494, 'Abuy2', '89118881881', 'Cilacap'),
(182, 0, 2143, 'Abu', '123124234234', 'Banyumas'),
(183, 0, 2143, 'Abu2', '89998776665', 'Cirebon'),
(184, 0, 2143, 'Naruto', '84111234123', 'Banyumas'),
(185, 0, 1593865560, 'Naruto', '84111234123', 'Banyumas'),
(186, 0, 1593865656, 'Masmud', '89717716615', 'Bandung'),
(187, 0, 1593865735, 'Opor', '89717716615', 'Banyumas'),
(188, 0, 1593944381, 'Amirudin', '89716615516', 'Cilacap'),
(189, 0, 1594007489, 'Boruto1', '89119229339', 'Cilacap'),
(190, 0, 1594007929, 'Boruto2', '89115116117', 'Jakarta'),
(191, 0, 1594008059, 'Boruto3', '89118119227', 'Cirebon'),
(192, 0, 1594211184, 'Aryanto1', '89771661771', 'Banyumas'),
(193, 0, 1594300220, 'Ibrahim1', '85123456789', 'Bandung'),
(194, 0, 1594301896, 'Ibrahim2', '89771661551', 'Cilacap'),
(195, 0, 1594383576, 'Alu1', '89776554443', 'Banyumas'),
(196, 0, 1594815041, 'Raminten', '89118339882', 'Semarang'),
(197, 0, 1594912514, 'Dena Haura', '89771661445', 'Jakarta'),
(198, 0, 1594912602, 'Syifa Hadju', '89776526567', 'Bandung'),
(199, 0, 1594949290, 'Rian D\'Masiv', '89772662552', 'Bandung'),
(200, 0, 1594949545, 'Albert Sustain', '89776662552', 'Lampung'),
(201, 0, 1594949688, 'Karto Yono', '815546637776', 'Ngawi'),
(202, 0, 1594949967, 'Pamungkas', '89771661551', 'Jakarta'),
(203, 0, 1594950041, 'Via Vallen', '87227482826', 'Bojonegoro'),
(204, 0, 1594950104, 'Dion Wiyoko', '81662776456', 'Semarang'),
(205, 0, 1594950293, 'Cut Syifa', '87661551441', 'Tangerang'),
(206, 0, 1595834049, 'Mister S', '81239348948', 'Purwokerto'),
(207, 0, 1595835213, 'Denny', '89114551661', 'Purwokerto');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product`, `image`) VALUES
(1, 'iPhone', '71k0cry-ceL__SX569_.jpg'),
(2, 'iPad', 'ipad-pro-12-11-select-201810_FMT_WHH.jpg'),
(12, 'Macbook Pro', '1559148656_1481045.jpg'),
(13, 'Macbook Air', '1540998887_1441820.jpg'),
(14, 'Apple Watch', '24807824_7ca67dc4-4dbc-4ed9-8886-b65d12e03f38_700_700.jpg'),
(15, 'iPod', '1559123552_1482835.jpg'),
(16, 'iMac', 'imac-27-2017.jpg'),
(17, 'iPad Mini', 'ipad-mini-5gen.jpg'),
(18, 'iPad Air', 'ipad-air-3gen.jpg'),
(19, 'iPad Pro', 'ios12-ipad-pro-12-9-in.jpg'),
(20, 'Macbook', 'macbook-2018-gold-device.jpg'),
(21, 'Apple Glass', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_platform`
--

CREATE TABLE `product_platform` (
  `id` int(11) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `model` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_platform`
--

INSERT INTO `product_platform` (`id`, `platform`, `product_id`, `image`, `model`) VALUES
(1, '4G', 1, 'iphone-iphone4-colors_(1).jpg', 'A1349'),
(2, '4S', 1, 'iphone-iphone4s-colors.jpg', 'A1431'),
(3, '5G', 1, 'iphone-5-lock-720x500.jpg', 'A1428'),
(4, '5C', 1, 'iphone-iphone5c-colors.jpg', 'A1456'),
(5, '15 inci, Awal 2008', 12, 'macbook-pro-early-2008-15in-device.jpg', 'MB133'),
(6, '5S', 1, 'iphone-iphone5s-colors.jpg', 'A1453'),
(7, '5SE', 1, 'iphone-se-colors1.jpg', 'A1723'),
(8, '6G', 1, 'iphone-iphone6-colors.jpg', 'A1589'),
(9, '6 Plus', 1, 'iphone-iphone6plus-colors.jpg', 'A1522'),
(10, '6S', 1, 'iphone-6s-colors.jpg', 'A1633'),
(11, '6S Plus', 1, 'iphone-6splus-colors.jpg', 'A1634'),
(12, '7G', 1, 'iphone7-colors.jpg', 'A1660'),
(13, '7 Plus', 1, 'iphone7plus-colors.jpg', 'A1661'),
(14, '8G', 1, 'iphone-8-colors.jpg', 'A1863'),
(15, '8 Plus', 1, 'iphone-8plus-colors.jpg', 'A1864'),
(16, 'X', 1, 'iphone-x-colors.jpg', 'A1865'),
(17, 'XR', 1, 'identify-iphone-xr-colors.jpg', 'A1984'),
(18, 'XS', 1, 'iphone-xs-colors.jpg', 'A1920'),
(19, 'XS Max', 1, 'iphone-xs-max-colors.jpg', 'A1921'),
(20, '11', 1, 'identify-iphone-11-colors.jpg', 'A2221'),
(21, '11 Pro', 1, 'identify-iphone-11pro.jpg', 'A2215'),
(22, '11 Pro Max', 1, 'identify-iphone-11pro-max.jpg', 'A2218'),
(23, '1 WiFi', 2, 'identify-ipad.jpg', 'A1219'),
(24, '1 WiFi 3G', 2, 'identify-ipad1.jpg', 'A1337'),
(25, '2 WiFi', 2, 'identify-ipad-2gen.jpg', 'A1395'),
(26, '2 WiFi GSM', 2, 'identify-ipad-2gen1.jpg', 'A1396'),
(27, '17 inci, Awal 2008', 12, 'macbook-pro-early-2008-17in-device.jpg', 'MB166'),
(28, '15 inci, Akhir 2008', 12, 'macbook-pro-late-2008-15in-device.jpg', 'MB470'),
(29, '13 inci, Pertengahan 2009', 12, 'macbook-pro-mid-2009-13in-device.jpg', 'MB991'),
(30, '15 inci, 2,53 GHz, Pertengahan 2009', 12, 'macbook-pro-mid-2009-15in-device.jpg', 'MC118'),
(31, '15 inci, Pertengahan 2009', 12, 'macbook-pro-mid-2009-15in-device_(1).jpg', 'MB985'),
(32, '17 inci, Awal 2009', 12, 'macbook-pro-early-mid-2009-17in-device.jpg', 'MB604'),
(33, '17 inci, Pertengahan 2009', 12, 'macbook-pro-early-mid-2009-17in-device_(1).jpg', 'MC226'),
(34, '13 inci, Pertengahan 2010', 12, 'macbook-pro-mid-2010-13in-device.jpg', 'MC375'),
(35, '15 inci, Pertengahan 2010', 12, 'macbook-pro-mid-2010-15in-device.jpg', 'MC373'),
(36, '17 inci, Pertengahan 2010', 12, 'macbook-pro-mid-2010-17in-device.jpg', 'MC024'),
(37, '13 inci, Awal 2011', 12, 'macbook-pro-early-2011-13in-device.jpg', 'MC724'),
(38, '13 inci, Akhir 2011', 12, 'macbook-pro-late-2011-13in-device.jpg', 'MD314'),
(39, '15 inci, Awal 2011', 12, 'macbook-pro-early-2011-15in-device.jpg', 'MC723'),
(40, '15 inci, Akhir 2011', 12, 'macbook-pro-late-2011-15in-device.jpg', 'MD322'),
(41, '17 inci, Awal 2011', 12, 'macbook-pro-early-2011-17in-device.jpg', 'MC725'),
(42, '17 inci, Akhir 2011', 12, 'macbook-pro-late-2011-17in-device.jpg', 'MD311'),
(43, '13 inci, Pertengahan 2012', 12, 'macbook-pro-mid-2012-13in-device.jpg', 'MD101'),
(44, 'Retina, 13 inci, Akhir 2012', 12, 'macbook-pro-late-2012-13in-device.jpg', 'MD212'),
(45, '15 inci, Pertengahan 2012', 12, 'macbook-pro-mid-2012-15in-device2.jpg', 'MD103'),
(46, 'Retina, 15 inci, Pertengahan 2012', 12, 'macbook-pro-mid-2012-15in-device.jpg', 'MC975'),
(47, 'Retina, 13 inci, Awal 2013', 12, 'macbook-pro-early-2013-13in-device.jpg', 'MD212'),
(48, 'Retina, 13 inci, Akhir 2013', 12, 'macbook-pro-late-2013-13in-device.jpg', 'ME864'),
(49, 'Retina, 15 inci, Awal 2013', 12, 'macbook-pro-early-2013-15in-device.jpg', 'ME664'),
(50, 'Retina, 15 inci, Akhir 2013', 12, 'macbook-pro-late-2013-15in-device.jpg', 'ME294'),
(51, 'Retina, 15 inci, Akhir 2013', 12, 'macbook-pro-late-2013-15in-device_(1).jpg', 'ME293'),
(52, 'Retina, 13 inci, Pertengahan 2014', 12, 'macbook-pro-mid-2014-13in-device.jpg', 'MGX72'),
(53, 'Retina, 15 inci, Pertengahan 2014', 12, 'macbook-pro-mid-2014-15in-device.jpg', 'MGXC2'),
(54, 'Retina, 13 inci, Awal 2015', 12, 'macbook-pro-early-2015-13in-device.jpg', 'MF839'),
(55, 'Retina, 15 inci, Pertengahan 2015', 12, 'macbook-pro-mid-2015-15in-device.jpg', 'MJLT2'),
(56, '13 inci, 2016, Dua Port Thunderbolt 3', 12, 'macbook-pro-2016-13in-device.jpg', 'MLL42'),
(57, '13 inci, 2016, Empat Port Thunderbolt 3', 12, 'macbook-pro-mid-2015-15in-device1.jpg', 'MLH12'),
(58, '15 inci, 2016', 12, 'macbook-pro-2016-15in-device.jpg', 'MacBookPro13,3'),
(59, '13 inci, 2017, Dua Port Thunderbolt 3', 12, 'macbook-pro-2017-13in-device-2thunderbolt-3ports.jpg', 'MPXQ2'),
(60, '13 inci, 2017, Empat Port Thunderbolt 3', 12, 'macbook-pro-2017-13in-device.jpg', 'MPXV2'),
(61, '15 inci, 2017', 12, 'macbook-pro-2017-15in-device.jpg', 'MacBookPro14,3'),
(62, '13 inci, 2018, Empat Port Thunderbolt 3', 12, 'macbook-pro-2018-13in-device.jpg', 'MacBookPro15,2'),
(63, '15 inci, 2018', 12, 'macbook-pro-2018-15in-device.jpg', 'MacBookPro15,1'),
(64, '13 inci, 2019, Empat Port Thunderbolt 3', 12, 'macbook-pro-2018-13in-device_(1).jpg', 'MacBookPro15,2'),
(65, '15 inci, 2019', 12, 'macbook-pro-2018-15in-device_(1).jpg', 'MacBookPro15,3'),
(66, '13 inci, 2019, Dua Port Thunderbolt 3', 12, 'macbook-pro-2018-13in-device_(2).jpg', 'MacBookPro15,4'),
(67, '16 inci, 2019', 12, 'macbook-pro-16in-2019.jpg', 'MacBookPro16,1'),
(68, 'Pertengahan 2009', 13, 'macbook-air-2009-2010-13in-device.jpg', 'MacBookAir2,1'),
(69, '11 inci, Akhir 2010', 13, 'macbook-air-2010-11in-device.jpg', 'MacBookAir3,1'),
(70, '13 inci, Akhir 2010', 13, 'macbook-air-2009-2010-13in-device_(1).jpg', 'MacBookAir3,2'),
(71, '11 inci, Pertengahan 2011', 13, 'macbook-air-2011-11in-device.jpg', 'MacBookAir4,1'),
(72, '13 inci, Pertengahan 2011', 13, 'macbook-air-2011-13in-device.jpg', 'MacBookAir4,2'),
(73, '11 inci, Pertengahan 2012', 13, 'macbook-air-2012-11in-device.jpg', 'MacBookAir5,1'),
(74, '13 inci, Pertengahan 2012', 13, 'macbook-air-2012-13in-device.jpg', 'MacBookAir5,2'),
(75, '11 inci, Pertengahan 2013', 13, 'macbook-air-2013-2014-11in-device.jpg', 'MacBookAir6,1'),
(76, '13 inci, Pertengahan 2013', 13, 'macbook-air-2013-2014-13in-device.jpg', 'MacBookAir6,2'),
(77, '11 inci, Awal 2014', 13, 'macbook-air-2013-2014-11in-device_(1).jpg', 'MacBookAir6,1'),
(78, '13 inci, Awal 2014', 13, 'macbook-air-2013-2014-13in-device_(1).jpg', 'MacBookAir6,2'),
(79, '11 inci, Awal 2015', 13, 'macbook-air-2015-11in-device.jpg', 'MacBookAir7,1'),
(80, '13 inci, Awal 2015', 13, 'macbook-air-2015-13in-device.jpg', 'MacBookAir7,2'),
(81, '13 inci, 2017', 13, 'macbook-air-2017-device.jpg', 'MacBookAir7,2'),
(82, 'Retina, 13 inci, 2018', 13, 'macbook-air-2018-device.jpg', 'MacBookAir8,1'),
(83, 'Retina, 13 inci, 2019', 13, 'macbook-air-2018-device_(1).jpg', 'MacBookAir8,2'),
(84, 'Retina, 13 inci, 2020', 13, 'macbook-air-2020-device.jpg', 'MacBookAir9,1'),
(85, '13 inci, Awal 2009', 20, 'macbook-early-mid-2009-device.jpg', 'MacBook5,2'),
(86, '13 inci, Pertengahan 2009', 20, 'macbook-early-mid-2009-device_(1).jpg', 'MacBook5,2'),
(87, '13 inci, Akhir 2009', 20, 'macbook-late-2009-2010-device.jpg', 'MacBook6,1'),
(88, '13 inci, Pertengahan 2010', 20, 'macbook-late-2009-2010-device_(1).jpg', 'MacBook7,1'),
(89, 'Retina, 12 inci, Awal 2015', 20, 'macbook-2015-device.jpg', 'MacBook8,1'),
(90, 'Retina, 12 inci, Awal 2016', 20, 'macbook-2016-device.jpg', 'MacBook9,1'),
(91, 'Retina, 12 inci, 2017', 20, 'macbook-2017-device.jpg', 'MacBook10,1'),
(92, '2 WiFi CDMA', 2, 'identify-ipad-2gen2.jpg', 'A1397'),
(93, '3 WiFi', 2, 'identify-ipad-3gen.jpg', 'A1416'),
(94, '3 WiFi Cellular', 2, 'identify-ipad-3gen1.jpg', 'A1430'),
(95, '4 WiFi', 2, 'identify-ipad-4gen.jpg', 'A1458'),
(96, '4 WiFi Celluler', 2, 'identify-ipad-4gen1.jpg', 'A1459'),
(97, '5 WiFi', 2, 'ios11-ipad-5gen.jpg', 'A1822'),
(98, '5 WiFi Celluler', 2, 'ios11-ipad-5gen1.jpg', 'A1823'),
(99, '6 WiFi', 2, 'ios11-3-ipad-9-7-in-2018.jpg', 'A1893'),
(100, '6 WiFi Celluler', 2, 'ios11-3-ipad-9-7-in-20181.jpg', 'A1954'),
(101, '7 WiFi', 2, 'ipad-7th-gen.jpg', 'A2197'),
(102, '1 WiFi', 17, 'identify-ipad-mini.jpg', 'A1432'),
(103, '1 WiFi Celluler', 17, 'identify-ipad-mini1.jpg', 'A1454'),
(104, '2 WiFi', 17, 'identify-ipad-mini2.jpg', 'A1489'),
(105, '2 Wi-Fi Cellular', 17, 'identify-ipad-mini21.jpg', 'A1490'),
(106, '3 WiFi', 17, 'identify-ipad-mini3.jpg', 'A1599'),
(107, '3 Wi-Fi Cellular', 17, 'identify-ipad-mini31.jpg', 'A1600'),
(108, '4 WiFi', 17, 'identify-ipad-mini4.jpg', 'A1538'),
(109, '4 WiFi Celluler', 17, 'identify-ipad-mini41.jpg', 'A1550'),
(110, '5 WiFi', 17, 'ipad-mini-5gen.jpg', 'A2133'),
(111, '5 WiFi Celluler', 17, 'ipad-mini-5gen1.jpg', 'A2124'),
(112, '1 WiFi', 18, 'identify-ipad-air.jpg', 'A1474'),
(113, '1 WiFi Celluler', 18, 'identify-ipad-air1.jpg', 'A1475'),
(114, '2 WiFi', 18, 'identify-ipad-air2.jpg', 'A1566'),
(115, '2 WiFi Cellular', 18, 'identify-ipad-air21.jpg', 'A1567'),
(116, '3 WiFi', 18, 'ipad-air-3gen.jpg', 'A2152'),
(117, '3 WiFi Cellular', 18, 'ipad-air-3gen1.jpg', 'A2123'),
(118, '12,9 inci Wifi', 19, 'identify-ipad-pro.jpg', 'A1584'),
(119, '12,9 inci Wifi Celluler', 19, 'identify-ipad-pro1.jpg', 'A1652'),
(120, '9,7 inci Wifi', 19, 'identify-ipad-pro-9-7.jpg', 'A1673'),
(121, '9,7 inci Wifi Celluler', 19, 'identify-ipad-pro-9-71.jpg', 'A1674'),
(122, '10,5 inci Wifi', 19, 'ios11-ipad-pro-10-in.jpg', 'A1701'),
(123, '10,5 inci Wifi Celluler', 19, 'ios11-ipad-pro-10-in1.jpg', 'A1709'),
(124, '12,9 inci (Generasi ke-2) Wifi', 19, 'ios11-ipad-pro-12-in.jpg', 'A1670'),
(125, '12,9 inci (Generasi ke-2) Wifi Celluler', 19, 'ios11-ipad-pro-12-in1.jpg', 'A1671'),
(126, '11 inci Wifi', 19, 'ios12-ipad-pro-11-in.jpg', 'A1980'),
(127, '11 inci Wifi Celuller', 19, 'ios12-ipad-pro-11-in1.jpg', 'A2013'),
(128, '12,9 inci (generasi ke-3) WiFi', 19, 'ios12-ipad-pro-12-9-in.jpg', 'A1876'),
(129, '12,9 inci (generasi ke-3) WiFi Celluler', 19, 'ios12-ipad-pro-12-9-in1.jpg', 'A2014'),
(130, '11 inci (generasi ke-2) WiFi', 19, 'ios13-4-ipad-pro-4gen-11-in.jpg', 'A2228'),
(131, '11 inci (generasi ke-2) WiFi Celluler', 19, 'ios13-4-ipad-pro-4gen-11-in1.jpg', 'A2068'),
(132, '12,9 inci (generasi ke-4) WiFi', 19, 'ios13-4-ipad-pro-4gen-12-9-in.jpg', 'A2229'),
(133, '12,9 inci (generasi ke-4) WiFi Celluler', 19, 'ios13-4-ipad-pro-4gen-12-9-in1.jpg', 'A2069'),
(135, 'SE 2', 1, 'IOS_12.png', 'AXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_booking`
--

CREATE TABLE `status_booking` (
  `id` int(11) NOT NULL,
  `sBooking` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_booking`
--

INSERT INTO `status_booking` (`id`, `sBooking`) VALUES
(1, 'Booking'),
(2, 'Tidak Bisa Dihubungi 1x'),
(3, 'Tidak Bisa Dihubungi 2x'),
(4, 'Process'),
(5, 'Done'),
(6, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` int(11) NOT NULL,
  `sPembayaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `sPembayaran`) VALUES
(1, 'Belum Bayar'),
(2, 'DP'),
(3, 'Tidak Ada Transaksi'),
(99, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengerjaan`
--

CREATE TABLE `status_pengerjaan` (
  `id` int(11) NOT NULL,
  `sPengerjaan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pengerjaan`
--

INSERT INTO `status_pengerjaan` (`id`, `sPengerjaan`) VALUES
(1, 'Cek'),
(2, 'Menunggu Konfirmasi'),
(3, 'Sudah Dikonfirmasi'),
(4, 'Sedang Dikerjakan'),
(5, 'Belum Diambil (Selesai)'),
(6, 'Belum Diambil (Cancel)'),
(7, 'Diambil (Selesai)'),
(8, 'Diambil (Cancel)'),
(99, 'Sudah Diambil'),
(100, 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_barang` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `id_tipepenjualan` int(11) DEFAULT NULL,
  `id_Pemasok` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `fee_teknisi` float NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_barang`, `nama_barang`, `id_tipepenjualan`, `id_Pemasok`, `foto`, `harga_beli`, `harga_jual`, `fee_teknisi`, `stok_barang`) VALUES
('SRVBB6G', 'Speaker Kamera Iphone', 1, 0, 'speaker_kamera_iphone.jpg', 45000, 60000, 0, 17),
('SRVBC5G', 'Kamera Belakang Iphone', 1, 0, 'Kamera_Belakang_Iphone1.jpg', 75000, 100000, 0, 17),
('SRVBCKP16', 'Backup Data 16GB', 1, 0, 'service.png', 0, 50000, 0, 19),
('SRVFC5S', 'Kamera Depan Iphone', 1, 0, 'kamera_depan.jpg', 75000, 110000, 0, 18),
('SRVFLC5G', 'FL Charger', 1, 0, 'fl_charger_iphone.jpg', 50000, 70000, 0, 18),
('SRVFLCX', 'Flexible Charger', 1, 0, 'flexible_charger.jpg', 400000, 550000, 0, 18),
('SRVHB4GB', 'Home Button', 1, 0, 'home_button.jpg', 25000, 35000, 0, 20),
('SRVHS7PBM', 'Housing 7P Black Mate', 1, 0, '', 400000, 1500000, 0, 1),
('SRVICLD1ALL', 'Seting iCloud', 1, 0, 'service1.png', 0, 100000, 0, 18),
('SRVIP4LCDB', 'LCD iPhone', 1, 0, 'iphone_lcd.jpg', 275000, 350000, 0, 20),
('SRVIP5PBATT', 'Batre iPhone', 1, 0, 'battery_iphone.jpg', 175000, 250000, 15000, 19),
('SRVIP6RST', 'Restore Itunes 5C UT 6P', 1, 0, 'service2.png', 0, 75000, 0, 0),
('SRVLCDIPXR', 'LCD iPhone XR', 1, 0, '1_17_264.jpg', 800000, 3500000, 0, 9),
('SRVSKT5', 'Soket Batre iPhone 5 5s 5C', 1, 0, 'iphone-7-hq-li-ion-replacement-battery-1960mah-with-connector-1.jpg', 0, 50000, 0, 29),
('SRVTE6SP', 'Taptic Enggine 6SP', 1, 0, 'taptic_engine_iphone.jpg', 235000, 300000, 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_penjualan`
--

CREATE TABLE `tipe_penjualan` (
  `id_tipepenjualan` int(11) NOT NULL,
  `nama_tipepenjualan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_penjualan`
--

INSERT INTO `tipe_penjualan` (`id_tipepenjualan`, `nama_tipepenjualan`) VALUES
(1, 'Servis'),
(2, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `id_device` varchar(20) NOT NULL,
  `tanggal_taransaksi` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tanggal_diambil` datetime NOT NULL,
  `platform` int(11) NOT NULL,
  `total_barang` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `disc_status` tinyint(1) NOT NULL,
  `is_cash` tinyint(1) NOT NULL,
  `cash` float NOT NULL,
  `total` float NOT NULL,
  `change_nominal` float NOT NULL,
  `grand_total` float NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `stasus_pengerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_user`, `id_teknisi`, `id_device`, `tanggal_taransaksi`, `tanggal_selesai`, `tanggal_diambil`, `platform`, `total_barang`, `diskon`, `disc_status`, `is_cash`, `cash`, `total`, `change_nominal`, `grand_total`, `status_pembayaran`, `stasus_pengerjaan`) VALUES
(71620001, 1594912514, 23, 22, 'IPX0045', '2020-07-16 22:13:11', '2020-07-16 22:32:29', '2020-07-16 22:34:08', 17, 3, 50000, 0, 0, 560000, 610000, -50000, 560000, 99, 7),
(71620002, 1594912602, 23, 22, 'IPV0078', '2020-07-16 22:14:39', '2020-07-17 09:33:45', '0000-00-00 00:00:00', 21, 2, 0, 0, 0, 0, 180000, 0, 180000, 1, 5),
(71720001, 1594949290, 23, 23, 'IP223XX', '2020-07-17 08:26:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 18, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(71720002, 1594949545, 23, 1, '', '2020-07-17 08:30:22', '2020-07-20 00:43:46', '0000-00-00 00:00:00', 12, 1, 0, 0, 0, 0, 100000, 0, 100000, 1, 5),
(71720003, 1594949688, 23, 22, '089551662775', '2020-07-17 08:32:45', '2020-07-17 09:33:35', '2020-07-17 09:42:06', 14, 2, 0, 0, 0, 300000, 300000, 0, 300000, 99, 7),
(71720004, 1594949967, 23, 22, '', '2020-07-17 08:37:24', '2020-07-17 09:33:57', '2020-07-17 09:41:39', 19, 4, 0, 0, 0, 750000, 750000, 0, 750000, 99, 7),
(71720005, 1594950041, 23, 22, 'IPYY615', '2020-07-17 08:38:38', '2020-07-17 08:53:52', '2020-07-17 09:40:17', 15, 5, 75000, 0, 0, 315000, 390000, 0, 315000, 99, 7),
(71720006, 1594950104, 23, 23, 'IPOOU881', '2020-07-17 08:39:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(71720007, 1594950293, 23, 22, 'IPKKO112233', '2020-07-17 08:42:50', '2020-07-17 09:33:22', '2020-07-20 00:44:42', 20, 2, 0, 0, 1, 400000, 400000, 0, 400000, 99, 7),
(72720001, 1595834049, 26, 26, '12398439845298', '2020-07-27 14:12:06', '2020-07-27 15:13:03', '2020-07-27 15:34:05', 18, 1, 0, 0, 0, 0, 0, 0, 0, 3, 8),
(72720002, 1595835213, 25, 26, 'IPX0111', '2020-07-27 14:31:30', '2020-07-27 14:58:42', '2020-07-27 15:07:52', 17, 2, 500000, 0, 0, 3060000, 3560000, 0, 3060000, 99, 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_checklist`
--

CREATE TABLE `transaksi_checklist` (
  `id_komentar` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `checklist_awal` varchar(256) NOT NULL,
  `checklist_akhir` varchar(256) NOT NULL,
  `isi_komentar` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_checklist`
--

INSERT INTO `transaksi_checklist` (`id_komentar`, `id_parent`, `id_transaksi`, `id_sender`, `checklist_awal`, `checklist_akhir`, `isi_komentar`, `datetime`) VALUES
(146, 143, 71620001, 22, '', '', 'selesai, kerusakan flexible charger & Speaker Kamera Iphone', 1594913505),
(147, 0, 71720001, 23, '3,5,6,8', '', 'passcode 001234', 1594949167),
(148, 0, 71720002, 23, '3,5,7,8,10,12,14,16', '', '', 1594949422),
(149, 0, 71720003, 23, '7,9,11,13,15,17,19,21,23', '', '', 1594949565),
(150, 0, 71720004, 23, '1,2,3,4,5,6', '', '', 1594949844),
(151, 0, 71720005, 23, '3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18', '', 1594950826),
(154, 150, 71720004, 22, '', '', 'Kamera rusak parah, tidak bisa diperbaiki. harus ganti', 1594952272),
(155, 154, 71720004, 22, '', '', 'Charger ternyata juga bermasalah', 1594952298),
(156, 154, 71720004, 23, '', '', 'oke', 1594952335),
(157, 154, 71720004, 23, '', '', 'Servis dilanjutkan, konfirmasi dari customer', 1594952358),
(158, 0, 72720001, 26, '1', '', 'matot', 1595833926),
(159, 158, 72720001, 25, '', '', 'yakin mati?', 1595833977),
(160, 158, 72720001, 26, '', '', 'yakin mati itu', 1595833995),
(161, 0, 72720002, 25, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16', '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27', 'passcode 123456', 1595836707),
(162, 161, 72720002, 26, '', '', 'oke siap dikerjakan', 1595835662),
(163, 161, 72720002, 26, '', '', 'harus ganti lcd sudah parah', 1595835985),
(164, 161, 72720002, 25, '', '', 'service lanjut', 1595836267);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `id_transakasi` int(11) NOT NULL,
  `id_barang` varchar(128) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga` float NOT NULL,
  `total_harga` float NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `id_teknisi`, `id_transakasi`, `id_barang`, `quantity`, `harga`, `total_harga`, `tanggal_transaksi`, `status`) VALUES
(263, 22, 71620001, 'SRVIP4LCDB', 1, 350000, 350000, 1594913094, 2),
(264, 22, 71620001, 'SRVFLCX', 1, 550000, 550000, 1594913097, 1),
(265, 22, 71620001, 'SRVBB6G', 1, 60000, 60000, 1594913100, 1),
(266, 22, 71720004, 'SRVFLCX', 1, 550000, 550000, 1594950267, 1),
(267, 22, 71720003, 'SRVSKT5', 1, 50000, 50000, 1594950298, 1),
(268, 22, 71720003, 'SRVIP5PBATT', 1, 250000, 250000, 1594950301, 1),
(269, 22, 71620002, 'SRVFLC5G', 1, 70000, 70000, 1594950373, 1),
(270, 22, 71620002, 'SRVFC5S', 1, 110000, 110000, 1594950375, 1),
(271, 22, 71720007, 'SRVICLD1ALL', 1, 100000, 100000, 1594950480, 1),
(272, 22, 71720007, 'SRVTE6SP', 1, 300000, 300000, 1594950484, 1),
(273, 22, 71720005, 'SRVBB6G', 1, 60000, 60000, 1594950550, 1),
(274, 22, 71720005, 'SRVBC5G', 1, 100000, 100000, 1594950556, 1),
(275, 22, 71720005, 'SRVBCKP16', 1, 50000, 50000, 1594950558, 1),
(276, 22, 71720005, 'SRVFC5S', 1, 110000, 110000, 1594950563, 1),
(277, 22, 71720005, 'SRVFLC5G', 1, 70000, 70000, 1594950567, 1),
(278, 22, 71720004, 'SRVBC5G', 1, 100000, 100000, 1594952212, 1),
(279, 22, 71720004, 'SRVBB6G', 1, 60000, 60000, 1594952214, 2),
(280, 22, 71720004, 'SRVICLD1ALL', 1, 100000, 100000, 1594952229, 1),
(281, 1, 71720002, 'SRVBC5G', 1, 100000, 100000, 1595179879, 1),
(282, 26, 72720002, 'SRVLCDIPXR', 1, 3500000, 3500000, 1595835914, 1),
(284, 26, 72720002, 'SRVBB6G', 1, 60000, 60000, 1595836605, 1),
(285, 26, 72720001, 'SRVBC5G', 1, 100000, 100000, 1595837460, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Masadi Dwi Kurniawan', 'slpatmdnt@gmail.com', 'default.png', '$2y$10$At7/oXTqX0hqm47/zQsZ0OfVUmPf6tfarp2Qiyam2LggWcn8Pnj.m', 1, 1, 1565687141),
(22, 'Galih', 'galih@caps.com', 'default.png', '$2y$10$QX5yWVcUE9zvewqQbIJI8uZZrRF/L5xcxSiNkjA1JHvSUZRu8FAyq', 9, 1, 1589613985),
(23, 'Novel', 'novel@caps.com', 'default.png', '$2y$10$3EOb1UfRogSG2lZWyMwFLOE9dJchIWZGxYHPXPV68F3tEervP0kPi', 8, 1, 1594900268),
(24, 'Tatang', 'tatang@caps.com', 'default.png', '$2y$10$J5H4WDtJaD/vDsEEeIn3eea4juJlgPOt2zAs5I2yJCYZhW.gpES4S', 9, 1, 1594900752),
(25, 'Ammar Sholeh Aryanto', 'ammar@gmail.com', 'default.png', '$2y$10$3vtHtFvDS7UEw.h.GBuAzuaCiKcmk2sFPJgoKlFf5xXb1yhJVbalm', 8, 1, 1595833711),
(26, 'Masadi Dwi Kurniawan', 'masadi@gmail.com', 'default.png', '$2y$10$KttRaJKAwxqnBFQ.0bXnXeDe3KN/6zCwTllDClac42UEA.WsjWetm', 9, 1, 1595833730);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 2, 2),
(15, 4, 2),
(17, 1, 3),
(19, 1, 4),
(20, 1, 5),
(26, 5, 2),
(27, 5, 8),
(28, 2, 5),
(29, 6, 2),
(30, 6, 4),
(32, 5, 6),
(33, 1, 6),
(34, 1, 7),
(35, 1, 9),
(38, 7, 9),
(39, 7, 2),
(40, 1, 10),
(41, 2, 6),
(42, 8, 2),
(43, 8, 6),
(44, 8, 10),
(45, 9, 9),
(46, 9, 8),
(47, 9, 7),
(48, 10, 2),
(49, 10, 6),
(50, 10, 7),
(51, 10, 8),
(52, 10, 9),
(53, 10, 10),
(54, 9, 2),
(55, 11, 2),
(56, 11, 6),
(57, 11, 10),
(58, 11, 9),
(59, 1, 11),
(61, 1, 12),
(66, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icons` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icons`) VALUES
(1, 'Admin', 'fas fa-fw fa-users-cog'),
(2, 'User', 'fas fa-fw fa-user'),
(3, 'Menu', 'fas fa-fw fa-folder'),
(6, 'Kasir', 'fas fa-fw fa-file-invoice'),
(7, 'Gudang', 'fas fa-fw fa-warehouse'),
(9, 'Teknisi', 'fas fa-fw fa-screwdriver'),
(10, 'Marketing', 'fas fa-fw fa-chart-line');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'DeveloperAccount'),
(3, 'Member Account'),
(8, 'Marketing dan Kasir'),
(9, 'Teknisi dan Stok'),
(10, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `tittle` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `tittle`, `url`, `is_active`) VALUES
(2, 2, 'Profil Saya', 'admin/user', 1),
(3, 2, 'Ubah Profil', 'admin/user/edit', 1),
(4, 3, 'Menu Management', 'admin/menu', 1),
(5, 3, 'Submenu Management', 'admin/menu/submenu', 1),
(8, 1, 'Management Role', 'admin/admin/role', 1),
(9, 2, 'Ubah Password', 'admin/user/changepassword', 1),
(11, 1, 'Management User', 'admin/admin/userLevel', 1),
(18, 7, 'Stok', 'admin/gudang/stok', 1),
(19, 6, 'Penjualan Baru', 'admin/kasir/penjualanBaru', 0),
(20, 7, 'Product', 'admin/gudang/product', 1),
(21, 6, 'Nota Belum Diambil', 'admin/kasir/belumDiambil', 0),
(22, 7, 'Platform', 'admin/gudang/platform', 1),
(23, 9, 'Dasboard Teknisi', 'admin/teknisi', 1),
(24, 10, 'Marketing', 'admin/marketing', 1),
(25, 6, 'Diambil', 'admin/kasir/notaDiambil', 0),
(26, 6, 'Semua Transaksi', 'admin/kasir/semuaTransaksi', 0),
(28, 6, 'Kasir Dashboard', 'admin/kasir', 1),
(29, 9, 'Riwayat Servis Selesai', 'admin/teknisi/riwayatServisSelesai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `who_comment`
--

CREATE TABLE `who_comment` (
  `id_Wcomment` int(11) NOT NULL,
  `id_Tcomment` int(11) NOT NULL,
  `id_commenter` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `who_comment`
--

INSERT INTO `who_comment` (`id_Wcomment`, `id_Tcomment`, `id_commenter`) VALUES
(1, 72720001, '26,25'),
(2, 72720002, '25,26');

-- --------------------------------------------------------

--
-- Table structure for table `xtransaksi`
--

CREATE TABLE `xtransaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `id_device` varchar(20) NOT NULL,
  `tanggal_taransaksi` int(11) NOT NULL,
  `tanggal_selesai` int(11) NOT NULL,
  `tanggal_diambil` int(11) NOT NULL,
  `platform` int(11) NOT NULL,
  `total_barang` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `disc_status` tinyint(1) NOT NULL,
  `is_cash` tinyint(1) NOT NULL,
  `cash` float NOT NULL,
  `total` float NOT NULL,
  `change_nominal` float NOT NULL,
  `grand_total` float NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `stasus_pengerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xtransaksi`
--

INSERT INTO `xtransaksi` (`id_transaksi`, `id_pelanggan`, `id_user`, `id_teknisi`, `id_device`, `tanggal_taransaksi`, `tanggal_selesai`, `tanggal_diambil`, `platform`, `total_barang`, `diskon`, `disc_status`, `is_cash`, `cash`, `total`, `change_nominal`, `grand_total`, `status_pembayaran`, `stasus_pengerjaan`) VALUES
(40520001, 1586066597, 8, 1, '', 1586066474, 0, 1586066474, 10, 1, 0, 1, 0, 100000, 1, 0, 100000, 99, 99),
(40520002, 1586067382, 8, 1, '', 1586067259, 0, 1586066474, 16, 1, 0, 1, 1, 100000, 1, 0, 100000, 99, 99),
(40520003, 1586069333, 8, 1, '', 1586069210, 0, 1586066474, 10, 1, 100, 1, 1, 0, 1, 0, 0, 99, 99),
(40520004, 1586069523, 8, 1, '', 1586069400, 0, 1586066474, 11, 2, 25000, 0, 1, 150000, 1, 25000, 125000, 99, 99),
(40520005, 1586075696, 8, 1, '', 1586075573, 0, 1586066474, 8, 1, 5000, 0, 1, 45000, 1, 0, 45000, 99, 99),
(40520006, 1586078421, 8, 1, '', 1586078298, 0, 1586066474, 12, 1, 50000, 0, 0, 1250000, 1, 0, 1250000, 99, 99),
(40520007, 1586079101, 8, 1, '', 1586078978, 0, 1586066474, 11, 1, 0, 1, 1, 25000, 1, 0, 25000, 99, 99),
(40520008, 1586082872, 14, 1, '', 1586082749, 0, 1586066474, 7, 1, 25000, 0, 1, 500000, 1, 25000, 475000, 99, 99),
(40720012, 1586246548, 1, 1, '', 1586246425, 0, 1586246425, 8, 1, 80, 1, 1, 100000, 1, 30000, 70000, 99, 99),
(40820009, 1586339960, 1, 1, '', 1586339837, 0, 1586066474, 14, 2, 10, 1, 1, 300000, 1, 30000, 270000, 99, 99),
(40920010, 1586416406, 1, 1, '', 1586416283, 0, 1586416283, 97, 1, 80000, 0, 1, 750000, 1, 30000, 720000, 99, 99),
(40920011, 1586416511, 1, 1, '', 1586416388, 0, 1586416388, 22, 1, 5, 1, 0, 250000, 1, 12500, 237500, 99, 99),
(40920013, 1586425596, 1, 1, '', 1586425473, 0, 1586485227, 9, 1, 25000, 0, 1, 425000, 1, 0, 425000, 99, 99),
(40920014, 2147483647, 1, 1, '', 1586425979, 0, 1586489481, 8, 1, 0, 0, 1, 350000, 1, 0, 350000, 99, 99),
(40920015, 1586426219, 1, 1, '', 1586426096, 0, 1586485174, 6, 2, 50000, 0, 0, 600000, 1, 0, 600000, 99, 99),
(41020016, 2147483647, 1, 1, '', 1586487357, 0, 1586489446, 10, 1, 5, 1, 1, 380000, 1, 0, 380000, 99, 99),
(41120017, 1586597337, 1, 19, '', 1586597214, 0, 1586601403, 16, 1, 0, 0, 1, 1200000, 1, 0, 1200000, 99, 99),
(41120018, 1586600982, 1, 1, '', 1586600859, 0, 1586601370, 14, 1, 0, 0, 1, 750000, 1, 0, 750000, 99, 99),
(41120019, 1586601312, 1, 19, '', 1586601189, 0, 1586601329, 10, 1, 10, 1, 1, 900000, 1, 0, 900000, 99, 99),
(41220002, 1586668514, 1, 19, '', 1586668391, 0, 1586668811, 12, 1, 80000, 0, 1, 550000, 1, 30000, 520000, 99, 99),
(41220003, 1586668615, 1, 1, '', 1586668492, 0, 1586668788, 8, 1, 5, 1, 1, 350000, 1, 0, 350000, 99, 99),
(41220004, 1586684900, 1, 1, '', 1586684777, 0, 1586684975, 16, 1, 50000, 0, 1, 1150000, 1, 0, 1150000, 99, 99),
(41220020, 1586665405, 1, 22, '', 1586665282, 20200521, 1586668764, 12, 1, 10, 1, 1, 450000, 1, 0, 450000, 99, 5),
(41520001, 1586949431, 1, 1, '', 1586949308, 20200521, 0, 9, 1, 0, 0, 1, 0, 1, 0, 800000, 99, 5),
(41520002, 1586951359, 1, 1, '', 1586951236, 20200521, 0, 10, 1, 0, 0, 1, 0, 1, -400000, 400000, 1, 5),
(41520003, 1586951420, 1, 1, '', 1586951297, 20200521, 0, 16, 1, 0, 0, 1, 0, 1, 0, 100000, 99, 6),
(41520004, 1586951454, 1, 1, '', 1586951331, 0, 0, 16, 1, 0, 0, 1, 0, 1, 0, 100000, 99, 5),
(41520005, 1586951535, 1, 1, '', 1586951412, 0, 0, 9, 1, 0, 0, 1, 0, 1, 0, 450000, 99, 5),
(41520006, 1586956135, 1, 1, '', 1586956012, 0, 0, 14, 1, 0, 0, 1, 0, 1, 0, 750000, 99, 5),
(41620001, 1587020929, 1, 1, '', 1587020806, 0, 1587027481, 16, 0, 0, 0, 1, 0, 1, 0, 0, 3, 99),
(41620002, 1587027815, 1, 1, '', 1587027692, 0, 1587027851, 13, 1, 0, 0, 1, 0, 1, -500000, 500000, 3, 99),
(41620003, 1587028929, 1, 1, '', 1587028806, 0, 1587028806, 8, 1, 0, 0, 1, 250000, 1, 0, 250000, 99, 99),
(41820001, 1587196950, 1, 20, '', 1587196827, 1589273216, 0, 6, 2, 0, 0, 0, 0, 1, 0, 5200000, 1, 5),
(41820002, 1587198364, 1, 1, '', 1587198241, 1589609233, 0, 25, 5, 0, 0, 0, 0, 1, 0, 1250000, 1, 5),
(41820003, 1587198576, 1, 20, '', 1587198453, 0, 0, 31, 1, 0, 0, 0, 0, 1, 0, 4000000, 1, 5),
(41820004, 1587198702, 1, 1, '', 1587198579, 1589389079, 0, 30, 5, 0, 0, 0, 0, 1, 0, 1000000, 1, 5),
(50720001, 1588828220, 1, 1, '', 1588828097, 0, 0, 17, 2, 0, 0, 0, 0, 1, 0, 1800000, 1, 5),
(50820001, 1588913948, 20, 20, '', 1588913825, 0, 0, 100, 2, 0, 0, 0, 0, 1, 0, 2600000, 1, 5),
(50820002, 1588914059, 20, 20, '', 1588913936, 0, 0, 67, 1, 0, 0, 0, 0, 1, 0, 200000, 1, 5),
(50820003, 1588914363, 20, 20, '', 1588914240, 0, 0, 14, 1, 0, 0, 0, 0, 1, 0, 1500000, 1, 5),
(50920001, 1589002869, 20, 20, '', 1589002746, 0, 0, 19, 1, 0, 0, 0, 0, 1, 0, 1200000, 1, 5),
(50920002, 1589003381, 20, 20, '', 1589003258, 1589269947, 0, 30, 1, 0, 0, 0, 0, 1, 0, 500000, 1, 5),
(50920003, 1589013329, 20, 20, '', 1589013206, 20200612, 0, 97, 1, 0, 0, 0, 0, 1, 0, 2000000, 1, 5),
(51220001, 1589269758, 20, 22, '', 1589269635, 1589269882, 0, 12, 5, 0, 0, 0, 0, 1, 0, 1000000, 1, 3),
(51420001, 1589424462, 20, 22, '', 1589424339, 20200612, 0, 12, 3, 0, 0, 0, 0, 1, 0, 1000000, 1, 4),
(51420002, 1589425385, 20, 22, '', 1589425262, 1589640242, 0, 40, 2, 0, 0, 0, 0, 1, 0, 700000, 1, 6),
(51620001, 1589610829, 20, 20, '', 1589610706, 1589640212, 0, 10, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 2),
(51620002, 1589610865, 20, 22, '', 1589610742, 1589640262, 0, 39, 2, 0, 0, 0, 0, 1, 0, 3500000, 1, 2),
(51820001, 1589784388, 1, 22, '', 1589784265, 20200627, 0, 17, 3, 0, 0, 0, 0, 1, 0, 750000, 1, 5),
(51820002, 1589784525, 20, 1, '', 1589784402, 20200518, 0, 32, 5, 0, 0, 0, 0, 1, 0, 1000000, 1, 6),
(51820003, 1589784578, 20, 20, '', 1589784455, 20200603, 0, 87, 3, 0, 0, 0, 0, 1, 0, 1500000, 1, 6),
(51820004, 1589784635, 20, 20, '', 1589784512, 20200602, 0, 3, 4, 0, 0, 0, 0, 1, 0, 2800000, 1, 6),
(51820005, 1589785007, 20, 20, '', 1589784884, 20200610, 0, 101, 10, 0, 0, 0, 0, 1, 0, 1700000, 1, 5),
(52120001, 1590071231, 20, 20, '', 1591290000, 20200626, 0, 97, 11, 0, 0, 0, 0, 1, 0, 2950000, 1, 6),
(60320001, 1591192921, 20, 20, '', 1591192798, 20200603, 0, 14, 4, 0, 0, 0, 0, 1, 0, 1900000, 1, 6),
(60520001, 1591350654, 20, 20, '', 1591203600, 20200605, 0, 14, 10, 0, 0, 0, 0, 1, 0, 5000000, 1, 4),
(60520002, 1591351049, 20, 22, '', 1593882000, 20200624, 0, 100, 5, 0, 0, 0, 0, 1, -650000, 950000, 2, 5),
(60920001, 1591687285, 20, 20, 'X22362677', 1591687162, 20200612, 1591957201, 16, 1, 0, 0, 1, 250000, 1, 0, 250000, 99, 5),
(61220001, 1591967000, 20, 20, 'G6615156', 1591966877, 20200612, 0, 97, 1, 0, 0, 0, 0, 1, 0, 1750000, 1, 5),
(61320001, 1592029825, 20, 20, 'C4C1NG4N', 1590598800, 20200626, 0, 101, 2, 0, 0, 0, 0, 1, 0, 300000, 1, 6),
(61320002, 1592031346, 20, 20, '342321', 1593536400, 20200626, 0, 15, 3, 0, 0, 0, 0, 1, 0, 550000, 2, 6),
(61320003, 1592031500, 20, 20, '9JGJ67', 1590685200, 20200620, 0, 80, 3, 0, 0, 0, 0, 1, 0, 550000, 1, 4),
(61920001, 1592550200, 20, 20, 'STK001', 1592550077, 20200623, 0, 14, 6, 0, 0, 0, 0, 1, 0, 2200000, 1, 2),
(62020001, 1592646563, 20, 20, '', 1591376400, 20200620, 0, 39, 3, 0, 0, 0, 0, 1, 0, 350000, 1, 2),
(62020002, 1592646972, 20, 20, 'QWE123', 1592646849, 20200625, 0, 99, 8, 0, 0, 0, 0, 1, 0, 1250000, 1, 5),
(62320001, 1592884233, 20, 20, 'IP2805', 1593882000, 20200623, 0, 22, 18, 0, 0, 0, 0, 1, 0, 3400000, 1, 2),
(62320002, 1592885712, 20, 20, 'MCP001', 1592885589, 20200623, 0, 64, 15, 0, 0, 0, 0, 1, 0, 2200000, 1, 5),
(62320003, 1592886171, 20, 20, 'IP0034', 1592886048, 20200623, 0, 101, 5, 0, 0, 0, 0, 1, 0, 1000000, 1, 5),
(62320004, 1592893471, 20, 20, 'MA00134', 1592893348, 20200623, 0, 3, 7, 0, 0, 0, 0, 1, 0, 1000000, 1, 5),
(62320005, 1592906261, 20, 20, 'IPXR003', 1592906138, 0, 0, 17, 6, 0, 0, 0, 0, 1, 0, 700000, 1, 3),
(62320006, 1592907981, 20, 22, 'IPX002', 1592907858, 20200623, 0, 97, 5, 0, 0, 0, 0, 1, 0, 650000, 1, 5),
(62320007, 1592913411, 20, 22, 'IP007', 1592913288, 20200623, 0, 14, 2, 0, 0, 0, 0, 1, 0, 100000, 1, 6),
(62520001, 1593089201, 20, 20, 'MC0012', 1593089078, 20200625, 0, 86, 1, 0, 0, 0, 0, 1, 0, 50000, 1, 5),
(62520002, 1593090240, 20, 20, 'MPC0012', 1593090117, 0, 0, 40, 1, 0, 0, 0, 0, 1, 0, 250000, 1, 2),
(62520003, 1593090327, 20, 20, '', 1593090204, 20200626, 0, 14, 1, 0, 0, 0, 0, 1, 0, 450000, 1, 5),
(62620001, 1593142603, 20, 22, 'X00123', 1593142480, 20200630, 0, 8, 1, 0, 0, 0, 0, 1, 0, 50000, 1, 5),
(62620002, 1593157999, 1, 20, 'IPO001', 1593157876, 20200630, 0, 8, 8, 0, 0, 0, 0, 1, 0, 1450000, 1, 5),
(62720001, 1593227616, 1, 20, 'IPX003', 1593227493, 20200627, 0, 17, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 6),
(62720002, 1593227677, 1, 20, 'MCPR0023', 1593227554, 20200627, 0, 43, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 6),
(62720003, 1593227822, 20, 22, 'IP0028', 1593227699, 20200627, 0, 96, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 5),
(62720004, 1593227870, 1, 22, 'IPXS0089', 1593227747, 20200627, 0, 19, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 5),
(62720005, 1593249548, 20, 22, 'IP80012', 1593249425, 20200627, 0, 14, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 5),
(62720006, 1593267088, 1, 20, 'G6615156', 1593266965, 0, 0, 8, 4, 0, 0, 0, 0, 0, -600000, 600000, 2, 2),
(63020001, 1593500606, 20, 20, 'IP6S221212', 1593500483, 20200630, 1593501999, 10, 4, 300000, 0, 1, 1500000, 1500000, 300000, 1200000, 99, 99);

-- --------------------------------------------------------

--
-- Table structure for table `ztransaksi`
--

CREATE TABLE `ztransaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `id_device` varchar(20) NOT NULL,
  `tanggal_taransaksi` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tanggal_diambil` datetime NOT NULL,
  `platform` int(11) NOT NULL,
  `total_barang` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `disc_status` tinyint(1) NOT NULL,
  `is_cash` tinyint(1) NOT NULL,
  `cash` float NOT NULL,
  `total` float NOT NULL,
  `change_nominal` float NOT NULL,
  `grand_total` float NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `stasus_pengerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ztransaksi`
--

INSERT INTO `ztransaksi` (`id_transaksi`, `id_pelanggan`, `id_user`, `id_teknisi`, `id_device`, `tanggal_taransaksi`, `tanggal_selesai`, `tanggal_diambil`, `platform`, `total_barang`, `diskon`, `disc_status`, `is_cash`, `cash`, `total`, `change_nominal`, `grand_total`, `status_pembayaran`, `stasus_pengerjaan`) VALUES
(40520001, 1586066597, 8, 1, '', '2020-04-05 13:01:14', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 10, 1, 0, 1, 0, 100000, 1, 0, 100000, 99, 99),
(40520002, 1586067382, 8, 1, '', '2020-04-05 13:14:19', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 16, 1, 0, 1, 1, 100000, 1, 0, 100000, 99, 99),
(40520003, 1586069333, 8, 1, '', '2020-04-05 13:46:50', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 10, 1, 100, 1, 1, 0, 1, 0, 0, 99, 99),
(40520004, 1586069523, 8, 1, '', '2020-04-05 13:50:00', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 11, 2, 25000, 0, 1, 150000, 1, 25000, 125000, 99, 99),
(40520005, 1586075696, 8, 1, '', '2020-04-05 15:32:53', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 8, 1, 5000, 0, 1, 45000, 1, 0, 45000, 99, 99),
(40520006, 1586078421, 8, 1, '', '2020-04-05 16:18:18', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 12, 1, 50000, 0, 0, 1250000, 1, 0, 1250000, 99, 99),
(40520007, 1586079101, 8, 1, '', '2020-04-05 16:29:38', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 11, 1, 0, 1, 1, 25000, 1, 0, 25000, 99, 99),
(40520008, 1586082872, 14, 1, '', '2020-04-05 17:32:29', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 7, 1, 25000, 0, 1, 500000, 1, 25000, 475000, 99, 99),
(40720012, 1586246548, 1, 1, '', '2020-04-07 15:00:25', '0000-00-00 00:00:00', '2020-04-07 15:00:25', 8, 1, 80, 1, 1, 100000, 1, 30000, 70000, 99, 99),
(40820009, 1586339960, 1, 1, '', '2020-04-08 16:57:17', '0000-00-00 00:00:00', '2020-04-05 13:01:14', 14, 2, 10, 1, 1, 300000, 1, 30000, 270000, 99, 99),
(40920010, 1586416406, 1, 1, '', '2020-04-09 14:11:23', '0000-00-00 00:00:00', '2020-04-09 14:11:23', 97, 1, 80000, 0, 1, 750000, 1, 30000, 720000, 99, 99),
(40920011, 1586416511, 1, 1, '', '2020-04-09 14:13:08', '0000-00-00 00:00:00', '2020-04-09 14:13:08', 22, 1, 5, 1, 0, 250000, 1, 12500, 237500, 99, 99),
(40920013, 1586425596, 1, 1, '', '2020-04-09 16:44:33', '0000-00-00 00:00:00', '2020-04-10 09:20:27', 9, 1, 25000, 0, 1, 425000, 1, 0, 425000, 99, 99),
(40920014, 2147483647, 1, 1, '', '2020-04-09 16:52:59', '0000-00-00 00:00:00', '2020-04-10 10:31:21', 8, 1, 0, 0, 1, 350000, 1, 0, 350000, 99, 99),
(40920015, 1586426219, 1, 1, '', '2020-04-09 16:54:56', '0000-00-00 00:00:00', '2020-04-10 09:19:34', 6, 2, 50000, 0, 0, 600000, 1, 0, 600000, 99, 99),
(41020016, 2147483647, 1, 1, '', '2020-04-10 09:55:57', '0000-00-00 00:00:00', '2020-04-10 10:30:46', 10, 1, 5, 1, 1, 380000, 1, 0, 380000, 99, 99),
(41120017, 1586597337, 1, 19, '', '2020-04-11 16:26:54', '0000-00-00 00:00:00', '2020-04-11 17:36:43', 16, 1, 0, 0, 1, 1200000, 1, 0, 1200000, 99, 99),
(41120018, 1586600982, 1, 1, '', '2020-04-11 17:27:39', '0000-00-00 00:00:00', '2020-04-11 17:36:10', 14, 1, 0, 0, 1, 750000, 1, 0, 750000, 99, 99),
(41120019, 1586601312, 1, 19, '', '2020-04-11 17:33:09', '0000-00-00 00:00:00', '2020-04-11 17:35:29', 10, 1, 10, 1, 1, 900000, 1, 0, 900000, 99, 99),
(41220002, 1586668514, 1, 19, '', '2020-04-12 12:13:11', '0000-00-00 00:00:00', '2020-04-12 12:20:11', 12, 1, 80000, 0, 1, 550000, 1, 30000, 520000, 99, 99),
(41220003, 1586668615, 1, 1, '', '2020-04-12 12:14:52', '0000-00-00 00:00:00', '2020-04-12 12:19:48', 8, 1, 5, 1, 1, 350000, 1, 0, 350000, 99, 99),
(41220004, 1586684900, 1, 1, '', '2020-04-12 16:46:17', '0000-00-00 00:00:00', '2020-04-12 16:49:35', 16, 1, 50000, 0, 1, 1150000, 1, 0, 1150000, 99, 99),
(41220020, 1586665405, 1, 22, '', '2020-04-12 11:21:22', '2020-05-21 00:00:00', '2020-04-12 12:19:24', 12, 1, 10, 1, 1, 450000, 1, 0, 450000, 99, 5),
(41520001, 1586949431, 1, 1, '', '2020-04-15 18:15:08', '2020-05-21 00:00:00', '0000-00-00 00:00:00', 9, 1, 0, 0, 1, 0, 1, 0, 800000, 99, 5),
(41520002, 1586951359, 1, 1, '', '2020-04-15 18:47:16', '2020-05-21 00:00:00', '0000-00-00 00:00:00', 10, 1, 0, 0, 1, 0, 1, -400000, 400000, 1, 5),
(41520003, 1586951420, 1, 1, '', '2020-04-15 18:48:17', '2020-05-21 00:00:00', '0000-00-00 00:00:00', 16, 1, 0, 0, 1, 0, 1, 0, 100000, 99, 6),
(41520004, 1586951454, 1, 1, '', '2020-04-15 18:48:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 1, 0, 0, 1, 0, 1, 0, 100000, 99, 5),
(41520005, 1586951535, 1, 1, '', '2020-04-15 18:50:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 1, 0, 0, 1, 0, 1, 0, 450000, 99, 5),
(41520006, 1586956135, 1, 1, '', '2020-04-15 20:06:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 1, 0, 0, 1, 0, 1, 0, 750000, 99, 5),
(41620001, 1587020929, 1, 1, '', '2020-04-16 14:06:46', '0000-00-00 00:00:00', '2020-04-16 15:58:01', 16, 0, 0, 0, 1, 0, 1, 0, 0, 3, 99),
(41620002, 1587027815, 1, 1, '', '2020-04-16 16:01:32', '0000-00-00 00:00:00', '2020-04-16 16:04:11', 13, 1, 0, 0, 1, 0, 1, -500000, 500000, 3, 99),
(41620003, 1587028929, 1, 1, '', '2020-04-16 16:20:06', '0000-00-00 00:00:00', '2020-04-16 16:20:06', 8, 1, 0, 0, 1, 250000, 1, 0, 250000, 99, 99),
(41820001, 1587196950, 1, 20, '', '2020-04-18 15:00:27', '2020-05-12 15:46:56', '0000-00-00 00:00:00', 6, 2, 0, 0, 0, 0, 1, 0, 5200000, 1, 5),
(41820002, 1587198364, 1, 1, '', '2020-04-18 15:24:01', '2020-05-16 13:07:13', '0000-00-00 00:00:00', 25, 5, 0, 0, 0, 0, 1, 0, 1250000, 1, 5),
(41820003, 1587198576, 1, 20, '', '2020-04-18 15:27:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 31, 1, 0, 0, 0, 0, 1, 0, 4000000, 1, 5),
(41820004, 1587198702, 1, 1, '', '2020-04-18 15:29:39', '2020-05-13 23:57:59', '0000-00-00 00:00:00', 30, 5, 0, 0, 0, 0, 1, 0, 1000000, 1, 5),
(50720001, 1588828220, 1, 1, '', '2020-05-07 12:08:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 17, 2, 0, 0, 0, 0, 1, 0, 1800000, 1, 5),
(50820001, 1588913948, 20, 20, '', '2020-05-08 11:57:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 2, 0, 0, 0, 0, 1, 0, 2600000, 1, 5),
(50820002, 1588914059, 20, 20, '', '2020-05-08 11:58:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 67, 1, 0, 0, 0, 0, 1, 0, 200000, 1, 5),
(50820003, 1588914363, 20, 20, '', '2020-05-08 12:04:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 1, 0, 0, 0, 0, 1, 0, 1500000, 1, 5),
(50920001, 1589002869, 20, 20, '', '2020-05-09 12:39:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 19, 1, 0, 0, 0, 0, 1, 0, 1200000, 1, 5),
(50920002, 1589003381, 20, 20, '', '2020-05-09 12:47:38', '2020-05-12 14:52:27', '0000-00-00 00:00:00', 30, 1, 0, 0, 0, 0, 1, 0, 500000, 1, 5),
(50920003, 1589013329, 20, 20, '', '2020-05-09 15:33:26', '2020-06-12 00:00:00', '0000-00-00 00:00:00', 97, 1, 0, 0, 0, 0, 1, 0, 2000000, 1, 5),
(51220001, 1589269758, 20, 22, '', '2020-05-12 14:47:15', '2020-05-12 14:51:22', '0000-00-00 00:00:00', 12, 5, 0, 0, 0, 0, 1, 0, 1000000, 1, 3),
(51420001, 1589424462, 20, 22, '', '2020-05-14 09:45:39', '2020-06-12 00:00:00', '0000-00-00 00:00:00', 12, 3, 0, 0, 0, 0, 1, 0, 1000000, 1, 4),
(51420002, 1589425385, 20, 22, '', '2020-05-14 10:01:02', '2020-05-16 21:44:02', '0000-00-00 00:00:00', 40, 2, 0, 0, 0, 0, 1, 0, 700000, 1, 6),
(51620001, 1589610829, 20, 20, '', '2020-05-16 13:31:46', '2020-05-16 21:43:32', '0000-00-00 00:00:00', 10, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 2),
(51620002, 1589610865, 20, 22, '', '2020-05-16 13:32:22', '2020-05-16 21:44:22', '0000-00-00 00:00:00', 39, 2, 0, 0, 0, 0, 1, 0, 3500000, 1, 2),
(51820001, 1589784388, 1, 22, '', '2020-05-18 13:44:25', '2020-06-27 00:00:00', '0000-00-00 00:00:00', 17, 3, 0, 0, 0, 0, 1, 0, 750000, 1, 5),
(51820002, 1589784525, 20, 1, '', '2020-05-18 13:46:42', '2020-05-18 00:00:00', '0000-00-00 00:00:00', 32, 5, 0, 0, 0, 0, 1, 0, 1000000, 1, 6),
(51820003, 1589784578, 20, 20, '', '2020-05-18 13:47:35', '2020-06-03 00:00:00', '0000-00-00 00:00:00', 87, 3, 0, 0, 0, 0, 1, 0, 1500000, 1, 6),
(51820004, 1589784635, 20, 20, '', '2020-05-18 13:48:32', '2020-06-02 00:00:00', '0000-00-00 00:00:00', 3, 4, 0, 0, 0, 0, 1, 0, 2800000, 1, 6),
(51820005, 1589785007, 20, 20, '', '2020-05-18 13:54:44', '2020-06-10 00:00:00', '0000-00-00 00:00:00', 101, 10, 0, 0, 0, 0, 1, 0, 1700000, 1, 5),
(52120001, 1590071231, 20, 20, '', '2020-06-05 00:00:00', '2020-06-26 00:00:00', '0000-00-00 00:00:00', 97, 11, 0, 0, 0, 0, 1, 0, 2950000, 1, 6),
(60320001, 1591192921, 20, 20, '', '2020-06-03 20:59:58', '2020-06-03 00:00:00', '0000-00-00 00:00:00', 14, 4, 0, 0, 0, 0, 1, 0, 1900000, 1, 6),
(60520001, 1591350654, 20, 20, '', '2020-06-04 00:00:00', '2020-06-05 00:00:00', '0000-00-00 00:00:00', 14, 10, 0, 0, 0, 0, 1, 0, 5000000, 1, 4),
(60520002, 1591351049, 20, 22, '', '2020-07-05 00:00:00', '2020-06-24 00:00:00', '0000-00-00 00:00:00', 100, 5, 0, 0, 0, 0, 1, -650000, 950000, 2, 5),
(60920001, 1591687285, 20, 20, 'X22362677', '2020-06-09 14:19:22', '2020-06-12 00:00:00', '2020-06-12 17:20:01', 16, 1, 0, 0, 1, 250000, 1, 0, 250000, 99, 5),
(61220001, 1591967000, 20, 20, 'G6615156', '2020-06-12 20:01:17', '2020-06-12 00:00:00', '0000-00-00 00:00:00', 97, 1, 0, 0, 0, 0, 1, 0, 1750000, 1, 5),
(61320001, 1592029825, 20, 20, 'C4C1NG4N', '2020-05-28 00:00:00', '2020-06-26 00:00:00', '0000-00-00 00:00:00', 101, 2, 0, 0, 0, 0, 1, 0, 300000, 1, 6),
(61320002, 1592031346, 20, 20, '342321', '2020-07-01 00:00:00', '2020-06-26 00:00:00', '0000-00-00 00:00:00', 15, 3, 0, 0, 0, 0, 1, 0, 550000, 2, 6),
(61320003, 1592031500, 20, 20, '9JGJ67', '2020-05-29 00:00:00', '2020-06-20 00:00:00', '0000-00-00 00:00:00', 80, 3, 0, 0, 0, 0, 1, 0, 550000, 1, 4),
(61920001, 1592550200, 20, 20, 'STK001', '2020-06-19 14:01:17', '2020-06-23 00:00:00', '0000-00-00 00:00:00', 14, 6, 0, 0, 0, 0, 1, 0, 2200000, 1, 2),
(62020001, 1592646563, 20, 20, '', '2020-06-06 00:00:00', '2020-06-20 00:00:00', '0000-00-00 00:00:00', 39, 3, 0, 0, 0, 0, 1, 0, 350000, 1, 2),
(62020002, 1592646972, 20, 20, 'QWE123', '2020-06-20 16:54:09', '2020-06-25 00:00:00', '0000-00-00 00:00:00', 99, 8, 0, 0, 0, 0, 1, 0, 1250000, 1, 5),
(62320001, 1592884233, 20, 20, 'IP2805', '2020-07-05 00:00:00', '2020-06-23 00:00:00', '0000-00-00 00:00:00', 22, 18, 0, 0, 0, 0, 1, 0, 3400000, 1, 2),
(62320002, 1592885712, 20, 20, 'MCP001', '2020-06-23 11:13:09', '2020-06-23 00:00:00', '0000-00-00 00:00:00', 64, 15, 0, 0, 0, 0, 1, 0, 2200000, 1, 5),
(62320003, 1592886171, 20, 20, 'IP0034', '2020-06-23 11:20:48', '2020-06-23 00:00:00', '0000-00-00 00:00:00', 101, 5, 0, 0, 0, 0, 1, 0, 1000000, 1, 5),
(62320004, 1592893471, 20, 20, 'MA00134', '2020-06-23 13:22:28', '2020-06-23 00:00:00', '0000-00-00 00:00:00', 3, 7, 0, 0, 0, 0, 1, 0, 1000000, 1, 5),
(62320005, 1592906261, 20, 20, 'IPXR003', '2020-06-23 16:55:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 17, 6, 0, 0, 0, 0, 1, 0, 700000, 1, 3),
(62320006, 1592907981, 20, 22, 'IPX002', '2020-06-23 17:24:18', '2020-06-23 00:00:00', '0000-00-00 00:00:00', 97, 5, 0, 0, 0, 0, 1, 0, 650000, 1, 5),
(62320007, 1592913411, 20, 22, 'IP007', '2020-06-23 18:54:48', '2020-06-23 00:00:00', '0000-00-00 00:00:00', 14, 2, 0, 0, 0, 0, 1, 0, 100000, 1, 6),
(62520001, 1593089201, 20, 20, 'MC0012', '2020-06-25 19:44:38', '2020-06-25 00:00:00', '0000-00-00 00:00:00', 86, 1, 0, 0, 0, 0, 1, 0, 50000, 1, 5),
(62520002, 1593090240, 20, 20, 'MPC0012', '2020-06-25 20:01:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, 1, 0, 0, 0, 0, 1, 0, 250000, 1, 2),
(62520003, 1593090327, 20, 20, '', '2020-06-25 20:03:24', '2020-06-26 00:00:00', '0000-00-00 00:00:00', 14, 1, 0, 0, 0, 0, 1, 0, 450000, 1, 5),
(62620001, 1593142603, 20, 22, 'X00123', '2020-06-26 10:34:40', '2020-06-30 00:00:00', '0000-00-00 00:00:00', 8, 1, 0, 0, 0, 0, 1, 0, 50000, 1, 5),
(62620002, 1593157999, 1, 20, 'IPO001', '2020-06-26 14:51:16', '2020-06-30 00:00:00', '0000-00-00 00:00:00', 8, 8, 0, 0, 0, 0, 1, 0, 1450000, 1, 5),
(62720001, 1593227616, 1, 20, 'IPX003', '2020-06-27 10:11:33', '2020-06-27 00:00:00', '0000-00-00 00:00:00', 17, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 6),
(62720002, 1593227677, 1, 20, 'MCPR0023', '2020-06-27 10:12:34', '2020-06-27 00:00:00', '0000-00-00 00:00:00', 43, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 6),
(62720003, 1593227822, 20, 22, 'IP0028', '2020-06-27 10:14:59', '2020-06-27 00:00:00', '0000-00-00 00:00:00', 96, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 5),
(62720004, 1593227870, 1, 22, 'IPXS0089', '2020-06-27 10:15:47', '2020-06-27 00:00:00', '0000-00-00 00:00:00', 19, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 5),
(62720005, 1593249548, 20, 22, 'IP80012', '2020-06-27 16:17:05', '2020-06-27 00:00:00', '0000-00-00 00:00:00', 14, 6, 0, 0, 0, 0, 1, 0, 1200000, 1, 5),
(62720006, 1593267088, 1, 20, 'G6615156', '2020-06-27 21:09:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 4, 0, 0, 0, 0, 0, -600000, 600000, 2, 2),
(63020001, 1593500606, 20, 20, 'IP6S221212', '2020-06-30 14:01:23', '2020-06-30 00:00:00', '2020-06-30 14:26:39', 10, 4, 300000, 0, 1, 1500000, 1500000, 300000, 1200000, 99, 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`no_booking`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_stock`
--
ALTER TABLE `log_stock`
  ADD PRIMARY KEY (`id_logstock`),
  ADD KEY `fk_logstok` (`id_barang`);

--
-- Indexes for table `log_transaksi`
--
ALTER TABLE `log_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_comment`
--
ALTER TABLE `notif_comment`
  ADD PRIMARY KEY (`id_Ncomment`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_platform`
--
ALTER TABLE `product_platform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Indexes for table `status_booking`
--
ALTER TABLE `status_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pengerjaan`
--
ALTER TABLE `status_pengerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_stok_tipepenjualan` (`id_tipepenjualan`);

--
-- Indexes for table `tipe_penjualan`
--
ALTER TABLE `tipe_penjualan`
  ADD PRIMARY KEY (`id_tipepenjualan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_kasir` (`id_user`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_platform` (`platform`),
  ADD KEY `fk_teknisi` (`id_teknisi`);

--
-- Indexes for table `transaksi_checklist`
--
ALTER TABLE `transaksi_checklist`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barangkeluar` (`id_barang`),
  ADD KEY `fk_transaksidet` (`id_transakasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menuid` (`menu_id`);

--
-- Indexes for table `who_comment`
--
ALTER TABLE `who_comment`
  ADD PRIMARY KEY (`id_Wcomment`);

--
-- Indexes for table `xtransaksi`
--
ALTER TABLE `xtransaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_kasir` (`id_user`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_platform` (`platform`),
  ADD KEY `fk_teknisi` (`id_teknisi`);

--
-- Indexes for table `ztransaksi`
--
ALTER TABLE `ztransaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_kasir` (`id_user`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_platform` (`platform`),
  ADD KEY `fk_teknisi` (`id_teknisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `no_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `log_stock`
--
ALTER TABLE `log_stock`
  MODIFY `id_logstock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_transaksi`
--
ALTER TABLE `log_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=855;

--
-- AUTO_INCREMENT for table `notif_comment`
--
ALTER TABLE `notif_comment`
  MODIFY `id_Ncomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_platform`
--
ALTER TABLE `product_platform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `status_pengerjaan`
--
ALTER TABLE `status_pengerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tipe_penjualan`
--
ALTER TABLE `tipe_penjualan`
  MODIFY `id_tipepenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_checklist`
--
ALTER TABLE `transaksi_checklist`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `who_comment`
--
ALTER TABLE `who_comment`
  MODIFY `id_Wcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `blog_category` (`id`);

--
-- Constraints for table `log_stock`
--
ALTER TABLE `log_stock`
  ADD CONSTRAINT `fk_logstok` FOREIGN KEY (`id_barang`) REFERENCES `stok` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_platform`
--
ALTER TABLE `product_platform`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `fk_stok_tipepenjualan` FOREIGN KEY (`id_tipepenjualan`) REFERENCES `tipe_penjualan` (`id_tipepenjualan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_kasir` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_platform` FOREIGN KEY (`platform`) REFERENCES `product_platform` (`id`),
  ADD CONSTRAINT `fk_teknisi` FOREIGN KEY (`id_teknisi`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_transaksidet` FOREIGN KEY (`id_transakasi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `fk_menuid` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
