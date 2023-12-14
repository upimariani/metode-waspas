-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 12:05 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metode_waspas`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(11) NOT NULL,
  `per_bulan` int(11) NOT NULL,
  `per_tahun` int(11) NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `per_bulan`, `per_tahun`, `hasil`) VALUES
(5, 12, 2023, 4.3635),
(6, 12, 2023, 8.299),
(7, 12, 2023, 8.299),
(8, 1, 2024, 8.3852),
(9, 1, 2024, 8.1196);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kriteria` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_user`, `nama_kriteria`) VALUES
(1, 0, 'Pendapatan Kepala Keluarga'),
(2, 0, 'Tunjangan Anak'),
(3, 0, 'Kondisi Rumah'),
(4, 0, 'Penerima Bantuan Lain');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penduduk`
--

CREATE TABLE `kriteria_penduduk` (
  `id_kriteria_penduduk` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `id_analisis` varchar(15) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `periode_bulan` int(11) NOT NULL,
  `periode_tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_penduduk`
--

INSERT INTO `kriteria_penduduk` (`id_kriteria_penduduk`, `id_subkriteria`, `id_analisis`, `nik`, `periode_bulan`, `periode_tahun`) VALUES
(1, 6, '5', 320987484939342, 12, 2023),
(2, 10, '5', 320987484939342, 12, 2023),
(3, 12, '5', 320987484939342, 12, 2023),
(4, 16, '5', 320987484939342, 12, 2023),
(5, 4, '8', 320987484939342, 1, 2024),
(6, 7, '8', 320987484939342, 1, 2024),
(7, 13, '8', 320987484939342, 1, 2024),
(8, 11, '8', 320987484939342, 1, 2024),
(9, 4, '6', 890958574637723, 12, 2023),
(10, 9, '6', 890958574637723, 12, 2023),
(11, 11, '6', 890958574637723, 12, 2023),
(12, 14, '6', 890958574637723, 12, 2023),
(13, 5, '9', 890958574637723, 1, 2024),
(14, 8, '9', 890958574637723, 1, 2024),
(15, 11, '9', 890958574637723, 1, 2024),
(16, 14, '9', 890958574637723, 1, 2024),
(17, 4, '7', 3209987889876567, 12, 2023),
(18, 9, '7', 3209987889876567, 12, 2023),
(19, 11, '7', 3209987889876567, 12, 2023),
(20, 14, '7', 3209987889876567, 12, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penilaian`
--

CREATE TABLE `kriteria_penilaian` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `range` varchar(125) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_penilaian`
--

INSERT INTO `kriteria_penilaian` (`id_subkriteria`, `id_kriteria`, `range`, `bobot`) VALUES
(3, 1, '>= Rp. 10.000.000', 1),
(4, 1, 'Rp. 5.000.000 - Rp. 10.000.000', 2),
(5, 1, 'Rp. 1.000.000 - Rp. 5.000.000', 3),
(6, 1, 'Rp. 500.000 - Rp. 1.000.000', 4),
(7, 2, '<= 1 anak', 1),
(8, 2, '2 - 3 anak', 2),
(9, 2, '4 - 5 anak', 3),
(10, 2, '6 - 7 anak', 4),
(11, 4, 'Ya', 1),
(12, 4, 'Tidak', 2),
(13, 3, 'Kurang Layak', 4),
(14, 3, 'Cukup Layak', 3),
(15, 3, 'Layak', 2),
(16, 3, 'Sangat Layak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` bigint(20) NOT NULL,
  `nama_kk` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(125) NOT NULL,
  `nama_ibu` varchar(125) NOT NULL,
  `jml_anak` int(11) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama_kk`, `alamat`, `nama_ayah`, `nama_ibu`, `jml_anak`, `tgl_lahir`, `no_hp`) VALUES
(320987484939342, 'Jaja', 'Ciawigebang, Kuningan', 'Surya', 'Mami', 3, '2023-11-30', '089887565432'),
(890958574637723, 'Zuahari', 'Ciawigebang, Kuningan', 'Nana', 'Mami', 8, '2023-11-28', '089887565432'),
(3209987889876567, 'Casmadi', 'Kuningan, Jawa Barat', 'Nana', 'Mami', 5, '2023-11-27', '085156727368'),
(32098871625416776, 'Iman Maulana', 'Kuningan, Jawa Barat', 'Maman', 'Yayan', 1, '2023-01-30', '089887565432');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Petugas Desa', 'Kuningan', '089987654312', 'admin', 'admin', 1),
(2, 'Kasi Kependudukan', 'Kuningan', '089876567654', 'kasikependudukan', 'kasikependudukan', 2),
(3, 'Kepala Desa', 'Kuningan', '089987654553', 'kepaladesa', 'kepaladesa', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_penduduk`
--
ALTER TABLE `kriteria_penduduk`
  ADD PRIMARY KEY (`id_kriteria_penduduk`);

--
-- Indexes for table `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria_penduduk`
--
ALTER TABLE `kriteria_penduduk`
  MODIFY `id_kriteria_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `nik` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32098871625416777;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
