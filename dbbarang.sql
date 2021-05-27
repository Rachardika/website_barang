-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 09:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_item`
--

CREATE TABLE `t_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `kategori` varchar(110) NOT NULL,
  `lokasi` varchar(120) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `tanggal` varchar(110) NOT NULL,
  `jam` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_item`
--

INSERT INTO `t_item` (`item_id`, `barcode`, `nama`, `kategori`, `lokasi`, `stock`, `tanggal`, `jam`) VALUES
(39, 'AB7089', 'Compressor', 'General', 'Rak 2B4', 9, '28-May-2021', '02:34:36'),
(40, 'AB7098', 'Mech Seal', 'Oil Movement', 'Rak 1C4', 12, '28-May-2021', '02:35:20'),
(41, 'BC8088', 'VALVE', 'Production', 'Rak 18A2', 4, '28-May-2021', '02:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `jam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`kategori_id`, `nama`, `tanggal`, `jam`) VALUES
(15, 'General', '28-May-2021', '02:33:52'),
(16, 'Oil Movement', '28-May-2021', '02:34:09'),
(17, 'Production', '28-May-2021', '02:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `t_stockin`
--

CREATE TABLE `t_stockin` (
  `stockin_id` int(11) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `kategori` varchar(120) NOT NULL,
  `stock` int(11) NOT NULL,
  `detail` varchar(120) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(120) NOT NULL,
  `jam` varchar(120) NOT NULL,
  `username` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stockin`
--

INSERT INTO `t_stockin` (`stockin_id`, `barcode`, `nama`, `kategori`, `stock`, `detail`, `jumlah`, `tanggal`, `jam`, `username`) VALUES
(21, 'AB7089', 'Compressor', 'General', 9, 'PT Sampoerna', 13, '28-May-2021', '02:37:45', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `t_stockout`
--

CREATE TABLE `t_stockout` (
  `stockout_id` int(11) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `kategori` varchar(120) NOT NULL,
  `stock` int(11) NOT NULL,
  `detail` varchar(120) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(120) NOT NULL,
  `jam` varchar(120) NOT NULL,
  `penerima` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stockout`
--

INSERT INTO `t_stockout` (`stockout_id`, `barcode`, `nama`, `kategori`, `stock`, `detail`, `jumlah`, `tanggal`, `jam`, `penerima`) VALUES
(6, 'AB7098', 'Mech Seal', 'Oil Movement', 12, 'PT Podomoro', 7, '28-May-2021', '02:38:07', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_role` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `image` varchar(125) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tempat_lahir` varchar(125) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pangkat` varchar(128) NOT NULL,
  `jenkel` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `id_role`, `password`, `nama`, `image`, `nip`, `tempat_lahir`, `tgl_lahir`, `pangkat`, `jenkel`) VALUES
(4, 'kepala', 2, '21232f297a57a5a743894a0e4a801fc3', 'Kepala Pegawai', 'aa2.jpg', '12321400', 'Jakarta', '1999-02-01', 'kepala', 'Laki laki'),
(16, 'user', 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'Stevie Item', 'default.png', '360001', 'Tingkir', '1986-03-05', 'User', 'Laki laki');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_item`
--
ALTER TABLE `t_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `t_stockin`
--
ALTER TABLE `t_stockin`
  ADD PRIMARY KEY (`stockin_id`);

--
-- Indexes for table `t_stockout`
--
ALTER TABLE `t_stockout`
  ADD PRIMARY KEY (`stockout_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_item`
--
ALTER TABLE `t_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `t_stockin`
--
ALTER TABLE `t_stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_stockout`
--
ALTER TABLE `t_stockout`
  MODIFY `stockout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_role` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
