-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 08:38 AM
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
-- Database: `db_puskesmas_mambi`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_29_132142_create_pasiens_table', 1),
(6, '2024_01_29_132157_create_polis_table', 1),
(7, '2024_01_29_132203_create_penyakits_table', 1),
(8, '2024_01_29_132843_create_rekam_mediks_table', 1),
(9, '2024_01_30_112112_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `ttl` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nama`, `jk`, `ttl`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Wahdania', 'Laki-laki', '1989-11-15', '-', 'mambi', '2024-02-21 00:20:15', '2024-02-21 00:20:15'),
(2, 'fahmi', 'Laki-laki', '1995-02-21', '-', 'mambi', '2024-02-21 00:20:43', '2024-02-21 00:21:00'),
(3, 'Rijal', 'Laki-laki', '1997-06-27', '-', 'mambi', '2024-02-21 00:21:37', '2024-02-21 00:21:37'),
(4, 'Mahfuda', 'Perempuan', '1998-06-22', '-', 'mambi', '2024-02-21 00:22:31', '2024-02-21 00:22:48'),
(5, 'rifki', 'Laki-laki', '1996-07-22', '-', 'sumarorong', '2024-02-21 00:29:17', '2024-02-21 00:29:17'),
(6, 'diana', 'Perempuan', '2013-06-11', '-', 'mambi', '2024-02-21 00:32:43', '2024-02-21 00:32:43');

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
-- Table structure for table `penyakits`
--

CREATE TABLE `penyakits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poli_id` bigint(20) UNSIGNED NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakits`
--

INSERT INTO `penyakits` (`id`, `poli_id`, `nama_penyakit`, `created_at`, `updated_at`) VALUES
(1, 1, 'Batuk', '2024-02-21 00:16:29', '2024-02-21 00:16:29'),
(2, 1, 'Gatal', '2024-02-21 00:16:44', '2024-02-21 00:16:44'),
(3, 1, 'Pusin, Nyeri hulu hati', '2024-02-21 00:17:16', '2024-02-21 00:17:23'),
(4, 2, 'Berlubang', '2024-02-21 00:23:06', '2024-02-21 00:23:06'),
(5, 4, 'Kurang darah', '2024-02-21 00:23:18', '2024-02-21 00:23:25');

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
-- Table structure for table `polis`
--

CREATE TABLE `polis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_poli` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polis`
--

INSERT INTO `polis` (`id`, `nama_poli`, `dokter`, `created_at`, `updated_at`) VALUES
(1, 'Umum', 'Dok. Ibrahim', '2024-02-21 00:04:33', '2024-02-21 00:04:33'),
(2, 'Gigi', 'Dok. Surya', '2024-02-21 00:05:17', '2024-02-21 00:05:17'),
(3, 'Kesehatan Ibu Anak dan KB', 'Dok. Herlina', '2024-02-21 00:06:00', '2024-02-21 00:06:00'),
(4, 'Gizi', 'Dr. Lina', '2024-02-21 00:07:06', '2024-02-21 00:07:06'),
(5, 'MTBS dan Imunisasi', 'Dr. Erwin', '2024-02-21 00:07:53', '2024-02-21 00:07:53'),
(6, 'Komunikasi Informasi dan Edukasi', 'Dr. Warna', '2024-02-21 00:08:49', '2024-02-21 00:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_mediks`
--

CREATE TABLE `rekam_mediks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `poli_id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` bigint(20) UNSIGNED NOT NULL,
  `umur` int(11) NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekam_mediks`
--

INSERT INTO `rekam_mediks` (`id`, `pasien_id`, `poli_id`, `penyakit_id`, `umur`, `tanggal_pemeriksaan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 34, '2024-02-21', 'suka berdahak dahak', '2024-02-21 00:25:48', '2024-02-21 00:25:48'),
(2, 2, 4, 5, 29, '2024-02-21', 'suka begadang', '2024-02-21 00:26:18', '2024-02-21 00:26:18'),
(3, 3, 2, 4, 26, '2024-02-21', 'tidak merawat giginya dan 2 sudah berlubang', '2024-02-21 00:27:00', '2024-02-21 00:27:00'),
(4, 4, 1, 2, 25, '2024-02-21', 'alergi pada kaki dan bisul', '2024-02-21 00:28:12', '2024-02-21 00:28:12'),
(5, 5, 1, 1, 27, '2024-02-21', 'sering minum es', '2024-02-21 00:29:53', '2024-02-21 00:29:53'),
(6, 2, 1, 1, 29, '2024-02-21', 'batuk keras', '2024-02-21 00:31:24', '2024-02-21 00:31:24'),
(7, 6, 2, 4, 10, '2024-02-21', 'sakit gigi berlubang', '2024-02-21 00:33:14', '2024-02-21 00:33:14'),
(8, 4, 4, 1, 25, '2024-02-21', 'batuk ringan', '2024-02-21 00:35:20', '2024-02-21 00:35:41'),
(9, 3, 1, 3, 26, '2024-02-21', 'panas panas', '2024-02-21 00:36:33', '2024-02-21 00:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currentMonth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `currentMonth`, `created_at`, `updated_at`) VALUES
(1, '2024-02-01', NULL, '2024-02-21 00:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'wiwik', 'admin@example.com', NULL, '$2y$12$EqQdAzZJXKBDKEjgSriVfeA3jktA6J2G16tDNjx2hmzWW/JAF/eyG', 'MkzwayJ6a0JGIZe9iRfF8Ya3EqcdhyJez8DN4ea2Atv1CuMNFnNpOE7csmOu', '2024-01-30 08:06:30', '2024-01-30 08:06:30');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penyakits`
--
ALTER TABLE `penyakits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyakits_poli_id_foreign` (`poli_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polis`
--
ALTER TABLE `polis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_mediks`
--
ALTER TABLE `rekam_mediks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_mediks_pasien_id_foreign` (`pasien_id`),
  ADD KEY `rekam_mediks_poli_id_foreign` (`poli_id`),
  ADD KEY `rekam_mediks_penyakit_id_foreign` (`penyakit_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penyakits`
--
ALTER TABLE `penyakits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polis`
--
ALTER TABLE `polis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekam_mediks`
--
ALTER TABLE `rekam_mediks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyakits`
--
ALTER TABLE `penyakits`
  ADD CONSTRAINT `penyakits_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `polis` (`id`);

--
-- Constraints for table `rekam_mediks`
--
ALTER TABLE `rekam_mediks`
  ADD CONSTRAINT `rekam_mediks_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`),
  ADD CONSTRAINT `rekam_mediks_penyakit_id_foreign` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakits` (`id`),
  ADD CONSTRAINT `rekam_mediks_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `polis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
