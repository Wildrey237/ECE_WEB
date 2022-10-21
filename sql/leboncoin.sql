-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 21 oct. 2022 à 23:56
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leboncoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id_Annonce` int NOT NULL AUTO_INCREMENT,
  `nom_annonce` varchar(45) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `detail` varchar(45) DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  `USER_id_user` int NOT NULL,
  `categorie_id_categorie` int NOT NULL,
  `Media` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_Annonce`,`USER_id_user`,`categorie_id_categorie`),
  UNIQUE KEY `id_Annonce_UNIQUE` (`id_Annonce`),
  KEY `fk_Annonce_USER1_idx` (`USER_id_user`),
  KEY `fk_Annonce_categorie1_idx` (`categorie_id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_Annonce`, `nom_annonce`, `prix`, `detail`, `date_ajout`, `USER_id_user`, `categorie_id_categorie`, `Media`) VALUES
(1, 'acer nitro', 999, 'acer nitro core i5', '2022-10-10', 9, 2, 'acer.jpg'),
(2, 'Mercedes', 35000, 'Mercedes AMG', '2022-10-22', 6, 1, 'mercedes.png');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Voiture'),
(2, 'ordinateur'),
(3, 'telephone');

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE IF NOT EXISTS `like` (
  `Like_total` int DEFAULT NULL,
  `Annonce_id_Annonce` int NOT NULL,
  `USER_id_user` int NOT NULL,
  PRIMARY KEY (`Annonce_id_Annonce`,`USER_id_user`),
  KEY `fk_Like_USER1_idx` (`USER_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `detail` varchar(45) DEFAULT NULL,
  `reponse` int NOT NULL DEFAULT '0',
  `USER_id_user` int NOT NULL,
  `Annonce_id_Annonce` int NOT NULL,
  `Annonce_USER_id_user` int NOT NULL,
  PRIMARY KEY (`id_message`,`USER_id_user`,`Annonce_id_Annonce`,`Annonce_USER_id_user`),
  KEY `fk_message_USER1_idx` (`USER_id_user`),
  KEY `fk_message_Annonce1_idx` (`Annonce_id_Annonce`,`Annonce_USER_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `detail`, `reponse`, `USER_id_user`, `Annonce_id_Annonce`, `Annonce_USER_id_user`) VALUES
(1, 'hi', 0, 9, 1, 9),
(2, 'Bonjour monsieur Wilfried', 1, 6, 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(45) DEFAULT NULL,
  `prenom_user` varchar(45) DEFAULT NULL,
  `mail_user` varchar(45) DEFAULT NULL,
  `mot_de_passe` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user_UNIQUE` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `mail_user`, `mot_de_passe`) VALUES
(6, 'montigiani', 'jordan', 'jordan@gmail.com', 'e9dd8698f46ee082688b195ea4676152'),
(9, 'Adams', 'Phillipe', 'adams@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `fk_Annonce_categorie1` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `fk_Annonce_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `fk_Like_Annonce1` FOREIGN KEY (`Annonce_id_Annonce`) REFERENCES `annonce` (`id_Annonce`),
  ADD CONSTRAINT `fk_Like_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_Annonce1` FOREIGN KEY (`Annonce_id_Annonce`,`Annonce_USER_id_user`) REFERENCES `annonce` (`id_Annonce`, `USER_id_user`),
  ADD CONSTRAINT `fk_message_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
