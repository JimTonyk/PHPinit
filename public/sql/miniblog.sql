-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 11 juin 2018 à 12:59
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `miniblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_com`, `id_article`, `author`, `comment`, `date_comment`) VALUES
(1, 3, 'Ragnaros', 'Le design général est à changer mais cela viendra avec le temps', '2018-06-06 15:29:37'),
(2, 1, 'Panoramix', 'Bienvenue dans le monde du blogging', '2018-06-06 15:29:38'),
(3, 1, 'Alfred', 'Welcome :)', '2018-06-06 15:29:38'),
(4, 2, 'Curiosity', 'Tu peux partager les codes sources ?', '2018-06-06 15:29:38'),
(5, 1, 'GrumpyCat', 'Je trouve cela petit et court, dommage.', '2018-06-06 15:29:38'),
(6, 2, 'JavaChampion', 'Pas de HTML et de Java ?', '2018-06-06 15:29:38'),
(7, 3, 'Doudou', 'Ne change rien tu es le meilleur', '2018-06-06 15:29:38'),
(8, 5, 'Dummy', 'Le jambon de bayonne', '2018-06-07 10:48:59'),
(9, 6, 'Gaston', 'C\'est bon ca marche', '2018-06-07 11:19:51'),
(10, 2, 'Admin', 'Pas pour le moment mais ca viendra :)', '2018-06-07 16:27:25'),
(13, 5, 'Fred Pean', 'Les marches militaires prussiennes de 1900', '2018-06-08 16:09:29'),
(12, 1, 'Alfred', 'Très aimable GrumpyCat !', '2018-06-11 14:58:26'),
(14, 4, 'Dummy', 'Merci pour ce conseil frappé au coin du bon sens :)', '2018-06-08 15:46:15'),
(15, 5, 'Alfred', 'Cela ne rigole pas :)', '2018-06-08 16:04:41'),
(16, 3, 'DesignerMan', 'Un meilleur CSS ?', '2018-06-11 14:22:33');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `date_post` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`, `date_post`) VALUES
(1, 'Bienvenue dans ce blog', 'Ceci est le premier et j\'espère pas le dernier d\'une longue série de billets d\'un apprenti informaicien', '2018-06-06 15:15:06'),
(2, 'Ecrit en PHP', 'Vous ne le voyez peut etre pas comme ça mais ce blog est entièrement écrit en PHP (et un peu de CSS pour le style!)', '2018-06-06 15:18:28'),
(3, 'Suggestions', 'Toute suggestion est la bienvenue en commentaire afin d\'améliorer l\'expérience utilisateur', '2018-06-06 15:54:28'),
(4, 'Formation', 'Se former à l\'informatique est simple à partir du moment où la motivation est présente', '2018-06-07 10:28:49'),
(5, 'Divers', 'Quelles sont vos passions ? Dites-tout en commentaire !', '2018-06-07 10:28:49'),
(6, 'Deuxième page', 'Normalement ce billet est en page 2 ! Sinon erreur de code :\'(', '2018-06-07 10:28:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
