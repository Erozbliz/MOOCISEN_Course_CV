-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 23 Février 2016 à 13:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mooc`
--

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `connect_time` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `autre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `log`
--

INSERT INTO `log` (`id`, `id_user`, `connect_time`, `email`, `ip`, `autre`) VALUES
(1, NULL, '23-02-2016 12:35', NULL, '', ''),
(2, NULL, '23-02-2016 12:36', NULL, '', ''),
(3, NULL, '23-02-2016 12:37', NULL, '127.0.0.1', ''),
(4, NULL, '23-02-2016 12:40', NULL, '127.0.0.1', ''),
(5, NULL, '23-02-2016 12:40', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(6, NULL, '23-02-2016 12:40', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(7, NULL, '23-02-2016 12:40', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(8, NULL, '23-02-2016 12:41', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(9, 0, '23-02-2016 12:41', 'unknow', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(10, 0, '23-02-2016 12:42', 'unknow', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(11, 0, '23-02-2016 12:42', 'unknow', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(12, NULL, '23-02-2016 12:46', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(13, NULL, '23-02-2016 12:46', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(14, 1, '23-02-2016 12:47', 'olivier.colombies@gmail.com', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(15, 1, '23-02-2016 12:47', 'olivier.colombies@gmail.com', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(16, 1, '23-02-2016 12:47', 'olivier.colombies@gmail.com', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
