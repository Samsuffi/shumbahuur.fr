-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 18 Mars 2018 à 02:59
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `christinebdd`
--
CREATE DATABASE IF NOT EXISTS `christinebdd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `christinebdd`;

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE `tarifs` (
  `id` int(11) NOT NULL,
  `nom_soin` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `prix` int(11) NOT NULL,
  `date_maj` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tarifs`
--

INSERT INTO `tarifs` (`id`, `nom_soin`, `prix`, `date_maj`) VALUES
(1, 'Adultes', 54, '2017-01-17'),
(2, 'Enfants-Adolescents', 45, '2016-01-17'),
(3, 'Nourrissons', 35, '2015-01-17'),
(4, '30min', 40, '2013-01-17'),
(5, '60min', 65, '2012-01-17'),
(6, '90min', 90, '2011-01-17'),
(7, 'Nuad Bon Rarn', 65, '2010-01-17'),
(8, 'R&eacute;flexologie Plantaire', 65, '2009-01-17');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;