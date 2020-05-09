-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for microhousing
CREATE DATABASE IF NOT EXISTS `microhousing` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `microhousing`;

-- Dumping structure for table microhousing.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKUser Amin` (`user_id`),
  CONSTRAINT `FKUser Amin` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.admins: ~3 rows (approximately)
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL),
	(2, 11, '2020-05-09 02:38:12', '2020-05-09 02:38:12'),
	(3, 12, '2020-05-09 02:51:27', '2020-05-09 02:51:27');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table microhousing.allocations
CREATE TABLE IF NOT EXISTS `allocations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fromDate` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.allocations: ~1 rows (approximately)
DELETE FROM `allocations`;
/*!40000 ALTER TABLE `allocations` DISABLE KEYS */;
INSERT INTO `allocations` (`id`, `application_id`, `unit_id`, `created_at`, `updated_at`, `fromDate`, `duration`, `endDate`) VALUES
	(5, 5, 5, '2020-05-02 17:05:49', '2020-05-02 17:05:49', '2020-05-02', 121, '2020-08-31'),
	(6, 7, 6, '2020-05-09 02:55:55', '2020-05-09 02:55:55', '2020-05-09', 22, '2020-05-31');
/*!40000 ALTER TABLE `allocations` ENABLE KEYS */;

-- Dumping structure for table microhousing.applicants
CREATE TABLE IF NOT EXISTS `applicants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthlyIncome` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKUser Applicant` (`user_id`),
  CONSTRAINT `FKUser Applicant` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.applicants: ~1 rows (approximately)
DELETE FROM `applicants`;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` (`id`, `user_id`, `email`, `monthlyIncome`, `created_at`, `updated_at`) VALUES
	(1, 2, 'o9jDey0Egm@gmail.com', 1000.00, '2020-04-20 14:03:34', '2020-04-20 14:03:35'),
	(5, 9, 'sidi.meisanjaya2013@gmail.com', 2000.00, '2020-05-02 16:55:24', '2020-05-02 16:55:24');
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;

-- Dumping structure for table microhousing.applications
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `applicationDate` date NOT NULL,
  `requiredMonth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requiredYear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.applications: ~3 rows (approximately)
DELETE FROM `applications`;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` (`id`, `applicant_id`, `residence_id`, `applicationDate`, `requiredMonth`, `requiredYear`, `Status`, `created_at`, `updated_at`) VALUES
	(5, 5, 1, '2020-05-02', 'Mei', '2020', 'Approved', '2020-05-02 16:55:33', '2020-05-02 17:05:49'),
	(6, 1, 7, '2020-05-09', 'May', '2020', 'Decline', '2020-05-09 02:41:36', '2020-05-09 02:56:46'),
	(7, 1, 8, '2020-05-09', 'May', '2020', 'Approved', '2020-05-09 02:54:22', '2020-05-09 02:55:55');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;

-- Dumping structure for table microhousing.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table microhousing.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.migrations: ~9 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 2),
	(5, '2020_03_30_040356_create_applicant_table', 2),
	(6, '2020_03_30_041937_create_residence_table', 2),
	(7, '2020_03_30_044300_create_applications_table', 2),
	(8, '2020_03_30_044553_create_units_table', 2),
	(9, '2020_03_30_044728_create_allocations_table', 2),
	(10, '2020_03_28_111741_create_admin_table', 3),
	(12, '2014_10_12_000000_create_users_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table microhousing.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table microhousing.residences
CREATE TABLE IF NOT EXISTS `residences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numUnits` int(11) NOT NULL,
  `sizePerUnit` int(11) NOT NULL DEFAULT '0',
  `monthlyRental` double NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'house.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.residences: ~8 rows (approximately)
DELETE FROM `residences`;
/*!40000 ALTER TABLE `residences` DISABLE KEYS */;
INSERT INTO `residences` (`id`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`, `img`, `created_at`, `updated_at`) VALUES
	(1, 'This Address with number 1', 17, 4, 150, 'house.jpg', '2020-04-06 12:02:47', '2020-04-21 11:59:11'),
	(2, 'This address', 15, 4, 150, 'house.jpg', '2020-04-06 12:08:25', '2020-04-06 12:08:25'),
	(3, 'This address', 15, 4, 150, 'house.jpg', '2020-04-06 12:08:44', '2020-04-06 12:08:44'),
	(4, 'Nagasari Street No. 89b', 15, 2, 50, 'house.jpg', '2020-04-08 06:26:55', '2020-04-08 06:27:33'),
	(5, 'Address', 17, 4, 150, 'house.jpg', '2020-05-05 06:29:57', '2020-05-05 06:29:57'),
	(6, 'Address', 17, 4, 150, '1588660378.jpg', '2020-05-05 06:32:58', '2020-05-05 06:32:58'),
	(7, 'JL. Turi', 5, 10, 1200, 'house.jpg', '2020-05-09 02:39:32', '2020-05-09 02:53:03'),
	(8, 'Nagasari Street No. 89b', 10, 4, 1200, '1588992744.jpg', '2020-05-09 02:52:24', '2020-05-09 02:52:24');
/*!40000 ALTER TABLE `residences` ENABLE KEYS */;

-- Dumping structure for table microhousing.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `residence_id` int(11) NOT NULL,
  `unitNo` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.units: ~1 rows (approximately)
DELETE FROM `units`;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` (`id`, `residence_id`, `unitNo`, `availability`, `created_at`, `updated_at`) VALUES
	(5, 1, 1, 3, '2020-05-02 17:05:49', '2020-05-02 17:05:49'),
	(6, 8, 1, 3, '2020-05-09 02:55:55', '2020-05-09 02:55:55');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;

-- Dumping structure for table microhousing.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microhousing.users: ~5 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'AdminMHS', '$2y$10$iRCVwjbsX2Bzxynblim8i.Dr3hS3VN6IcmKzP9Hs5Xm2g2fUw2abq', 1, NULL, '2020-04-06 03:27:30', '2020-04-06 03:27:30'),
	(2, 'User', 'UserMHS', '$2y$10$wAz5Z5j/GW16zm5kboDDd.29KCyfRoQJkPaDXvUX5I45WKf9yOsxC', 0, NULL, '2020-04-06 03:27:30', '2020-04-06 03:27:30'),
	(9, 'Sidi Meisanjaya', 'SidiSan', '$2y$10$zySDgQS/kSjAnsGKJvvnnel7a5izL52Fulct51L8ZPuFOmzMTzgna', 0, NULL, '2020-05-02 16:55:24', '2020-05-02 16:55:24'),
	(11, 'Sidi Meisanjaya', 'Sidimei', '$2y$10$SBI1/OrWSYUiM5Xf2Tm4ceNDcP.o5XdKjvZI2Dzvu2lIg0MdJTkdS', 1, NULL, '2020-05-09 02:38:12', '2020-05-09 02:38:12'),
	(12, 'Staff 1', 'Staff1', '$2y$10$Q7Enphysk.s/Ev1rXDgxc.o3/PwaxjQhrKHO5SauqKtfehPS9s/n.', 1, NULL, '2020-05-09 02:51:27', '2020-05-09 02:51:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
