-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 14 jan. 2018 à 21:20
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteur/actionneur`
--

INSERT INTO `capteur/actionneur` (`id_Capteur/actionneur`, `capteur/actionneur_numero`, `capteur/actionneur_type`, `capteur/actionneur_fonction`, `Cemac_idCemac`) VALUES
(2, 1, 'Capteur', 'Température', 2),
(4, NULL, 'Lumière', 'Lumière', 6),
(5, NULL, 'Volets', 'Volets', 6),
(6, NULL, 'Température', 'Température', 6),
(7, NULL, 'Température', 'Température', 5),
(8, NULL, 'Lumière', 'Lumière', 5),
(9, NULL, 'Capteur', 'Humidité', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`id_Cemac`, `cemac_nom`, `Piece_idPiece`) VALUES
(2, 'cemac_chambre', 3),
(3, 'cemac cuisine', 64),
(4, 'cemac garage', 64),
(5, 'cemac cuisine', 67),
(6, 'cemac chambre de clarisse', 68);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `donnees`
--

INSERT INTO `donnees` (`id_Donnees`, `donnees_temps`, `donnees_valeur`, `Capteur/actionneur_idCapteur/actionneur`, `Capteur/actionneur_Cemac_idCemac`) VALUES
(2, 5, '27.00', 2, 2),
(3, 10, '25.00', 2, 2),
(4, 20, '20.00', 7, 5),
(5, 25, '35.00', 7, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_Logement`, `logement_adresse`, `logement_codePostal`, `logement_ville`, `logement_pays`, `id_Utilisateur`) VALUES
(45, '18 avenue de la porte des poissonniers', '75018', 'Paris', 'France', 78),
(46, '18 avenue de la porte des poissonniers', '75018', 'Paris', 'France', 79),
(47, '55 rue vavin', '75000', 'Paris', 'France', 80),
(48, '18 avenue de la porte des poissonniers', '75018', 'Paris', 'France', 80),
(49, '54 rue trghri', '65388', 'eihwfi', 'France', 80),
(50, 'hi', 'hi', 'hi', 'gi', 78),
(51, 'hi', 'hi', 'hi', 'hi', 78),
(52, 'hi', 'hi', 'hi', 'hi', 78);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panne`
--

INSERT INTO `panne` (`id_Panne`, `panne_date`, `panne_type`, `Capteur/actionneur_idCapteur/actionneur`, `Capteur/actionneur_Cemac_idCemac`) VALUES
(1, '2017-12-11', 'Mauvais capteur', 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_Piece`, `piece_nom`, `Logement_idLogement`, `Logement_Utilisateur_idUtilisateur`, `piece_type`) VALUES
(3, 'chambre', 46, 79, 'Chambre'),
(5, 'Chambre', 45, 78, 'Chambre'),
(6, 'Bureau', 45, 78, 'Bureau'),
(7, 'Bureau', 45, 78, 'Bureau'),
(8, 'Salle de Bain', 45, 78, 'Salle de Bain'),
(9, 'Chambre', 45, 78, 'Chambre'),
(10, 'Garage', 45, 78, 'Garage'),
(11, 'Chambre', 45, 78, 'Chambre'),
(12, 'Toilettes', 45, 78, 'Toilettes'),
(13, 'Garage', 45, 78, 'Garage'),
(14, 'Chambre', 45, 78, 'Chambre'),
(18, 'Bureau', 47, 80, 'Bureau'),
(37, 'Cuisine', 47, 80, 'Cuisine'),
(38, 'Garage', 47, 80, 'Garage'),
(39, 'Toilettes', 47, 80, 'Toilettes'),
(40, 'Chambre', 47, 80, 'Chambre'),
(41, 'Garage', 47, 80, 'Garage'),
(42, 'Garage', 47, 80, 'Garage'),
(43, 'Garage', 47, 80, 'Garage'),
(44, 'Garage', 47, 80, 'Garage'),
(45, 'Garage', 47, 80, 'Garage'),
(46, 'Garage', 47, 80, 'Garage'),
(47, 'Garage', 47, 80, 'Garage'),
(48, 'Garage', 48, 80, 'Garage'),
(49, 'Chambre', 48, 80, 'Chambre'),
(50, 'Cuisine', 48, 80, 'Cuisine'),
(51, 'Salle De Bain', 49, 80, 'Salle de Bain'),
(52, 'Garage', 48, 80, 'Garage'),
(53, 'Chambre', 48, 80, 'Chambre'),
(54, 'Salon', 49, 80, 'Salon'),
(55, 'Cuisine', 49, 80, 'Cuisine'),
(56, 'Garage', 50, 78, 'Garage'),
(57, 'Garage', 50, 78, 'Garage'),
(58, 'Salon', 50, 78, 'Salon'),
(59, 'Chambre', 50, 78, 'Chambre'),
(60, 'Salon', 45, 78, 'Salon'),
(61, 'Cuisine', 50, 78, 'Cuisine'),
(62, 'Chambre de Raquel', 45, 78, 'Chambre'),
(63, 'Salle de cinéma', 45, 78, 'autre'),
(64, 'Chambre de Raquel', 51, 78, 'Chambre'),
(65, 'Cuisine', 51, 78, 'Cuisine'),
(66, 'Garage', 51, 78, 'Garage'),
(67, 'Cuisine', 51, 78, 'Cuisine'),
(68, 'Chambre de Clarisse', 51, 78, 'Chambre');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `scenario`
--

INSERT INTO `scenario` (`id_Scenario`, `idCapteur/actionneur`, `scenario_dateDebut`, `scenario_dateFin`, `scenario_valeur`) VALUES
(1, 2, '2017-12-21', '2017-12-30', '1.00');

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

--
-- Déchargement des données de la table `scenario_has_capteur/actionneur`
--

INSERT INTO `scenario_has_capteur/actionneur` (`Scenario_idScenario`, `Capteur/actionneur_idCapteur/actionneur`, `Capteur/actionneur_Cemac_idCemac`) VALUES
(1, 2, 2);

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
  PRIMARY KEY (`id_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_Utilisateur`, `utilisateur_type`, `utilisateur_nom`, `utilisateur_prenom`, `utilisateur_mail`, `utilisateur_login`, `utilisateur_motDePasse`, `utilisateur_dateDeNaissance`) VALUES
(78, 'particulier', 'De Faria Cristas', 'Raquel', 'racheldf19@gmail.com', 'raqueldf', '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', '1997-08-19'),
(79, 'particulier', 'De Faria Cristas', 'Raquel', 'racheldf19@yahoo.com', 'raquel', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', '1997-08-19'),
(80, 'particulier', 'hi', 'hi', 'hi@gmail.com', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '1997-08-19');

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
