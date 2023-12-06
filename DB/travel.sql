-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:1235
-- Generation Time: Dec 06, 2023 at 07:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `website_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `website_name`, `logo`, `about`, `whatsapp`, `facebook`, `instagram`, `twitter`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Travel Indonesia', 'images/LyfpM0x0uh0oSDEqbuvsvs6wrVa6qo-metabG9nby5wbmc=-.png', '<p>&nbsp;</p><h2>Umroh.com – Cari Paket Umroh Murah di Indonesia</h2><p><br></p><p>Umroh.com adalah marketplace yang menyediakan paket umroh lebih dari 100 travel umroh terpercaya di Indonesia dengan izin resmi Kementerian Agama. Ibadah terasa mudah karena tidak lagi pusing untuk mencari travel umroh dan temukan paket umroh yang diinginkan. Cari paket umroh dengan mudah dan aman, banyaknya pilihan paket umroh dari berbagai biro umroh terpercaya. Cek berbagai paket umroh pilihamu, ingin paket umroh regular, atau ingin beribadah sekaligus berwisata ke Negara islam dengan umroh plus, hingga kamu bisa umroh special bersama ustadz favoritmu. Temukan berbagai paket umroh regular, umroh plus, hingga umroh special. Mudahkan juga perjalanan dengan layanan pembuatan paspor online, pembelian paket data, ibadah nyaman semua mudah ditemukan hanya dengan Umroh.com. Saat ini sudah banyak travel terpercaya yang sudah bergabung dengan kami, Umroh.com ingin memudahkan umat muslim Indonesia dalam beribadah, menghilangkan kekhawatiran dikalangan masyarakat dan memberikan layanan yang terpercaya dan aman. Transaksi aman, ibadah nyaman bersama Umroh.com</p><h3>Paket Umroh Dari Travel Terpercaya</h3><p>Saat ingin merencanakan perjalanan ibadah umroh hal yang terpenting adalah mencari travel umroh terpercaya, lalu tentukan paket yang susuai dengan keinginan, oleh karena itu Umroh.com hadir untuk membantu anda mewujudkan rencana perjalanan ibadah anda. Di Umroh.com anda dapat menemukan berbagai paket umroh dari berbagai travel yang sudah bekerjasama dengan kami tentunya dengan fitur lengkap yang dapat memudahkan anda bertransaksi. Mulailah wujudkan rencana perjalanan anda bersama kami.</p><h3>Temukan Paket Umroh Dengan Promo Special</h3><p>Banyak keuntungan yang akan didapatkan dari Umroh.com, berbagai paket dari travel terpercaya serta dapatkan promo menarik yang telah kami sediakan. Diskon hingga free upgrade kamar setiap hari. Jika anda ingin merencanakan umroh namun dana belum cukup kami menyediakan cicilan hingga 24 bulan, biaya umroh mulai dari 500ribu/bulan. Sepanjang tahun Umroh.com terus memberikan pelayanan terbaik untuk memudahkan calon jamaah dan mewujudkan resolusi calon jamaah. Jangan lewatkan promo special Umroh.com, bersama kami transaksi aman, ibadah nyaman.&nbsp;</p>', '08817769047', 'Travel Indonesia', 'Travel Indonesia', 'Travel Indonesia', 'test@gmail.com', '2023-11-08 06:32:30', '2023-12-05 22:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rekening` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rekening` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `alamat`, `user_id`, `bank`, `no_rekening`, `nama_rekening`, `logo`, `izin`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Toyyiba Wisata', 'Jakarta', 3, 'Mandiri', '1240020202', 'PT TOYIBA WISATA', 'AU13FYdGpvQSpvAo0iifrnsTSAVb2R-metaOTk0Yjc5OGE3NzUzOTRlMmI4ODdhMDJkMmQ1OTMzNTIucG5n-.png', 'No. 19 Tahun 2004', NULL, '2023-11-11 07:39:30', '2023-11-11 07:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `diliputs`
--

CREATE TABLE `diliputs` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('User','Agent') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `slug`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Bagaimana cara bergabung menjadi travel partner di umroh.com?', '<p>&nbsp;Jika registrasi anda sudah selesai, kami akan menguhubungi anda untuk penjelasan lebih lanjut.&nbsp;</p>', 'bagaimana-cara-bergabung-menjadi-travel-partner-di-umrohcom', 'Agent', '2023-11-10 20:01:01', '2023-11-10 20:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Perusahaan', '2023-11-09 07:05:30', '2023-11-09 07:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `url`, `active`, `created_at`, `updated_at`) VALUES
(1, 'g1YgLufKywsyB9FdEHpIbrbo1TV9pj-metaMTIuanBn-.jpg', '/', 1, '2023-11-10 05:34:41', '2023-12-05 22:36:45'),
(2, 'RmtOmu0nSZwelV1JLgJoVN0BvrPRHv-metaOC5qcGc=-.jpg', '/', 1, '2023-11-10 05:35:01', '2023-12-05 22:37:13'),
(3, 'hupVwbNL89EDDOkbSXojRiN1KTPfgV-metaMy5qcGc=-.jpg', '/', 1, '2023-11-10 05:35:19', '2023-12-05 22:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `travel_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int DEFAULT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_capacity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `travel_id`, `name`, `city`, `image`, `description`, `stars`, `room_type`, `room_capacity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Grand Al Massa', 'Mekkah', 'KeD0JxLCPumqL1dyeCaz3jsoaevnTN-metacG5nd2luZy5jb20gKDEpLnBuZw==-.png', '<p>&nbsp;<strong>Fasilitas Populer</strong></p><ul><li>&nbsp; Free Wifi</li><li>&nbsp;Ruangan keluarga</li><li>&nbsp;Disabilitas</li><li>&nbsp;Tempat makan</li><li>&nbsp; &nbsp; Shuttle Bandara</li><li>&nbsp;Pelayanan kamar</li></ul><p><br></p><p><strong>Fasilitas Lainnya</strong></p><p>Tidak ada Fasilitas&nbsp;</p>', 5, 'Quad', 4, '2023-11-10 01:55:16', '2023-12-05 21:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_fotos`
--

