-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Novembre 2020 à 16:19
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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `infouser`
--
ALTER TABLE `infouser`
  ADD CONSTRAINT `fk_UserInfo` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
