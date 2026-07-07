-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for imperial_capital
CREATE DATABASE IF NOT EXISTS `imperial_capital` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `imperial_capital`;

-- Dumping structure for table imperial_capital.benchmarks
CREATE TABLE IF NOT EXISTS `benchmarks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fund_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` smallint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `benchmarks_fund_id_slug_unique` (`fund_id`,`slug`),
  CONSTRAINT `benchmarks_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.benchmarks: ~5 rows (approximately)
INSERT INTO `benchmarks` (`id`, `fund_id`, `name`, `slug`, `display_order`, `created_at`, `updated_at`) VALUES
	(1, 1, 'VN-Index', 'vn_index', 1, '2026-07-05 09:56:53', '2026-07-05 09:56:53'),
	(2, 1, 'DCDS', 'dcds', 2, '2026-07-05 09:56:53', '2026-07-05 09:56:53'),
	(3, 1, 'VESAF', 'vesaf', 3, '2026-07-05 09:56:53', '2026-07-05 09:56:53'),
	(4, 2, 'BTC/USD', 'btc', 1, '2026-07-05 09:56:53', '2026-07-05 09:56:53'),
	(5, 2, 'ETH/USD', 'eth', 2, '2026-07-05 09:56:53', '2026-07-05 09:56:53');

-- Dumping structure for table imperial_capital.benchmark_performances
CREATE TABLE IF NOT EXISTS `benchmark_performances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `benchmark_id` bigint unsigned NOT NULL,
  `performance_id` bigint unsigned NOT NULL,
  `nav` decimal(15,4) DEFAULT NULL,
  `one_month` decimal(8,2) DEFAULT NULL,
  `three_month` decimal(8,2) DEFAULT NULL,
  `one_year` decimal(8,2) DEFAULT NULL,
  `three_year` decimal(8,2) DEFAULT NULL,
  `ytd` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `benchmark_performances_benchmark_id_performance_id_unique` (`benchmark_id`,`performance_id`),
  KEY `benchmark_performances_performance_id_foreign` (`performance_id`),
  CONSTRAINT `benchmark_performances_benchmark_id_foreign` FOREIGN KEY (`benchmark_id`) REFERENCES `benchmarks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `benchmark_performances_performance_id_foreign` FOREIGN KEY (`performance_id`) REFERENCES `performances` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.benchmark_performances: ~20 rows (approximately)
INSERT INTO `benchmark_performances` (`id`, `benchmark_id`, `performance_id`, `nav`, `one_month`, `three_month`, `one_year`, `three_year`, `ytd`, `created_at`, `updated_at`) VALUES
	(21, 1, 8, 1860.0100, 0.32, 11.08, 34.04, 64.66, 3.69, '2026-07-07 03:15:16', '2026-07-07 03:15:16'),
	(22, 2, 8, 100667.8500, -2.90, -0.42, 14.03, 71.16, -9.25, '2026-07-07 03:15:16', '2026-07-07 03:15:16'),
	(23, 3, 8, 33322.8900, -3.29, -6.42, 8.81, 45.07, -2.19, '2026-07-07 03:15:16', '2026-07-07 03:15:16'),
	(24, 1, 9, NULL, -0.52, NULL, NULL, NULL, NULL, '2026-07-07 03:16:30', '2026-07-07 03:16:30'),
	(25, 2, 9, NULL, -2.46, NULL, NULL, NULL, NULL, '2026-07-07 03:16:30', '2026-07-07 03:16:30'),
	(26, 3, 9, NULL, -1.70, NULL, NULL, NULL, NULL, '2026-07-07 03:16:30', '2026-07-07 03:16:30'),
	(27, 1, 10, NULL, 10.73, NULL, NULL, NULL, NULL, '2026-07-07 03:17:16', '2026-07-07 03:17:16'),
	(28, 2, 10, NULL, 2.55, NULL, NULL, NULL, NULL, '2026-07-07 03:17:16', '2026-07-07 03:17:16'),
	(29, 3, 10, NULL, -3.10, NULL, NULL, NULL, NULL, '2026-07-07 03:17:16', '2026-07-07 03:17:16'),
	(30, 1, 11, NULL, -10.95, NULL, NULL, NULL, NULL, '2026-07-07 03:17:49', '2026-07-07 03:17:49'),
	(31, 2, 11, NULL, -9.98, NULL, NULL, NULL, NULL, '2026-07-07 03:17:49', '2026-07-07 03:17:49'),
	(32, 3, 11, NULL, -5.90, NULL, NULL, NULL, NULL, '2026-07-07 03:17:49', '2026-07-07 03:17:49'),
	(33, 1, 12, NULL, 2.80, NULL, NULL, NULL, NULL, '2026-07-07 03:18:25', '2026-07-07 03:18:25'),
	(34, 2, 12, NULL, 2.21, NULL, NULL, NULL, NULL, '2026-07-07 03:18:25', '2026-07-07 03:18:25'),
	(35, 3, 12, NULL, 2.90, NULL, NULL, NULL, NULL, '2026-07-07 03:18:25', '2026-07-07 03:18:25'),
	(36, 1, 13, NULL, 2.50, NULL, NULL, NULL, NULL, '2026-07-07 03:18:53', '2026-07-07 03:18:53'),
	(37, 2, 13, NULL, 1.55, NULL, NULL, NULL, NULL, '2026-07-07 03:18:53', '2026-07-07 03:18:53'),
	(38, 3, 13, NULL, 9.66, NULL, NULL, NULL, NULL, '2026-07-07 03:18:53', '2026-07-07 03:18:53'),
	(39, 4, 14, 58558.8600, -20.48, -14.18, -45.34, 92.14, -33.16, '2026-07-07 04:38:32', '2026-07-07 04:38:32'),
	(40, 5, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-07 04:38:32', '2026-07-07 04:38:32'),
	(41, 4, 15, NULL, -3.41, NULL, NULL, NULL, NULL, '2026-07-07 04:38:59', '2026-07-07 04:38:59'),
	(42, 5, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-07 04:38:59', '2026-07-07 04:38:59'),
	(43, 4, 16, NULL, 11.87, NULL, NULL, NULL, NULL, '2026-07-07 04:39:38', '2026-07-07 04:39:38'),
	(44, 5, 16, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-07 04:39:38', '2026-07-07 04:39:38'),
	(45, 4, 17, NULL, 1.81, NULL, NULL, NULL, NULL, '2026-07-07 04:39:55', '2026-07-07 04:39:55'),
	(46, 5, 17, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-07 04:39:55', '2026-07-07 04:39:55'),
	(47, 4, 18, NULL, -14.94, NULL, NULL, NULL, NULL, '2026-07-07 04:40:14', '2026-07-07 04:40:14'),
	(48, 5, 18, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-07 04:40:14', '2026-07-07 04:40:14'),
	(49, 4, 19, NULL, -10.17, NULL, NULL, NULL, NULL, '2026-07-07 04:40:34', '2026-07-07 04:40:34'),
	(50, 5, 19, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-07 04:40:34', '2026-07-07 04:40:34');

-- Dumping structure for table imperial_capital.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.cache: ~0 rows (approximately)

-- Dumping structure for table imperial_capital.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.cache_locks: ~0 rows (approximately)

-- Dumping structure for table imperial_capital.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fund_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('monthly','factsheet','prospectus','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_fund_id_foreign` (`fund_id`),
  CONSTRAINT `documents_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.documents: ~5 rows (approximately)
INSERT INTO `documents` (`id`, `fund_id`, `title`, `category`, `file`, `publish_date`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Báo cáo tháng 1/2026', 'monthly', 'documents/ZXsA2Fa6PWrQi247YDThunCOQAhyWgtSosd8R9qh.pdf', '2026-04-22', '2026-07-05 11:05:04', '2026-07-05 11:05:48'),
	(2, 1, 'Báo cáo tháng 2/2026', 'monthly', 'documents/6yDKDGM0D9QsSWm6L2mMSd3Wi8i5XzON9KhIacdh.pdf', '2026-04-22', '2026-07-05 11:05:38', '2026-07-05 11:05:38'),
	(3, 1, 'Báo cáo tháng 3/2026', 'monthly', 'documents/uI6DSGUUx1Bf0VLBAIA09E2e9E7CftK4DT6HT0Ql.pdf', '2026-04-22', '2026-07-05 11:06:10', '2026-07-05 11:06:10'),
	(4, 1, 'Báo cáo tháng 4/2026', 'monthly', 'documents/5zqMKI4KFllchusjPXXQYqDvOOsYW2jKDWMEqYwZ.pdf', '2026-05-02', '2026-07-05 11:06:36', '2026-07-05 11:06:36'),
	(5, 1, 'Báo cáo tháng 5/2026', 'monthly', 'documents/jESRUgXRwT1YJNOR0WXo7dgQU6G7QYEV4IwegYDh.pdf', '2026-06-03', '2026-07-05 11:06:57', '2026-07-05 11:06:57'),
	(6, 1, 'Báo cáo tháng 6/2026', 'monthly', 'documents/R2N15V8mjbI5L7iL2gPTrqjnJryoxWNglgDbbvpd.pdf', '2026-07-07', '2026-07-07 03:25:37', '2026-07-07 03:25:37'),
	(7, 2, 'Báo cáo tháng 4/2026', 'monthly', 'documents/Th4Wn0dqosyHrZyJkhEfprwBwsqtFGe1ysuEFBpb.pdf', '2026-05-19', '2026-07-07 05:02:05', '2026-07-07 05:06:27'),
	(8, 2, 'Báo cáo tháng 5/2026', 'monthly', 'documents/JstNZpcRL1jKnsSWq0n9iu6IQSOwGFob39uoTOrn.pdf', '2026-06-03', '2026-07-07 05:02:29', '2026-07-07 05:06:15'),
	(9, 2, 'Báo cáo tháng 6/2026', 'monthly', 'documents/I392MJ1nLZHxcytubAiTQVP5TiKF0VhhAVpyTyyM.pdf', '2026-07-07', '2026-07-07 05:05:59', '2026-07-07 05:05:59');

-- Dumping structure for table imperial_capital.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table imperial_capital.funds
CREATE TABLE IF NOT EXISTS `funds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inception_date` date DEFAULT NULL,
  `nav` decimal(15,2) DEFAULT NULL,
  `ytd_return` decimal(8,2) DEFAULT NULL,
  `five_year_return` decimal(8,2) DEFAULT NULL,
  `fund_objective` text COLLATE utf8mb4_unicode_ci,
  `investment_strategy` text COLLATE utf8mb4_unicode_ci,
  `asset_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fund_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strategy` text COLLATE utf8mb4_unicode_ci,
  `suggested_investment_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `funds_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.funds: ~2 rows (approximately)
INSERT INTO `funds` (`id`, `name`, `short_name`, `slug`, `inception_date`, `nav`, `ytd_return`, `five_year_return`, `fund_objective`, `investment_strategy`, `asset_class`, `fund_type`, `strategy`, `suggested_investment_time`, `subscription_fee`, `management_fee`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Imperial Capital', 'IMC', 'imperial-capital', '2026-01-01', 30474.84, -6.19, NULL, 'Imperial Capital hướng đến việc tạo ra lợi nhuận vượt trội bằng cách tập trung vào các doanh nghiệp vốn hóa nhỏ bị thị trường định giá sai. Quỹ ưu tiên những cơ hội có biên an toàn lớn, xuất phát từ sự thiếu thanh khoản hoặc bị bỏ quên, qua đó giảm thiểu rủi ro và tối ưu hóa hiệu quả đầu tư.', 'Chiến lược của Imperial Capital là lựa chọn các doanh nghiệp có khả năng tái cấu trúc hoặc cải thiện hoạt động, đồng thời sở hữu catalyst rõ ràng giúp thu hẹp khoảng cách giữa giá thị trường và giá trị nội tại. Thời gian hiện thực hóa giá trị được kỳ vọng trong khoảng 6-18 tháng.', 'Cổ phiếu', 'Quỹ cổ phiếu', 'Đầu tư giá trị', '3-5 năm', 'Miễn phí', '1%/NAV/năm & 25% của hurdle rate 6%', 1, '2026-07-05 09:56:53', '2026-07-05 10:48:36'),
	(2, 'Venture Imperial Capital', 'VIMC', 'venture-imperial-capital', '2026-01-01', 25739.79, -29.69, NULL, 'Imperial Capital hướng đến việc tạo ra lợi nhuận vượt trội bằng cách tập trung vào các doanh nghiệp vốn hóa nhỏ bị thị trường định giá sai. Quỹ ưu tiên những cơ hội có biên an toàn lớn, xuất phát từ sự thiếu thanh khoản hoặc bị bỏ quên, qua đó giảm thiểu rủi ro và tối ưu hóa hiệu quả đầu tư.', 'Chiến lược của Imperial Capital là lựa chọn các doanh nghiệp có khả năng tái cấu trúc hoặc cải thiện hoạt động, đồng thời sở hữu catalyst rõ ràng giúp thu hẹp khoảng cách giữa giá thị trường và giá trị nội tại. Thời gian hiện thực hóa giá trị được kỳ vọng trong khoảng 6-18 tháng.', 'Crypto', 'Quỹ Crypto', 'Đầu tư giá trị', '3-5 năm', 'Miễn phí', '1%/NAV/năm & 25% của hurdle rate 6%', 1, '2026-07-05 09:56:53', '2026-07-07 04:52:50');

-- Dumping structure for table imperial_capital.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.jobs: ~0 rows (approximately)

-- Dumping structure for table imperial_capital.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.job_batches: ~0 rows (approximately)

-- Dumping structure for table imperial_capital.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_07_02_143557_create_funds_table', 1),
	(5, '2026_07_04_080000_create_performances_table', 1),
	(6, '2026_07_04_080001_create_portfolios_table', 1),
	(7, '2026_07_04_080002_create_documents_table', 1),
	(8, '2026_07_05_030000_add_benchmarks_to_performances_table', 1),
	(9, '2026_07_05_040000_create_benchmarks_table', 1),
	(10, '2026_07_05_040001_create_benchmark_performances_table', 1);

-- Dumping structure for table imperial_capital.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table imperial_capital.performances
CREATE TABLE IF NOT EXISTS `performances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fund_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `nav` decimal(15,2) DEFAULT NULL,
  `one_month` decimal(8,2) DEFAULT NULL,
  `three_month` decimal(8,2) DEFAULT NULL,
  `one_year` decimal(8,2) DEFAULT NULL,
  `three_year` decimal(8,2) DEFAULT NULL,
  `ytd` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `performances_fund_id_foreign` (`fund_id`),
  CONSTRAINT `performances_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.performances: ~7 rows (approximately)
INSERT INTO `performances` (`id`, `fund_id`, `date`, `nav`, `one_month`, `three_month`, `one_year`, `three_year`, `ytd`, `created_at`, `updated_at`) VALUES
	(8, 1, '2026-06-30', 30474.84, -5.51, NULL, NULL, NULL, -6.19, '2026-07-07 03:15:16', '2026-07-07 03:15:16'),
	(9, 1, '2026-05-31', NULL, -5.99, NULL, NULL, NULL, NULL, '2026-07-07 03:16:30', '2026-07-07 03:16:30'),
	(10, 1, '2026-04-30', NULL, 3.02, NULL, NULL, NULL, NULL, '2026-07-07 03:17:16', '2026-07-07 03:17:16'),
	(11, 1, '2026-03-31', NULL, 2.58, NULL, NULL, NULL, NULL, '2026-07-07 03:17:49', '2026-07-07 03:17:49'),
	(12, 1, '2026-02-28', NULL, 5.34, NULL, NULL, NULL, NULL, '2026-07-07 03:18:25', '2026-07-07 03:18:25'),
	(13, 1, '2026-01-31', NULL, -5.13, NULL, NULL, NULL, NULL, '2026-07-07 03:18:53', '2026-07-07 03:18:53'),
	(14, 2, '2026-06-30', 25739793.00, -11.13, NULL, NULL, NULL, -26.69, '2026-07-07 04:38:32', '2026-07-07 04:38:32'),
	(15, 2, '2026-05-31', NULL, -20.88, NULL, NULL, NULL, NULL, '2026-07-07 04:38:59', '2026-07-07 04:38:59'),
	(16, 2, '2026-04-30', NULL, 0.00, NULL, NULL, NULL, NULL, '2026-07-07 04:39:38', '2026-07-07 04:41:27'),
	(17, 2, '2026-03-31', NULL, 0.00, NULL, NULL, NULL, NULL, '2026-07-07 04:39:55', '2026-07-07 04:51:48'),
	(18, 2, '2026-02-28', NULL, 0.00, NULL, NULL, NULL, NULL, '2026-07-07 04:40:14', '2026-07-07 04:51:55'),
	(19, 2, '2026-01-31', NULL, 0.00, NULL, NULL, NULL, NULL, '2026-07-07 04:40:34', '2026-07-07 04:51:59');

-- Dumping structure for table imperial_capital.portfolios
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fund_id` bigint unsigned NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `asset_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolios_fund_id_foreign` (`fund_id`),
  CONSTRAINT `portfolios_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.portfolios: ~31 rows (approximately)
INSERT INTO `portfolios` (`id`, `fund_id`, `company_name`, `ticker`, `sector`, `weight`, `asset_type`, `created_at`, `updated_at`) VALUES
	(9, 1, 'CTCP Dược liệu Việt Nam', 'DVM', 'Y tế', 36.59, 'Cổ phiếu', '2026-07-05 10:51:24', '2026-07-05 10:55:39'),
	(10, 1, 'CTCP Đầu tư BKG Việt Nam', 'BKG', 'Hàng cá nhân & Gia dụng', 30.70, 'Cổ phiếu', '2026-07-05 10:53:22', '2026-07-05 10:55:44'),
	(11, 1, 'CTCP Đầu tư Thương mại Bất động sản An Dương Thảo Điền', 'HAR', 'Bất động sản', 10.22, 'Cổ phiếu', '2026-07-05 10:54:07', '2026-07-05 10:55:47'),
	(12, 1, '', 'AAT', 'Hàng cá nhân & Gia dụng', 2.62, 'Cổ phiếu', '2026-07-05 10:56:29', '2026-07-05 10:56:29'),
	(13, 1, '', 'ABS', 'Hóa chất', 1.58, 'Cổ phiếu', '2026-07-05 10:56:57', '2026-07-05 10:56:57'),
	(14, 1, '', 'BID', 'Ngân hàng', 0.42, 'Cổ phiếu', '2026-07-05 10:57:17', '2026-07-05 10:57:17'),
	(15, 1, '', 'CRC', 'Xây dựng & Vật liệu', 0.22, 'Cổ phiếu', '2026-07-05 10:57:42', '2026-07-05 10:57:42'),
	(16, 1, '', 'CTG', 'Ngân hàng', 0.33, 'Cổ phiếu', '2026-07-05 10:58:06', '2026-07-05 10:58:06'),
	(17, 1, '', 'DDG', 'Điện, nước & Xăng dầu khí đốt', 1.23, 'Cổ phiếu', '2026-07-05 10:58:30', '2026-07-05 10:58:30'),
	(18, 1, '', 'DHP', 'Hàng & Dịch vụ công nghiệp', 0.30, 'Cổ phiếu', '2026-07-05 10:58:50', '2026-07-05 10:58:50'),
	(19, 1, '', 'DTA', 'Bất động sản', 0.26, 'Cổ phiếu', '2026-07-05 10:59:17', '2026-07-05 10:59:17'),
	(20, 1, '', 'E1VFVN30', 'Dịch vụ tài chính', 0.35, 'Cổ phiếu', '2026-07-05 10:59:40', '2026-07-05 10:59:40'),
	(21, 1, '', 'FIT', 'Y tế', 2.71, 'Cổ phiếu', '2026-07-05 11:00:04', '2026-07-05 11:00:04'),
	(22, 1, '', 'FUCVREIT', 'Dịch vụ tài chính', 2.15, 'Cổ phiếu', '2026-07-05 11:00:24', '2026-07-05 11:00:24'),
	(24, 1, '', 'FUESSVFL', 'Dịch vụ tài chính', 0.39, 'Cổ phiếu', '2026-07-05 11:00:42', '2026-07-05 11:00:42'),
	(25, 1, '', 'HHP', 'Tài nguyên cơ bản', 0.48, 'Cổ phiếu', '2026-07-05 11:01:27', '2026-07-05 11:01:27'),
	(26, 1, '', 'HTP', 'Truyền thông', 1.62, 'Cổ phiếu', '2026-07-05 11:01:49', '2026-07-05 11:01:49'),
	(27, 1, '', 'HWS', 'Điện, nước & Xăng dầu khí đốt', 0.50, 'Cổ phiếu', '2026-07-05 11:02:17', '2026-07-05 11:02:17'),
	(28, 1, '', 'KMR', 'Hàng cá nhân & Gia dụng', 2.81, 'Cổ phiếu', '2026-07-05 11:02:30', '2026-07-05 11:02:30'),
	(29, 1, '', 'MBB', 'Ngân hàng', 0.33, 'Cổ phiếu', '2026-07-05 11:02:46', '2026-07-05 11:02:46'),
	(30, 1, '', 'SHA', 'Tài nguyên cơ bản', 0.91, 'Cổ phiếu', '2026-07-05 11:03:18', '2026-07-05 11:03:18'),
	(31, 1, '', 'TCB', 'Ngân hàng', 0.33, 'Cổ phiếu', '2026-07-05 11:03:37', '2026-07-05 11:03:37'),
	(32, 1, '', 'TSC', 'Hóa chất', 2.54, 'Cổ phiếu', '2026-07-05 11:03:53', '2026-07-05 11:03:53'),
	(33, 1, '', 'VCB', 'Ngân hàng', 0.41, 'Cổ phiếu', '2026-07-05 11:04:15', '2026-07-05 11:04:15'),
	(34, 2, '', 'AXL', 'AXL', 11.27, 'L1/L2', '2026-07-07 04:44:25', '2026-07-07 04:44:55'),
	(35, 2, 'Gains Network', 'GNS', 'GNS', 50.65, 'Seed', '2026-07-07 04:45:22', '2026-07-07 04:45:22'),
	(36, 2, '', 'METIS', 'METIS', 13.12, 'L1/L2', '2026-07-07 04:45:59', '2026-07-07 04:50:31'),
	(37, 2, '', 'MOVR', 'MOVR', 9.07, 'L1/L2', '2026-07-07 04:46:25', '2026-07-07 04:46:25'),
	(38, 2, '', 'SKL', 'SKL', 8.47, 'L1/L2', '2026-07-07 04:46:54', '2026-07-07 04:46:54'),
	(39, 2, '', 'SXT', 'SXT', 6.68, 'L1/L2', '2026-07-07 04:47:30', '2026-07-07 04:47:30'),
	(40, 2, '', 'Others', 'Others', 0.74, 'Others', '2026-07-07 04:48:15', '2026-07-07 04:48:15');

-- Dumping structure for table imperial_capital.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('kZZ1PrbKqqDvV7pkg7O2DdRGUnLXyWwkyqs2eCeJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRU1WSnFTelY4Nmx3ZXBaamdNMUtaWDVUU28waW12SWhmZVpjZHd4ZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1783426132);

-- Dumping structure for table imperial_capital.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imperial_capital.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', '2026-07-05 09:56:53', '$2y$12$cJApR/6RAtlP1q.uJeRSUua3rtpsS8Ntwd1WniY6sj9dTewC/3wiO', 'kA2Qc2YffEJPXX1u9XT7uv9uPqOiIKFvRF5T8DccDTtiilq3NCLXn8uzi0G2', '2026-07-05 09:56:53', '2026-07-05 09:56:53');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
