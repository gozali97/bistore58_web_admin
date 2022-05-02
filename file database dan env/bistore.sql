-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 12:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bistore`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'DSLR', '2022-03-28 12:55:24', '2022-03-28 12:55:24'),
(2, 'Tripod', '2022-04-18 05:10:28', '2022-04-18 05:10:28'),
(3, 'Lensa', '2022-04-18 05:22:41', '2022-04-18 05:22:41');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_02_21_124648_add_paid_to_users', 2),
(4, '2022_02_22_090036_create_produks_table', 3),
(5, '2022_02_22_094443_create_produks_table', 4),
(6, '2022_03_14_192755_create_transaksi_details_table', 5),
(7, '2022_03_14_195001_create_transaksis_table', 6),
(8, '2022_03_14_195230_create_transaksis_table', 7),
(9, '2022_03_28_194230_create_kategoris_table', 8),
(10, '2022_04_12_050730_add_paid_to_transaksis', 9),
(11, '2022_04_18_121303_add_paid_to_produks', 10),
(12, '2022_04_20_152305_add_paid_to__users_table', 11);

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
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `harga`, `kategori_id`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `stok`) VALUES
(3, 'Nikon 1000D', '4000000', '1', 'Canon 1000D ini jadi pilihan kamera DSLR yang tepat untuk pemula.', '022022241827787 caon4000d.png', '2022-02-24 11:38:27', '2022-02-24 11:38:27', 10),
(4, 'Canon 4000D', '8000000', '1', 'Canon EOS 4000D adalah kamera DSLR Full Frame dengan sensor 22.3 x 14.9mm dan tipe sensor CMOS.', '022022241846507 caon4000d.png', '2022-02-24 11:39:46', '2022-02-24 11:39:46', 10),
(5, 'NIKON COOLPIX S5300', '2000000', '1', 'Kamera murah berkualitas', '022022241832117 nikon.png', '2022-02-24 11:41:32', '2022-02-24 11:41:32', 10),
(6, 'TRIPOD 1000 CM', '1000000', '1', 'Sony R640 Tripod adalah tripod Pocket yang hadir dengan bobot 1200g dan tinggi minimum 0.5cm.', '022022241836380 tripod.png', '2022-02-24 11:42:37', '2022-02-24 11:42:37', 10),
(7, 'SONY ALPHA A6100', '6000000', '1', 'Deskripsi SONY ALPHA A6100 BODY ONLY / SONY A 6100 BODY GARANSI RESMI - Standard', '022022241845420 sony.png', '2022-02-24 11:44:45', '2022-02-24 11:44:45', 10),
(8, 'Flash Camera', '1000000', '1', 'Canon TT685 Nikon TTL Flash Speedlite\r\n\r\nSpecification:\r\n- GN 60 (m ISO 100)\r\n- Powered by 4 x AA batteries (not included)\r\n- HSS to 1/8000th\r\n- Flash Mode iTTL /M / Multi', '022022241850341 flashcamera.png', '2022-02-24 11:45:50', '2022-02-24 11:45:50', 10),
(9, 'Lensa Tele', '1500000', '3', 'Lensa Tele', '042022181515160 lensatele.png', '2022-04-18 08:33:15', '2022-04-18 08:33:15', 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kode_payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_trx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_produk` int(10) UNSIGNED NOT NULL,
  `total_harga` bigint(20) UNSIGNED NOT NULL,
  `kode_unik` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_resi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tlp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_penerima` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_lokasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_bayar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jasa_pengiriman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` int(10) UNSIGNED NOT NULL,
  `total_bayar` bigint(20) UNSIGNED NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `kode_payment`, `kode_trx`, `total_produk`, `total_harga`, `kode_unik`, `status`, `no_resi`, `kurir`, `no_tlp`, `nama_penerima`, `detail_lokasi`, `deskripsi`, `metode_bayar`, `expired_at`, `created_at`, `updated_at`, `jasa_pengiriman`, `ongkir`, `total_bayar`, `bank`) VALUES