CREATE TABLE `hotel_fotos` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `how_to_agents`
--

CREATE TABLE `how_to_agents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_to_agents`
--

INSERT INTO `how_to_agents` (`id`, `title`, `image`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Daftarkan Data Travel Kamu', 'images/pNfeeYmy4ObnG9xwRcrLbFNLpQcBT9-metaQ29tcG9uZW50XzNfM18yeC5wbmc=-.png', '<p>&nbsp;Tambahkan detail tentang Travel anda, agar jamaah lebih mengenal Travel anda dengan baik.&nbsp;</p>', 1, '2023-11-10 19:45:42', '2023-12-05 22:46:26'),
(2, 'Kami Akan Menghubungi Kamu untuk Verifikasi', 'images/UXzxtn7E3vKRoLSySZAT250lox3ZMp-metaR3JvdXBfMTA4NF8yeC5wbmc=-.png', '<p>&nbsp;Jika registrasi anda sudah selesai, kami akan menguhubungi anda untuk penjelasan lebih lanjut.&nbsp;</p>', 2, '2023-11-10 19:47:45', '2023-12-05 22:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `kelebihans`
--

CREATE TABLE `kelebihans` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelebihans`
--

INSERT INTO `kelebihans` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'rjg4fsFlHpDP67Ruoj55KikHZfwP1I-metaamFtaW5hbi5wbmc=-.png', 'Jaminan Berangkat dan Pembayaran Aman', 'Dana aman 100% dan hanya kami bayarkan kepada biro umroh setelah anda mendapatkan Kode PNR Penerbangan.', '2023-11-09 06:35:51', '2023-12-05 22:38:52'),
(2, 'IOsKNwVsiOBhujV5aRPz6kUHxQXgEb-metaZmFzaWxpdGFzLnBuZw==-.png', 'Fasilitas saat Ibadah Umroh', '<p>Nikmati fasilitas seperti gratis biaya pembuatan atau perpanjangan Paspor, Internet Provider selama ibadah umroh.&nbsp;</p>', '2023-12-05 22:39:54', '2023-12-05 22:39:54'),
(3, 'KLfQ2WL4sVX7CKOsLgc8SsNMDBmFJR-metacHJvbW8ucG5n-.png', 'Promo Spesial Setiap Bulannya', '<p>&nbsp;Dapatkan harga termurah dan potongan harga paket Umroh&nbsp;</p>', '2023-12-05 22:44:52', '2023-12-05 22:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `maskapais`
--

CREATE TABLE `maskapais` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maskapais`
--

INSERT INTO `maskapais` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Emirates', 'kbZejwTQNU3hUsjjZvFiDtTLDL42cv-metacG5nd2luZy5jb20gKDEpLnBuZw==-.png', '2023-11-09 20:38:59', '2023-12-05 21:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayarans`
--

CREATE TABLE `metode_pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_pembayarans`
--

INSERT INTO `metode_pembayarans` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Direct Transfer', '1', NULL, NULL),
(2, 'Virtual Account', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_02_154217_create_permission_tables', 1),
(6, '2023_11_08_084142_create_agents_table', 1),
(7, '2023_11_08_114250_create_settings_table', 1),
(8, '2023_11_08_114321_create_top_banners_table', 1),
(9, '2023_11_08_114346_create_galleries_table', 1),
(10, '2023_11_08_114412_create_kelebihans_table', 1),
(11, '2023_11_08_114434_create_diliputs_table', 1),
(12, '2023_11_08_114603_create_abouts_table', 1),
(13, '2023_11_08_114627_create_pages_table', 1),
(14, '2023_11_08_114655_create_footers_table', 1),
(15, '2023_11_08_114719_create_faqs_table', 1),
(16, '2023_11_08_114737_create_how_to_agents_table', 1),
(17, '2023_11_08_114756_create_travel_table', 1),
(18, '2023_11_08_114820_create_hotels_table', 1),
(19, '2023_11_08_114839_create_hotel_fotos_table', 1),
(20, '2023_11_08_114912_create_maskapais_table', 1),
(21, '2023_11_08_114945_create_plans_table', 1),
(22, '2023_11_08_115013_create_reviews_table', 1),
(23, '2023_11_09_075525_create_prices_table', 1),
(24, '2023_11_09_075544_create_rooms_table', 1),
(25, '2023_11_09_075739_create_orders_table', 1),
(26, '2023_11_09_080117_create_pesertas_table', 1),
(27, '2023_11_09_080428_create_payments_table', 1),
(28, '2023_11_09_080706_create_promos_table', 1),
(29, '2023_11_09_093003_add_departure_to_travel_table', 2),
(30, '2023_11_09_093749_create_travel_banners_table', 3),
(32, '2023_11_10_040741_add_seat_to_travel_table', 4),
(33, '2023_11_10_053627_add_foreign_maskapai_to_travel_table', 1),
(34, '2023_11_10_063659_add_travel_id_to_pesertas_table', 5),
(35, '2023_11_10_065417_rename_peserta_id_to_travel_id_in_pesertas_table', 6),
(36, '2023_11_10_073140_add_stars_to_hotels_table', 7),
(37, '2023_11_10_093118_add_travel_id_to_plans_table', 8),
(38, '2023_11_10_093719_create_syarats_table', 9),
(39, '2023_11_10_134555_add_catogery_to_travel_table', 10),
(40, '2023_11_12_033051_add_order_id_to_rooms_table', 11),
(42, '2023_11_12_063004_add_room_id_to_pesertas_table', 12),
(43, '2023_11_12_141720_add_dp_to_orders_table', 12),
(44, '2023_11_12_143742_add_an_to_settings_table', 13),
(45, '2023_11_12_155357_create_metode_pembayarans_table', 14),
(46, '2023_11_12_155755_add_slug_to_metode_pembayarans_table', 15),
(47, '2023_11_13_012439_add_sudah_wd_to_orders_table', 16),
(49, '2023_11_13_034622_add_midtrans_order_id_to_orders_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `travel_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `agent_id` int NOT NULL,
  `total_price` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dp` int DEFAULT NULL,
  `sudah_wd` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `travel_id`, `user_id`, `agent_id`, `total_price`, `status`, `created_at`, `updated_at`, `dp`, `sudah_wd`) VALUES
(1, 1, 2, 1, 20000000, 'Lunas', '2023-11-11 20:10:59', '2023-11-12 23:08:05', 5000000, 1),
(2, 1, 2, 1, 20000000, 'Menunggu Pembayaran', '2023-12-05 23:40:19', '2023-12-05 23:40:19', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `footer`, `header`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Kami', '<p>&nbsp;</p><p><strong>Sejarah Umroh.com<br></strong><br></p><p>Didirikan pada Desember akhir 2018 yang berawal dari situs website, yang kemudian disusul peluncuran aplikasi pada 15 Mei 2019. Umroh.com telah bekerjasama dengan Travel Umroh yang tentunya terpercaya sekaligus sudah memiliki izin dari Kementerian Agama dan Travel Umroh yang telah bergabung dengan Kami sudah tercatat telah memberangkatkan Jamaah Umroh.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:532,&quot;url&quot;:&quot;https://res.cloudinary.com/umrohcom/image/upload/v1567669404/web/Asset_17_2x.png&quot;,&quot;width&quot;:498}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://res.cloudinary.com/umrohcom/image/upload/v1567669404/web/Asset_17_2x.png\" width=\"498\" height=\"532\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:478,&quot;url&quot;:&quot;https://res.cloudinary.com/umrohcom/image/upload/v1567669415/web/paket_illustrasi_2x.png&quot;,&quot;width&quot;:522}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://res.cloudinary.com/umrohcom/image/upload/v1567669415/web/paket_illustrasi_2x.png\" width=\"522\" height=\"478\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p><strong>Berbagai Pilihan Paket Umroh<br></strong><br></p><p>Umroh.com menyediakan Paket Umroh lengkap yang terbagi atas 3 kategori, yaitu Paket Umroh Reguler, Paket Umroh plus ke Negara dan Kota Islam, serta Umroh Spesial bersama Ustadz atau Public Figure favorit. Sebagai online marketplace yang menyediakan Paket Umroh, Kami hadir bukan hanya untuk memudahkan Umat Muslim tetapi juga untuk membantu lebih mengembangkan usaha travel - travel Umroh yang ada di Indonesia.</p><p><br><br></p>', '[\"1\"]', 0, 'tentang-kami', '2023-11-09 07:17:49', '2023-11-09 07:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('inc.vr.corp@gmail.com', '$2y$12$sERA.2M5FX2oNMbgnrqEdeVSBm.QMbSX5fPLWfnfEvC9B6z7UYDCq', '2023-11-11 01:27:04'),
('superadmin@gmail.com', '$2y$12$/6zplDICam0SUOd00gmzjOhsviHfjVLd8l1Wo5HpbXwMXp0EEMzdC', '2023-11-10 12:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` int NOT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('dp','full','penarikan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direct` tinyint(1) NOT NULL,
  `merchant_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `midtrans_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `user_id`, `bank`, `total_price`, `status`, `type`, `bukti`, `direct`, `merchant_id`, `created_at`, `updated_at`, `midtrans_order_id`) VALUES
(23, 1, 2, 'Direct', 5000000, 'Lunas', 'dp', 'z2dMVIE974o6d3SYU0vibfy0djYTrW-metacG5nd2luZy5jb20gKDEpLnBuZw==-.png', 1, '', '2023-11-12 08:35:40', '2023-11-12 19:56:56', NULL),
(36, 1, 2, 'Midtrans', 15000000, 'Lunas', 'full', '', 0, '4928bddc-0b00-4529-be6d-de74eb5e89ac', '2023-11-12 22:39:14', '2023-11-12 23:01:22', 'TRA1-1699853954'),
(37, 1, 3, 'Mandiri', 20000000, 'Menunggu Konfirmasi', 'penarikan', NULL, 1, '1', '2023-11-12 23:08:05', '2023-11-12 23:08:05', NULL),
(40, 2, 2, 'Midtrans', 5000000, 'Menunggu Pembayaran', 'dp', '', 0, '7a00d000-4e90-4480-956e-b3410d7026a2', '2023-12-05 23:50:48', '2023-12-05 23:50:49', 'TRA2-1701845448');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesertas`
--

CREATE TABLE `pesertas` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date NOT NULL,
  `type` enum('Bayi','Anak','Dewasa') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `travel_id` bigint UNSIGNED DEFAULT NULL,
  `room_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesertas`
--

INSERT INTO `pesertas` (`id`, `order_id`, `title`, `name`, `phone`, `email`, `birth`, `type`, `passport`, `created_at`, `updated_at`, `travel_id`, `room_id`) VALUES
(1, NULL, 'Tn', 'Inc Vr', '082140302841', 'inc.vr.corp@gmail.com', '2023-11-12', 'Dewasa', NULL, '2023-11-11 23:37:32', '2023-11-11 23:37:32', NULL, NULL),
(2, 1, 'Tn', 'Inc Vr', '082140302841', 'inc.vr.corp@gmail.com', '2023-11-06', 'Dewasa', NULL, '2023-11-12 02:15:02', '2023-11-12 02:15:02', NULL, NULL),
(3, 1, 'Tn', 'M Syaikhu Alam', '+62881027207572', 'nelayankuofficial@gmail.com', '2023-11-03', 'Dewasa', NULL, '2023-11-12 02:15:02', '2023-11-12 02:15:02', NULL, NULL),
(4, 2, 'Tn', 'Fery Andriani', '082140302841', 'f3ry.and@gmail.com', '2023-12-01', 'Dewasa', '312122122', '2023-12-05 23:41:13', '2023-12-05 23:41:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `day` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `travel_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `day`, `title`, `created_at`, `updated_at`, `travel_id`) VALUES
(1, 1, 'Umroh Plus Turki 12 Hari Hari ke-1', '2023-11-10 02:35:49', '2023-11-10 02:35:49', 1),
(2, 2, 'Umroh Plus Turki 12 Hari Hari ke-2', '2023-11-10 02:36:04', '2023-11-10 02:36:04', 1),
(3, 3, 'Umroh Plus Turki 12 Hari Hari ke-3', '2023-11-10 02:36:11', '2023-11-10 02:36:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint UNSIGNED NOT NULL,
  `travel_id` bigint UNSIGNED DEFAULT NULL,
  `price_dewasa` int NOT NULL,
  `price_anak` int NOT NULL,
  `price_bayi` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `travel_id`, `price_dewasa`, `price_anak`, `price_bayi`, `created_at`, `updated_at`) VALUES
(1, 1, 20000000, 12000000, 10000000, '2023-11-09 23:10:46', '2023-11-09 23:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint UNSIGNED NOT NULL,
  `travel_id` bigint UNSIGNED DEFAULT NULL,
  `isAll` tinyint(1) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isPercent` tinyint(1) NOT NULL,
  `discount` int NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `max` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `agent_id` int NOT NULL,
  `value` int NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2023-11-08 05:14:58', '2023-11-08 05:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `travel_id` bigint UNSIGNED DEFAULT NULL,
  `price_id` bigint UNSIGNED DEFAULT NULL,
  `dewasa` int DEFAULT NULL,
  `anak` int DEFAULT NULL,
  `bayi` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `travel_id`, `price_id`, `dewasa`, `anak`, `bayi`, `created_at`, `updated_at`, `order_id`) VALUES
(3, NULL, NULL, 2, 0, 0, '2023-11-12 02:15:02', '2023-11-12 02:15:02', 1),
(4, NULL, NULL, 1, 0, 0, '2023-12-05 23:41:13', '2023-12-05 23:41:13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_api` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `midtrans_api` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diliput` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `an` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `server`, `whatsapp_api`, `midtrans_api`, `bank`, `no_rek`, `diliput`, `created_at`, `updated_at`, `an`) VALUES
(1, 'http://127.0.0.1:8000/', 'SB-Mid-client-fw8wq44tvH_oA3uC', 'SB-Mid-server-gpnQIqZSZQKf7ddeQV3xGl9A', 'Mandiri', '111111111111', 0, '2023-11-08 09:05:05', '2023-12-05 21:07:31', 'PT Travel Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `syarats`
--

CREATE TABLE `syarats` (
  `id` bigint UNSIGNED NOT NULL,
  `travel_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syarats`
--

INSERT INTO `syarats` (`id`, `travel_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>&nbsp;</p><h2>Syarat &amp; Ketentuan Umroh Plus Turki 12 Hari</h2><p>- Memiliki Kartu Tanda Penduduk yang masih berlaku / identitas lain yang sah</p><p>- Paspor Asli</p><p>- Buku Kuning (opsional)</p><p>- Pas Foto 4x6 (2 lembar, Background putih, 80% wajah)</p><p>- Sisa pembayaran diselesaikan maksimal 1 bulan sebelum keberangkatan</p><p>- Vaksin booster&nbsp;</p>', '2023-11-10 05:21:08', '2023-11-10 05:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `top_banners`
--

CREATE TABLE `top_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `top_banners`
--

INSERT INTO `top_banners` (`id`, `image`, `url`, `active`, `created_at`, `updated_at`) VALUES
(1, 'bsoLYqKa3hJYGGB7Z7kBjG1j5PBUre-metaOGEyODliNmEzYjgxOGI2YTczNTQ0NTNlMTlkZGJkZjcgKDEpLmpwZWc=-.jpg', '/', 1, '2023-11-09 01:12:02', '2023-12-05 22:31:35'),
(2, 'd4rL1bo092EdGa0iHCqC8OCPqfTQsW-metaYTIzNTRhOTE5YTI3MGZlN2IyNjViYzkyZDQ0ZDJjYTMgKDEpLnBuZw==-.png', '/', 1, '2023-11-09 01:12:15', '2023-12-05 22:32:31'),
(3, 'gICMYipL0q7es5ALVDL63rRYQTRpdh-metaYzI3ZGRiOGZkYTY3NTU0OGY3ZmYxMzI0ZmVkYzBhN2EgKDEpLmpwZWc=-.jpg', '/', 1, '2023-11-09 01:12:47', '2023-12-05 22:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('Reguler','Plus Wisata','Haji Furoda','Badal Haji','Ramadhan','Haji Plus','Haji Mandiri','Haji Expatriat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` int NOT NULL,
  `departure` date NOT NULL,
  `flight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maskapai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `include` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `outclude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id`, `user_id`, `title`, `category`, `seat`, `departure`, `flight`, `from`, `duration`, `maskapai`, `include`, `outclude`, `slug`, `created_at`, `updated_at`) VALUES
(1, 3, 'Umroh Plus Turki 12 Hari', 'Reguler', 39, '2024-01-31', 'Umroh + Turki', 'Jakarta', '12', '[\"1\"]', '<ul><li>&nbsp;Tiket Pesawat PP, VISA Umroh, Perlengkapan, Makan (3x sehari)&nbsp;</li></ul>', '<ul><li>&nbsp;Biaya kelebihan bagasi, Pembuatan Paspor</li></ul>', 'umroh-plus-turki-12-hari', '2023-11-09 20:48:24', '2023-12-05 22:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `travel_banners`
--

CREATE TABLE `travel_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `travel_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_banners`
--

INSERT INTO `travel_banners` (`id`, `travel_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'travel_banners/ahnhNgEAJuZFkbyKYNaX8FXMUjrGmU-metaMy5wbmc=-.png', '2023-11-09 20:59:24', '2023-12-05 21:49:01'),
(2, 1, 'travel_banners/FSYcah0unTnngNEnWArTsBzHsspQtE-metaa2VsYXMucG5n-.png', '2023-11-09 20:59:52', '2023-12-05 21:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `kode`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '2023-11-08 05:14:58', '$2y$12$dUQbAX2mLCCNIazghuaDUuZS0DZ/CoqgDantZOU84LFzNS084AL.q', 'vNG4R7', 'superAdmin', 'Jgma5ysMm0DFoVojyVnMluWZtbJ387J5S35NJjE8FwKt6NabvjaxFjjODbry', '2023-11-08 05:14:58', '2023-11-11 06:52:26'),
(2, 'Inc Vr', 'inc.vr.corp@gmail.com', NULL, '$2y$12$dUQbAX2mLCCNIazghuaDUuZS0DZ/CoqgDantZOU84LFzNS084AL.q', NULL, 'user', NULL, '2023-11-10 22:31:52', '2023-11-10 22:31:52'),
(3, 'Toyyiba Wisata', 'toyyiba@gmail.com', '2023-11-11 14:34:54', '$2y$12$MBF6jQJ0g57HC0VLzEgnUehiPelZJf0dcis4pg1kviglTvnao6rNe', NULL, 'agent', NULL, '2023-11-11 07:35:01', '2023-11-11 07:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agents_user_id_foreign` (`user_id`);

--
-- Indexes for table `diliputs`
--
ALTER TABLE `diliputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_travel_id_foreign` (`travel_id`);

--
-- Indexes for table `hotel_fotos`
--
ALTER TABLE `hotel_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_fotos_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `how_to_agents`
--
ALTER TABLE `how_to_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelebihans`
--
ALTER TABLE `kelebihans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maskapais`
--
ALTER TABLE `maskapais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_pembayarans`
--
ALTER TABLE `metode_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_travel_id_foreign` (`travel_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesertas_order_id_foreign` (`order_id`),
  ADD KEY `pesertas_peserta_id_foreign` (`travel_id`),
  ADD KEY `pesertas_room_id_foreign` (`room_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plans_travel_id_foreign` (`travel_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_travel_id_foreign` (`travel_id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promos_travel_id_foreign` (`travel_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_travel_id_foreign` (`travel_id`),
  ADD KEY `rooms_price_id_foreign` (`price_id`),
  ADD KEY `rooms_order_id_foreign` (`order_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarats`
--
ALTER TABLE `syarats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `syarats_travel_id_foreign` (`travel_id`);

--
-- Indexes for table `top_banners`
--
ALTER TABLE `top_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_user_id_foreign` (`user_id`);

--
-- Indexes for table `travel_banners`
--
ALTER TABLE `travel_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_banners_travel_id_foreign` (`travel_id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diliputs`
--
ALTER TABLE `diliputs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel_fotos`
--
ALTER TABLE `hotel_fotos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `how_to_agents`
--
ALTER TABLE `how_to_agents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelebihans`
--
ALTER TABLE `kelebihans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maskapais`
--
ALTER TABLE `maskapais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `metode_pembayarans`
--
ALTER TABLE `metode_pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `syarats`
--
ALTER TABLE `syarats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `top_banners`
--
ALTER TABLE `top_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `travel_banners`
--
ALTER TABLE `travel_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`);

--
-- Constraints for table `hotel_fotos`
--
ALTER TABLE `hotel_fotos`
  ADD CONSTRAINT `hotel_fotos_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD CONSTRAINT `pesertas_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `pesertas_peserta_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`),
  ADD CONSTRAINT `pesertas_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`);

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`);

--
-- Constraints for table `promos`
--
ALTER TABLE `promos`
  ADD CONSTRAINT `promos_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `rooms_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `prices` (`id`),
  ADD CONSTRAINT `rooms_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`);

--
-- Constraints for table `syarats`
--
ALTER TABLE `syarats`
  ADD CONSTRAINT `syarats_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`);

--
-- Constraints for table `travel`
--
ALTER TABLE `travel`
  ADD CONSTRAINT `travel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `travel_banners`
--
ALTER TABLE `travel_banners`
  ADD CONSTRAINT `travel_banners_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
