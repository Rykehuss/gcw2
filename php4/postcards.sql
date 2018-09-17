-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.19 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица test.postcards
CREATE TABLE IF NOT EXISTS `postcards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `series` tinyint(4) DEFAULT '0',
  `country` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы test.postcards: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `postcards` DISABLE KEYS */;
INSERT INTO `postcards` (`id`, `price`, `title`, `width`, `height`, `series`, `country`) VALUES
	(1, 1.5, 'Kiev', 20, 10, 0, 'Ukraine'),
	(4, 1.2, 'Lviv', 40, 10, 1, 'Ukraine');
/*!40000 ALTER TABLE `postcards` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
