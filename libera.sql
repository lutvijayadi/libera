-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2026 at 05:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libera`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `kategori` enum('pelajaran','novel','komik','filsafat') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `tahun_terbit`, `stok`, `cover`, `penerbit`, `kategori`) VALUES
(7, 'pbo (pemrograman beriontasi objek)', 'asep sunandar', '2026', '200', '1770781137_pbo__pemrograman_beriontasi_objek_.jpg', 'budi sunanar', ''),
(8, 'bahasa indonesia', 'bapak anwar', '0000', '821', '1771818111_bahasa_indonesia.jfif', 'bapak anwar', ''),
(9, 'pwpb', 'majid', '0000', '58', '1771992327_pwpb.jfif', 'bapak anwar', 'novel'),
(11, 'IPA kelas x', 'agus budiman', '2026', '2201', '1775441218_IPA_kelas_x.jpg', 'bapak anwar', 'novel'),
(12, 'IPA kelas x', 'agus budiman', '2026', '2141', '1775538846_IPA_kelas_x.jpg', 'bapak anwar', 'filsafat'),
(13, 'sunda wiwitan', 'bapak majid', '2026', '6', '1775538888_sunda_wiwitan.webp', 'majid', 'filsafat'),
(15, 'Cerita Sang Hiang Taraje', 'budi santoso', '0000', '2352', '1775608193_cerita_sanghiang_taraje.jpg', 'KH. Anwar S.pd', '');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id_notif`, `id_transaksi`, `message`, `created_at`) VALUES
(35, 48, 'edi kurniawan meminjam buku bahasa indonesia sebanyak 30 buku.', '2026-04-10 03:38:40'),
(36, 48, 'Peminjaman buku bahasa indonesia telah disetujui.', '2026-04-10 03:38:52'),
(37, 49, 'edi kurniawan meminjam buku IPA kelas x sebanyak 30 buku.', '2026-04-10 03:43:28'),
(38, 49, 'Peminjaman buku IPA kelas x telah disetujui.', '2026-04-10 03:43:41'),
(39, 49, 'Buku IPA kelas x telah dikembalikan.', '2026-04-10 03:43:58'),
(40, 49, 'Peminjaman buku IPA kelas x telah disetujui.', '2026-04-10 03:44:14'),
(41, 50, 'edi kurniawan meminjam buku Filsapat Islam sebanyak 22 buku.', '2026-04-10 04:03:19'),
(42, 50, 'Peminjaman buku Filsapat Islam telah disetujui.', '2026-04-10 04:03:36'),
(43, 50, 'Buku Filsapat Islam telah dikembalikan.', '2026-04-10 04:06:47'),
(44, 50, 'Peminjaman buku Filsapat Islam telah disetujui.', '2026-04-10 04:06:58'),
(45, 51, 'Lutvi jayadi meminjam buku bahasa indonesia sebanyak 200 buku.', '2026-04-11 03:54:58'),
(46, 52, 'Lutvi jayadi meminjam buku IPA kelas x sebanyak 200 buku.', '2026-04-11 03:56:26'),
(47, 52, 'Peminjaman buku IPA kelas x telah disetujui.', '2026-04-11 03:57:18'),
(48, 51, 'Peminjaman buku bahasa indonesia telah disetujui.', '2026-04-11 03:57:27'),
(49, 51, 'Buku bahasa indonesia telah dikembalikan.', '2026-04-11 05:21:03'),
(50, 51, 'Peminjaman buku bahasa indonesia telah disetujui.', '2026-04-11 05:21:53'),
(51, 51, 'Buku bahasa indonesia telah dikembalikan.', '2026-04-11 05:37:42'),
(52, 51, 'Peminjaman buku bahasa indonesia telah disetujui.', '2026-04-11 05:37:58'),
(53, 53, 'Lutvi jayadi meminjam buku sunda wiwitan sebanyak 2 buku.', '2026-04-11 05:38:24'),
(54, 53, 'Peminjaman buku sunda wiwitan telah disetujui.', '2026-04-11 05:38:44'),
(55, 53, 'Buku sunda wiwitan telah dikembalikan.', '2026-04-11 05:39:13'),
(56, 53, 'Peminjaman buku sunda wiwitan telah disetujui.', '2026-04-11 05:39:39'),
(57, 53, 'Peminjaman buku sunda wiwitan telah disetujui.', '2026-04-11 05:40:41'),
(58, 51, 'Buku bahasa indonesia telah dikembalikan.', '2026-04-11 05:45:31'),
(59, 53, 'Buku sunda wiwitan telah dikembalikan.', '2026-04-11 05:46:26'),
(60, 54, 'Sri Aswadiyah meminjam buku Cerita Sang Hiang Taraje sebanyak 12 buku.', '2026-04-15 01:10:30'),
(61, 54, 'Peminjaman buku Cerita Sang Hiang Taraje telah disetujui.', '2026-04-15 01:11:03'),
(62, 55, 'Sri Aswadiyah meminjam buku Cerita Sang Hiang Taraje sebanyak 21 buku.', '2026-04-15 01:11:39'),
(63, 55, 'Peminjaman buku Cerita Sang Hiang Taraje telah disetujui.', '2026-04-15 01:12:56'),
(64, 55, 'Buku Cerita Sang Hiang Taraje telah dikembalikan.', '2026-04-15 01:13:14'),
(65, 54, 'Buku Cerita Sang Hiang Taraje telah dikembalikan.', '2026-04-15 01:13:42'),
(66, 56, 'Sri Aswadiyahh meminjam buku sunda wiwitan sebanyak 2 buku.', '2026-04-15 01:26:41'),
(67, 56, 'Peminjaman buku sunda wiwitan telah disetujui.', '2026-04-15 01:26:52'),
(68, 56, 'Buku sunda wiwitan telah dikembalikan.', '2026-04-15 01:27:10'),
(69, 57, 'Sri Aswadiyahh meminjam buku bahasa indonesia sebanyak 21 buku.', '2026-04-15 01:30:08'),
(70, 57, 'Peminjaman buku bahasa indonesia telah disetujui.', '2026-04-15 01:30:20'),
(71, 57, 'Buku bahasa indonesia telah dikembalikan.', '2026-04-15 01:30:46'),
(72, 58, 'Sri Aswadiyahh meminjam buku pwpb sebanyak 21 buku.', '2026-04-15 01:42:51'),
(73, 58, 'Buku pwpb telah dikembalikan.<br><a href=\'../uploads/bukti/\' target=\'_blank\'>Lihat Bukti</a>', '2026-04-15 01:43:02'),
(74, 59, 'Sri Aswadiyahh meminjam buku Cerita Sang Hiang Taraje sebanyak 21 buku.', '2026-04-15 01:44:56'),
(75, 59, 'Peminjaman buku Cerita Sang Hiang Taraje telah disetujui.', '2026-04-15 02:00:43'),
(76, 59, 'Buku Cerita Sang Hiang Taraje telah dikembalikan.', '2026-04-15 02:01:16'),
(77, 59, 'Peminjaman buku Cerita Sang Hiang Taraje telah disetujui.', '2026-04-15 02:01:37'),
(78, 59, 'Peminjaman buku Cerita Sang Hiang Taraje telah disetujui.', '2026-04-15 02:06:03'),
(79, 59, 'Buku Cerita Sang Hiang Taraje telah dikembalikan.', '2026-04-15 02:06:20'),
(80, 60, 'Sri Aswadiyahh meminjam buku Cerita Sang Hiang Taraje sebanyak 1 buku.', '2026-04-15 02:12:49'),
(81, 60, 'Peminjaman buku Cerita Sang Hiang Taraje telah disetujui.', '2026-04-15 02:12:59'),
(82, 60, 'Buku Cerita Sang Hiang Taraje telah dikembalikan.', '2026-04-15 02:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `total_pinjam`
--

CREATE TABLE `total_pinjam` (
  `id_total_pinjam` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('menunggu konfirmasi','disetujui','ditolak','selesai') DEFAULT 'menunggu konfirmasi',
  `id_buku` int(11) DEFAULT NULL,
  `total_pinjam` int(11) NOT NULL,
  `bukti_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_users`, `nama`, `judul_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_buku`, `total_pinjam`, `bukti_kembali`) VALUES
(49, 2, 'edi kurniawan', 'IPA kelas x', '2026-04-09', '2026-04-10', 'selesai', 12, 30, NULL),
(51, 10, 'Lutvi jayadi', 'bahasa indonesia', '2026-04-09', '2026-04-11', 'selesai', 8, 200, NULL),
(54, 11, 'Sri Aswadiyah', 'Cerita Sang Hiang Taraje', '2026-04-15', '2026-04-15', 'selesai', 15, 12, NULL),
(56, 11, 'Sri Aswadiyahh', 'sunda wiwitan', '2026-04-15', '2026-04-15', 'selesai', 13, 2, NULL),
(57, 11, 'Sri Aswadiyahh', 'bahasa indonesia', '2026-04-15', '2026-04-15', 'selesai', 8, 21, NULL),
(58, 11, 'Sri Aswadiyahh', 'pwpb', '2026-04-15', '0000-00-00', 'selesai', 9, 21, ''),
(59, 11, 'Sri Aswadiyahh', 'Cerita Sang Hiang Taraje', '2026-04-15', '2026-04-15', 'selesai', 15, 21, '1776218780_meng.jpg'),
(60, 11, 'Sri Aswadiyahh', 'Cerita Sang Hiang Taraje', '2026-04-15', '2026-04-15', 'selesai', 15, 1, '1776219260_bukti.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','siswa') NOT NULL,
  `status` enum('aktif','non_aktif') NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `kelas`, `username`, `password`, `level`, `status`, `last_login`, `created_at`) VALUES
