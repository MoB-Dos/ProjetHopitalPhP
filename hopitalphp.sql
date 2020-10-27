-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 27 oct. 2020 à 10:18
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `mdpc` text NOT NULL,
  `mail` varchar(35) NOT NULL,
  `token` text,
  `profil` varchar(9) NOT NULL,
  `dossier` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdpc`, `mail`, `token`, `profil`, `dossier`) VALUES
(1, 'test_ND', '89df4f3cd604f5fccb2345ab329f327c', 'test_ND@gmail.com', NULL, 'user', 0),
(2, 'test_D', '89df4f3cd604f5fccb2345ab329f327c', 'test_D@gmail.com', NULL, 'user', 1),
(3, 'test_AD', '89df4f3cd604f5fccb2345ab329f327c', 'test_AD@gmail.com', NULL, 'admin', 0),
(4, 'test_Doc', '89df4f3cd604f5fccb2345ab329f327c', 'test_Doc@gmail.com', NULL, 'medecin', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `fk_medecin` FOREIGN KEY (`idMedecin`) REFERENCES `infomedecin` (`idMedecin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
