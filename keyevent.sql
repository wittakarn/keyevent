-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table keyevent.keydelete
CREATE TABLE IF NOT EXISTS `keydelete` (
  `id` int(11) NOT NULL,
  `input` char(1) NOT NULL,
  `keyup_timestamp` decimal(15,0) NOT NULL,
  `keydown_timestamp` decimal(15,0) NOT NULL,
  `position` int(11) NOT NULL,
  `reference_position` int(11) NOT NULL,
  `delete_count` int(11) NOT NULL,
  PRIMARY KEY (`id`,`delete_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- Data exporting was unselected.


-- Dumping structure for table keyevent.keydown
CREATE TABLE IF NOT EXISTS `keydown` (
  `id` int(11) NOT NULL,
  `input` char(1) NOT NULL,
  `keydown_timestamp` decimal(15,0) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`,`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- Data exporting was unselected.


-- Dumping structure for table keyevent.keyup
CREATE TABLE IF NOT EXISTS `keyup` (
  `id` int(11) NOT NULL,
  `input` char(1) NOT NULL,
  `keyup_timestamp` decimal(15,0) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`,`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
