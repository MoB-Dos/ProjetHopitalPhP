-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 27 oct. 2020 à 09:58
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
  `mdp` varchar(25) NOT NULL,
  `mail` varchar(35) NOT NULL,
  `token` text,
  `profil` varchar(9) NOT NULL,
  `dossier` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdpc`, `mdp`, `mail`, `token`, `profil`, `dossier`) VALUES
(1, 'enzo', '', 'theoleboos', 'E.BIRBA@lprs.fr', NULL, 'medecin', 0),
(2, 'test', '05a671c66aefea124cc08b76ea6d30bb', 'testtest', 'test@cheh.frsq', NULL, 'user', 0),
(3, 'cc', 'c1f68ec06b490b3ecb4066b1b13a9ee9', 'cccccc', 'cc@cc.cc', NULL, 'admin', 0),
(4, 'j', 'ab4f63f9ac65152575886860dde480a1', 'azerty', 'j@j', NULL, 'user', 0),
(5, 'k', '993e84021fe0f4f65a5f980257090177', 'Azertyu', 'k@k', NULL, 'user', 0),
(6, 'f', '993e84021fe0f4f65a5f980257090177', 'Azertyu', 'f@f', NULL, 'user', 0),
(7, 'r', '89df4f3cd604f5fccb2345ab329f327c', 'Azertyu1', 'r@r', NULL, 'user', 0),
(11, 'u', 'd08d9ae829827c1b23cfe9d16baf7f3e', 'Azerty1', 'u@u', NULL, 'user', 0),
(12, 'y', '89df4f3cd604f5fccb2345ab329f327c', 'Azertyu1', 'y@y', NULL, 'user', 1),
(13, 'pol', '4f3876ccb80b752a6f558002c38ed066', 'Azertyui1', 'pol@gmail.com', NULL, 'user', 0),
(14, 'hh', '89df4f3cd604f5fccb2345ab329f327c', 'Azertyu1', 'hh@gmail.com', NULL, 'user', 0);

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
