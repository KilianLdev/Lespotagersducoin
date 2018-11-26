-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 26 nov. 2018 à 15:27
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
  `number` int(4) NOT NULL,
  `weight` int(11) NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`ID`, `img_advert`, `title`, `date`, `number`, `weight`, `autor`) VALUES
(1, './AdImages/tomate.jpg', 'tomates', '2018-11-13', 22, 0, 3),
(3, './AdImages/aubergine.jpg', 'aubergines', '2018-11-13', 3, 0, 2),
(5, './AdImages/pomme.jpg', 'pommes', '2018-11-01', 16, 0, 3),
(7, './AdImages/concombre.jpg', 'concombres', '2018-11-14', 5, 0, 3),
(9, './AdImages/orange.jpg', 'oranges', '2018-11-13', 8, 0, 4),
(11, './AdImages/poire.jpg', 'poires', '2018-11-16', 3, 0, 4),
(12, './AdImages/amande.jpg', 'amandes', '2018-11-14', 127, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `ID` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `mail` varchar(30) NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `psw` varchar(150) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`ID`, `firstname`, `lastname`, `mail`, `telephone`, `psw`, `img`) VALUES
(2, 'Jean', 'Emeraude', 'jeanmerde@gmail.com', NULL, '467d241e3fbf8734736db118dfb663b73c28ecde67a431bdc4c478402b4ec5ad', ''),
(3, 'Bob', 'Rasovski', 'Bobby@gmail.com', NULL, 'de7c1c539a234307842dd8ef475ebac65a74672c807a1a7e2322367e35a802e8', ''),
(4, 'Clara', 'Garcia', 'cgarcia@gmail.com', NULL, '2ba5424bcb92753c285db686e019f43969410fae9215e31c3057120c448e656c', ''),
(6, 'Kilian', 'Lempereur', 'killempe@sfr.fr', NULL, 'b484b38443a381a65722bfd1e39343a5c24df3631d0155870f25984f65d3c890', ''),
(7, 'floflo', 'brebre', 'flo54@gmail.com', NULL, '3674e226e794aa049a935b6c124d6514c1e30194461a302fce0a7509206ee789', ''),
(8, 'Norbert', 'Neran', 'nono@gmail.com', NULL, '230dd4b2756ddd5e1e7860b9c70a681e40e4a6523eebcc76e1dfed17587d95f7', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
