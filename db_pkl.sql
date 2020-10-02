-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 05:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(200) NOT NULL,
  `judul` varchar(2000) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `pembimbing1` varchar(2000) NOT NULL,
  `pembimbing2` varchar(2000) NOT NULL,
  `kompetensi` varchar(2000) NOT NULL,
  `file` mediumtext NOT NULL,
  `email` text NOT NULL,
  `nilai` int(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `tipe_file` varchar(200) NOT NULL,
  `nim` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `judul`, `deskripsi`, `pembimbing1`, `pembimbing2`, `kompetensi`, `file`, `email`, `nilai`, `status`, `tipe_file`, `nim`) VALUES
(64, 'Skripsi 1', 'Skripsi1', 'Pembimbing 1', 'Pembimbing 2', 'RPL', 'SKRIPSI_FORMAT_LENGKAP__21.docx', 'ukirangamer@gmail.com', 0, 'BELUM DIPERIKSA', 'Proposal', 0),
(65, 'Skripsi 2', 'Skripsi 2', 'Skripsi 2', 'Skripsi 2', 'Skripsi 2', 'JURNAL_SKRIPSI1.docx', 'ukirangamer@gmail.com', 0, 'BELUM DIPERIKSA', 'Skripsi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(128) NOT NULL,
  `nip` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `nip`, `email`, `image`, `password`, `is_active`, `date_created`) VALUES
(3, 'Dosen', 1608561010, 'dosen@gmail.com', 'user1-128x128.jpg', '$2y$10$sLVPXrs2ZVXTfHd2sk/dI.wHpTB1kJey0HmAeeO3TAiGAHnm3sgn.', 1, 1572964834),
(10, 'Dosen', 1234554321, 'afif.alfrabi@gmail.com', 'default.jpg', '$2y$10$BPiF5og5VTpOSOG/r5RXG.gJyhZWXyj4Vm1qxKWybkrLOK4IAAufi', 1, 1573572454);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(128) NOT NULL,
  `nim` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `email`, `image`, `password`, `is_active`, `date_created`) VALUES
(4, 'Mahasiswa', 1608561020, 'mahasiswa@gmail.com', 'user8-128x128.jpg', '$2y$10$fSw7BA7hDd8O3Fwmtr/zHeW2m6sGYIh5ssKco4jeMWibtrAfm1KJi', 1, 1572964788),
(8, 'Afif Ubaidillah', 1608561010, 'afifubaidillah.unud1@gmail.com', 'default.jpg', '$2y$10$l5GmDH0jqd4M4/XZFyCoK.o6kMqp1LhK2Ma/sVuGtJCfuzpMdgEua', 1, 1573569601),
(10, 'Made Harry Dananjaya Adiartika', 1608561056, 'ukirangamer@gmail.com', 'default.jpg', '$2y$10$vVamXr2uhsF2v1Qsifw3h.oTLepp29bNdy5DtZiEIUghRRSM.t5HS', 1, 1573645614);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'aaaa@gmail.com', 'T+kLDINso6S9acqCZGKbp/xuNYKa3ob0/nAvSYTycMI=', 1573645531);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
