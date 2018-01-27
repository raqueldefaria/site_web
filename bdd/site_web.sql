-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 27 jan. 2018 à 17:39
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur/actionneur`
--

DROP TABLE IF EXISTS `capteur/actionneur`;
CREATE TABLE IF NOT EXISTS `capteur/actionneur` (
  `id_Capteur/actionneur` int(11) NOT NULL AUTO_INCREMENT,
  `capteur/actionneur_numero` int(11) DEFAULT NULL,
  `capteur/actionneur_type` varchar(255) DEFAULT NULL,
  `capteur/actionneur_fonction` varchar(255) DEFAULT NULL,
  `Cemac_idCemac` int(11) NOT NULL,
  PRIMARY KEY (`id_Capteur/actionneur`,`Cemac_idCemac`),
  KEY `fk_Capteur/actionneur_Cemac1_idx` (`Cemac_idCemac`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteur/actionneur`
--

INSERT INTO `capteur/actionneur` (`id_Capteur/actionneur`, `capteur/actionneur_numero`, `capteur/actionneur_type`, `capteur/actionneur_fonction`, `Cemac_idCemac`) VALUES
(1, NULL, 'Capteur', 'Lumière', 6),
(2, NULL, 'Capteur', 'Température', 6),
(3, NULL, 'Actionneur', 'Volets', 7),
(4, NULL, 'Capteur', 'Lumière', 6),
(5, NULL, 'Capteur', 'Lumière', 6),
(6, NULL, 'Actionneur', 'Volets', 6),
(11, NULL, 'Capteur', 'Lumière', 9),
(12, NULL, 'Actionneur', 'Volets', 9);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

