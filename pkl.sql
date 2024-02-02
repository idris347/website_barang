-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 05:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `kode`, `nama`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(5, 'M001', 'B001', 'Masuk', '2023-08-29', NULL, NULL),
(6, 'K001', 'B001', 'Keluar', '2023-08-29', NULL, NULL),
(7, 'M002', 'B006', 'Masuk', '2023-09-02', NULL, NULL),
(8, 'M003', 'B001', 'Masuk', '2023-09-03', NULL, NULL),
(9, 'K002', 'B001', 'Keluar', '2023-09-03', NULL, NULL),
(10, 'K003', 'B001', 'Keluar', '2023-09-15', NULL, NULL),
(11, 'K005', 'B001', 'Keluar', '2023-11-12', NULL, NULL),
(12, 'M004', 'B001', 'Masuk', '2023-11-12', NULL, NULL),
(13, 'M005', 'B002', 'Masuk', '2023-11-20', NULL, NULL),
(14, 'K006', 'B002', 'Keluar', '2023-11-20', NULL, NULL),
(15, 'M006', 'B008', 'Masuk', '2023-12-03', NULL, NULL),
(16, 'K007', 'B006', 'Keluar', '2023-12-03', NULL, NULL),
(17, 'K008', 'B003', 'Keluar', '2023-12-06', NULL, NULL),
(18, 'M008', 'B003', 'Masuk', '2023-12-06', NULL, NULL),
(19, 'K009', 'B002', 'Keluar', '2023-12-06', NULL, NULL),
(20, 'M009', 'B001', 'Masuk', '2023-12-06', NULL, NULL),
(21, 'K010', 'B001', 'Keluar', '2023-12-06', NULL, NULL),
(22, 'K010', 'B001', 'Keluar', '2023-12-06', NULL, NULL),
(23, 'M009', 'B001', 'Masuk', '2023-12-06', NULL, NULL),
(24, 'M010', 'B009', 'Masuk', '2023-12-07', NULL, NULL),
(25, 'K011', 'B006', 'Keluar', '2023-12-07', NULL, NULL),
(26, 'M010', 'B001', 'Masuk', '2023-12-10', NULL, NULL),
(27, 'K012', 'B001', 'Keluar', '2023-12-10', NULL, NULL),
(28, 'M011', 'B001', 'Masuk', '2024-01-29', NULL, NULL),
(29, 'K013', 'B001', 'Keluar', '2024-01-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_08_093319_create_tb_barangs_table', 1),
(7, '2023_08_08_093327_create_tb_jenis_table', 1),
(8, '2023_08_08_093403_create_tb_satuans_table', 1),
(9, '2023_08_08_093432_create_tb_masuks_table', 1),
(10, '2023_08_08_093440_create_tb_keluars_table', 1),
(11, '2023_08_29_114925_create_logs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barangs`
--

CREATE TABLE `tb_barangs` (
  `id_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `stok_minimal` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_barangs`
--

INSERT INTO `tb_barangs` (`id_barang`, `nama_barang`, `jenis`, `stok_minimal`, `satuan`, `foto`, `created_at`, `updated_at`) VALUES
('B001', 'PIPA', 'PVC', 150, 'Pcs', '1701564420_PVC-AW.jpg', NULL, NULL),
('B002', 'PIPA', 'Galvanis', 188, 'Pcs', '1693138789_galvanis.jpg', NULL, NULL),
('B003', 'PIPA', 'Hdfe', 80, 'Pcs', '1693138812_hdfe.jpg', NULL, NULL),
('B004', 'DOP', 'PVC DIA. 1', 90, 'Buah', '1693138838_DOP.jpg', NULL, NULL),
('B005', 'Gbold', '3x1/2 inch', 50, 'Buah', '1693138867_G_BOLD.jpg', NULL, NULL),
('B006', 'Knee', 'Galvanis', 163, 'Pcs', '1693658186_Knee besi 90 derajat.jpg', NULL, NULL),
('B007', 'valep', 'Galvanis', 20, 'Buah', '1695557687_IMG_20230822_142002.jpg', NULL, NULL),
('B008', 'Clamp_Sadle', 'PVC', 150, 'Buah', '1701575142_clamp -sadle.jpg', NULL, NULL),
('B009', 'Drat', 'PVC', 120, 'Pcs', '1701989256_Drat_Pvc.jpg', NULL, NULL),
('B010', 'pensil a', 'Alat', 30, 'Pcs', '1706502328_pngegg.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'PVC', NULL, NULL),
(2, 'Galvanis', NULL, NULL),
(3, 'Hdfe', NULL, NULL),
(4, '1/2 inch', NULL, NULL),
(5, '3x1/2 inch', NULL, NULL),
(6, 'PVC DIA. 1', NULL, NULL),
(7, 'PVC DIA. 1.1/2', NULL, NULL),
(8, 'PVC DIA. 2', NULL, NULL),
(9, 'PVC DIA. 3', NULL, NULL),
(10, 'PVC 3\"x 1.1/2', NULL, NULL),
(11, 'PVC 2 x 1.1/2', NULL, NULL),
(12, 'Lem SerbaGuna', NULL, NULL),
(13, 'solatip', NULL, NULL),
(14, 'Alat', NULL, NULL),
(16, 'Besi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluars`
--

CREATE TABLE `tb_keluars` (
  `id_keluar` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_keluars`
--

INSERT INTO `tb_keluars` (`id_keluar`, `barang`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
('K001', 'B001', 20, '2023-08-29', NULL, NULL),
('K002', 'B001', 50, '2023-09-03', NULL, NULL),
('K003', 'B001', 50, '2023-09-15', NULL, NULL),
('K004', 'B001', 150, '2023-11-12', NULL, NULL),
('K005', 'B001', 150, '2023-11-12', NULL, NULL),
('K006', 'B002', 50, '2023-11-20', NULL, NULL),
('K007', 'B006', 30, '2023-12-03', NULL, NULL),
('K008', 'B003', 200, '2023-12-06', NULL, NULL),
('K009', 'B002', 12, '2023-12-06', NULL, NULL),
('K011', 'B006', 27, '2023-12-07', NULL, NULL),
('K012', 'B001', 100, '2023-12-10', NULL, NULL),
('K013', 'B001', 50, '2024-01-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuks`
--

CREATE TABLE `tb_masuks` (
  `id_masuk` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_masuks`
--

INSERT INTO `tb_masuks` (`id_masuk`, `barang`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
('M001', 'B001', 20, '2023-08-29', NULL, NULL),
('M002', 'B006', 20, '2023-09-02', NULL, NULL),
('M004', 'B001', 150, '2023-11-12', NULL, NULL),
('M005', 'B002', 50, '2023-11-20', NULL, NULL),
('M006', 'B008', 50, '2023-12-03', NULL, NULL),
('M009', 'B001', 150, '2023-12-06', NULL, NULL),
('M010', 'B001', 100, '2023-12-10', NULL, NULL),
('M011', 'B001', 50, '2024-01-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuans`
--

CREATE TABLE `tb_satuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_satuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_satuans`
--

INSERT INTO `tb_satuans` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(1, 'Pcs', NULL, NULL),
(2, 'Meter', NULL, NULL),
(3, 'Buah', NULL, NULL),
(4, 'ROLL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'Muhammad Idris', 'superadmin@gmail.com', 1, NULL, '$2y$10$lhYTc5XR6cKTaHKpc8KeGeBqhGP/aQaC7ZP6Km5/nGF99SgwL.nD2', NULL, '2023-08-27 04:44:04', '2023-08-27 04:44:04'),
(11, 'AdminGudang', 'admin gudang', 'admin@gmail.com', 2, NULL, '$2y$10$mXNi9mXp6pgdP2JNBvdL7uoHpKTlwomzMrPjAg0DjF4rFUGR1ucz2', NULL, NULL, NULL),
(13, 'KepalaGudang', 'kepala gudang', 'nuh@gmail.com', 3, NULL, '$2y$10$ORSFi6XiUX/KwHkgK3m0ReO3dWxSMNnAZk0KP1Nik5ALKYrZ/n/ES', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_satuans`
--
ALTER TABLE `tb_satuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_satuans`
--
ALTER TABLE `tb_satuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
