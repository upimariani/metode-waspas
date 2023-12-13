-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2023 pada 03.45
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

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
-- Struktur dari tabel `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(11) NOT NULL,
  `per_bulan` int(11) NOT NULL,
  `per_tahun` int(11) NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `per_bulan`, `per_tahun`, `hasil`) VALUES
(1, 12, 2023, 3.1608),
(2, 12, 2023, 3.1702),
(3, 12, 2023, 8.0776);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_penduduk`
--

CREATE TABLE `kriteria_penduduk` (
  `id_kriteria_penduduk` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_analisis` varchar(15) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `periode_bulan` int(11) NOT NULL,
  `periode_tahun` int(11) NOT NULL,
  `kriteria_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_penduduk`
--

INSERT INTO `kriteria_penduduk` (`id_kriteria_penduduk`, `id_kriteria`, `id_analisis`, `nik`, `periode_bulan`, `periode_tahun`, `kriteria_detail`) VALUES
(1, 4, '2', 320987484939342, 12, 2023, '-'),
(2, 8, '2', 320987484939342, 12, 2023, '-'),
(3, 11, '2', 320987484939342, 12, 2023, '-'),
(4, 14, '2', 320987484939342, 12, 2023, '-'),
(5, 5, '1', 239872183738298, 12, 2023, '-'),
(6, 7, '1', 239872183738298, 12, 2023, '-'),
(7, 12, '1', 239872183738298, 12, 2023, '-'),
(8, 14, '1', 239872183738298, 12, 2023, '-'),
(9, 4, '3', 890958574637723, 12, 2023, '-'),
(10, 9, '3', 890958574637723, 12, 2023, '-'),
(11, 12, '3', 890958574637723, 12, 2023, '-'),
(12, 16, '3', 890958574637723, 12, 2023, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_penilaian`
--

CREATE TABLE `kriteria_penilaian` (
  `id_kriteria` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kriteria` varchar(125) NOT NULL,
  `range` varchar(125) NOT NULL,
  `bobot` int(11) NOT NULL,
  `type_kriteria` int(11) NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_penilaian`
--

INSERT INTO `kriteria_penilaian` (`id_kriteria`, `id_user`, `nama_kriteria`, `range`, `bobot`, `type_kriteria`, `hasil`) VALUES
(3, 0, 'Pendapatan Kepala Keluarga', '>= Rp. 10.000.000', 1, 1, 0),
(4, 0, 'Pendapatan Kepala Keluarga', 'Rp. 5.000.000 - Rp. 10.000.000', 2, 1, 0),
(5, 0, 'Pendapatan Kepala Keluarga', 'Rp. 1.000.000 - Rp. 5.000.000', 3, 1, 0),
(6, 0, 'Pendapatan Kepala Keluarga', 'Rp. 500.000 - Rp. 1.000.000', 4, 1, 0),
(7, 0, 'Jumlah Tanggungan Anak', '<= 1 anak', 1, 2, 0),
(8, 0, 'Jumlah Tanggungan Anak', '2 - 3 anak', 2, 2, 0),
(9, 0, 'Jumlah Tanggungan Anak', '4 - 5 anak', 3, 2, 0),
(10, 0, 'Jumlah Tanggungan Anak', '6 - 7 anak', 4, 2, 0),
(11, 0, 'Penerima Bantuan Lain', 'Ya', 1, 3, 0),
(12, 0, 'Penerima Bantuan Lain', 'Tidak', 2, 3, 0),
(13, 0, 'Kondisi Rumah', 'Kurang Layak', 4, 4, 0),
(14, 0, 'Kondisi Rumah', 'Cukup Layak', 3, 4, 0),
(15, 0, 'Kondisi Rumah', 'Layak', 2, 4, 0),
(16, 0, 'Kondisi Rumah', 'Sangat Layak', 1, 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
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
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama_kk`, `alamat`, `nama_ayah`, `nama_ibu`, `jml_anak`, `tgl_lahir`, `no_hp`) VALUES
(239872183738298, 'Casmadi', 'Kuningan, Jawa Barat', 'Nana', 'Mami', 5, '2023-11-27', '085156727368'),
(320987484939342, 'Jaja', 'Ciawigebang, Kuningan', 'Surya', 'Mami', 3, '2023-11-30', '089887565432'),
(890958574637723, 'Zuahari', 'Ciawigebang, Kuningan', 'Nana', 'Mami', 8, '2023-11-28', '089887565432'),
(32098871625416776, 'Iman Maulana', 'Kuningan, Jawa Barat', 'Maman', 'Yayan', 1, '2023-01-30', '089887565432');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Petugas Desa', 'Kuningan', '089987654312', 'admin', 'admin', 1),
(2, 'Kasi Kependudukan', 'Kuningan', '089876567654', 'kasikependudukan', 'kasikependudukan', 2),
(3, 'Kepala Desa', 'Kuningan', '089987654553', 'kepaladesa', 'kepaladesa', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indeks untuk tabel `kriteria_penduduk`
--
ALTER TABLE `kriteria_penduduk`
  ADD PRIMARY KEY (`id_kriteria_penduduk`);

--
-- Indeks untuk tabel `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kriteria_penduduk`
--
ALTER TABLE `kriteria_penduduk`
  MODIFY `id_kriteria_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `nik` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32098871625416777;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
