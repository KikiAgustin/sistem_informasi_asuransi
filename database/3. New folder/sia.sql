-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 09:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `tanggal_bayar` varchar(30) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar_premi`
--

INSERT INTO `bayar_premi` (`id_bayar`, `id_anggota`, `tanggal_bayar`, `jumlah_bayar`, `jenis`) VALUES
(1, 2, '2021-05-18', 500000, 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `data_anggota`
--

CREATE TABLE `data_anggota` (
  `id_anggota` int(11) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`id_anggota`, `ktp`, `nama`, `umur`, `alamat`) VALUES
(1, '32043522033211234', 'Kiki Agustin', 22, 'Jl. Cibaduyut lama No. 57A Kota Bandung Jawa Barat'),
(2, '32043566544532132', 'Mega Kusmayati', 19, 'Kp. Salamungkal Rt.02 Rw.07 Desa. Karangtunggal kec. Paseh Kab. Bandung'),
(3, '3212121234564321', 'Dede', 12, 'Bandung Barat');

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
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
