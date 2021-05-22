-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 03:02 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar_premi`
--

CREATE TABLE `bayar_premi` (
  `id_bayar` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_polis` int(11) NOT NULL,
  `tanggal_bayar` varchar(30) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `biaya_admin` varchar(50) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar_premi`
--

INSERT INTO `bayar_premi` (`id_bayar`, `id_anggota`, `id_polis`, `tanggal_bayar`, `jumlah_bayar`, `biaya_admin`, `jenis`) VALUES
(1, 2, 1, '2021-05-20', 500000, '37500', 'Pendidikan'),
(2, 2, 1, '2021-05-22', 500000, '37500', 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `data_anggota`
--

CREATE TABLE `data_anggota` (
  `id_anggota` int(11) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `umur` int(11) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `telepon` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `id_polis` int(11) NOT NULL,
  `polis` int(11) NOT NULL,
  `status_hubungan` varchar(37) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`id_anggota`, `ktp`, `nama`, `jenis_kelamin`, `umur`, `tanggal_lahir`, `telepon`, `alamat`, `pendidikan`, `id_polis`, `polis`, `status_hubungan`) VALUES
(1, '3204352203321123', 'Kiki Agustin', 'laki-laki', 22, '1999-01-31', 2147483647, 'Jl. Cibaduyut lama No. 57A Kota Bandung Jawa Barat', 'D3', 0, 1, ''),
(2, '3204357012010001', 'David Abdul', 'laki-laki', 10, '1999-06-20', 0, '', 'SD', 1, 0, 'Adik Kandung '),
(3, '3204352202221001', 'Dede Sanjaya', 'laki-laki', 25, '2005-01-22', 2147483647, 'Jl. Bandung No. 15', 'SMA', 0, 1, ''),
(4, '3204357012010021', 'Mega Kusmayati', 'Pilih', 10, '2011-01-22', 0, '', 'Pilih', 1, 0, 'Pilih');

-- --------------------------------------------------------

--
-- Table structure for table `klaim_asuransi`
--

CREATE TABLE `klaim_asuransi` (
  `id_klaim` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `usia` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klaim_asuransi`
--

INSERT INTO `klaim_asuransi` (`id_klaim`, `id_anggota`, `tanggal`, `usia`, `status`) VALUES
(1, 1, '2021-05-20', 22, 1),
(2, 2, '2021-05-22', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `date_created`, `is_active`, `role_id`) VALUES
(1, 'Jajang Maulana Dzikri', 'admin@admin.com', 'default.png', '$2y$10$f6EvJHfh.2pvNc.5T2E4EucQr.y6zJoAWdAISWF65dS7rEjR3gt9i', 1619596990, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar_premi`
--
ALTER TABLE `bayar_premi`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `klaim_asuransi`
--
ALTER TABLE `klaim_asuransi`
  ADD PRIMARY KEY (`id_klaim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar_premi`
--
ALTER TABLE `bayar_premi`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klaim_asuransi`
--
ALTER TABLE `klaim_asuransi`
  MODIFY `id_klaim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
