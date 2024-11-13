-- --------------------------------------------------------
-- Host:                         127.0.0.1
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

-- Dumping structure for table lapkin.bidangs
CREATE TABLE IF NOT EXISTS `bidangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.bidangs: ~6 rows (approximately)
DELETE FROM `bidangs`;
INSERT INTO `bidangs` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Bidang Destinasi', '2024-11-13 13:08:36', '2024-11-13 13:08:36'),
	(2, 'Bidang Pemasaran', '2024-11-13 13:08:46', '2024-11-13 13:08:46'),
	(3, 'Bidang Ekonomi Kreatif', '2024-11-13 13:08:59', '2024-11-13 13:08:59'),
	(4, 'Bidang Sumber Daya Pariwisata', '2024-11-13 13:09:09', '2024-11-13 13:09:09'),
	(5, 'Subag Perencanaan dan Keuangan, Aset dan Evaluasi', '2024-11-13 13:09:39', '2024-11-13 13:10:05'),
	(6, 'Subag Umum dan Kepegawaian', '2024-11-13 13:09:54', '2024-11-13 13:09:54');

-- Dumping structure for table lapkin.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.cache: ~2 rows (approximately)
DELETE FROM `cache`;
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1731502895),
	('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1731502895;', 1731502895);

-- Dumping structure for table lapkin.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table lapkin.detail_pegawais
CREATE TABLE IF NOT EXISTS `detail_pegawais` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat_id` bigint unsigned NOT NULL,
  `jabatan_id` bigint unsigned NOT NULL,
  `eselon_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.detail_pegawais: ~0 rows (approximately)
DELETE FROM `detail_pegawais`;

-- Dumping structure for table lapkin.eselons
CREATE TABLE IF NOT EXISTS `eselons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.eselons: ~5 rows (approximately)
DELETE FROM `eselons`;
INSERT INTO `eselons` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'IV a', '2024-11-13 13:10:38', '2024-11-13 13:10:38'),
	(2, 'III b', '2024-11-13 13:10:48', '2024-11-13 13:10:48'),
	(3, 'III a', '2024-11-13 13:10:52', '2024-11-13 13:10:52'),
	(4, 'II b', '2024-11-13 13:11:13', '2024-11-13 13:11:13'),
	(5, '-', '2024-11-13 14:16:04', '2024-11-13 14:16:04');

-- Dumping structure for table lapkin.failed_jobs
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

-- Dumping data for table lapkin.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table lapkin.jabatans
CREATE TABLE IF NOT EXISTS `jabatans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.jabatans: ~6 rows (approximately)
DELETE FROM `jabatans`;
INSERT INTO `jabatans` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Staf', '2024-11-13 13:11:25', '2024-11-13 13:11:25'),
	(2, 'Sekretaris', '2024-11-13 13:11:48', '2024-11-13 13:11:48'),
	(3, 'Kepala Bidang Destinasi', '2024-11-13 13:11:59', '2024-11-13 13:11:59'),
	(4, 'Kepala Bidang Pemasaran', '2024-11-13 13:12:06', '2024-11-13 13:12:06'),
	(5, 'Kepala Bidang Ekonomi Kreatif', '2024-11-13 13:12:16', '2024-11-13 13:12:16'),
	(6, 'Kepala Bidang Sumber Daya Pariwisata', '2024-11-13 13:12:41', '2024-11-13 13:12:41');

-- Dumping structure for table lapkin.jobs
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

-- Dumping data for table lapkin.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table lapkin.job_batches
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

-- Dumping data for table lapkin.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table lapkin.laporan_kinerjas
CREATE TABLE IF NOT EXISTS `laporan_kinerjas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `tanggal` datetime NOT NULL,
  `jam_kerja` time NOT NULL,
  `uraian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` double NOT NULL,
  `realisasi` double NOT NULL,
  `capaian` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.laporan_kinerjas: ~1 rows (approximately)
DELETE FROM `laporan_kinerjas`;

-- Dumping structure for table lapkin.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.migrations: ~10 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_11_13_125148_create_jabatans_table', 2),
	(5, '2024_11_13_125149_create_pangkats_table', 2),
	(6, '2024_11_13_125150_create_eselons_table', 2),
	(7, '2024_11_13_125151_create_detail_pegawais_table', 2),
	(8, '2024_11_13_125152_create_laporan_kinerjas_table', 2),
	(9, '2024_11_13_210726_create_bidangs_table', 3),
	(10, '2024_11_13_210727_create_seksis_table', 3);

-- Dumping structure for table lapkin.pangkats
CREATE TABLE IF NOT EXISTS `pangkats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.pangkats: ~10 rows (approximately)
DELETE FROM `pangkats`;
INSERT INTO `pangkats` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Pengatur Muda, II/a', '2024-11-13 13:14:04', '2024-11-13 13:14:04'),
	(2, 'Pengatur Muda Tk. I, II/b', '2024-11-13 13:14:30', '2024-11-13 13:14:30'),
	(3, 'Pengatur, II/c', '2024-11-13 13:14:47', '2024-11-13 13:14:47'),
	(4, 'Pengatur Tk. I, II/d', '2024-11-13 13:15:11', '2024-11-13 13:15:11'),
	(5, 'Penata Muda, III/a', '2024-11-13 13:15:28', '2024-11-13 13:15:28'),
	(6, 'Penata Muda Tk. I, III/b', '2024-11-13 13:15:50', '2024-11-13 13:15:50'),
	(7, 'Penata, III/c', '2024-11-13 13:16:03', '2024-11-13 13:16:03'),
	(8, 'Penata Tk. I, III/d', '2024-11-13 13:16:22', '2024-11-13 13:16:22'),
	(9, 'Pembina, IV/a', '2024-11-13 13:16:38', '2024-11-13 13:16:38'),
	(10, 'Pembina Tk. I, IV/b', '2024-11-13 13:16:56', '2024-11-13 13:16:56');

-- Dumping structure for table lapkin.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table lapkin.seksis
CREATE TABLE IF NOT EXISTS `seksis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.seksis: ~1 rows (approximately)
DELETE FROM `seksis`;
INSERT INTO `seksis` (`id`, `name`, `bidang_id`, `created_at`, `updated_at`) VALUES
	(1, 'Seksi Daerah Objek Wisata', 1, '2024-11-13 13:17:47', '2024-11-13 13:17:47');

-- Dumping structure for table lapkin.sessions
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

-- Dumping data for table lapkin.sessions: ~1 rows (approximately)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('KOT7Qp54m5kUgOCtSwYP1SwD2Wvkl5iiXxZxy3yD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQjVEb2hrb0xkME5oZnZWOU5SeVkySEJFbTQ5aVVXQVZJbTZpdjZKWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sYXBvcmFuLWtpbmVyamFzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRTVHhWVkk3Uk1HSGJpYk40eUhucU4uUWpIVVhtZ3llTTNURnZaczVDODhhWW55Ni4wbkIxLiI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1731507864);

-- Dumping structure for table lapkin.users
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lapkin.users: ~2 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', NULL, '$2y$12$STxVVI7RMGHbibN4yHnqN.QjHUXmgyeM3TFvZs5C88aYny6.0nB1.', NULL, '2024-11-13 04:57:28', '2024-11-13 04:57:28'),
	(2, 'Muslimin, ST', 'muslimin@admin.com', NULL, '$2y$12$viBz6CnvAkGQ1orvlCiF0edQ5O1RhTQuC/aoYr4IXLG97D1nOg5mW', NULL, '2024-11-13 14:18:38', '2024-11-13 14:18:38');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;