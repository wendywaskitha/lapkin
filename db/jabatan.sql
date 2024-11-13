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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
