-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 oct. 2022 à 21:21
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_Annonce`, `nom_annonce`, `prix`, `detail`, `date_ajout`, `USER_id_user`, `categorie_id_categorie`, `Media`) VALUES
(1, 'acer nitro', 999, 'acer nitro core i5', '2022-10-10', 9, 2, 'https://m.media-amazon.com/images/I/81kBKMPObLL._AC_SX679_.jpg'),
(2, 'Mercedes Classe g', 135000, 'Mercedes g', '2022-10-25', 6, 1, 'https://www.viinz.com/wp-content/uploads/2021/07/essai-mercedes-amg-g-63-exterieur-71-1170x780.jpg'),
(4, 'samsung', 999, 'Samsung z flip', '2022-10-23', 9, 3, 'https://www.01net.com/app/uploads/2022/09/test-samsung-galaxy-z-flip-4.jpg'),
(5, 'Iphone 14 ', 1500, 'iphone 14 pro max 120 go', '2022-10-25', 6, 3, 'https://bsimg.nl/images/apple-iphone-14-pro-max-1tb-goud_1.jpg/oODZEVQd37gskmMWvNK7JCGdBbU%3D/fit-in/771x1200/filters%3Aformat%28webp%29%3Aupscale%28%29'),
(6, 'Manteaux', 70, 'Manteaux Zara femme', '2022-10-25', 9, 4, 'https://static.zara.net/photos///2022/I/0/1/p/8496/298/704/2/w/316/8496298704_2_5_1.jpg?ts=1664440600485'),
(7, 'l\'art de la guerre', 10, 'L’Art de la guerre (chinois simplifié : 孙子兵法 ', '2022-10-25', 6, 1, 'https://static.fnac-static.com/multimedia/Images/FR/NR/fe/cc/03/249086/1507-1/tsp20210624144440/L-Art-de-la-guerre.jpg'),
(8, 'Audi', 0, 'Voiture neuve kilometrage bas', '2022-10-25', 6, 1, 'https://www.ouestfrance-auto.com/p/yahooto/2078973_ZJLTAREN_1_d8163d13979edca62aa494f4cebfab0911e5e788_crop_180-140_.jpg'),
(9, 'Chivas Regal', 30, 'Chivas Regal 18 ans', '2022-10-25', 9, 1, 'https://www.lilovino.com/3646-large_default/spiritueux-chivas-regal-18-ans-40.jpg'),
(10, 'Cargo', 12, 'Pantalon cargo Zalando', '2022-10-25', 9, 1, 'https://cdn.shopify.com/s/files/1/0513/8782/6345/products/pantalon-cargo-homme-streetwear-967.jpg?v=1619094590');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Voiture'),
(2, 'ordinateur'),
(3, 'telephone'),
(4, 'Vetement'),
(5, 'Livre'),
(6, 'Boisson'),
(7, 'Outils'),
(8, 'Non listé');

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE IF NOT EXISTS `like` (
  `like` int DEFAULT '1',
  `Annonce_id_Annonce` int NOT NULL,
  `USER_id_user` int NOT NULL,
  PRIMARY KEY (`Annonce_id_Annonce`,`USER_id_user`),
  KEY `fk_Like_USER1_idx` (`USER_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `like`
--

INSERT INTO `like` (`like`, `Annonce_id_Annonce`, `USER_id_user`) VALUES
(1, 1, 9),
(1, 4, 9),
(1, 5, 6);

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
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id_message`,`USER_id_user`,`Annonce_id_Annonce`,`Annonce_USER_id_user`),
  KEY `fk_message_USER1_idx` (`USER_id_user`),
  KEY `fk_message_Annonce1_idx` (`Annonce_id_Annonce`,`Annonce_USER_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `detail`, `reponse`, `USER_id_user`, `Annonce_id_Annonce`, `Annonce_USER_id_user`, `date_creation`) VALUES
(1, 'hi', 0, 6, 1, 9, '2022-10-12 10:37:18'),
(2, 'Bonjour monsieur Jordan', 1, 9, 1, 9, '2022-10-18 07:37:36'),
(3, 'je voudrais des renseignements sur les acers ', 0, 6, 1, 9, '2022-10-18 10:37:50'),
(4, 'okay je viens avec les details dans quelques ', 1, 9, 1, 9, '2022-10-22 16:38:03'),
(14, 'j\'ai suivie', 0, 9, 1, 9, '2022-10-24 17:23:42'),
(15, 'bonjour', 0, 9, 1, 9, '2022-10-24 17:24:21'),
(16, 'hey', 0, 6, 1, 9, '2022-10-24 17:24:43'),
(17, 'salut', 0, 9, 1, 9, '2022-10-24 17:25:49'),
(18, 'bonjour je peux connaitre le prix', 0, 6, 1, 9, '2022-10-24 17:47:03'),
(19, 'hey', 0, 6, 1, 9, '2022-10-25 15:58:12'),
(20, 'okay merci', 0, 9, 2, 6, '2022-10-25 16:40:32'),
(21, 'odezjozedjopze', 0, 9, 1, 9, '2022-10-25 17:06:48');

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