(1, 'Edi Kurniawan', 'xii pplg 2', 'lutvi', 'wel', 'siswa', 'aktif', NULL, '2026-04-02 00:52:58'),
(2, 'edi kurniawan', NULL, 'pi', 'we', 'admin', 'aktif', NULL, '2026-04-02 00:52:58'),
(3, 'Majid', 'xii pplg 2', 'majid', '123', 'siswa', 'aktif', NULL, '2026-04-08 02:51:13'),
(9, 'Acun Darusalam', 'xii ph 2', 'dika', 'jamet', 'siswa', 'aktif', NULL, '2026-04-09 08:45:26'),
(10, 'Lutvi jayadi', 'xii pplg 2', 'jhon', '123', 'siswa', 'aktif', NULL, '2026-04-10 02:18:12'),
(11, 'Sri Aswadiyahh', 'xii ph 2', 'sri', '123', 'siswa', 'aktif', NULL, '2026-04-15 01:06:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `total_pinjam`
--
ALTER TABLE `total_pinjam`
  ADD PRIMARY KEY (`id_total_pinjam`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `fk_transaksi_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `total_pinjam`
--
ALTER TABLE `total_pinjam`
  MODIFY `id_total_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `total_pinjam`
--
ALTER TABLE `total_pinjam`
  ADD CONSTRAINT `total_pinjam_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
