-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 02:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `telp`, `created_at`, `updated_at`) VALUES
(1, '3200000000000001', 'Muhammad Khanif', 'users', '$2y$10$TdzbvhlbEfnGrv533uWxie0Ya5DCujX9FOVr18ApUrMHSAzp7ZHTi', '123451234512', '2021-04-04 02:46:29', '2021-04-05 00:45:46'),
(2, '3200000000000002', 'Khanif453', 'khanif453', '$2y$10$DN2.QSBOKt276/S8I8zX9.1brRhFDYH.F96kqyGXt3EwaFhA.prEW', '089123451234', '2021-04-05 00:31:02', '2021-04-05 00:43:20'),
(3, '3200000000000003', 'Khanif_453', 'khanif_453', '$2y$10$vEo2d8.reaX4RQgg2Y3Ey.VtZHpG6tq5zehQqq4eqyxBb7SciXTaK', '089123451234', '2021-04-05 00:31:48', '2021-04-05 00:42:56'),
(4, '3200000000000004', 'Muhammad Khanif', 'khanif', '$2y$10$TdzbvhlbEfnGrv533uWxie0Ya5DCujX9FOVr18ApUrMHSAzp7ZHTi', '089123451234', '2021-04-05 00:33:29', '2021-04-05 00:42:05'),
(5, '3200000000000005', 'Muh. Iqfan Maulana', 'iqfan.m', '$2y$10$vEo2d8.reaX4RQgg2Y3Ey.VtZHpG6tq5zehQqq4eqyxBb7SciXTaK', '089123451234', '2021-04-05 00:31:48', '2021-04-05 00:31:48'),
(6, '3200000000000006', 'Iqfan Maulana', 'iqfan', '$2y$10$DN2.QSBOKt276/S8I8zX9.1brRhFDYH.F96kqyGXt3EwaFhA.prEW', '089123451234', '2021-04-05 00:31:02', '2021-04-05 00:31:02'),
(7, '3200000000000007', 'Maulana', 'maulana', '$2y$10$vEo2d8.reaX4RQgg2Y3Ey.VtZHpG6tq5zehQqq4eqyxBb7SciXTaK', '089123451234', '2021-04-05 00:31:48', '2021-04-05 00:31:48'),
(8, '3200000000000008', 'Tere Wahyu Laksana', 'terewl', '$2y$10$vEo2d8.reaX4RQgg2Y3Ey.VtZHpG6tq5zehQqq4eqyxBb7SciXTaK', '089123451234', '2021-04-05 00:31:48', '2021-04-05 00:31:48'),
(9, '3200000000000009', 'Wahyu Laksana', 'wahyu', '$2y$10$TdzbvhlbEfnGrv533uWxie0Ya5DCujX9FOVr18ApUrMHSAzp7ZHTi', '089123451234', '2021-04-05 00:33:29', '2021-04-05 00:34:17'),
(10, '3200000000000010', 'Laksana', 'laksana', '$2y$10$DN2.QSBOKt276/S8I8zX9.1brRhFDYH.F96kqyGXt3EwaFhA.prEW', '089123451234', '2021-04-05 00:31:02', '2021-04-05 00:31:02'),
(13, '3200000000000011', 'Masyarakat', 'masyarakat', '$2y$10$FSqc0.TZDb64eHHPUguOQe0V9SZILG5VPsg5tsVm/wE5ev9/I5xee', '089123451234', '2021-04-05 00:50:27', '2021-04-05 00:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_08_06_233230_create_petugas_table', 1),
(3, '2020_08_06_233306_create_tanggapan_table', 1),
(4, '2020_08_06_233420_create_pengaduan_table', 1),
(5, '2020_08_06_233444_create_masyarakat_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `masyarakat_id` int(10) UNSIGNED NOT NULL,
  `isi_laporan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `username`, `password`, `telp`, `level`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'admin', '$2y$10$nQ4r2EeiZsStUv5RKAlhnecxoLNmtpcWmIwvXZztPodGGkEENybbi', '089123456789', 'Admin', '2021-04-02 13:34:22', '2021-04-02 13:47:10', 1),
(2, 'petugas', 'petugas', '$2y$10$5weeTlIi2PKn6hWDQ4l1oubDPXHadmjAgTWyUBh67lfHuz9pSwWcC', '089123456789', 'Petugas', '2021-04-02 13:37:59', '2021-04-02 13:37:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengaduan_id` int(10) UNSIGNED NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masyarakat_id` (`masyarakat_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_id` (`pengaduan_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`masyarakat_id`) REFERENCES `masyarakat` (`id`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduan` (`id`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
