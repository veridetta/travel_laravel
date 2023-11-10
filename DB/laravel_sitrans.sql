-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2023 at 03:44 PM
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
-- Database: `laravel_sitrans`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `slug`, `author`, `date`, `created_at`, `updated_at`) VALUES
(1, 'SEJARAH SINGKAT', '<p>&nbsp;</p><p>Selamat Datang di Situs Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi</p><p><br><br></p><p>Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi (KDPDTT) Republik Indonesia adalah kementerian dalam Pemerintah Indonesia yang membidangi urusan pembangunan desa dan kawasan perdesaan, pemberdayaan masyarakat desa, percepatan pembangunan daerah tertinggal, dan transmigrasi. Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi berada di bawah dan bertanggung jawab kepada Presiden. Kementerian ini dipimpin oleh seorang Menteri Desa, Pembangunan Daerah Tertinggal dan Transmigrasi yang sejak 27 Oktober 2014 dijabat oleh Bapak Marwan Ja\'far. Dan kemudian pada tahun 2016 tongkat kepemimpinan beralih kepada Bapak Eko Putro Sandjojo.</p><p><br><br></p><p>Melalui Keputusan Presiden Republik Indonesia Nomor 113/P Tahun 2019 Tentang Pembentukan Kementerian Negara dan Pengangkatan Menteri Negara Kabinet Indonesia Maju Periode Tahun 2019-2024, Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi dipimpin oleh Bapak Abdul Halim Iskandar.</p><p><br><br></p><p><strong>Tiga Fase Kementerian Desa</strong></p><p><strong>Fase 1:</strong> Kementerian Negara Percepatan Pembangunan Kawasan Timur Indonesia baru dibentuk pada Kabinet Gotong Royong dalam masa pemerintahan Presiden Megawati Soekarnoputri.</p><p><strong>Fase 2 :</strong> Pada masa pemerintahan Presiden Susilo Bambang Yudhoyono, kementerian ini diganti namanya menjadi Kementerian Negara Percepatan Pembangunan Daerah Tertinggal dan kemudian menjadi Kementerian Negara Pembangunan Daerah Tertinggal.</p><p><strong>Fase 3 :</strong> Pada era pemerintahan Presiden Joko Widodo dalam Kabinet Kerja, kementerian ini kembali berganti nama menjadi Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi.</p><p>Nama Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi merupakan nomeklatur resmi dari kementerian ini. Singkatan umum yang sering dipakai adalah KDPDTT atau Kemendesa atau Kemendes PDTT.&nbsp;</p>', 'sejarah-singkat', 'Admin', '2023-10-29', '2023-10-28 11:41:45', '2023-10-28 11:41:45'),
(2, 'VISI DAN MISI', '<p>&nbsp;</p><h3>Visi</h3><p><strong>“</strong><strong><em>Terwujudnya Indonesia yang Berdaulat, Mandiri dan Berkepribadian Berlandaskan Gotong Royong”</em></strong><strong>.</strong></p><p><strong>&nbsp;</strong></p><h3>Misi</h3><p>Untuk mewujudkan Visi, maka Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi mempunyai misi yang mencakup (7) tujuh kegiatan, yaitu :</p><ol><li>Mewujudkan keamanan nasional yang mampu menjaga kedaulatan wilayah, menopang kemandirian ekonomi dengan mengamankan sumberdaya maritim, dan mencerminkan kepribadian Indonesia sebagai Negara kepulauan;</li><li>Mewujudkan masyarakat maju, berkeseimbangan, dan demokratis berlandaskan Negara hukum;</li><li>Mewujudkan politik luar negeri bebas-aktif dan memperkuat jati diri sebagai Negara maritim;</li><li>Mewujudkan kualitas hidup manusia Indonesia yang tinggi, maju dan sejahtera;</li><li>Mewujudukan bangsa yang berdaya saing;</li><li>Mewujudkan Indonesia sebagai Negara maritime yang mandiri, maju, kuat, dan berbasiskan kepentingan nasional;</li><li>Mewujudkan masyarakat yang berkepribadian dalam kebudayaan.</li></ol><p>&nbsp;</p>', 'visi-dan-misi', 'Admin', '2023-10-29', '2023-10-28 11:42:17', '2023-10-28 11:42:17'),
(3, 'TUGAS DAN FUNGSI', '<p>&nbsp;</p><p><strong>Tugas dan Fungsi Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi</strong></p><p>Tugas Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi mengacu pada Permendes No. 15 Tahun 2020 mempunyai tugas menyelenggarakan urusan pemerintahan di bidang pembangunan desa dan kawasan perdesaan, pemberdayaan masyarakat desa, percepatan pembangunan daerah tertinggal, dan transmigasi untuk membantu Presiden dalam menyelenggarakan pemerintahan negara.</p><p>Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi berdasarkan pada Permendes No. 15 Tahun 2020 menyelenggarakan fungsi :&nbsp;</p><ol><li>perumusan, penetapan, dan pelaksanaan kebijakan di bidang pembangunan desa dan perdesaan, pengembangan ekonomi dan investasi desa, daerah tertinggal, dan&nbsp; transmigrasi, pembangunan dan pengembangan kawasan transmigrasi, serta penyerasian percepatan pembangunan daerah tertinggal;</li><li>koordinasi pelaksanaan tugas, pembinaan, dan pemberian dukungan administrasi kepada seluruh unsur organisasi di lingkungan Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi;</li><li>pengelolaan barang milik/kekayaan negara yang menjadi tanggung jawabnya;</li><li>pengawasan atas pelaksanaan tugas di lingkungan Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi;</li><li>pelaksanaan bimbingan teknis dan supervisi atas pelaksanaan urusan Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi di daerah;</li><li>pelaksanaan pengembangan kebijakan dan daya saing, penyusunan keterpaduan rencana pembangunan, dan pengelolaan data dan informasi di bidang pembangunan desa dan perdesaan, daerah tertinggal, dan transmigrasi;dan</li><li>pelaksanaan pengembangan sumber daya manusia dan pemberdayaan masyarakat desa, daerah tertinggal, dan transmigrasi;&nbsp;</li></ol><p><br>&nbsp;</p>', 'tugas-dan-fungsi', 'Admin', '2023-10-29', '2023-10-28 11:42:45', '2023-10-28 11:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Info Lebaran', 'Lebaran dipastikan jatuh hari raya idul fitri.', 'info-lebaran', '2023-10-30 00:31:06', '2023-10-30 00:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `title`, `url`, `jenis`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Edge', 'edge.com', 'Public', 'M70qWfO5ynOny71EGn7IlsdBWNB4r6-metaZWRnZS5wbmc=-.png', '2023-10-30 00:32:59', '2023-10-30 00:32:59'),
(2, 'Instagram', 'instagram.com', 'Intern', 'xfYwPhIcvOV1MgHaX6O99aZW7unrT2-metaaW5zdGFncmFtLnBuZw==-.png', '2023-10-30 00:33:37', '2023-10-30 00:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `author`, `date`, `category_id`, `tags`, `created_at`, `updated_at`, `slug`, `visitor`) VALUES
(1, 'Article Title 1', '<p>This is the content of Article 1. It can contain rich text.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;5.jpg&quot;,&quot;filesize&quot;:22938,&quot;height&quot;:500,&quot;href&quot;:&quot;http://127.0.0.1:8000/storage/rSMxh4X27XDpAn8qetIQ47s5LHhql6jtH7x507j8.jpg&quot;,&quot;url&quot;:&quot;http://127.0.0.1:8000/storage/rSMxh4X27XDpAn8qetIQ47s5LHhql6jtH7x507j8.jpg&quot;,&quot;width&quot;:500}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"http://127.0.0.1:8000/storage/rSMxh4X27XDpAn8qetIQ47s5LHhql6jtH7x507j8.jpg\"><img src=\"http://127.0.0.1:8000/storage/rSMxh4X27XDpAn8qetIQ47s5LHhql6jtH7x507j8.jpg\" width=\"500\" height=\"500\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">5.jpg</span> <span class=\"attachment__size\">22.4 KB</span></figcaption></a></figure></p>', 'Author Name', '2023-10-28', 5, '[\"health\"]', '2023-10-28 11:40:50', '2023-10-29 20:28:21', 'article-title-1', 0),
(2, 'Article Title 2', '<p>This is the content of Article 2. It can contain rich text.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;11.jpg&quot;,&quot;filesize&quot;:13191,&quot;height&quot;:500,&quot;href&quot;:&quot;http://127.0.0.1:8000/storage/WDUrFAOdGGzC7jQBReXSInexeovHYgomU31Wg1P8.jpg&quot;,&quot;url&quot;:&quot;http://127.0.0.1:8000/storage/WDUrFAOdGGzC7jQBReXSInexeovHYgomU31Wg1P8.jpg&quot;,&quot;width&quot;:500}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"http://127.0.0.1:8000/storage/WDUrFAOdGGzC7jQBReXSInexeovHYgomU31Wg1P8.jpg\"><img src=\"http://127.0.0.1:8000/storage/WDUrFAOdGGzC7jQBReXSInexeovHYgomU31Wg1P8.jpg\" width=\"500\" height=\"500\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">11.jpg</span> <span class=\"attachment__size\">12.88 KB</span></figcaption></a></figure></p>', 'Author Name', '2023-10-28', 10, '[\"shoes\"]', '2023-10-28 11:40:50', '2023-10-29 20:28:43', 'article-title-2', 0),
(3, 'Article Title 3', '<p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;16.jpg&quot;,&quot;filesize&quot;:137213,&quot;height&quot;:481,&quot;href&quot;:&quot;http://127.0.0.1:8000/storage/M2KVcyRKPMS8lswPMfzFTjyqLquoDHKh597flRPU.jpg&quot;,&quot;url&quot;:&quot;http://127.0.0.1:8000/storage/M2KVcyRKPMS8lswPMfzFTjyqLquoDHKh597flRPU.jpg&quot;,&quot;width&quot;:461}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"http://127.0.0.1:8000/storage/M2KVcyRKPMS8lswPMfzFTjyqLquoDHKh597flRPU.jpg\"><img src=\"http://127.0.0.1:8000/storage/M2KVcyRKPMS8lswPMfzFTjyqLquoDHKh597flRPU.jpg\" width=\"461\" height=\"481\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">16.jpg</span> <span class=\"attachment__size\">134 KB</span></figcaption></a></figure>This is the content of Article 3. It can contain rich text.</p>', 'Author Name', '2023-10-28', 12, '[\"bunga\",\"rumah\"]', '2023-10-28 11:40:50', '2023-10-29 20:29:01', 'article-title-3', 0),
(4, 'Article Title 4', '<p>This is the content of Article 4. It can contain rich text.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;4.jpg&quot;,&quot;filesize&quot;:22875,&quot;height&quot;:500,&quot;href&quot;:&quot;http://127.0.0.1:8000/storage/x9MjKCoWYymY7Wdq0UL5HpHNbgUvbwoLo05PMfMy.jpg&quot;,&quot;url&quot;:&quot;http://127.0.0.1:8000/storage/x9MjKCoWYymY7Wdq0UL5HpHNbgUvbwoLo05PMfMy.jpg&quot;,&quot;width&quot;:500}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"http://127.0.0.1:8000/storage/x9MjKCoWYymY7Wdq0UL5HpHNbgUvbwoLo05PMfMy.jpg\"><img src=\"http://127.0.0.1:8000/storage/x9MjKCoWYymY7Wdq0UL5HpHNbgUvbwoLo05PMfMy.jpg\" width=\"500\" height=\"500\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">4.jpg</span> <span class=\"attachment__size\">22.34 KB</span></figcaption></a></figure></p><p><br></p>', 'Author Name', '2023-10-28', 15, '[\"sepatu\"]', '2023-10-28 11:40:50', '2023-10-30 01:39:59', 'article-title-4', 11),
(5, 'Article Title 5', '<p>This is the content of Article 5. It can contain rich text.</p>', 'Author Name', '2023-10-28', 15, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-5', 0),
(6, 'Article Title 6', '<p>This is the content of Article 6. It can contain rich text.</p>', 'Author Name', '2023-10-28', 1, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-6', 0),
(7, 'Article Title 7', '<p>This is the content of Article 7. It can contain rich text.</p>', 'Author Name', '2023-10-28', 3, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-7', 0),
(8, 'Article Title 8', '<p>This is the content of Article 8. It can contain rich text.</p>', 'Author Name', '2023-10-28', 13, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-8', 0),
(9, 'Article Title 9', '<p>This is the content of Article 9. It can contain rich text.</p>', 'Author Name', '2023-10-28', 8, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-9', 0),
(10, 'Article Title 10', '<p>This is the content of Article 10. It can contain rich text.</p>', 'Author Name', '2023-10-28', 11, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-10', 0),
(11, 'Article Title 11', '<p>This is the content of Article 11. It can contain rich text.</p>', 'Author Name', '2023-10-28', 12, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-11', 0),
(12, 'Article Title 12', '<p>This is the content of Article 12. It can contain rich text.</p>', 'Author Name', '2023-10-28', 2, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-12', 0),
(13, 'Article Title 13', '<p>This is the content of Article 13. It can contain rich text.</p>', 'Author Name', '2023-10-28', 5, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-13', 0),
(14, 'Article Title 14', '<p>This is the content of Article 14. It can contain rich text.</p>', 'Author Name', '2023-10-28', 2, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-14', 0),
(15, 'Article Title 15', '<p>This is the content of Article 15. It can contain rich text.</p>', 'Author Name', '2023-10-28', 10, 'Tag1, Tag2, Tag3', '2023-10-28 11:40:50', '2023-10-28 11:40:50', 'article-title-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `image`, `created_at`, `updated_at`, `url`) VALUES
(1, 'Game', 'game', 'JQVOIdGQhRzIFQUk2vNsrDG4cczQIf-metaMS5qcGc=-.jpg', '2023-10-30 00:28:26', '2023-10-30 00:28:26', NULL),
(2, 'Laptop', 'laptop', '6AojBNyep8o9y4XMRAmTq6N0yKB1SB-metabWFjLnBuZw==-.png', '2023-10-30 00:28:45', '2023-10-30 00:28:45', NULL),
(3, 'Jam', 'jam', '2vSRuhPmOB72ugLudkKxFK3b8ff12L-metac3BlYWtlci5wbmc=-.png', '2023-10-30 00:29:04', '2023-10-30 00:29:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_info` tinyint(1) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `description`, `image`, `created_at`, `updated_at`, `is_info`, `is_public`) VALUES
(1, 'Technology', 'technology', 'The latest in tech news.', 'J94luZ3II3UYtKPUVailYVVAfQkxRY-metaMS5qcGc=-.jpg', NULL, '2023-10-29 22:25:25', 1, 0),
(2, 'Travel', 'travel', 'Explore the world.', 'images/6ianVwpE2nUAb0XlWruJtJtqi7pZ2g-metaNi5qcGc=-.jpg', NULL, '2023-10-30 01:35:48', 0, 1),
(3, 'Food', 'food', 'Discover delicious recipes.', 'food.jpg', NULL, NULL, 0, 0),
(4, 'Sports', 'sports', 'Stay updated on sports events.', 'sports.jpg', NULL, NULL, 0, 0),
(5, 'Health', 'health', 'Tips for a healthy life.', 'health.jpg', NULL, NULL, 0, 0),
(6, 'Science', 'science', 'Exploring the wonders of science.', 'science.jpg', NULL, NULL, 0, 0),
(7, 'Business', 'business', 'Stay informed on business trends.', 'business.jpg', NULL, NULL, 0, 0),
(8, 'Fashion', 'fashion', 'The latest fashion trends.', 'fashion.jpg', NULL, NULL, 0, 0),
(9, 'Entertainment', 'entertainment', 'Entertainment news and updates.', 'entertainment.jpg', NULL, NULL, 0, 0),
(10, 'Art', 'art', 'Exploring the world of art.', 'art.jpg', NULL, NULL, 0, 0),
(11, 'Music', 'music', 'The world of music.', 'music.jpg', NULL, NULL, 0, 0),
(12, 'Automotive', 'automotive', 'The latest in the automotive industry.', 'automotive.jpg', NULL, NULL, 0, 0),
(13, 'Education', 'education', 'Educational news and insights.', 'education.jpg', NULL, NULL, 0, 0),
(14, 'Environment', 'environment', 'Environmental awareness and issues.', 'environment.jpg', NULL, NULL, 0, 0),
(15, 'Politics', 'politics', 'The world of politics.', 'politics.jpg', NULL, NULL, 0, 0);

--
-- Triggers `categories`
--
DELIMITER $$
CREATE TRIGGER `set_is_info_to_false` BEFORE INSERT ON `categories` FOR EACH ROW BEGIN
    IF NEW.is_info = 1 THEN
        -- Tetapkan nilai is_info menjadi 1
        SET NEW.is_info = 1;
    ELSE
        -- Tetapkan nilai is_info menjadi 0
        SET NEW.is_info = 0;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_is_info_to_false_update` BEFORE UPDATE ON `categories` FOR EACH ROW BEGIN
    -- Periksa apakah nilai is_info berubah menjadi 1
    IF NEW.is_info = 1 THEN
        -- Tetapkan nilai is_info menjadi 1
        SET NEW.is_info = 1;
    ELSE
        -- Tetapkan nilai is_info menjadi 0
        SET NEW.is_info = 0;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2023_10_28_142232_create_categories_table', 1),
(6, '2023_10_28_145807_create_abouts_table', 1),
(7, '2023_10_28_145908_create_articles_table', 1),
(8, '2023_10_28_150603_add_slug_to_articles', 1),
(9, '2023_10_28_160054_create_units_table', 1),
(10, '2023_10_28_160502_create_pokjas_table', 1),
(11, '2023_10_28_161317_create_profiles_table', 1),
(12, '2023_10_28_171713_add_column_to_profiles_table', 1),
(13, '2023_10_30_033542_add_visitor_to_articles', 2),
(14, '2023_10_30_034509_add_as_info_to_categories', 3),
(15, '2023_10_30_061244_create_banners_table', 4),
(16, '2023_10_30_062129_create_announcements_table', 5),
(17, '2023_10_30_062742_create_side_banners_table', 6),
(19, '2023_10_30_071722_create_applications_table', 7),
(20, '2023_10_30_074048_add_url_to_banners', 8),
(21, '2023_10_30_083053_add_as_public_to_categories', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pokjas`
--

CREATE TABLE `pokjas` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pokjas`
--

INSERT INTO `pokjas` (`id`, `title`, `url`, `created_at`, `updated_at`) VALUES
(1, 'MASYARAKAT SIPIL', '/', '2023-10-28 11:47:08', '2023-10-28 11:47:08'),
(2, 'SATGAS DANA DESA', '/', '2023-10-28 11:47:17', '2023-10-28 11:47:17'),
(3, 'PERTIDES', '/', '2023-10-28 11:47:25', '2023-10-28 11:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci,
  `gmaps` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `email`, `phone`, `address`, `description`, `logo`, `server`, `created_at`, `updated_at`, `facebook`, `twitter`, `instagram`, `youtube`, `gmaps`) VALUES
(1, 'SITRANS', 'sitrans@gmail.com', 'sitrans', 'Jl Merdeka No 26 Gorontalo', 'Kementerian Desa, Pembangunan Daerah Tertinggal Dan Transmigrasi Republik Indonesia', 'images/9xgsR6AOmScGclL77LYBY0Isd2OTsO-metabG9nby5wbmc=-.png', 'http://127.0.0.1:8000/', '2023-10-28 11:49:43', '2023-10-28 11:49:43', 'Sitrans', 'Sitrans', 'Sitrans', 'Sitrans', 'https://www.openstreetmap.org/export/embed.html?bbox=106.84729814529419%2C-6.258255116768685%2C106.85551643371583%2C-6.251760152866878&layer=mapnik');

-- --------------------------------------------------------

--
-- Table structure for table `side_banners`
--

CREATE TABLE `side_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `side_banners`
--

INSERT INTO `side_banners` (`id`, `title`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Info Liburan', 'in', 'images/Be1rmHcCMXDgyWcaH4FL8DO3ddyJXC-metaZXZlbnQuanBn-.jpg', '2023-10-30 00:35:56', '2023-10-30 01:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `created_at`, `updated_at`, `unit`, `url`) VALUES
(1, '2023-10-28 11:47:52', '2023-10-28 11:47:52', 'SEKRETARIAT JENDERAL', '/'),
(2, '2023-10-28 11:48:07', '2023-10-28 11:48:07', 'INSPEKTORAT JENDERAL', '/'),
(3, '2023-10-28 11:48:21', '2023-10-28 11:48:21', 'DITJEN PDP', '/'),
(4, '2023-10-28 11:48:27', '2023-10-28 11:48:27', 'DITJEN PEID', '/'),
(5, '2023-10-28 11:48:33', '2023-10-28 11:48:33', 'DITJEN PPKT', '/'),
(6, '2023-10-28 11:48:38', '2023-10-28 11:48:38', 'DITJEN PDT', '/'),
(7, '2023-10-28 11:48:42', '2023-10-28 11:48:42', 'BPI', '/'),
(8, '2023-10-28 11:48:48', '2023-10-28 11:48:48', 'BPSDM', '/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$lGuMYPE9CN9QI8BlYwdbueNgve0dH/uP2SEhQ67bfTeovbbN8.XSm', NULL, '2023-10-28 11:27:31', '2023-10-28 11:27:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pokjas`
--
ALTER TABLE `pokjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_banners`
--
ALTER TABLE `side_banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `side_banners_slug_unique` (`slug`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pokjas`
--
ALTER TABLE `pokjas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `side_banners`
--
ALTER TABLE `side_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
