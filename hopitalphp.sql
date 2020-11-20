-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Novembre 2020 à 16:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hopitalphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE IF NOT EXISTS `horaire` (
  `idHoraire` int(11) NOT NULL AUTO_INCREMENT,
  `horaire` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idHoraire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Contenu de la table `horaire`
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
-- Contenu de la table `infomedecin`
--

INSERT INTO `infomedecin` (`idMedecin`, `nom`, `prenom`, `spe`, `lieu`, `photo`, `lien`) VALUES
(0, 'Jarves', 'Paul', 'Cardiologue', 'Blanc-Mesnil', '/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-1.jpg', '/Slam2/ProjethopitalPHP/Hopital/View/PageDocteur/Cardiologue/jarvespaul.php'),
(1, 'Eluard', 'Jean', 'Radiologue', 'Blanc-Mesnil', '/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-2.jpg', ''),
(2, 'Mollary', 'Victor', 'Dérmatologue', 'Blanc-Mesnil', '/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-3.jpg', ''),
(3, 'Isthar', 'Johan', 'Cardiologue', 'Blanc-Mesnil', '/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-4.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `infouser`
--

CREATE TABLE IF NOT EXISTS `infouser` (
  `idInfo` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `mutuel` text NOT NULL,
  `secusocial` text NOT NULL,
  `optionTV` tinyint(1) NOT NULL,
  `optionWifi` tinyint(1) NOT NULL,
  `regime` varchar(30) NOT NULL,
  PRIMARY KEY (`idInfo`),
  KEY `idUSer` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `infouser`
--

INSERT INTO `infouser` (`idInfo`, `idUser`, `nom`, `prenom`, `date`, `adresse`, `mutuel`, `secusocial`, `optionTV`, `optionWifi`, `regime`) VALUES
(0, 1, 'Birba', 'Enzo', '2001-11-08', '16 rue du 19 mars 1962 ', '4561215616', '78654896', 1, 1, '1');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `rendezvous`
--

INSERT INTO `rendezvous` (`idRdv`, `date`, `idHoraire`, `idMedecin`, `idUser`, `motif`) VALUES
(4, '2020-11-08', 4, 0, 1, 'mal de dos ');

-- --------------------------------------------------------

--
-- Structure de la table `tableau`
--

CREATE TABLE IF NOT EXISTS `tableau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `couleur` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=26 ;

--
-- Contenu de la table `tableau`
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
(25, 'trtrrr', 'rer', 'ererer');

-- --------------------------------------------------------

--
-- Structure de la table `tableaufinal`
--

CREATE TABLE IF NOT EXISTS `tableaufinal` (
  `id` varchar(5) COLLATE utf8_bin NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `couleur` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `tableaufinal`
--

INSERT INTO `tableaufinal` (`id`, `nom`, `prenom`, `couleur`) VALUES
('MjLtp', 'e', 'e', 'e'),
('iMVf1', 'testb', 'testb', 'testb');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `mdpc` text NOT NULL,
  `mail` varchar(35) NOT NULL,
  `profil` varchar(9) NOT NULL,
  `dossier` tinyint(1) NOT NULL,
  `sessionId` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `mdpc`, `mail`, `profil`, `dossier`, `sessionId`) VALUES
(1, 'test_ND', '89df4f3cd604f5fccb2345ab329f327c', 'test_ND@gmail.com', 'user', 1, 'ppDx0VYomKl9xNGRj5Zy'),
(2, 'test_D', '89df4f3cd604f5fccb2345ab329f327c', 'test_D@gmail.com', 'user', 1, NULL),
(3, 'test_AD', '89df4f3cd604f5fccb2345ab329f327c', 'test_AD@gmail.com', 'admin', 0, NULL),
(4, 'test_Doc', '89df4f3cd604f5fccb2345ab329f327c', 'test_Doc@gmail.com', 'medecin', 0, NULL);

--
-- Contraintes pour les tables exportées
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
