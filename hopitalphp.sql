-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 07 déc. 2020 à 16:25
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
-- Structure de la table `horaire`
--

DROP TABLE IF EXISTS `horaire`;
CREATE TABLE IF NOT EXISTS `horaire` (
  `idHoraire` int(11) NOT NULL AUTO_INCREMENT,
  `horaire` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idHoraire`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`idHoraire`, `horaire`) VALUES
(1, '9:00'),
(2, '9:30'),
(3, '10:00'),
(4, '10:30'),
(5, '11:00'),
(6, '11:30'),
(7, '12:00'),
(8, '12:30');

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
  `lien` text NOT NULL,
  PRIMARY KEY (`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infomedecin`
--

INSERT INTO `infomedecin` (`idMedecin`, `nom`, `prenom`, `spe`, `lieu`, `photo`, `lien`) VALUES
(0, 'Jarves', 'Paul', 'Cardiologue', 'Blanc-Mesnil', '/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-1.jpg', '/Slam2/ProjethopitalPHP/Hopital/View/PageDocteur/Cardiologue/jarvespaul.php'),
(1, 'Eluard', 'Jean', 'Radiologue', 'Blanc-Mesnil', '/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-2.jpg', '/Slam2/ProjethopitalPHP/Hopital/View/PageDocteur/NoDoc.php'),
(2, 'Mollary', 'Victor', 'Dérmatologue', 'Blanc-Mesnil', '/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-3.jpg', '/Slam2/ProjethopitalPHP/Hopital/View/PageDocteur/NoDoc.php'),
(3, 'Isthar', 'Johan', 'Cardiologue', 'Blanc-Mesnil', '/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-4.jpg', '/Slam2/ProjethopitalPHP/Hopital/View/PageDocteur/NoDoc.php');

-- --------------------------------------------------------

--
-- Structure de la table `infouser`
--

DROP TABLE IF EXISTS `infouser`;
CREATE TABLE IF NOT EXISTS `infouser` (
  `idInfo` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `mutuel` text NOT NULL,
  `secusocial` text NOT NULL,
  `optionTV` varchar(30) NOT NULL,
  `optionWifi` varchar(30) NOT NULL,
  `regime` varchar(30) NOT NULL,
  PRIMARY KEY (`idInfo`),
  KEY `idUSer` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infouser`
--

INSERT INTO `infouser` (`idInfo`, `idUser`, `nom`, `prenom`, `date`, `adresse`, `mutuel`, `secusocial`, `optionTV`, `optionWifi`, `regime`) VALUES
(1, 1, 'Birba', 'Enzo', '2001-11-08', '16 rue du 19 mars 1962 ', '4561215616', '78654896', 'oui', 'oui', 'vegan'),
(3, 2, 'testnom', 'ttt', '2020-12-23', 'testadresse', 'testmu', 'testsecu', '1', '0', '2');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `idRdv` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `idHoraire` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `motif` text NOT NULL,
  PRIMARY KEY (`idRdv`),
  KEY `idRdv` (`idRdv`),
  KEY `idMedecin` (`idMedecin`),
  KEY `idHoraire` (`idHoraire`),
  KEY `idUser` (`idUser`),
  KEY `idUser_2` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`idRdv`, `date`, `idHoraire`, `idMedecin`, `idUser`, `motif`) VALUES
(5, '2020-11-26', 1, 0, 1, 'Ventre dingueries \r\n'),
(6, '2020-11-26', 4, 0, 1, 'ererer');

-- --------------------------------------------------------

--
-- Structure de la table `tableau`
--

DROP TABLE IF EXISTS `tableau`;
CREATE TABLE IF NOT EXISTS `tableau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `couleur` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `tableau`
--

INSERT INTO `tableau` (`id`, `nom`, `prenom`, `couleur`) VALUES
(3, 'u', 'u', 'u'),
(8, 'e', 'e', 'e'),
(9, 'ee', 'ee', 'eee'),
(18, 'aa', 'a', 'aaa'),
(19, 'ty', 'yyy', 'tzrtre'),
(20, 'tesy', 'yesy', 'a fazfa'),
(21, 'tesy', 'trtrtrtrt', 'a fazfa'),
(22, 'paul', 'trtrtrtrt', 'a fazfa'),
(23, 'trt', 'rer', 'ererer'),
(24, 'trtrrr', 'rer', 'ererer'),
(25, 'trtrrr', 'rer', 'ererer'),
(26, 'Jarves Paul', '2020-11-08', '10:30'),
(27, 'Jarves Paul', '2020-11-26', '10:30'),
(28, 'Jarves Paul', '2020-11-26', '9:00');

-- --------------------------------------------------------

--
-- Structure de la table `tableaufinal`
--

DROP TABLE IF EXISTS `tableaufinal`;
CREATE TABLE IF NOT EXISTS `tableaufinal` (
  `id` varchar(5) COLLATE utf8_bin NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `couleur` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `tableaufinal`
--

INSERT INTO `tableaufinal` (`id`, `nom`, `prenom`, `couleur`) VALUES
('MjLtp', 'e', 'e', 'e'),
('iMVf1', 'testb', 'testb', 'testb');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `mdpc` text NOT NULL,
  `mail` varchar(35) NOT NULL,
  `profil` varchar(9) NOT NULL,
  `dossier` tinyint(1) NOT NULL,
  `sessionId` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `mdpc`, `mail`, `profil`, `dossier`, `sessionId`) VALUES
(1, 'test_ND', '89df4f3cd604f5fccb2345ab329f327c', 'test_ND@gmail.com', 'user', 1, '1wx07AQF69aVGM3KurzS'),
(2, 'test_D', '89df4f3cd604f5fccb2345ab329f327c', 'test_D@gmail.com', 'user', 1, 'saxGmMmCx6bPzvrrbL2g'),
(3, 'test_AD', '89df4f3cd604f5fccb2345ab329f327c', 'test_AD@gmail.com', 'admin', 0, 'zr4l2D0Nz9DGm5nnzSr0'),
(4, 'test_Doc', '89df4f3cd604f5fccb2345ab329f327c', 'test_Doc@gmail.com', 'medecin', 0, NULL),
(13, 'yuyu', 'd41d8cd98f00b204e9800998ecf8427e', 'yyuyuaaa@gmail.com', 'user', 0, NULL),
(15, 'e', '89df4f3cd604f5fccb2345ab329f327c', 'e', 'admin', 0, 'eee'),
(16, 'paul', '89df4f3cd604f5fccb2345ab329f327c', 'kiki@gmail.com', 'admin', 0, 'null'),
(17, 'test_Doc', '89df4f3cd604f5fccb2345ab329f327c', 'test_Doc@gmail.com', 'medecin', 0, '0'),
(18, 't', '89df4f3cd604f5fccb2345ab329f327c', 't', 'user', 0, 't');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `infouser`
--
ALTER TABLE `infouser`
  ADD CONSTRAINT `fk_UserInfo` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `fk_idHoraire` FOREIGN KEY (`idHoraire`) REFERENCES `horaire` (`idHoraire`),
  ADD CONSTRAINT `fk_idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `fk_medecin` FOREIGN KEY (`idMedecin`) REFERENCES `infomedecin` (`idMedecin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
