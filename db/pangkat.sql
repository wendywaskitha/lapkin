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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
