-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 04 Février 2016 à 22:51
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
-- Structure de la table `avancement`
--

CREATE TABLE IF NOT EXISTS `avancement` (
  `id_avancement` int(11) NOT NULL AUTO_INCREMENT,
  `numero_chap` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avancement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE IF NOT EXISTS `chapitre` (
  `id_chapitre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `id_mooc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_chapitre`),
  KEY `FK_chapitre_id_mooc` (`id_mooc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `chapitre`
--

INSERT INTO `chapitre` (`id_chapitre`, `nom`, `id_mooc`) VALUES
(1, 'Identité', 1);

-- --------------------------------------------------------

--
-- Structure de la table `creer`
--

CREATE TABLE IF NOT EXISTS `creer` (
  `date_creation` datetime DEFAULT NULL,
  `id_enseignant` int(11) NOT NULL,
  `id_mooc` int(11) NOT NULL,
  PRIMARY KEY (`id_enseignant`,`id_mooc`),
  KEY `FK_creer_id_mooc` (`id_mooc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `creer`
--

INSERT INTO `creer` (`date_creation`, `id_enseignant`, `id_mooc`) VALUES
('2016-02-01 00:00:00', 1, 1),
('2016-02-01 00:00:00', 2, 2),
('2016-02-01 00:00:00', 3, 3),
('2016-02-01 00:00:00', 4, 3),
('2016-02-02 00:00:00', 5, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `drag`
--

CREATE TABLE IF NOT EXISTS `drag` (
  `id_drag` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(25) DEFAULT NULL,
  `texte` varchar(25) DEFAULT NULL,
  `indice` varchar(25) DEFAULT NULL,
  `id_exercice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_drag`),
  KEY `FK_drag_id_exercice` (`id_exercice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `id_enseignant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_enseignant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom`, `prenom`, `mail`) VALUES
(1, 'Rolland', 'Jean Michel', 'jean-michel.rolland@isen.'),
(2, 'Patrone', 'Lionel', 'lionel.patrone@isen.fr'),
(3, 'Peronny', 'Christine', 'christine.peronny@isen.fr'),
(4, 'Duquenoy', 'Willy', 'willy.duquenoy@isen.fr'),
(5, 'Bescond', 'Marc', 'marc.bescond@isen.fr');

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

CREATE TABLE IF NOT EXISTS `exercice` (
  `id_exercice` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `valeur_exo` int(11) DEFAULT NULL,
  `id_chapitre` int(11) DEFAULT NULL,
  `id_drag` int(11) DEFAULT NULL,
  `id_qcm` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_exercice`),
  KEY `FK_exercice_id_chapitre` (`id_chapitre`),
  KEY `FK_exercice_id_drag` (`id_drag`),
  KEY `FK_exercice_id_qcm` (`id_qcm`),
  KEY `FK_exercice_id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `mooc`
--

CREATE TABLE IF NOT EXISTS `mooc` (
  `id_mooc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `matiere` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `prerequis` varchar(25) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `nb_chap` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mooc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `mooc`
--

INSERT INTO `mooc` (`id_mooc`, `nom`, `matiere`, `description`, `prerequis`, `duree`, `note`, `nb_chap`) VALUES
(1, 'CV Ingénieur ISEN', 'FHES', 'Ce MOOC vous permettra de connaitre les codes pour la réalisation d''un CV pour un ingénieur, et plus particulièrement un ingénieur informatique.\n\n', 'Aucun', 35, 4, 7),
(2, 'Physique des solides', 'Physique Quantique', 'Ce cours portera sur la physique des solides ', 'Aucun', 20, 5, 5),
(3, 'Initiation au SHELL', 'Informatique ', 'Ce cours vous permettra d''acquérir les bases du langage SHELL', 'Aucun', 20, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE IF NOT EXISTS `posseder` (
  `id_mooc` int(11) NOT NULL,
  `id_avancement` int(11) NOT NULL,
  PRIMARY KEY (`id_mooc`,`id_avancement`),
  KEY `FK_posseder_id_avancement` (`id_avancement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

CREATE TABLE IF NOT EXISTS `qcm` (
  `id_qcm` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(25) DEFAULT NULL,
  `reponse` varchar(25) DEFAULT NULL,
  `solution` varchar(25) DEFAULT NULL,
  `indice` varchar(25) DEFAULT NULL,
  `id_exercice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_qcm`),
  KEY `FK_qcm_id_exercice` (`id_exercice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `succes`
--

CREATE TABLE IF NOT EXISTS `succes` (
  `id_succes` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_succes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE IF NOT EXISTS `suivre` (
  `id_user` int(11) NOT NULL,
  `id_mooc` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_mooc`),
  KEY `FK_suivre_id_mooc` (`id_mooc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `pseudo` varchar(35) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `statut` varchar(150) DEFAULT NULL,
  `reset_password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `pseudo`, `email`, `password`, `ville`, `grade`, `statut`, `reset_password`) VALUES
(17, 'Colombies', 'Olivier', 'dsfsdfsdf', 'olivier.colombies@gmail.com', '560f6c297fa06fcddb6bf4cdcb801554', 'FR', 1, NULL, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `FK_chapitre_id_mooc` FOREIGN KEY (`id_mooc`) REFERENCES `mooc` (`id_mooc`) ON DELETE CASCADE;

--
-- Contraintes pour la table `creer`
--
ALTER TABLE `creer`
  ADD CONSTRAINT `FK_creer_id_enseignant` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_creer_id_mooc` FOREIGN KEY (`id_mooc`) REFERENCES `mooc` (`id_mooc`) ON DELETE CASCADE;

--
-- Contraintes pour la table `debloquer`
--
ALTER TABLE `debloquer`
  ADD CONSTRAINT `FK_debloquer_id_succes` FOREIGN KEY (`id_succes`) REFERENCES `succes` (`id_succes`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_debloquer_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `drag`
--
ALTER TABLE `drag`
  ADD CONSTRAINT `FK_drag_id_exercice` FOREIGN KEY (`id_exercice`) REFERENCES `exercice` (`id_exercice`) ON DELETE CASCADE;

--
-- Contraintes pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD CONSTRAINT `FK_exercice_id_chapitre` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_exercice_id_drag` FOREIGN KEY (`id_drag`) REFERENCES `drag` (`id_drag`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_exercice_id_qcm` FOREIGN KEY (`id_qcm`) REFERENCES `qcm` (`id_qcm`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_exercice_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `FK_posseder_id_avancement` FOREIGN KEY (`id_avancement`) REFERENCES `avancement` (`id_avancement`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_posseder_id_mooc` FOREIGN KEY (`id_mooc`) REFERENCES `mooc` (`id_mooc`) ON DELETE CASCADE;

--
-- Contraintes pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD CONSTRAINT `FK_qcm_id_exercice` FOREIGN KEY (`id_exercice`) REFERENCES `exercice` (`id_exercice`) ON DELETE CASCADE;

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `FK_suivre_id_mooc` FOREIGN KEY (`id_mooc`) REFERENCES `mooc` (`id_mooc`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_suivre_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