(8, 2, 'INV/PYM/22-04-12/411', 'INV/PYM/22-04-12/495', 2, 12000000, 311, 'Menunggu', NULL, 'JNE', '12345', 'Zali', NULL, NULL, NULL, '2022-04-12 23:30:36', '2022-04-11 23:30:36', '2022-04-19 23:21:40', 'REG', 51000, 12051000, 'BRI'),
(9, 2, 'INV/PYM/22-04-13/221', 'INV/PYM/22-04-13/392', 1, 4000000, 827, 'Menunggu', NULL, 'JNE', '12345', 'Zali', NULL, NULL, NULL, '2022-04-13 17:59:54', '2022-04-12 17:59:54', '2022-04-19 23:21:01', 'REG', 51000, 4051000, 'Mandiri'),
(10, 2, 'INV/PYM/22-04-13/563', 'INV/PYM/22-04-13/230', 1, 4000000, 780, 'Menunggu', NULL, 'JNE', '12345', 'Zali', NULL, NULL, NULL, '2022-04-13 19:33:32', '2022-04-12 19:33:32', '2022-04-12 19:33:32', 'OKE', 46000, 4046000, 'BRI'),
(11, 2, 'INV/PYM/22-04-13/491', 'INV/PYM/22-04-13/165', 1, 4000000, 637, 'Menunggu', NULL, 'JNE', '12345', 'Zali', NULL, NULL, NULL, '2022-04-13 19:37:05', '2022-04-12 19:37:05', '2022-04-12 19:37:05', 'OKE', 46000, 4046000, 'BRI'),
(12, 2, 'INV/PYM/22-04-13/805', 'INV/PYM/22-04-13/652', 1, 4000000, 567, 'Menunggu', NULL, 'JNE', '12345', 'Zali', NULL, NULL, NULL, '2022-04-13 19:40:20', '2022-04-12 19:40:21', '2022-04-17 08:55:05', 'OKE', 46000, 4046000, 'BRI'),
(13, 2, 'INV/PYM/22-04-14/540', 'INV/PYM/22-04-14/617', 2, 12000000, 293, 'Menunggu', NULL, 'JNE', '12345', 'Zali', NULL, NULL, NULL, '2022-04-14 21:38:24', '2022-04-13 21:38:24', '2022-04-19 23:00:16', 'OKE', 46000, 12046000, 'BRI'),
(14, 2, 'INV/PYM/22-04-14/944', 'INV/PYM/22-04-14/914', 2, 4000000, 154, 'Menunggu', NULL, 'JNE', '12345', 'Zali', NULL, NULL, NULL, '2022-04-14 21:39:51', '2022-04-13 21:39:51', '2022-04-17 23:05:57', 'OKE', 46000, 4046000, 'Mandiri'),
(15, 2, 'INV/PYM/22-04-14/155', 'INV/PYM/22-04-14/861', 1, 1000000, 443, 'Menunggu', NULL, 'JNE', '12345', 'Zali', NULL, NULL, NULL, '2022-04-14 21:40:44', '2022-04-13 21:40:44', '2022-04-19 23:12:45', 'OKE', 46000, 1046000, 'Mandiri'),
(16, 2, 'INV/PYM/22-04-14/996', 'INV/PYM/22-04-14/222', 3, 7000000, 286, 'Menunggu', NULL, 'JNE', '12345', 'Zali', 'af, Bangka,  , 3321, (Rumah)', NULL, NULL, '2022-04-15 07:28:17', '2022-04-14 07:28:17', '2022-04-20 23:21:47', 'OKE', 46000, 7046000, 'Mandiri'),
(17, 2, 'INV/PYM/22-04-18/359', 'INV/PYM/22-04-18/551', 1, 8000000, 541, 'Menunggu', NULL, 'JNE', '12345', 'Zali', 'af, Bangka,  , 3321, (Rumah)', NULL, NULL, '2022-04-18 23:13:13', '2022-04-17 23:13:13', '2022-04-20 19:10:46', 'OKE', 46000, 8046000, 'BRI'),
(18, 1, 'INV/PYM/22-04-21/265', 'INV/PYM/22-04-21/748', 2, 6000000, 182, 'Menunggu', NULL, 'JNE', '12345', 'Zali', 'af, Bangka,  , 3321, (Rumah)', NULL, NULL, '2022-04-21 18:07:12', '2022-04-20 18:07:12', '2022-04-20 18:07:19', 'OKE', 46000, 6046000, 'Mandiri'),
(19, 1, 'INV/PYM/22-04-21/294', 'INV/PYM/22-04-21/705', 2, 8000000, 957, 'Menunggu', NULL, 'JNE', '082296346899', 'ahmad gozali', 'jl koperasi rt 10, Kotawaringin Barat,  , 7411, (Rumah)', NULL, NULL, '2022-04-21 19:08:37', '2022-04-20 19:08:37', '2022-04-20 19:12:00', 'OKE', 50000, 8050000, 'BRI'),
(20, 10, 'INV/PYM/22-04-21/369', 'INV/PYM/22-04-21/151', 1, 4000000, 844, 'Menunggu', NULL, 'JNE', '082296346899', 'ahmad gozali', 'jl koperasi rt 10, Kotawaringin Barat,  , 7411, (Rumah)', NULL, NULL, '2022-04-21 19:14:30', '2022-04-20 19:14:30', '2022-04-20 19:14:40', 'OKE', 50000, 4050000, 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_details`
--

CREATE TABLE `transaksi_details` (
  `id_detail_transaksi` int(10) UNSIGNED NOT NULL,
  `transaksi_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `total_item` int(11) DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_details`
--

INSERT INTO `transaksi_details` (`id_detail_transaksi`, `transaksi_id`, `produk_id`, `total_item`, `catatan`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 3, 'Tidak ada', 1000000, '2022-03-14 13:59:12', '2022-03-14 13:59:12'),
(2, 2, 4, 2, 'none', 40000, '2022-03-14 13:59:12', '2022-03-14 13:59:12'),
(3, 3, 4, 3, 'Tidak ada', 1000000, '2022-03-14 14:06:07', '2022-03-14 14:06:07'),
(4, 3, 5, 2, 'none', 40000, '2022-03-14 14:06:07', '2022-03-14 14:06:07'),
(5, 4, 4, 3, 'Tidak ada', 1000000, '2022-04-10 09:16:08', '2022-04-10 09:16:08'),
(6, 4, 5, 2, 'none', 40000, '2022-04-10 09:16:08', '2022-04-10 09:16:08'),
(7, 5, 4, 3, 'Tidak ada', 1000000, '2022-04-11 05:55:55', '2022-04-11 05:55:55'),
(8, 5, 5, 2, 'none', 40000, '2022-04-11 05:55:55', '2022-04-11 05:55:55'),
(9, 6, 4, 1, 'catatan baru', 8000001, '2022-04-11 05:57:17', '2022-04-11 05:57:17'),
(10, 7, 4, 1, 'catatan baru', 8000001, '2022-04-11 05:58:46', '2022-04-11 05:58:46'),
(11, 7, 5, 1, 'catatan baru', 2000001, '2022-04-11 05:58:46', '2022-04-11 05:58:46'),
(12, 8, 3, 1, 'catatan baru', 4000001, '2022-04-11 23:30:36', '2022-04-11 23:30:36'),
(13, 8, 4, 1, 'catatan baru', 8000001, '2022-04-11 23:30:36', '2022-04-11 23:30:36'),
(14, 9, 3, 1, 'catatan baru', 4000001, '2022-04-12 17:59:54', '2022-04-12 17:59:54'),
(15, 10, 3, 1, 'catatan baru', 4000001, '2022-04-12 19:33:32', '2022-04-12 19:33:32'),
(16, 11, 3, 1, 'catatan baru', 4000001, '2022-04-12 19:37:05', '2022-04-12 19:37:05'),
(17, 12, 3, 1, 'catatan baru', 4000001, '2022-04-12 19:40:21', '2022-04-12 19:40:21'),
(18, 13, 3, 1, 'catatan baru', 4000001, '2022-04-13 21:38:24', '2022-04-13 21:38:24'),
(19, 13, 4, 1, 'catatan baru', 8000001, '2022-04-13 21:38:24', '2022-04-13 21:38:24'),
(20, 14, 5, 2, 'catatan baru', 2000002, '2022-04-13 21:39:51', '2022-04-13 21:39:51'),
(21, 15, 6, 1, 'catatan baru', 1000001, '2022-04-13 21:40:44', '2022-04-13 21:40:44'),
(22, 16, 3, 1, 'catatan baru', 4000001, '2022-04-14 07:28:17', '2022-04-14 07:28:17'),
(23, 16, 5, 1, 'catatan baru', 2000001, '2022-04-14 07:28:17', '2022-04-14 07:28:17'),
(24, 16, 6, 1, 'catatan baru', 1000001, '2022-04-14 07:28:17', '2022-04-14 07:28:17'),
(25, 17, 4, 1, 'catatan baru', 8000001, '2022-04-17 23:13:13', '2022-04-17 23:13:13'),
(26, 18, 3, 1, 'catatan baru', 4000001, '2022-04-20 18:07:12', '2022-04-20 18:07:12'),
(27, 18, 5, 1, 'catatan baru', 2000001, '2022-04-20 18:07:12', '2022-04-20 18:07:12'),
(28, 19, 3, 2, 'catatan baru', 4000002, '2022-04-20 19:08:37', '2022-04-20 19:08:37'),
(29, 20, 3, 1, 'catatan baru', 4000001, '2022-04-20 19:14:30', '2022-04-20 19:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `phone`, `fcm`) VALUES
(1, 'Ahmad Gozali', 'ahmadmulti10@gmail.com', NULL, '$2y$10$hWEQg2nQrpuNQvPvl1PdYO/VSptH6cG0YVKPvFqQaQC9IzVNvGb82', NULL, '2022-02-18 08:46:33', '2022-04-20 19:06:57', '', '082296468844', 'dPd-sGA9Tyabpt2oF2tzvL:APA91bH5zuvLs1I4e_4ehRMAIEsZhq6gzmrtfzP7vj2KXDrbKTSpXCUxN5YFOTTmeK89LAuZcmXdJQkyuY0ZUWyo9ug41kkIg37sVfPXlyXhElRNNQujZeoJNzboUdMHLBINf-K57pmd'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$NdmDMc7Tmu2BmC4QD3Joa.EMVfC2HO7xG6Xe./Zz6cumA.p7JxBqW', NULL, '2022-02-18 11:47:02', '2022-04-20 17:58:43', '', '082296346899', 'ejJLwNTvSeWwVc07Jl6FMa:APA91bF2fXxCw7e-XtjJyGKqQSZgaZQ1RQF0-YQDnIq5D2ExFWnzpIrnAqV7GYBfMx_bw-e7LoPQvT0IW81xP-5CjESbRaY4JnU8wNAWvmxR95O32sk2W7-lMriRs8us9fx2UsALRnjy'),
(10, 'hanafi', 'hanafi@gmail.com', NULL, '$2y$10$Hx8nDIADLMaVYZIXqxAvRe1dWuTJvXLa7dgD6EutRqMoL85bGwbIm', NULL, '2022-04-20 19:13:15', '2022-04-20 19:13:15', NULL, '082228164643', 'dPd-sGA9Tyabpt2oF2tzvL:APA91bH5zuvLs1I4e_4ehRMAIEsZhq6gzmrtfzP7vj2KXDrbKTSpXCUxN5YFOTTmeK89LAuZcmXdJQkyuY0ZUWyo9ug41kkIg37sVfPXlyXhElRNNQujZeoJNzboUdMHLBINf-K57pmd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  MODIFY `id_detail_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
