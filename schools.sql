-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Décembre 2015 à 17:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `schools`
--

-- --------------------------------------------------------

--
-- Structure de la table `listschool`
--

CREATE TABLE IF NOT EXISTS `listschool` (
  `id` int(11) NOT NULL,
  `school` varchar(10) NOT NULL,
  `nb_pupils` int(11) NOT NULL,
  `nb_sports_pupils` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `listschool`
--

INSERT INTO `listschool` (`id`, `school`, `nb_pupils`, `nb_sports_pupils`) VALUES
(1, 'Ecole A', 23, 20),
(2, 'Ecole B', 51, 51),
(3, 'Ecole C', 56, 35);

-- --------------------------------------------------------

--
-- Structure de la table `sports`
--

CREATE TABLE IF NOT EXISTS `sports` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_ecole` int(10) NOT NULL,
  `id_pupil` int(11) NOT NULL,
  `boxe` int(10) NOT NULL,
  `judo` int(10) NOT NULL,
  `football` int(10) NOT NULL,
  `natation` int(10) NOT NULL,
  `cyclisme` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Contenu de la table `sports`
--

INSERT INTO `sports` (`id`, `id_ecole`, `id_pupil`, `boxe`, `judo`, `football`, `natation`, `cyclisme`) VALUES
(3, 1, 1, 1, 0, 1, 0, 0),
(4, 1, 2, 0, 0, 0, 1, 1),
(5, 1, 3, 1, 0, 0, 0, 1),
(6, 1, 4, 1, 1, 1, 0, 0),
(7, 1, 5, 1, 1, 1, 0, 0),
(8, 1, 6, 0, 0, 0, 0, 0),
(9, 1, 7, 1, 0, 0, 1, 0),
(10, 1, 8, 1, 0, 1, 0, 0),
(11, 1, 9, 0, 0, 0, 0, 0),
(12, 1, 10, 0, 0, 1, 1, 0),
(13, 1, 11, 1, 0, 1, 0, 0),
(14, 1, 12, 0, 1, 0, 0, 1),
(15, 1, 13, 1, 0, 0, 0, 0),
(16, 1, 14, 1, 1, 1, 0, 0),
(17, 1, 15, 1, 1, 0, 0, 1),
(18, 1, 16, 0, 0, 0, 0, 0),
(19, 1, 17, 0, 1, 0, 0, 1),
(20, 1, 18, 1, 1, 0, 1, 0),
(21, 1, 19, 1, 0, 0, 1, 1),
(22, 1, 20, 1, 0, 1, 1, 0),
(23, 2, 1, 1, 1, 1, 0, 0),
(24, 2, 2, 0, 1, 0, 1, 0),
(25, 2, 3, 0, 0, 1, 1, 1),
(26, 2, 4, 1, 1, 0, 1, 0),
(27, 2, 5, 0, 1, 0, 1, 1),
(28, 2, 6, 0, 0, 1, 0, 0),
(29, 2, 7, 1, 1, 1, 0, 0),
(30, 2, 8, 0, 0, 1, 1, 0),
(31, 2, 9, 0, 0, 1, 0, 1),
(32, 2, 10, 0, 0, 1, 0, 0),
(33, 2, 11, 0, 1, 1, 0, 0),
(34, 2, 12, 0, 0, 1, 0, 0),
(35, 2, 13, 0, 1, 1, 0, 1),
(36, 2, 14, 0, 0, 0, 1, 0),
(37, 2, 15, 0, 1, 1, 0, 0),
(38, 2, 16, 0, 0, 0, 0, 0),
(39, 2, 17, 0, 1, 0, 1, 1),
(40, 2, 18, 0, 1, 0, 0, 0),
(41, 2, 19, 0, 0, 0, 1, 1),
(42, 2, 20, 1, 0, 1, 0, 1),
(43, 2, 21, 1, 1, 0, 1, 0),
(44, 2, 22, 0, 0, 1, 1, 1),
(45, 2, 23, 1, 1, 1, 0, 0),
(46, 2, 24, 1, 0, 0, 0, 0),
(47, 2, 25, 1, 1, 0, 0, 0),
(48, 2, 26, 1, 0, 0, 1, 0),
(49, 2, 27, 1, 0, 0, 1, 1),
(50, 2, 28, 1, 1, 1, 0, 0),
(51, 2, 29, 0, 1, 1, 1, 0),
(52, 2, 30, 1, 0, 1, 0, 1),
(53, 2, 31, 1, 0, 1, 0, 0),
(54, 2, 32, 0, 1, 0, 0, 0),
(55, 2, 33, 1, 0, 1, 0, 1),
(56, 2, 34, 1, 1, 1, 0, 0),
(57, 2, 35, 0, 1, 1, 0, 1),
(58, 2, 36, 0, 1, 1, 1, 0),
(59, 2, 37, 0, 0, 1, 1, 0),
(60, 2, 38, 1, 0, 0, 1, 0),
(61, 2, 39, 0, 0, 0, 1, 0),
(62, 2, 40, 1, 1, 1, 0, 0),
(63, 2, 41, 0, 1, 1, 1, 0),
(64, 2, 42, 1, 1, 0, 1, 0),
(65, 2, 43, 1, 0, 0, 1, 0),
(66, 2, 44, 1, 1, 1, 0, 0),
(67, 2, 45, 0, 1, 0, 0, 1),
(68, 2, 46, 0, 0, 1, 1, 1),
(69, 2, 47, 1, 0, 0, 0, 0),
(70, 2, 48, 0, 1, 0, 1, 0),
(71, 2, 49, 0, 0, 0, 0, 0),
(72, 2, 50, 0, 1, 1, 1, 0),
(73, 2, 51, 0, 1, 1, 0, 1),
(74, 3, 1, 0, 0, 0, 1, 1),
(75, 3, 2, 1, 1, 1, 0, 0),
(76, 3, 3, 0, 1, 0, 0, 1),
(77, 3, 4, 1, 0, 0, 1, 0),
(78, 3, 5, 1, 0, 0, 0, 1),
(79, 3, 6, 0, 1, 1, 1, 0),
(80, 3, 7, 1, 0, 0, 1, 1),
(81, 3, 8, 1, 1, 0, 1, 0),
(82, 3, 9, 1, 0, 1, 1, 0),
(83, 3, 10, 0, 1, 0, 1, 0),
(84, 3, 11, 1, 0, 0, 1, 0),
(85, 3, 12, 1, 0, 0, 1, 0),
(86, 3, 13, 0, 0, 0, 0, 0),
(87, 3, 14, 1, 0, 0, 1, 1),
(88, 3, 15, 0, 0, 1, 1, 1),
(89, 3, 16, 0, 0, 1, 0, 0),
(90, 3, 17, 0, 0, 0, 1, 1),
(91, 3, 18, 1, 0, 0, 0, 0),
(92, 3, 19, 1, 1, 0, 1, 0),
(93, 3, 20, 0, 0, 1, 1, 1),
(94, 3, 21, 1, 1, 1, 0, 0),
(95, 3, 22, 0, 0, 1, 0, 1),
(96, 3, 23, 0, 0, 1, 0, 1),
(97, 3, 24, 0, 0, 0, 1, 1),
(98, 3, 25, 0, 1, 0, 0, 1),
(99, 3, 26, 0, 0, 1, 1, 1),
(100, 3, 27, 0, 0, 0, 0, 0),
(101, 3, 28, 0, 1, 1, 1, 0),
(102, 3, 29, 0, 1, 0, 1, 1),
(103, 3, 30, 0, 0, 1, 1, 0),
(104, 3, 31, 1, 1, 0, 0, 1),
(105, 3, 32, 0, 1, 0, 0, 0),
(106, 3, 33, 0, 0, 1, 1, 0),
(107, 3, 34, 0, 0, 1, 1, 1),
(108, 3, 35, 1, 1, 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
