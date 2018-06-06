-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Avril 2018 à 23:48
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `xb627rn321_shumbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre_groupe`
--

CREATE TABLE `membre_groupe` (
  `groupe` int(11) NOT NULL,
  `niveau` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `membre_groupe`
--

INSERT INTO `membre_groupe` (`groupe`, `niveau`) VALUES
(10, 'ADMIN'),
(20, 'GEST'),
(30, 'MOD');

-- --------------------------------------------------------

--
-- Structure de la table `site_membres`
--

CREATE TABLE `site_membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `inscription` date NOT NULL DEFAULT '1000-01-01',
  `groupe` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `site_membres`
--

INSERT INTO `site_membres` (`id`, `pseudo`, `password`, `inscription`, `groupe`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2018-03-02', 10),
(2, 'gest', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2018-03-02', 20);

-- --------------------------------------------------------

--
-- Structure de la table `site_news`
--

CREATE TABLE `site_news` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `site_news`
--

INSERT INTO `site_news` (`id`, `titre`, `contenu`, `timestamp`) VALUES
(1, 'PremiÃ¨re News', 'Alors, la news, Ã§a marche ?', '0000-00-00 00:00:00'),
(2, 'Seconde news', 'Oui, parce que Ã§a marche mieux avec deux news', '2018-03-11 18:41:50'),
(3, 'Salut', 'test', '2018-03-16 23:14:02'),
(4, 'Un premier test', 'Ã§a semble marcher', '2018-03-16 23:31:47'),
(5, 'Et la modification, Ã§a marche ?', 'Il semble que oui :D', '2018-03-16 23:34:07'),
(6, 'Une petite nouvelle news avant le dodo ?', 'Ã§a semble bien marcher maintenant...', '2018-03-16 23:37:26');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `site_membres`
--
ALTER TABLE `site_membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `site_news`
--
ALTER TABLE `site_news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `site_membres`
--
ALTER TABLE `site_membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `site_news`
--
ALTER TABLE `site_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
