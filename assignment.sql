-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2022 at 06:13 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '0127382221', 'admin@admin.com', '$2y$10$Q9Znlj0Z6TnwLYMvIlnaA.uhTTUg.qN6UzPE/55oupFAd9Y22nfJO', '2022-04-16 09:24:41', '2022-04-16 09:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED NOT NULL,
  `total_fee` decimal(5,2) NOT NULL,
  `book_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  KEY `bookings_hall_id_foreign` (`hall_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

DROP TABLE IF EXISTS `halls`;
CREATE TABLE IF NOT EXISTS `halls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `name`, `capacity`, `type`, `description`, `fee`, `created_at`, `updated_at`) VALUES
(7, 'Multipurpose Hall 2', 250, 'Multipurpose', 'A multipurpose hall that is suitable for any kind of activity', '50.00', '2022-04-16 09:25:55', '2022-04-16 09:25:55'),
(6, 'Multipurpose Hall 1', 250, 'Multipurpose', 'A multipurpose hall that is suitable for any kind of activity', '50.00', '2022-04-16 09:25:36', '2022-04-16 09:25:36'),
(8, 'Multipurpose Hall 3', 300, 'Multipurpose', 'A multipurpose hall that is suitable for any kind of activity.', '60.00', '2022-04-16 09:26:22', '2022-04-16 09:26:22'),
(9, 'Lecture Hall 1', 150, 'Lecture', 'A hall use to perform lecture session. Whiteboard and Projector will be provided', '50.00', '2022-04-16 09:28:59', '2022-04-16 09:31:34'),
(10, 'Lecture Hall 1', 200, 'Lecture', 'A hall use to perform lecture session. Whiteboard and Projector will be provided', '60.00', '2022-04-16 09:29:17', '2022-04-16 09:29:17'),
(11, 'Musical Hall 1', 100, 'Entertainment', 'The hall consist of stage that can be used for any kind of performance', '45.00', '2022-04-16 09:30:58', '2022-04-16 09:30:58'),
(12, 'Musical Hall 2', 100, 'Entertainment', 'The hall consist of stage that can be used for any kind of performance', '50.00', '2022-04-16 09:31:20', '2022-04-16 09:31:20'),
(13, 'Wedding Hall 1', 20, 'Wedding', 'Small wedding hall for wedding oscassion', '500.00', '2022-04-16 09:40:40', '2022-04-16 09:42:10'),
(14, 'Wedding Hall 2', 20, 'Wedding', 'Small wedding hall for wedding oscassion', '500.00', '2022-04-16 09:42:30', '2022-04-16 09:42:30'),
(15, 'Dining Hall 1', 50, 'Dining', 'A hall for any dining activity', '500.00', '2022-04-16 10:12:24', '2022-04-16 10:12:24'),
(16, 'Dining Hall 2', 50, 'Dining', 'A hall for any dining activity', '500.00', '2022-04-16 10:12:51', '2022-04-16 10:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_04_06_034134_create_admins_table', 1),
(5, '2022_04_06_034142_create_users_table', 1),
(6, '2022_04_06_034623_create_halls_table', 1),
(7, '2022_04_07_064851_create_bookings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'foo87', '0123333333', 'author@gmail.com', '$2y$10$mLWGe0/8ct/oKM9PBCHJ4eNIjJmO.FUR7Qnfy7wSGcwZvv5VcUyjW', '2022-04-06 06:06:46', '2022-04-06 06:06:46'),
(2, 'foo', '1111111111', 'author1@gmail.com', '$2y$10$UTFskd9OjlYD.syXyQXetO5WIm0RskYDOYbv5M/jkXtqynuJlZpem', '2022-04-07 04:40:19', '2022-04-07 04:40:19'),
(3, 'foo123', '1231231233', 'test@gmail.com', '$2y$10$OKAZNM2g7ZYLF9fKlRhaQeSt.I3KYwGx4ahiOjfMdSFowJ/SOmr.q', '2022-04-13 10:08:57', '2022-04-13 10:08:57'),
(4, 'foo', '1231231233', 'foo@gmail.com', '$2y$10$CFKBmT9/lcb2TuYV6IBsWejtstT9aIjcuIliTEkTtdYEV15.2.fCu', '2022-04-16 05:33:17', '2022-04-16 05:33:17'),
(5, 'senfai', '1111111111', 'senfai@gmail.com', '$2y$10$OwDqjs6y1fCkWNnMZnJ0AewpSxf/PgwtoRJ8fFW.nI.AEK7yB5S1i', '2022-04-16 05:53:26', '2022-04-16 05:53:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
