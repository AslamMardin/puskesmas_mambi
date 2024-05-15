-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 01:34 PM
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
(8, 'Islawati', 'Perempuan', '2001-01-12', '-', 'lemo', '2024-02-26 22:15:17', '2024-03-04 14:43:52'),
(12, 'Muhammd', 'Laki-laki', '2017-06-26', '-', 'Mambi', '2024-02-27 14:40:03', '2024-03-11 12:28:16'),
(13, 'fauzi al jaidi', 'Perempuan', '2013-01-08', '-', 'mambi', '2024-02-27 14:41:45', '2024-03-04 15:15:40'),
(14, 'irwan k', 'Laki-laki', '1974-10-14', '-', 'mambi', '2024-02-27 14:45:12', '2024-02-27 14:46:44'),
(22, 'M. Takdir', 'Laki-laki', '1980-07-26', '-', 'Mambi', '2024-03-04 17:16:50', '2024-03-04 17:20:20'),
(23, 'Suriani', 'Perempuan', '1972-06-23', '-', 'Mambi', '2024-03-04 17:23:31', '2024-03-04 18:25:36'),
(24, 'Syakira Nadlifa', 'Perempuan', '2007-07-22', '-', 'Lemo', '2024-03-04 17:29:56', '2024-03-04 18:23:14'),
(25, 'Nursyamsi', 'Perempuan', '1965-08-04', '-', 'Mambi', '2024-03-04 17:49:34', '2024-03-04 17:54:19'),
(26, 'Risda', 'Perempuan', '1957-07-04', '-', 'Mambi', '2024-03-04 18:32:06', '2024-03-11 12:02:59'),
(28, 'Masria rosa', 'Perempuan', '1991-05-04', '-', 'Mambi', '2024-03-05 13:17:23', '2024-03-05 13:17:23'),
(29, 'Rosni', 'Perempuan', '1954-10-21', '-', 'Lemo', '2024-03-05 13:32:01', '2024-03-11 11:59:45'),
(32, 'rahmat', 'Laki-laki', '2004-09-19', '-', 'Lemo', '2024-03-06 09:48:26', '2024-03-06 09:48:26'),
(33, 'Rosmiati', 'Perempuan', '1969-11-05', '-', 'Mambi', '2024-03-06 10:04:33', '2024-03-06 10:05:53'),
(34, 'Saluddin', 'Laki-laki', '1963-11-05', '-', 'Mambi', '2024-03-06 10:09:57', '2024-03-06 10:09:57'),
(35, 'Hasma', 'Laki-laki', '1996-02-15', '-', 'Sendana', '2024-03-06 10:34:56', '2024-03-06 10:34:56'),
(36, 'Hasrar', 'Laki-laki', '1984-11-19', '-', 'Sondong laju', '2024-03-06 10:41:58', '2024-03-06 10:41:58'),
(37, 'Mutasyam', 'Laki-laki', '1974-03-05', '-', 'mambi', '2024-03-06 10:45:57', '2024-03-06 10:45:57'),
(38, 'Wanda nur', 'Perempuan', '2003-09-05', '-', 'Saludurian', '2024-03-06 11:02:10', '2024-03-06 11:02:10'),
(39, 'Muh.Tri Hariadi', 'Laki-laki', '2000-09-22', '-', 'Mambi', '2024-03-06 11:12:12', '2024-03-06 11:12:12'),
(40, 'Nafita Alwahira', 'Perempuan', '2022-06-07', '-', 'Mambi', '2024-03-06 15:27:13', '2024-03-06 15:27:13'),
(41, 'Mirawati', 'Perempuan', '1973-05-29', '-', 'Mambi', '2024-03-06 15:32:17', '2024-03-06 15:35:03'),
(42, 'Nurmayati', 'Perempuan', '1973-12-25', '-', 'Saludurian', '2024-03-06 15:40:03', '2024-03-06 15:42:20'),
(43, 'Ridwan', 'Laki-laki', '2001-04-14', '-', 'Lemo', '2024-03-06 15:46:24', '2024-03-06 15:47:18'),
(44, 'Mardaeni', 'Perempuan', '1968-06-12', '-', 'Mambi', '2024-03-06 15:52:33', '2024-03-06 15:54:05'),
(45, 'Siti nurbaya', 'Perempuan', '1963-06-16', '-', 'Mambi', '2024-03-06 15:57:05', '2024-03-06 16:00:32'),
(46, 'Rahman', 'Laki-laki', '1980-06-29', '-', 'Mambi', '2024-03-06 16:05:27', '2024-03-06 16:06:25'),
(47, 'Naharia', 'Perempuan', '1965-05-19', '-', 'Mambi', '2024-03-06 16:09:32', '2024-03-06 16:11:16'),
(48, 'Alani', 'Perempuan', '1969-08-08', '-', 'Lemo', '2024-03-06 16:21:18', '2024-03-06 16:21:18'),
(49, 'Hasra', 'Laki-laki', '1963-05-05', '-', 'Mambi', '2024-03-06 18:58:22', '2024-03-06 18:58:22'),
(50, 'Kasmia', 'Perempuan', '1985-02-17', '-', 'Mambi', '2024-03-06 19:09:52', '2024-03-06 19:09:52'),
(51, 'Sahrul', 'Laki-laki', '1978-01-18', '-', 'Saludurian', '2024-03-06 19:14:46', '2024-03-06 19:14:46'),
(52, 'Rahmawati', 'Perempuan', '1998-02-18', '-', 'Mambi', '2024-03-06 19:20:57', '2024-03-06 19:20:57'),
(53, 'Humaria', 'Perempuan', '2008-01-30', '-', 'Mambi', '2024-03-06 19:29:55', '2024-03-06 19:30:24'),
(54, 'Rusmia', 'Laki-laki', '1974-03-18', '-', 'Mambi', '2024-03-06 19:35:56', '2024-03-06 19:36:25'),
(55, 'Muh Zaki', 'Laki-laki', '2022-06-06', '-', 'Mambi', '2024-03-06 19:42:07', '2024-03-06 19:42:07'),
(56, 'Syamsurya', 'Laki-laki', '2022-08-08', '-', 'Mambi', '2024-03-06 19:48:19', '2024-03-06 19:48:49'),
(57, 'Aliya Faiza', 'Perempuan', '2006-04-14', '-', 'Mambi', '2024-03-06 19:53:41', '2024-03-06 19:53:41'),
(58, 'Muh Asyad Muazzam', 'Laki-laki', '2016-03-25', '-', 'Sondong laju', '2024-03-06 20:00:21', '2024-03-06 20:00:21'),
(59, 'Ramli', 'Laki-laki', '1973-03-09', '-', 'Mambi', '2024-03-06 20:05:16', '2024-03-06 20:05:49'),
(60, 'Janasia', 'Perempuan', '1974-03-19', '-', 'Saludurian', '2024-03-06 20:10:08', '2024-03-06 20:10:08'),
(61, 'Mayaudin', 'Laki-laki', '1973-02-21', '-', 'Mambi', '2024-03-06 20:22:17', '2024-03-06 20:22:17'),
(62, 'Muh Yazdan', 'Laki-laki', '2020-02-09', '-', 'Mambi', '2024-03-07 20:29:32', '2024-03-07 20:30:25'),
(63, 'Nurhasnawati', 'Perempuan', '2003-05-15', '-', 'Mambi', '2024-03-07 20:40:26', '2024-03-07 20:47:01'),
(64, 'Nardawiya', 'Perempuan', '1985-06-17', '-', 'Mambi', '2024-03-09 14:10:52', '2024-03-09 14:12:10'),
(65, 'Nurmadia', 'Laki-laki', '1971-07-17', '-', 'Sendana', '2024-03-09 14:20:18', '2024-03-09 14:20:45'),
(66, 'Salang', 'Perempuan', '1974-06-21', '-', 'Mambi', '2024-03-09 14:57:48', '2024-03-09 14:58:20'),
(67, 'Mansur', 'Perempuan', '1969-11-08', '-', 'Mambi', '2024-03-09 15:05:59', '2024-03-09 15:07:03'),
(68, 'Kaharuddin', 'Laki-laki', '1990-06-21', '-', 'Mambi', '2024-03-09 15:10:00', '2024-03-09 15:10:00'),
(69, 'Hani Suria Ningsi', 'Perempuan', '1999-06-18', '-', 'Lemo', '2024-03-09 15:24:54', '2024-03-09 15:25:26'),
(70, 'Indayani', 'Perempuan', '1992-06-08', '-', 'Sendana', '2024-03-09 15:49:07', '2024-03-09 15:52:37'),
(71, 'Badrun', 'Perempuan', '2005-10-19', '-', 'Mambi', '2024-03-09 15:56:07', '2024-03-09 15:56:07'),
(72, 'Handayani', 'Perempuan', '1980-12-03', '-', 'Mambi', '2024-03-09 16:00:48', '2024-03-09 16:01:10'),
(73, 'Taufik zikir', 'Perempuan', '2008-12-18', '-', 'Mambi', '2024-03-09 16:06:01', '2024-03-09 16:07:48'),
(74, 'Fajrianti', 'Perempuan', '2010-08-17', '-', 'Mambi', '2024-03-09 16:13:48', '2024-03-09 16:14:20'),
(75, 'Usman', 'Laki-laki', '1966-11-16', '-', 'Mambi', '2024-03-09 16:20:04', '2024-03-09 16:20:39'),
(76, 'Muh Ming', 'Laki-laki', '1977-07-22', '-', 'Sendana', '2024-03-09 16:31:57', '2024-03-09 16:31:57'),
(77, 'Muh Mashaffar', 'Laki-laki', '2019-11-22', '-', 'Mambi', '2024-03-09 16:40:08', '2024-03-09 16:40:32'),
(78, 'Sitti hasma', 'Perempuan', '1969-08-14', '-', 'Mambi', '2024-03-09 16:49:08', '2024-03-09 16:50:08'),
(79, 'Muh Asraf', 'Laki-laki', '2004-06-15', '-', 'Mambi', '2024-03-09 17:27:18', '2024-03-09 17:27:42'),
(80, 'Janna', 'Perempuan', '1944-10-09', '-', 'Mambi', '2024-03-09 17:31:48', '2024-03-09 17:31:48'),
(81, 'Bajang', 'Laki-laki', '1963-06-18', '-', 'Mambi', '2024-03-09 17:37:59', '2024-03-09 17:38:20'),
(82, 'Muh Ilham', 'Laki-laki', '1984-10-25', '-', 'Mmambi', '2024-03-09 17:46:18', '2024-03-09 17:46:18'),
(83, 'Sainab', 'Laki-laki', '1974-06-09', '-', 'Mambi', '2024-03-09 17:55:43', '2024-03-09 17:55:43'),
(84, 'Sunusi K', 'Laki-laki', '1951-11-09', '-', 'Mambi', '2024-03-09 18:00:29', '2024-03-09 18:00:29'),
(85, 'Hasari', 'Perempuan', '1983-06-21', '-', 'Mambi', '2024-03-11 12:34:49', '2024-03-11 12:34:49'),
(86, 'Ahmad P', 'Laki-laki', '1952-06-18', '-', 'Mambi', '2024-04-02 10:18:08', '2024-04-02 10:18:08'),
(87, 'Hasrianto', 'Laki-laki', '1971-06-11', '-', 'Mambi', '2024-04-02 10:18:09', '2024-04-02 10:20:58'),
(88, 'Riswan', 'Laki-laki', '2017-08-13', '-', 'Mambi', '2024-04-02 10:24:47', '2024-04-02 10:26:57'),
(89, 'Sitti  Nuri', 'Laki-laki', '1977-11-14', '-', 'Mambi', '2024-04-02 11:10:47', '2024-04-02 11:10:47'),
(90, 'Maraeni', 'Perempuan', '1959-10-19', '-', '-', '2024-04-02 11:16:42', '2024-04-02 11:16:42');

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
  `keterangan` varchar(120) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakits`
--

INSERT INTO `penyakits` (`id`, `poli_id`, `nama_penyakit`, `keterangan`, `created_at`, `updated_at`) VALUES
(13, 5, 'Vertigo + Dgspesaa', 'Pusing', '2024-03-04 15:33:46', '2024-05-15 02:45:00'),
(17, 5, 'tonsilofaringitis akut', 'Sakit Tenggorokan', '2024-03-04 15:38:44', '2024-05-15 02:44:46'),
(19, 5, 'dermatitis', 'Infeksi Kulit', '2024-03-04 15:40:34', '2024-05-15 02:23:27'),
(22, 5, 'vulnus laseratun regio v proximal', '', '2024-03-04 15:48:38', '2024-03-04 15:48:38'),
(23, 5, 'deman thypoid', 'Tipes', '2024-03-04 15:49:06', '2024-05-15 02:45:12'),
(24, 5, 'PPOK eks, akut, alergi akut', '', '2024-03-04 15:51:00', '2024-03-04 15:51:00'),
(25, 5, 'selesma', '', '2024-03-04 15:51:18', '2024-03-04 15:51:18'),
(26, 5, 'abses regio mammae (s)', '', '2024-03-04 15:51:52', '2024-03-04 15:51:52'),
(27, 5, 'Epiliepi', 'Gangguan Saraf', '2024-03-04 15:59:18', '2024-05-15 02:47:07'),
(33, 5, 'Opilepsi', '', '2024-03-04 16:48:51', '2024-03-04 16:48:51'),
(34, 5, 'Bronkho pneumoni', '', '2024-03-04 16:50:15', '2024-03-04 16:50:15'),
(35, 5, 'Trikemomonisasis Vaginalis', '', '2024-03-04 16:52:11', '2024-03-04 16:52:11'),
(36, 5, 'Diare akut tampa dihidrasi', 'Muntah-Muntah', '2024-03-04 16:53:09', '2024-05-15 02:47:33'),
(37, 5, 'Migrasi +Hipotensi', 'Menular', '2024-03-04 16:53:49', '2024-05-15 02:47:55'),
(38, 5, 'Dislokasi achiks', 'Kelemahan Pada Tubuh', '2024-03-04 16:55:18', '2024-05-15 02:46:36'),
(40, 5, 'paraparese', '', '2024-03-04 16:57:51', '2024-03-04 16:57:51'),
(41, 5, 'HT atau Hipertensi', 'Tekanan Darah Tinggi', '2024-03-04 16:58:35', '2024-05-15 02:44:04'),
(42, 5, 'CHF', '', '2024-03-04 16:59:05', '2024-03-04 16:59:05'),
(43, 5, 'DM tipe 2', '', '2024-03-04 16:59:34', '2024-03-04 16:59:34'),
(44, 5, 'Ispa', 'Infeksi', '2024-03-04 17:00:04', '2024-05-15 02:44:20'),
(45, 5, 'Susp. Bsk', '', '2024-03-04 17:01:30', '2024-03-04 17:01:30'),
(46, 5, 'Pension tipe headache', '', '2024-03-05 13:20:31', '2024-03-05 13:20:31'),
(47, 5, 'Neuropati DM', '', '2024-03-05 13:32:57', '2024-03-05 13:32:57'),
(48, 5, 'HHD', '', '2024-03-06 18:59:58', '2024-03-06 18:59:58'),
(50, 5, 'Mialgia', '', '2024-03-06 19:15:50', '2024-03-06 19:15:50'),
(52, 5, 'Sizofrenia', '', '2024-03-06 19:31:35', '2024-03-06 19:31:35'),
(53, 5, 'Selesma', '', '2024-03-06 19:37:17', '2024-03-06 19:37:17'),
(54, 5, 'Infeksi Krutosa', '', '2024-03-06 19:44:56', '2024-03-06 19:44:56'),
(55, 5, 'Selesma', '', '2024-03-06 19:49:22', '2024-03-06 19:49:22'),
(56, 5, 'Tagrowing nail dextra', '', '2024-03-06 19:54:26', '2024-03-06 19:54:26'),
(57, 5, 'Dispensia Fungsional', '', '2024-03-06 20:01:36', '2024-03-06 20:01:36'),
(58, 5, 'Cephalgia', '', '2024-03-06 20:06:38', '2024-03-06 20:06:38'),
(59, 5, 'Hiporkolestrolemia', '', '2024-03-06 20:11:51', '2024-03-06 20:11:51'),
(62, 5, 'chizofrenia + g6.mood', '', '2024-03-07 20:42:07', '2024-03-07 20:42:07'),
(63, 5, 'Dyspepsia Fungsional', '', '2024-03-09 14:13:48', '2024-03-09 14:13:48'),
(67, 5, 'DM tipe II , HBAC,', '', '2024-03-09 14:59:56', '2024-03-09 14:59:56'),
(70, 5, 'Schizofrema', '', '2024-03-09 15:11:39', '2024-03-09 15:11:39'),
(72, 5, 'Himoptoe,Susp . IB paru', '', '2024-03-09 15:46:19', '2024-03-09 15:46:19'),
(75, 5, 'Tinea', '', '2024-03-09 16:02:46', '2024-03-09 16:02:46'),
(76, 5, 'Obs febris S, feram', '', '2024-03-09 16:10:07', '2024-03-09 16:10:07'),
(77, 5, 'Tonsilitis', '', '2024-03-09 16:15:09', '2024-03-09 16:15:09'),
(79, 5, 'Post trauma tumpul thorax', '', '2024-03-09 16:34:15', '2024-03-09 16:34:15'),
(81, 5, 'Serumun prop+otitis eksterna', '', '2024-03-09 16:43:59', '2024-03-09 16:43:59'),
(84, 5, 'Febris + Dyspepsia', '', '2024-03-09 17:32:41', '2024-03-09 17:32:41'),
(86, 5, 'HT Urgensi', '', '2024-04-02 10:21:52', '2024-04-02 10:21:52'),
(87, 5, 'Ugem tangkai susp hipoglikemia', '', '2024-04-02 10:27:48', '2024-04-02 10:27:48'),
(88, 5, 'OE dd / mastoiditis auriae dekstra', '', '2024-04-02 11:11:25', '2024-04-02 11:11:25');

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
(5, 'Umum', 'Dr Ariansyah Anna Dr Firna', '2024-03-04 14:55:41', '2024-03-04 14:55:41'),
(7, 'Gigi & Mulut', 'Reni Tungga Pratiwi AMKG', '2024-03-07 20:55:39', '2024-03-07 20:55:39'),
(8, 'Gizi', 'Alprida Sesa SKM', '2024-03-07 21:04:00', '2024-03-07 21:04:00');

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
(32, 24, 5, 19, 11, '2024-03-04', 'Bintik bintik pada kedua mata di sertai gatal', '2024-03-04 17:58:44', '2024-03-04 17:58:44'),
(47, 25, 5, 13, 58, '2024-03-06', 'Pusing SUH', '2024-03-06 10:23:33', '2024-03-06 10:23:33'),
(49, 35, 5, 23, 28, '2024-03-06', 'Sakit badan ,Sakit kepalah', '2024-03-06 10:39:10', '2024-03-06 10:39:10'),
(50, 36, 5, 38, 39, '2024-03-06', 'Nyeri lutut', '2024-03-06 10:43:49', '2024-03-06 10:43:49'),
(51, 37, 5, 41, 50, '2024-03-06', 'Pusing', '2024-03-06 10:48:20', '2024-03-06 10:48:20'),
(52, 38, 5, 27, 20, '2024-03-06', 'Kontrol ht  dan sambung obat Riw epilespi', '2024-03-06 11:06:59', '2024-03-06 11:06:59'),
(53, 39, 5, 44, 23, '2024-03-06', 'Suh,demam,menggil, sejak kemarin', '2024-03-06 11:13:58', '2024-03-06 11:13:58'),
(54, 40, 5, 36, 1, '2024-03-06', 'Demam -Diare', '2024-03-06 15:30:17', '2024-03-06 15:30:17'),
(55, 41, 5, 37, 50, '2024-03-06', 'Nyeri kepala sebelah kiri', '2024-03-06 15:37:24', '2024-03-06 15:37:24'),
(57, 43, 5, 40, 22, '2024-03-06', 'Kaki terasa lemas', '2024-03-06 15:49:16', '2024-03-06 15:49:16'),
(58, 44, 5, 41, 55, '2024-03-06', 'Pusing', '2024-03-06 15:55:32', '2024-03-06 15:55:32'),
(59, 45, 5, 42, 60, '2024-03-06', 'Kontrol HT ,maag ,gatal pada badan bagian atas ,pada tiga bulan yang lalu,pusing riwayat Strok', '2024-03-06 16:03:04', '2024-03-06 16:03:04'),
(60, 46, 5, 43, 43, '2024-03-06', 'Nyeri pada kaki', '2024-03-06 16:07:55', '2024-03-06 16:07:55'),
(62, 48, 5, 45, 54, '2024-03-06', 'SUH nyeri kepalah bagaian belakang pusing,nyri belakang sebelah kiri', '2024-03-06 16:23:59', '2024-03-06 16:23:59'),
(63, 49, 5, 48, 60, '2024-03-06', 'Kepalah seblah kiri nyeri ,ulu hati ,nyeri dada, jantung berdetak', '2024-03-06 19:03:46', '2024-03-06 19:03:46'),
(65, 51, 5, 50, 46, '2024-03-06', 'Nyeri pinggang ,perut gembung ,tidak lancar BAB,\r\nPusing-pusing', '2024-03-06 19:18:00', '2024-03-06 19:18:00'),
(67, 53, 5, 52, 16, '2024-03-06', 'Pusing berkurang,Halusinasi', '2024-03-06 19:32:54', '2024-03-06 19:32:54'),
(68, 54, 5, 53, 49, '2024-03-06', 'Batuk-batu 3 hari yang lalu,gatal tenggorokan ,flu,susah tidur, riwayat HT', '2024-03-06 19:39:27', '2024-03-06 19:39:27'),
(69, 55, 5, 54, 1, '2024-03-06', 'Terdapat luka di bagaian hidung  dan bawa bibir', '2024-03-06 19:46:14', '2024-03-06 19:46:14'),
(70, 56, 5, 55, 1, '2024-03-06', 'Demam,beringus,munta', '2024-03-06 19:50:27', '2024-03-06 19:50:27'),
(71, 57, 5, 56, 17, '2024-03-06', 'Luka pada ibu jari sebelah kanan', '2024-03-06 19:55:34', '2024-03-06 19:55:34'),
(72, 58, 5, 57, 7, '2024-03-06', 'Nyeri dada', '2024-03-06 20:02:32', '2024-03-06 20:02:32'),
(73, 59, 5, 58, 50, '2024-03-06', 'Pusing,luka pada betis kanan', '2024-03-06 20:07:45', '2024-03-06 20:07:45'),
(74, 60, 5, 59, 49, '2024-03-06', 'Nyeri bahu kolestrol\r\n227', '2024-03-06 20:13:38', '2024-03-06 20:13:38'),
(77, 63, 5, 62, 19, '2024-03-07', 'Sakit Kepalah', '2024-03-07 20:45:15', '2024-03-07 20:45:15'),
(78, 64, 5, 63, 38, '2024-03-09', 'Nyeri ulu hati', '2024-03-09 14:14:49', '2024-03-09 14:14:49'),
(80, 66, 5, 67, 49, '2024-03-09', '-', '2024-03-09 15:01:29', '2024-03-09 15:01:29'),
(82, 69, 5, 72, 24, '2024-03-09', 'Batuk  berlendir', '2024-03-09 15:47:22', '2024-03-09 15:47:22'),
(85, 72, 5, 75, 43, '2024-03-09', 'Nyeri ujung kuku', '2024-03-09 16:04:17', '2024-03-09 16:04:17'),
(86, 73, 5, 76, 15, '2024-03-09', 'Panas sejak 2 minnggu yang lalu', '2024-03-09 16:11:23', '2024-03-09 16:11:23'),
(87, 74, 5, 77, 13, '2024-03-09', 'Nyeri menyelan(+)sudah mulai berkurang', '2024-03-09 16:17:34', '2024-03-09 16:17:34'),
(89, 76, 5, 79, 46, '2024-03-09', 'Sakit dada seblah kanan, akibat jatuh menimpa kayu', '2024-03-09 16:37:06', '2024-03-09 16:37:06'),
(90, 77, 5, 81, 4, '2024-03-09', 'Sakit telinga', '2024-03-09 16:46:32', '2024-03-09 16:46:32'),
(93, 80, 5, 84, 79, '2024-03-09', 'Kontrol kaki,masih terasa dingin ,nyreri ulu hati mual', '2024-03-09 17:34:39', '2024-03-09 17:34:39'),
(95, 82, 5, 19, 39, '2024-03-09', 'Gatal-gatal', '2024-03-09 17:49:26', '2024-03-09 17:49:26'),
(96, 83, 5, 19, 49, '2024-03-09', 'Gatal di bagian perut ,2 hari yang lalu', '2024-03-09 17:57:20', '2024-03-09 17:57:20'),
(98, 58, 5, 19, 7, '2024-03-09', 'Gatal pada bagain badan', '2024-03-09 18:03:59', '2024-03-09 18:03:59'),
(99, 62, 5, 19, 4, '2024-03-09', 'Gatal-Gatal', '2024-03-09 18:05:33', '2024-03-09 18:05:33'),
(101, 12, 5, 19, 7, '2024-03-09', 'Gatal gatal di tangan', '2024-03-09 18:17:54', '2024-03-09 18:17:54'),
(102, 12, 5, 25, 7, '2024-03-11', 'Beringus', '2024-03-11 12:09:36', '2024-03-11 12:09:36'),
(103, 23, 5, 24, 51, '2024-03-11', 'Infeksi pada bagian kaki', '2024-03-11 12:22:30', '2024-03-11 12:22:30'),
(104, 81, 5, 33, 60, '2024-03-11', 'Luka di bagain kepala', '2024-03-11 12:26:25', '2024-03-11 12:26:25'),
(105, 85, 5, 24, 40, '2024-03-11', 'Elergi tamba infeksi', '2024-03-11 12:36:34', '2024-03-11 12:36:34'),
(106, 34, 5, 33, 60, '2024-03-11', 'Cedera pada bagain kepala', '2024-03-11 12:38:49', '2024-03-11 12:38:49'),
(107, 78, 5, 35, 54, '2024-03-11', 'infeksi pada baagian tangan', '2024-03-11 12:41:40', '2024-03-11 12:41:40'),
(109, 14, 5, 48, 49, '2024-03-11', 'Kolestrol tinggi', '2024-03-11 12:46:05', '2024-03-11 12:46:05'),
(110, 77, 5, 34, 4, '2024-03-11', 'Sesak napas', '2024-03-11 12:48:08', '2024-03-11 12:48:08'),
(111, 71, 5, 38, 18, '2024-03-11', 'Sakit pada bagian kaki', '2024-03-11 12:50:44', '2024-03-11 12:50:44'),
(112, 22, 5, 23, 43, '2024-03-11', 'Sakit perut dan demam', '2024-03-11 12:53:45', '2024-03-11 12:53:45'),
(113, 75, 5, 19, 57, '2024-03-11', 'Asma dan demam', '2024-03-11 12:55:04', '2024-03-11 12:55:04'),
(114, 23, 5, 43, 51, '2024-03-11', 'Polah makan tidak teratur', '2024-03-11 12:57:46', '2024-03-11 12:57:46'),
(115, 87, 5, 86, 52, '2024-04-02', 'Nyeri kedua lutut', '2024-04-02 10:22:58', '2024-04-02 10:22:58'),
(116, 88, 5, 87, 6, '2024-04-02', 'Nyeri di bawa telinga bagian belakang ,pusing ,mual', '2024-04-02 10:28:43', '2024-04-02 10:28:43'),
(117, 89, 5, 88, 46, '2024-04-02', 'Nyeri  dibawa telinga bagian belakang ,sejak 2 hari yang lalu', '2024-04-02 11:12:44', '2024-04-02 11:12:44'),
(120, 12, 5, 17, 6, '2024-04-02', 'Batuk berlendir', '2024-04-02 11:26:44', '2024-04-02 11:26:44'),
(121, 51, 5, 13, 46, '2024-04-02', 'Pusing', '2024-04-02 11:28:30', '2024-04-02 11:28:30'),
(122, 52, 5, 36, 26, '2024-04-02', 'Infeksi', '2024-04-02 11:31:58', '2024-04-02 11:31:58'),
(123, 13, 5, 27, 11, '2024-04-02', 'Gangguan pada sistem sarap', '2024-04-02 11:34:20', '2024-04-02 11:34:20');

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
(1, '2024-04-01', NULL, '2024-05-15 02:45:44');

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
(1, 'wiwik', 'wiwik@gmail.com', NULL, '$2y$12$RCZ5nDcoxfzvnQwpiaOCXe/kylI6ZAffc4LcIITRXA5w9eY2nfQo6', 'KWNthaevoUvxYTfIqA9dgb8BzvKvlCfrWhzvM0heB9BhgrnQYIeohpMbmTbU', '2024-02-24 14:23:16', '2024-02-24 14:23:16');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `penyakits`
--
ALTER TABLE `penyakits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polis`
--
ALTER TABLE `polis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rekam_mediks`
--
ALTER TABLE `rekam_mediks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

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
  ADD CONSTRAINT `penyakits_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `polis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rekam_mediks`
--
ALTER TABLE `rekam_mediks`
  ADD CONSTRAINT `rekam_mediks_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_mediks_penyakit_id_foreign` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_mediks_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `polis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
