-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 25 mars 2023 à 01:32
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb3 */;

--
-- Base de données : `revisions`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`) VALUES
(142, 'test article ', 21),
(118, '', 18),
(119, 'test', 18),
(120, 'test', 18),
(121, '', 18),
(122, 'zrtez', 18),
(123, 'zrtez', 18),
(124, 'zrtez', 18),
(125, 'zrtez', 18),
(126, 'zrtez', 18),
(127, 'zrtez', 18),
(128, 'zrtez', 18),
(129, 'zrtez', 18),
(130, 'zrtez', 18),
(131, 'zrtez', 18),
(132, 'zrtez', 18),
(133, 'zrtez', 18),
(134, 'zrtez', 18),
(135, 'zrtez', 18),
(136, '', 18),
(137, '', 18),
(138, '', 18),
(139, '', 18),
(140, 'test article else', 18),
(141, 'If you just see a blank page instead of an error reporting and you have no server access so you can\'t edit php configuration files like php.ini try this:\r\n\r\n- create a new file in which you include the faulty script:\r\n\r\n<?php\r\n error_reporting(E_ALL);\r\n ini_set(\"display_errors\", 1);\r\n include(\"file_with_errors.php\");\r\n?>\r\n\r\n- execute this file instead of the faulty script file\r\n\r\nnow errors of your faulty script should be reported.\r\nthis works fine with me. hope it solves your problem as well!', 19);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`) VALUES
(1, 'Sport'),
(2, 'Bien-être'),
(3, 'Immo'),
(4, 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
CREATE TABLE IF NOT EXISTS `liaison` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_article` int NOT NULL,
  `id_categorie` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`id`, `id_article`, `id_categorie`) VALUES
(1, 15, 1),
(2, 15, 2),
(3, 15, 2),
(4, 15, 2),
(5, 15, 2),
(6, 15, 2),
(7, 59, 2),
(8, 60, 2),
(9, 61, 0),
(10, 62, 0),
(11, 63, 0),
(12, 63, 0),
(13, 63, 0),
(14, 63, 0),
(15, 63, 0),
(16, 63, 2),
(17, 63, 2),
(18, 63, 2),
(19, 63, 2),
(20, 63, 2),
(21, 63, 2),
(22, 63, 4),
(23, 63, 4),
(24, 63, 4),
(25, 63, 4),
(26, 63, 4),
(27, 63, 4),
(28, 63, 4),
(29, 63, 4),
(30, 63, 4),
(31, 63, 4),
(32, 63, 1),
(33, 95, 1),
(34, 96, 2),
(35, 97, 2),
(36, 98, 0),
(37, 99, 3),
(38, 99, 4),
(39, 100, 3),
(40, 100, 4),
(41, 101, 3),
(42, 101, 4),
(43, 102, 3),
(44, 102, 4),
(45, 103, 3),
(46, 103, 4),
(47, 104, 3),
(48, 104, 4),
(49, 105, 3),
(50, 105, 4),
(51, 106, 3),
(52, 106, 4),
(53, 109, 1),
(54, 109, 4),
(55, 112, 3),
(56, 112, 4),
(57, 113, 2),
(58, 113, 4),
(59, 114, 2),
(60, 114, 3),
(61, 114, 4),
(62, 115, 1),
(63, 115, 2),
(64, 116, 1),
(65, 116, 2),
(66, 117, 1),
(67, 117, 2),
(68, 120, 1),
(69, 139, 3),
(70, 140, 3),
(71, 140, 4),
(72, 141, 4),
(73, 142, 3),
(74, 142, 4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `firstname`, `lastname`) VALUES
(21, 'test', 'test', 'test', 'test', 'test'),
(20, 'b', 'b', 'b', 'b', 'b'),
(19, 'a', 'a', 'a', 'a', 'a'),
(18, 'log', 'pass', 'mail', 'first', 'last');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
