-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 mars 2023 à 09:03
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`) VALUES
(63, 'test string cat', 15),
(62, 'test string cat', 15),
(61, 'test string cat', 15),
(60, 'encore test', 15),
(59, 'plusieurs test cat', 15),
(58, 'plusieurs test cat', 15),
(56, 'plusieurs test cat', 15),
(57, 'plusieurs test cat', 15),
(54, 'plusieurs test cat', 15),
(55, 'plusieurs test cat', 15),
(53, 'catereeeeeeeeere', 15),
(52, 'catereeeeeeeeere', 15),
(51, '', 15),
(50, 'test cattttttttt', 15),
(49, 'je suis un poète', 15),
(48, 'quel joli article', 15),
(47, 'test article', 15),
(64, 'test string cat', 15),
(65, 'test string cat', 15),
(66, 'test string cat', 15),
(67, 'test string cat', 15),
(68, 'allez nouveau test', 15),
(69, 'allez nouveau test', 15),
(70, 'allez nouveau test', 15),
(71, 'allez nouveau test', 15),
(72, 'allez nouveau test', 15),
(73, 'popopopopoooooooo', 15),
(74, 'une seule cat', 15),
(75, 'une seule cat', 15),
(76, 'une seule cat', 15),
(77, 'une seule cat', 15),
(78, 'une seule cat', 15),
(79, 'une seule cat', 15),
(80, 'une seule cat', 15),
(81, 'une seule cat', 15),
(82, 'une seule cat', 15),
(83, 'une seule cat', 15),
(84, 'une seule cat', 15),
(85, 'une seule cat', 15),
(86, 'une seule cat', 15),
(87, 'une seule cat', 15),
(88, 'une seule cat', 15),
(89, 'une seule cat', 15),
(90, 'une seule cat', 15),
(91, 'une seule cat', 15),
(92, '', 15),
(93, 'TEST ID CATegorie', 15),
(94, 'on reteste', 15),
(95, 'on reteste', 15),
(96, 'ijnvhyf', 15),
(97, 'ijnvhyf', 15),
(98, 'testrrrrr', 15),
(99, 'test count', 15),
(100, 'test count', 15),
(101, 'test count', 15),
(102, 'test count', 15),
(103, 'test count', 15),
(104, 'test count', 15),
(105, 'test count', 15),
(106, 'test count', 15),
(107, 'test', 15),
(108, 'test', 15),
(109, 'nouveau test cat', 15),
(110, 'test tabelau cat', 15),
(111, 'test tabelau cat', 15),
(112, 'TEST ID CAT ', 15),
(113, 'un seul article mais 2 cat', 15);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(58, 113, 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `firstname`, `lastname`) VALUES
(0, 'login1', 'password1', 'email1', 'first1', 'last1'),
(2, 'testtesttestst', 'password1', 'email1', '', ''),
(16, 'b', 'b', 'b', 'b', 'b'),
(17, 'z', 'z', 'z', 'z', 'z'),
(15, 'a', 'a', 'a', 'a', 'a'),
(14, '   ', 'zz', 'z', 'z', ''),
(13, '  ', 'az', 'azeaze', 'zeze', 'zeaze'),
(12, '', 'aa', 'aa', 'zz', 'aa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
