-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 nov. 2021 à 23:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `to_do_list`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `IDHISTORIQUE` int(11) NOT NULL AUTO_INCREMENT,
  `DATEHISTORIQUE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDHISTORIQUE`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`IDHISTORIQUE`, `DATEHISTORIQUE`) VALUES
(6, '2021-11-08 21:54:53');

-- --------------------------------------------------------

--
-- Structure de la table `historique_has_tache`
--

DROP TABLE IF EXISTS `historique_has_tache`;
CREATE TABLE IF NOT EXISTS `historique_has_tache` (
  `IDTACHE` int(11) NOT NULL,
  `IDHISTORIQUE` int(11) NOT NULL,
  `ETAT` varchar(10) NOT NULL,
  PRIMARY KEY (`IDTACHE`,`IDHISTORIQUE`),
  KEY `I_FK_HISTORIQUE_HAS_TACHE_TACHE` (`IDTACHE`),
  KEY `I_FK_HISTORIQUE_HAS_TACHE_HISTORIQUE` (`IDHISTORIQUE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique_has_tache`
--

INSERT INTO `historique_has_tache` (`IDTACHE`, `IDHISTORIQUE`, `ETAT`) VALUES
(7, 6, 'Terminé'),
(6, 6, 'Terminé'),
(5, 6, 'A faire'),
(4, 6, 'A faire'),
(3, 6, 'En cours'),
(2, 6, 'Terminé'),
(1, 6, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `IDTACHE` int(11) NOT NULL AUTO_INCREMENT,
  `IDUSER` int(11) NOT NULL,
  `ETAT` char(32) NOT NULL,
  `DATECREATION` datetime DEFAULT CURRENT_TIMESTAMP,
  `DATEFIN` datetime NOT NULL,
  `TITRE` char(32) DEFAULT NULL,
  `DESCRIPTION` char(255) NOT NULL,
  PRIMARY KEY (`IDTACHE`),
  KEY `I_FK_TACHE_UTILISATEUR` (`IDUSER`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`IDTACHE`, `IDUSER`, `ETAT`, `DATECREATION`, `DATEFIN`, `TITRE`, `DESCRIPTION`) VALUES
(1, 8, 'En cours', '2021-11-08 09:22:36', '2021-11-02 10:15:00', 'yo', 'hhhh'),
(2, 8, 'Terminé', '2021-11-08 09:26:51', '2021-11-09 12:26:00', 'tache1', 'jkl\r\n'),
(3, 8, 'En cours', '2021-11-08 09:28:00', '2021-11-24 15:27:00', 'module', 'jjj'),
(4, 8, 'A faire', '2021-11-08 15:48:31', '2021-11-30 21:48:00', 'Tache o8', 'test 098'),
(5, 8, 'A faire', '2021-11-08 15:49:01', '2021-11-17 15:50:00', 'tache 09', 'test 09'),
(6, 8, 'Terminé', '2021-11-08 15:50:03', '2021-11-24 15:53:00', 'tache 11', 'Premiére tache en cours'),
(7, 8, 'Terminé', '2021-11-08 15:50:45', '2021-11-22 21:50:00', 'tache 12', 'premiére tache terminée');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDUSER` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` char(15) NOT NULL,
  `EMAIL` char(20) NOT NULL,
  `PASSWORD` char(32) NOT NULL,
  PRIMARY KEY (`IDUSER`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDUSER`, `USERNAME`, `EMAIL`, `PASSWORD`) VALUES
(7, 'Arim', 'arim@contact.com', 'arim'),
(6, 'Arim', 'arim@contact.com', 'ff'),
(5, 'Arim', 'arim@contact.com', 'ff'),
(1, 'rr', 'der', 'ffff'),
(8, 'Arim', 'arim@contact.com', 'arim');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
