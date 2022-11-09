-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 02:52 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(32) NOT NULL,
  `capture` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `nama`, `alamat`, `instansi`, `keperluan`, `tanggal`, `jam`, `capture`) VALUES
(21, 'Rifqi Anshari', 'Banjarbaru', 'UNISKA', 'Praktek Kerja Lapangan', '2019-03-11', '14:17:43', '5c85fd87244b7.png'),
(22, 'Haris Fadillah', 'Martapura', 'Dinas Peternakan', 'Rapat Organisasi', '2020-03-11', '14:19:49', '5e6883053b5c8.png'),
(23, 'Fahreza Oktaviadi', 'Gunung Mas, Istambul', 'PT. Sejahtera', 'Pembuatan jalan dan drainase di sekitar PT. Sejahtera', '2020-03-11', '14:20:58', '5e68834a6c0d7.png'),
(24, 'Satriya Putra Pratama', 'Jl. Rambutan, Banjarbaru', 'Dinas Perikanan', 'Lapor Jalan Rusak', '2020-05-11', '14:22:51', '5eb8ef3b29167.png'),
(26, 'Agus Priyanto', 'Jl. Veteran, Banjarbaru Utara', 'Dinas Kehutanan', 'Koordinasi Tentang Drainase di Jl. Veteran', '2020-07-11', '14:23:49', '5f095af50bde0.png'),
(27, 'Dwiyatno', 'Jl. Sejahtera, Loktabat Selatan, Banjarbaru', 'SDN Loktabat 1 Banjarbaru', 'Konsultasi pembuatan jalan', '2020-07-11', '14:24:20', '5f095b142f3f0.png'),
(28, 'Nadya Salsabila', 'Jl. Mistar Cokro Kusumo, Gg. Mangga, Cempaka, Banjarbaru', 'Balai Perikanan', 'Konsultasi Pembangunan Taman Indah', '2020-07-11', '14:25:14', '5f095b4a5d436.png'),
(29, 'Rifqi Anshari', 'Jl. Telunjuk, Banjarbaru Utara', 'Kecamatan Banjarbaru', 'Lapor Jalan Rusak', '2021-03-11', '14:28:21', '6049b885d2ea2.png'),
(30, 'Saripudin', 'Cempaka', 'Dinas PUPR Provinsi', 'Rapat Kerjasama', '2021-03-11', '14:29:17', '6049b8bdbb154.png'),
(31, 'Ilham', 'Jl. Sesama, Martapura', 'Kominfo Banjarbaru', 'Lapor Saluran Drainase Rusak', '2021-03-10', '14:29:59', '6048676713fd7.png'),
(33, 'Tri Mustofa', 'Jl. A. Yani, Gg. Kamboja, Banjarbaru Selatan ', 'Dinas Pendidikan', 'Konsultasi Saluran Drainase', '2021-02-10', '14:31:00', '60237da446902.png'),
(34, 'Giyatno', 'Jl. Pramuka, Loktabat Utara, Banjarbaru', 'Langgar Al-Ikhwan', 'Pembuatan jalan dan drainase', '2021-02-10', '14:31:19', '60237db7d2f7f.png'),
(35, 'Rifqi Anshari', 'Jl. Pinus, Banjarbaru', 'BIP Ponsel', 'Konsultasi Pembuatan Saluran Drainase', '2021-03-12', '15:42:20', '604b1b5c793eb.png'),
(36, 'Reza Oktovian', 'Jl. Pramugari, Banjarmasin', 'Rumah Sakit Umum Banjarbaru', 'Lapor Jalan Rusak', '2021-03-16', '15:08:21', '6050596546d9d.png'),
(37, 'Fahlevi', 'Jl. Kencana, Banjarbaru', 'BKD Banjarbaru', 'Konsultasi Pembangunan Taman', '2021-03-18', '21:36:03', '60535743d54c9.png'),
(38, 'Mahmuddin', 'Jl. Perwira, Martapura', 'Dinas Pendidikan', 'Mengantar Surat Undangan', '2021-03-22', '16:38:57', '605857a1bedcf.png'),
(39, 'Zuleha Pertiwi', 'Jl. Jeruk, Banjarbaru', 'PT. Makmur Jaya', 'Konsultasi Pembuatan Jalan dan Saluran Drainase', '2021-03-22', '21:26:23', '60589aff11b0b.png'),
(40, 'Rifqi Anshari', 'Jl. Ro Ulin', 'UNISKA Banjarbaru', 'Mengantar Surat Magang', '2021-03-23', '09:10:59', '60594023419c6.png'),
(41, 'Muhammad Noval', 'Jl. Maggis, Banjarbaru', 'Rumah Sakit Idaman Banjarbaru', 'Lapor Jalan Rusak', '2021-03-23', '09:11:41', '6059404ddffe7.png');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(18) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `id`) VALUES
('17710132', 'Rifqi Anshari', 40),
('17710030', 'Ero Pambudi', 41),
('17710136', 'Saripudin', 42),
('17710133', 'Kiki', 43),
('17710144', 'Nita Yulista', 44),
('17710137', 'Kikiki', 45);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `nilai` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `tgl`, `nilai`) VALUES
(1, '2021-03-02', 'SP'),
(2, '2021-03-02', 'PS'),
(3, '2021-03-01', 'CP'),
(4, '2021-03-01', 'TP'),
(5, '2021-03-01', 'PS'),
(6, '2021-03-11', 'SP'),
(7, '2021-03-11', 'SP'),
(8, '2021-03-11', 'PS'),
(9, '2021-03-11', 'TP'),
(10, '2021-03-11', 'PS'),
(11, '2021-03-11', 'SP'),
(12, '2021-03-11', 'SP'),
(13, '2021-03-11', 'PS'),
(14, '2021-03-11', 'SP'),
(15, '2021-03-11', 'SP'),
(16, '2021-03-11', 'CP'),
(17, '2021-03-11', 'PS'),
(18, '2021-03-11', 'CP'),
(19, '2021-03-11', 'TP'),
(20, '2021-03-11', 'SP'),
(21, '2021-03-11', 'SP'),
(22, '2021-03-11', 'SP'),
(23, '2021-03-10', 'SP'),
(24, '2021-03-10', 'PS'),
(25, '2021-03-10', 'SP'),
(26, '2021-03-12', 'SP'),
(27, '2021-03-12', 'SP'),
(28, '2021-03-13', 'SP'),
(29, '2021-03-13', 'SP'),
(30, '2021-02-16', 'SP'),
(31, '2021-02-16', 'SP'),
(32, '2021-02-16', 'SP'),
(33, '2021-02-16', 'PS'),
(34, '2021-02-16', 'CP'),
(35, '2021-02-16', 'PS'),
(36, '2021-02-16', 'TP'),
(37, '2021-02-16', 'SP'),
(38, '2021-02-16', 'SP'),
(39, '2021-02-16', 'PS'),
(40, '2021-02-16', 'PS'),
(41, '2021-02-16', 'CP'),
(42, '2021-03-18', 'SP'),
(43, '2021-03-23', 'PS'),
(44, '2021-03-23', 'CP'),
(45, '2021-03-23', 'TP'),
(46, '2021-03-23', 'PS'),
(47, '2021-03-23', 'SP'),
(48, '2021-03-23', 'SP'),
(49, '2021-03-23', 'SP'),
(50, '2021-03-23', 'SP'),
(51, '2021-03-23', 'SP'),
(52, '2021-03-23', 'SP'),
(53, '2021-03-23', 'SP'),
(54, '2021-03-23', 'SP');

-- --------------------------------------------------------

--
-- Table structure for table `resepsionis`
--

CREATE TABLE `resepsionis` (
  `id_resepsionis` int(11) NOT NULL,
  `tgl_jaga` date DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resepsionis`
--

INSERT INTO `resepsionis` (`id_resepsionis`, `tgl_jaga`, `id_pegawai`, `status`) VALUES
(9, '2019-03-11', 40, 0),
(10, '2019-03-11', 42, 0),
(11, '2020-03-11', 40, 0),
(12, '2020-03-11', 41, 0),
(13, '2021-03-11', 40, 0),
(14, '2021-03-11', 42, 0),
(15, '2021-03-11', 41, 0),
(16, '2021-03-12', 43, 0),
(17, '2021-03-12', 41, 0),
(18, '2021-03-14', 40, 0),
(19, '2021-03-23', 40, 0),
(20, '2021-03-23', 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(124) NOT NULL,
  `password` varchar(124) DEFAULT NULL,
  `level` varchar(124) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `level`) VALUES
('admin', '12345', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD PRIMARY KEY (`id_resepsionis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `resepsionis`
--
ALTER TABLE `resepsionis`
  MODIFY `id_resepsionis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