DROP TABLE IF EXISTS `cemac`;
CREATE TABLE IF NOT EXISTS `cemac` (
  `id_Cemac` int(11) NOT NULL AUTO_INCREMENT,
  `cemac_nom` varchar(255) DEFAULT NULL,
  `Piece_idPiece` int(11) NOT NULL,
  PRIMARY KEY (`id_Cemac`,`Piece_idPiece`),
  KEY `fk_Cemac_Piece1_idx` (`Piece_idPiece`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`id_Cemac`, `cemac_nom`, `Piece_idPiece`) VALUES
(6, '00:0C:F1:56:98:AD', 14),
(7, '00:0C:F1:56:98:AE', 15),
(9, '00:0C:F1:56:98:AA', 17);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_Commande` int(11) NOT NULL AUTO_INCREMENT,
  `commande_date` date DEFAULT NULL,
  `Utilisateur_idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_Commande`,`Utilisateur_idUtilisateur`),
  KEY `fk_Commande_Utilisateur_idx` (`Utilisateur_idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE IF NOT EXISTS `commander` (
  `id_Commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_Capteur/actionneur` int(11) DEFAULT NULL,
  `commander_quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande_has_typecapteur/actionneur`
--

DROP TABLE IF EXISTS `commande_has_typecapteur/actionneur`;
CREATE TABLE IF NOT EXISTS `commande_has_typecapteur/actionneur` (
  `Commande_idCommande` int(11) NOT NULL,
  `Commande_Utilisateur_idUtilisateur` int(11) NOT NULL,
  `typeCapteur/actionneur_idCapteur/actionneur` int(11) NOT NULL,
  `Commander_idCommande` int(11) NOT NULL,
  PRIMARY KEY (`Commande_idCommande`,`Commande_Utilisateur_idUtilisateur`,`typeCapteur/actionneur_idCapteur/actionneur`),
  KEY `fk_Commande_has_typeCapteur/actionneur_typeCapteur/actionne_idx` (`typeCapteur/actionneur_idCapteur/actionneur`),
  KEY `fk_Commande_has_typeCapteur/actionneur_Commande1_idx` (`Commande_idCommande`,`Commande_Utilisateur_idUtilisateur`),
  KEY `fk_Commande_has_typeCapteur/actionneur_Commander1_idx` (`Commander_idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

DROP TABLE IF EXISTS `donnees`;
CREATE TABLE IF NOT EXISTS `donnees` (
  `id_Donnees` int(11) NOT NULL AUTO_INCREMENT,
  `donnees_temps` int(11) DEFAULT NULL,
  `donnees_valeur` decimal(6,2) DEFAULT NULL,
  `Capteur/actionneur_idCapteur/actionneur` int(11) NOT NULL,
  `Capteur/actionneur_Cemac_idCemac` int(11) NOT NULL,
  PRIMARY KEY (`id_Donnees`,`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`),
  KEY `fk_Donnees_Capteur/actionneur1_idx` (`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `donnees`
--

INSERT INTO `donnees` (`id_Donnees`, `donnees_temps`, `donnees_valeur`, `Capteur/actionneur_idCapteur/actionneur`, `Capteur/actionneur_Cemac_idCemac`) VALUES
(1, 1, '2.00', 1, 6),
(2, 2, '4.00', 2, 6),
(3, 50, '54.00', 4, 6),
(4, 5, '7.00', 1, 6),
(5, 10, '3.00', 2, 6),
(6, 25, '7.00', 4, 6),
(7, 10, '5.00', 1, 6),
(8, 15, '10.00', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id_FAQ` int(11) NOT NULL AUTO_INCREMENT,
  `faq_question` varchar(255) DEFAULT NULL,
  `faq_reponse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_FAQ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `id_Logement` int(11) NOT NULL AUTO_INCREMENT,
  `logement_adresse` varchar(255) DEFAULT NULL,
  `logement_codePostal` varchar(255) DEFAULT NULL,
  `logement_ville` varchar(255) DEFAULT NULL,
  `logement_pays` varchar(255) DEFAULT NULL,
  `id_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_Logement`,`id_Utilisateur`),
  KEY `fk_Logement_Utilisateur1_idx` (`id_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_Logement`, `logement_adresse`, `logement_codePostal`, `logement_ville`, `logement_pays`, `id_Utilisateur`) VALUES
(67, '18 avenue de la porte des poissonniers', '75018', 'Paris', 'France', 91),
(68, '18 avenue de la porte des poissonniers', '75018', 'Paris', 'France', 92),
(69, 'hi', 'hi', 'hi', 'hi', 93),
(70, 'ho', 'ho', 'ho', 'ho', 93),
(71, 'a', 'a', 'a', 'a', 94),
(74, 'hi', 'hi', 'hi', 'hi', 93),
(75, 'hi', 'hi', 'hi', 'hi', 93),
(78, 'a', 'a', 'a', 'a', 94),
(79, 'h', 'h', 'h', 'h', 92),
(82, NULL, 'hi', 'hi', 'hi', 96),
(83, NULL, 'hi', 'hi', 'hi', 91),
(84, NULL, 'hi', 'hi', 'hi', 91);

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

DROP TABLE IF EXISTS `panne`;
CREATE TABLE IF NOT EXISTS `panne` (
  `id_Panne` int(11) NOT NULL AUTO_INCREMENT,
  `panne_date` date DEFAULT NULL,
  `panne_type` varchar(255) NOT NULL,
  `Capteur/actionneur_idCapteur/actionneur` int(11) NOT NULL,
  `Capteur/actionneur_Cemac_idCemac` int(11) NOT NULL,
  PRIMARY KEY (`id_Panne`,`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`),
  KEY `fk_Panne_Capteur/actionneur1_idx` (`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panne`
--

INSERT INTO `panne` (`id_Panne`, `panne_date`, `panne_type`, `Capteur/actionneur_idCapteur/actionneur`, `Capteur/actionneur_Cemac_idCemac`) VALUES
(1, '2018-01-17', 'Arret', 12, 9),
(2, '2018-01-18', 'Arret', 12, 9),
(3, '2018-01-17', 'Arret', 12, 9);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id_Piece` int(11) NOT NULL AUTO_INCREMENT,
  `piece_nom` varchar(255) DEFAULT NULL,
  `Logement_idLogement` int(11) NOT NULL,
  `Logement_Utilisateur_idUtilisateur` int(11) NOT NULL,
  `piece_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_Piece`,`Logement_idLogement`,`Logement_Utilisateur_idUtilisateur`),
  KEY `fk_Piece_Logement1_idx` (`Logement_idLogement`,`Logement_Utilisateur_idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_Piece`, `piece_nom`, `Logement_idLogement`, `Logement_Utilisateur_idUtilisateur`, `piece_type`) VALUES
(1, 'Garage', 68, 92, 'Garage'),
(2, 'Bureau', 68, 92, 'Bureau'),
(6, 'Garage', 69, 93, 'Garage'),
(9, 'Garage', 71, 94, 'Garage'),
(13, 'Salle de bain', 69, 93, 'Salle De Bain'),
(14, 'Garage', 67, 91, 'Garage'),
(15, 'Chambre', 68, 92, 'Chambre'),
(17, 'Cuisine', 67, 91, 'Cuisine');

-- --------------------------------------------------------

--
-- Structure de la table `scenario`
--

DROP TABLE IF EXISTS `scenario`;
CREATE TABLE IF NOT EXISTS `scenario` (
  `id_Scenario` int(11) NOT NULL AUTO_INCREMENT,
  `idCapteur/actionneur` int(11) DEFAULT NULL,
  `scenario_dateDebut` date DEFAULT NULL,
  `scenario_dateFin` date DEFAULT NULL,
  `scenario_valeur` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id_Scenario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `scenario_has_capteur/actionneur`
--

DROP TABLE IF EXISTS `scenario_has_capteur/actionneur`;
CREATE TABLE IF NOT EXISTS `scenario_has_capteur/actionneur` (
  `Scenario_idScenario` int(11) NOT NULL,
  `Capteur/actionneur_idCapteur/actionneur` int(11) NOT NULL,
  `Capteur/actionneur_Cemac_idCemac` int(11) NOT NULL,
  PRIMARY KEY (`Scenario_idScenario`,`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`),
  KEY `fk_Scenario_has_Capteur/actionneur_Capteur/actionneur1_idx` (`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`),
  KEY `fk_Scenario_has_Capteur/actionneur_Scenario1_idx` (`Scenario_idScenario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typecapteur/actionneur`
--

DROP TABLE IF EXISTS `typecapteur/actionneur`;
CREATE TABLE IF NOT EXISTS `typecapteur/actionneur` (
  `id_Capteur/actionneur` int(11) NOT NULL AUTO_INCREMENT,
  `capteur/actionneur_fonction` varchar(255) DEFAULT NULL,
  `capteur/actionneur_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Capteur/actionneur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_type` varchar(255) DEFAULT NULL,
  `utilisateur_nom` varchar(255) DEFAULT NULL,
  `utilisateur_prenom` varchar(255) DEFAULT NULL,
  `utilisateur_mail` varchar(255) DEFAULT NULL,
  `utilisateur_login` varchar(255) DEFAULT NULL,
  `utilisateur_motDePasse` varchar(255) DEFAULT NULL,
  `utilisateur_dateDeNaissance` date DEFAULT NULL,
  `tok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_Utilisateur`, `utilisateur_type`, `utilisateur_nom`, `utilisateur_prenom`, `utilisateur_mail`, `utilisateur_login`, `utilisateur_motDePasse`, `utilisateur_dateDeNaissance`, `tok`) VALUES
(91, 'particulier', 'mvc', 'mvc', 'racheldf19@gmail.com', 'mvc', '484c7e7e748dd6c6f6fbf66b8ffa8e7c6c3a403a', '1997-08-19', 1113),
(92, 'particulier', 'test', 'test', 'test@gmail.com', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '1997-01-19', NULL),
(93, 'particulier', 'hi', 'hi', 'hi@gmail.com', 'hi', 'c22b5f9178342609428d6f51b2c5af4c0bde6a42', '1111-11-11', NULL),
(94, 'particulier', 'ho', 'ho', 'ho@gmail.com', 'ho', '9a76a857ad399b492ba01879d0fa2d717e4430b2', '1997-08-19', NULL),
(96, 'particulier', 'test', 'test', 'racheldf19@outlook.com', 'test1', 'b444ac06613fc8d63795be9ad0beaf55011936ac', '1997-08-19', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `capteur/actionneur`
--
ALTER TABLE `capteur/actionneur`
  ADD CONSTRAINT `fk_Capteur/actionneur_Cemac1` FOREIGN KEY (`Cemac_idCemac`) REFERENCES `cemac` (`id_Cemac`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cemac`
--
ALTER TABLE `cemac`
  ADD CONSTRAINT `fk_Cemac_Piece1` FOREIGN KEY (`Piece_idPiece`) REFERENCES `piece` (`id_Piece`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_Commande_Utilisateur` FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande_has_typecapteur/actionneur`
--
ALTER TABLE `commande_has_typecapteur/actionneur`
  ADD CONSTRAINT `fk_Commande_has_typeCapteur/actionneur_Commande1` FOREIGN KEY (`Commande_idCommande`,`Commande_Utilisateur_idUtilisateur`) REFERENCES `commande` (`id_Commande`, `Utilisateur_idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_has_typeCapteur/actionneur_Commander1` FOREIGN KEY (`Commander_idCommande`) REFERENCES `commander` (`id_Commande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_has_typeCapteur/actionneur_typeCapteur/actionneur1` FOREIGN KEY (`typeCapteur/actionneur_idCapteur/actionneur`) REFERENCES `typecapteur/actionneur` (`id_Capteur/actionneur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `donnees`
--
ALTER TABLE `donnees`
  ADD CONSTRAINT `fk_Donnees_Capteur/actionneur1` FOREIGN KEY (`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`) REFERENCES `capteur/actionneur` (`id_Capteur/actionneur`, `Cemac_idCemac`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `fk_Logement_Utilisateur1` FOREIGN KEY (`id_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `panne`
--
ALTER TABLE `panne`
  ADD CONSTRAINT `fk_Panne_Capteur/actionneur1` FOREIGN KEY (`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`) REFERENCES `capteur/actionneur` (`id_Capteur/actionneur`, `Cemac_idCemac`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `fk_Piece_Logement1` FOREIGN KEY (`Logement_idLogement`,`Logement_Utilisateur_idUtilisateur`) REFERENCES `logement` (`id_Logement`, `id_Utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `scenario_has_capteur/actionneur`
--
ALTER TABLE `scenario_has_capteur/actionneur`
  ADD CONSTRAINT `fk_Scenario_has_Capteur/actionneur_Capteur/actionneur1` FOREIGN KEY (`Capteur/actionneur_idCapteur/actionneur`,`Capteur/actionneur_Cemac_idCemac`) REFERENCES `capteur/actionneur` (`id_Capteur/actionneur`, `Cemac_idCemac`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Scenario_has_Capteur/actionneur_Scenario1` FOREIGN KEY (`Scenario_idScenario`) REFERENCES `scenario` (`id_Scenario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
