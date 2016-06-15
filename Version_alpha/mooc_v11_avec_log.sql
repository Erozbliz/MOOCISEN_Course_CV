-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Février 2016 à 19:24
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mooc`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE IF NOT EXISTS `chapitre` (
  `id_chapitre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) DEFAULT NULL,
  `partie` varchar(8000) DEFAULT NULL,
  `id_mooc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_chapitre`),
  KEY `FK_chapitre_id_mooc` (`id_mooc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `chapitre`
--

INSERT INTO `chapitre` (`id_chapitre`, `titre`, `partie`, `id_mooc`) VALUES
(1, 'Identité', 'Nom-Prénom-Age-Sexe', 1),
(2, 'Présentation', 'Scolarité-Formation-Expériences', 1);

-- --------------------------------------------------------

--
-- Structure de la table `creer`
--

CREATE TABLE IF NOT EXISTS `creer` (
  `date_creation` datetime DEFAULT NULL,
  `id_mooc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_mooc`,`id_user`),
  KEY `FK_creer_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `creer`
--

INSERT INTO `creer` (`date_creation`, `id_mooc`, `id_user`) VALUES
('2016-02-25 00:00:00', 1, 2),
('2016-02-26 00:00:00', 2, 3),
('2016-02-26 00:00:00', 2, 4),
('2016-02-26 00:00:00', 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `debloquer`
--

CREATE TABLE IF NOT EXISTS `debloquer` (
  `date_obtention` datetime DEFAULT NULL,
  `id_succes` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_succes`,`id_user`),
  KEY `FK_debloquer_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `debloquer`
--

INSERT INTO `debloquer` (`date_obtention`, `id_succes`, `id_user`) VALUES
('2016-02-26 00:00:00', 1, 1),
('2016-02-26 00:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dragdrop`
--

CREATE TABLE IF NOT EXISTS `dragdrop` (
  `id_dragdrop` int(11) NOT NULL AUTO_INCREMENT,
  `texte` varchar(8000) DEFAULT NULL,
  `reponse_dd` varchar(8000) DEFAULT NULL,
  `indice_dd` varchar(8000) DEFAULT NULL,
  `id_exercice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dragdrop`),
  KEY `FK_dragdrop_id_exercice` (`id_exercice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

CREATE TABLE IF NOT EXISTS `exercice` (
  `id_exercice` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `valeur_exo` int(11) DEFAULT NULL,
  `id_chapitre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_exercice`),
  KEY `FK_exercice_id_chapitre` (`id_chapitre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `faire`
--

CREATE TABLE IF NOT EXISTS `faire` (
  `score` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_exercice` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_exercice`),
  KEY `FK_faire_id_exercice` (`id_exercice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `connect_time` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `autre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `log`
--

INSERT INTO `log` (`id`, `id_user`, `connect_time`, `email`, `ip`, `autre`) VALUES
(1, NULL, '23-02-2016 12:35', NULL, '', ''),
(2, NULL, '23-02-2016 12:36', NULL, '', ''),
(3, NULL, '23-02-2016 12:37', NULL, '127.0.0.1', ''),
(4, NULL, '23-02-2016 12:40', NULL, '127.0.0.1', ''),
(5, NULL, '23-02-2016 12:40', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(6, NULL, '23-02-2016 12:40', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(7, NULL, '23-02-2016 12:40', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(8, NULL, '23-02-2016 12:41', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(9, 0, '23-02-2016 12:41', 'unknow', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(10, 0, '23-02-2016 12:42', 'unknow', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(11, 0, '23-02-2016 12:42', 'unknow', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(12, NULL, '23-02-2016 12:46', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(13, NULL, '23-02-2016 12:46', NULL, '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(14, 1, '23-02-2016 12:47', 'olivier.colombies@gmail.com', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(15, 1, '23-02-2016 12:47', 'olivier.colombies@gmail.com', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(16, 1, '23-02-2016 12:47', 'olivier.colombies@gmail.com', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/insert_log.php'),
(17, 1, '26-02-2016 19:23', 'clement.guiol@gmail.com', '127.0.0.1', 'http://127.0.0.1/mooc_v2/_model/login.php');

-- --------------------------------------------------------

--
-- Structure de la table `mooc`
--

CREATE TABLE IF NOT EXISTS `mooc` (
  `id_mooc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mooc` varchar(100) DEFAULT NULL,
  `matiere` varchar(100) DEFAULT NULL,
  `description` varchar(8000) DEFAULT NULL,
  `prerequis` varchar(100) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `nb_chap` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mooc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `mooc`
--

INSERT INTO `mooc` (`id_mooc`, `nom_mooc`, `matiere`, `description`, `prerequis`, `duree`, `note`, `nb_chap`) VALUES
(1, 'CV Ingénieur ISEN', 'FHES', 'Ce MOOC vous permettra de connaitre les codes pour la réalisation d''un CV pour un ingénieur, et plus particulièrement un ingénieur informatique.', 'Aucun', 35, 4, 7),
(2, 'Physique des solides', 'Physique quantique', 'Ce cours portera sur la physique des solides ', 'Aucun', 20, 5, 5),
(3, 'Initiation au SHELL', 'Informatique ', 'Ce cours vous permettra d''acquérir les bases du langage SHELL', 'Aucun', 20, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

CREATE TABLE IF NOT EXISTS `qcm` (
  `id_qcm` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(8000) DEFAULT NULL,
  `reponse_qcm` varchar(8000) DEFAULT NULL,
  `solution` varchar(8000) DEFAULT NULL,
  `indice_qcm` varchar(8000) DEFAULT NULL,
  `id_exercice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_qcm`),
  KEY `FK_qcm_id_exercice` (`id_exercice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `succes`
--

CREATE TABLE IF NOT EXISTS `succes` (
  `id_succes` int(11) NOT NULL AUTO_INCREMENT,
  `nom_succes` varchar(100) DEFAULT NULL,
  `description_succes` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`id_succes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `succes`
--

INSERT INTO `succes` (`id_succes`, `nom_succes`, `description_succes`) VALUES
(1, 'Premier pas', 'Inscrivez vous à un MOOC'),
(2, 'Mon premier MOOC', 'Terminer un MOOC'),
(3, 'Nouvelle identité', 'Changer votre pseudo');

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE IF NOT EXISTS `suivre` (
  `date_suivi` date DEFAULT NULL,
  `avancement` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_mooc` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_mooc`),
  KEY `FK_suivre_id_mooc` (`id_mooc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `suivre`
--

INSERT INTO `suivre` (`date_suivi`, `avancement`, `id_user`, `id_mooc`) VALUES
('2016-02-26', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `professeur` int(11) DEFAULT NULL,
  `reset_password` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `pseudo`, `email`, `password`, `pays`, `statut`, `grade`, `professeur`, `reset_password`) VALUES
(1, 'Guiol', 'Clémenteeeeeee', 'CleMenTus', 'clement.guiol@gmail.com', '56eacb300613db3e0f6aaf821db223c0', 'FR', 0, 0, 0, NULL),
(2, 'Rolland', 'Jean-Michel', 'JMR', 'jean-michel.rolland@isen.fr', '56eacb300613db3e0f6aaf821db223c0', 'FR', 0, 0, 1, NULL),
(3, 'Bescond', 'Marc', 'MB', 'marc.bescond@isen.fr', '56eacb300613db3e0f6aaf821db223c0', 'FR', 0, 0, 1, NULL),
(4, 'Patrone', 'Lionel', 'LP', 'lionel.patrone@isen.fr', '56eacb300613db3e0f6aaf821db223c0', 'FR', 0, 0, 1, NULL),
(5, 'Perony', 'Christine', 'CP', 'christone.perony@isen.fr', '56eacb300613db3e0f6aaf821db223c0', 'FR', 0, 0, 1, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `FK_chapitre_id_mooc` FOREIGN KEY (`id_mooc`) REFERENCES `mooc` (`id_mooc`);

--
-- Contraintes pour la table `creer`
--
ALTER TABLE `creer`
  ADD CONSTRAINT `FK_creer_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `FK_creer_id_mooc` FOREIGN KEY (`id_mooc`) REFERENCES `mooc` (`id_mooc`);

--
-- Contraintes pour la table `debloquer`
--
ALTER TABLE `debloquer`
  ADD CONSTRAINT `FK_debloquer_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `FK_debloquer_id_succes` FOREIGN KEY (`id_succes`) REFERENCES `succes` (`id_succes`);

--
-- Contraintes pour la table `dragdrop`
--
ALTER TABLE `dragdrop`
  ADD CONSTRAINT `FK_dragdrop_id_exercice` FOREIGN KEY (`id_exercice`) REFERENCES `exercice` (`id_exercice`);

--
-- Contraintes pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD CONSTRAINT `FK_exercice_id_chapitre` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`);

--
-- Contraintes pour la table `faire`
--
ALTER TABLE `faire`
  ADD CONSTRAINT `FK_faire_id_exercice` FOREIGN KEY (`id_exercice`) REFERENCES `exercice` (`id_exercice`),
  ADD CONSTRAINT `FK_faire_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD CONSTRAINT `FK_qcm_id_exercice` FOREIGN KEY (`id_exercice`) REFERENCES `exercice` (`id_exercice`);

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `FK_suivre_id_mooc` FOREIGN KEY (`id_mooc`) REFERENCES `mooc` (`id_mooc`),
  ADD CONSTRAINT `FK_suivre_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
