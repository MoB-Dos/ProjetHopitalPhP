-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 21 sep. 2020 à 12:55
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hopitalphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `infomedecin`
--

DROP TABLE IF EXISTS `infomedecin`;
CREATE TABLE IF NOT EXISTS `infomedecin` (
  `idMedecin` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `spe` varchar(20) NOT NULL,
  `lieu` varchar(35) NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `infouser`
--

DROP TABLE IF EXISTS `infouser`;
CREATE TABLE IF NOT EXISTS `infouser` (
  `idInfo` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `mutuel` text NOT NULL,
  `sq` text NOT NULL,
  `optionTele` varchar(3) NOT NULL,
  `regime` varchar(9) NOT NULL,
  PRIMARY KEY (`idInfo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `idRdv` int(11) NOT NULL,
  `departement` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  KEY `idRdv` (`idRdv`),
  KEY `idMedecin` (`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `mail` varchar(35) NOT NULL,
  `token` varchar(25) NOT NULL,
  `profil` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `infouser`
--
ALTER TABLE `infouser`
  ADD CONSTRAINT `fk_` FOREIGN KEY (`idInfo`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `fk_medecin` FOREIGN KEY (`idMedecin`) REFERENCES `infomedecin` (`idMedecin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
