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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
