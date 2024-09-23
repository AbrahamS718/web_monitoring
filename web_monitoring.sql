-- --------------------------------------------------------
-- Host:                         10.10.0.3
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table web_monitoring.cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.cache: ~6 rows (approximately)
DELETE FROM `cache`;

-- Dumping structure for table web_monitoring.cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table web_monitoring.connect_p2v
DROP TABLE IF EXISTS `connect_p2v`;
CREATE TABLE IF NOT EXISTS `connect_p2v` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vessel` bigint NOT NULL,
  `PM` bigint NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hm_pm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hm_vessel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `bukti_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fifthwheel_001` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `fifthwheel_002` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `fifthwheel_003` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `fifthwheel_004` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `fifthwheel_001_mark` text COLLATE utf8mb4_unicode_ci,
  `fifthwheel_002_mark` text COLLATE utf8mb4_unicode_ci,
  `fifthwheel_003_mark` text COLLATE utf8mb4_unicode_ci,
  `fifthwheel_004_mark` text COLLATE utf8mb4_unicode_ci,
  `brakesystem_001` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `brakesystem_002` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `brakesystem_003` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `brakesystem_004` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `brakesystem_005` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `brakesystem_006` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `brakesystem_007` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `brakesystem_001_mark` text COLLATE utf8mb4_unicode_ci,
  `brakesystem_002_mark` text COLLATE utf8mb4_unicode_ci,
  `brakesystem_003_mark` text COLLATE utf8mb4_unicode_ci,
  `brakesystem_004_mark` text COLLATE utf8mb4_unicode_ci,
  `brakesystem_005_mark` text COLLATE utf8mb4_unicode_ci,
  `brakesystem_006_mark` text COLLATE utf8mb4_unicode_ci,
  `brakesystem_007_mark` text COLLATE utf8mb4_unicode_ci,
  `dumpingtest_001` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `dumpingtest_002` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `dumpingtest_003` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `dumpingtest_004` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `dumpingtest_005` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `dumpingtest_001_mark` text COLLATE utf8mb4_unicode_ci,
  `dumpingtest_002_mark` text COLLATE utf8mb4_unicode_ci,
  `dumpingtest_003_mark` text COLLATE utf8mb4_unicode_ci,
  `dumpingtest_004_mark` text COLLATE utf8mb4_unicode_ci,
  `dumpingtest_005_mark` text COLLATE utf8mb4_unicode_ci,
  `electricalsystem_001` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `electricalsystem_002` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `electricalsystem_003` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `electricalsystem_004` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `electricalsystem_005` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `electricalsystem_001_mark` text COLLATE utf8mb4_unicode_ci,
  `electricalsystem_002_mark` text COLLATE utf8mb4_unicode_ci,
  `electricalsystem_003_mark` text COLLATE utf8mb4_unicode_ci,
  `electricalsystem_004_mark` text COLLATE utf8mb4_unicode_ci,
  `electricalsystem_005_mark` text COLLATE utf8mb4_unicode_ci,
  `safetyeq_001` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `safetyeq_002` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `safetyeq_003` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `safetyeq_004` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `safetyeq_005` enum('good','bad','improv','repaired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `safetyeq_001_mark` text COLLATE utf8mb4_unicode_ci,
  `safetyeq_002_mark` text COLLATE utf8mb4_unicode_ci,
  `safetyeq_003_mark` text COLLATE utf8mb4_unicode_ci,
  `safetyeq_004_mark` text COLLATE utf8mb4_unicode_ci,
  `safetyeq_005_mark` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.connect_p2v: ~2 rows (approximately)
DELETE FROM `connect_p2v`;

-- Dumping structure for table web_monitoring.daily_check
DROP TABLE IF EXISTS `daily_check`;
CREATE TABLE IF NOT EXISTS `daily_check` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pv` bigint NOT NULL,
  `bays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `v1_l1` int NOT NULL DEFAULT '0',
  `v1_r1` int NOT NULL DEFAULT '0',
  `v1_l2` int NOT NULL DEFAULT '0',
  `v1_r2` int NOT NULL DEFAULT '0',
  `v1_l3` int NOT NULL DEFAULT '0',
  `v1_r3` int NOT NULL DEFAULT '0',
  `v1_l4` int NOT NULL DEFAULT '0',
  `v1_r4` int NOT NULL DEFAULT '0',
  `v2_l1` int NOT NULL DEFAULT '0',
  `v2_r1` int NOT NULL DEFAULT '0',
  `v2_l2` int NOT NULL DEFAULT '0',
  `v2_r2` int NOT NULL DEFAULT '0',
  `v2_l3` int NOT NULL DEFAULT '0',
  `v2_r3` int NOT NULL DEFAULT '0',
  `v2_l4` int NOT NULL DEFAULT '0',
  `v2_r4` int NOT NULL DEFAULT '0',
  `d_l1` int NOT NULL DEFAULT '0',
  `d_r1` int NOT NULL DEFAULT '0',
  `d_l2` int NOT NULL DEFAULT '0',
  `d_r2` int NOT NULL DEFAULT '0',
  `d_l3` int NOT NULL DEFAULT '0',
  `d_r3` int NOT NULL DEFAULT '0',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('rfu','breakdown','vessel waiting prime mover','prime mover waiting vessel','service vessel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rfu',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.daily_check: ~4 rows (approximately)
DELETE FROM `daily_check`;

-- Dumping structure for table web_monitoring.egi_pm
DROP TABLE IF EXISTS `egi_pm`;
CREATE TABLE IF NOT EXISTS `egi_pm` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.egi_pm: ~2 rows (approximately)
DELETE FROM `egi_pm`;

-- Dumping structure for table web_monitoring.egi_vessel
DROP TABLE IF EXISTS `egi_vessel`;
CREATE TABLE IF NOT EXISTS `egi_vessel` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.egi_vessel: ~2 rows (approximately)
DELETE FROM `egi_vessel`;

-- Dumping structure for table web_monitoring.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
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

-- Dumping data for table web_monitoring.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table web_monitoring.jobs
DROP TABLE IF EXISTS `jobs`;
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

-- Dumping data for table web_monitoring.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table web_monitoring.job_batches
DROP TABLE IF EXISTS `job_batches`;
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

-- Dumping data for table web_monitoring.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table web_monitoring.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_08_09_115728_add_two_factor_columns_to_users_table', 1),
	(5, '2024_08_09_120032_create_personal_access_tokens_table', 1),
	(6, '2024_08_13_161035_unit_vessel', 1),
	(7, '2024_08_13_161310_egi_pm', 1),
	(8, '2024_08_13_161455_unit_pm', 1),
	(9, '2024_08_13_161623_egi_vessel', 1),
	(10, '2024_08_14_013110_vessel', 1),
	(11, '2024_08_14_013516_pm', 1),
	(12, '2024_08_14_014018_daily_check', 1),
	(13, '2024_08_14_022642_connect_p2v', 1);

-- Dumping structure for table web_monitoring.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table web_monitoring.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table web_monitoring.pm
DROP TABLE IF EXISTS `pm`;
CREATE TABLE IF NOT EXISTS `pm` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `egi_pm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_pm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.pm: ~4 rows (approximately)
DELETE FROM `pm`;

-- Dumping structure for table web_monitoring.sessions
DROP TABLE IF EXISTS `sessions`;
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

-- Dumping data for table web_monitoring.sessions: ~1 rows (approximately)
DELETE FROM `sessions`;

-- Dumping structure for table web_monitoring.unit_pm
DROP TABLE IF EXISTS `unit_pm`;
CREATE TABLE IF NOT EXISTS `unit_pm` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.unit_pm: ~4 rows (approximately)
DELETE FROM `unit_pm`;

-- Dumping structure for table web_monitoring.unit_vessel
DROP TABLE IF EXISTS `unit_vessel`;
CREATE TABLE IF NOT EXISTS `unit_vessel` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.unit_vessel: ~4 rows (approximately)
DELETE FROM `unit_vessel`;

-- Dumping structure for table web_monitoring.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('root','admin','visitor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visitor',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.users: ~2 rows (approximately)
DELETE FROM `users`;

-- Dumping structure for table web_monitoring.vessel
DROP TABLE IF EXISTS `vessel`;
CREATE TABLE IF NOT EXISTS `vessel` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `egi_vessel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_vessel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_monitoring.vessel: ~5 rows (approximately)
DELETE FROM `vessel`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
