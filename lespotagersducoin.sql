-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 14 nov. 2018 à 15:30
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `lespotagersducoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `ID` int(11) NOT NULL,
  `img_advert` text NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `number` tinyint(4) NOT NULL,
  `weight` int(11) NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`ID`, `img_advert`, `title`, `date`, `number`, `weight`, `autor`) VALUES
(1, './AdImages/pomme.jpg', 'pomme', '2018-11-13', 34, 0, 1),
(2, './AdImages/tomate.jpg', 'tomates', '2018-11-15', 21, 0, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `autor` (`autor`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `advert_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `profil` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
