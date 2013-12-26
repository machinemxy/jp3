-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013-12-09 14:35:47
-- 服务器版本: 5.6.14-log
-- PHP 版本: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `jpdb3`
--

-- --------------------------------------------------------

--
-- 表的结构 `words`
--

CREATE TABLE IF NOT EXISTS `words` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson` int(4) NOT NULL DEFAULT '0',
  `part` int(2) NOT NULL DEFAULT '0',
  `kana` varchar(100) DEFAULT NULL,
  `kanji` varchar(100) DEFAULT NULL,
  `meaning` varchar(100) DEFAULT NULL,
  `times` int(11) NOT NULL DEFAULT '0',
  `masterdate` datetime DEFAULT NULL,
  `wrongtimes` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=519 ;

--
-- 转存表中的数据 `words`
--

INSERT INTO `words` (`Id`, `lesson`, `part`, `kana`, `kanji`, `meaning`, `times`, `masterdate`, `wrongtimes`) VALUES
(8, 1, 1, 'しょく', '食', '饮食', 3, '2013-10-10 10:34:16', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
