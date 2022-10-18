-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 08:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leboncoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_Annonce` int(11) NOT NULL,
  `nom_annonce` varchar(45) DEFAULT NULL,
  `detail` longtext DEFAULT NULL,
  `date_ajout` timestamp NULL DEFAULT current_timestamp(),
  `USER_id_user` int(11) NOT NULL,
  `categorie_id_categorie` int(11) NOT NULL,
  `photo_url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Automobile'),
(2, 'Cuisine'),
(3, 'électromenager'),
(4, 'Meuble');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `detail` varchar(45) DEFAULT NULL,
  `Annonce_id_Annonce` int(11) NOT NULL,
  `USER_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(45) DEFAULT NULL,
  `mail_user` varchar(45) DEFAULT NULL,
  `mot_de_passe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `mail_user`, `mot_de_passe`) VALUES
(1, 'rayane jerbi', 'rayane.jerbi@yahoo.fr', '0188aa1d5e22918b81950c236f8305fd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_Annonce`,`USER_id_user`,`categorie_id_categorie`),
  ADD UNIQUE KEY `id_Annonce_UNIQUE` (`id_Annonce`),
  ADD KEY `fk_Annonce_USER1_idx` (`USER_id_user`),
  ADD KEY `fk_Annonce_categorie1_idx` (`categorie_id_categorie`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`,`Annonce_id_Annonce`,`USER_id_user`),
  ADD UNIQUE KEY `Annonce_id_Annonce_UNIQUE` (`Annonce_id_Annonce`),
  ADD KEY `fk_message_Annonce_idx` (`Annonce_id_Annonce`),
  ADD KEY `fk_message_USER1_idx` (`USER_id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user_UNIQUE` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_Annonce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `fk_Annonce_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_Annonce_categorie1` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_Annonce` FOREIGN KEY (`Annonce_id_Annonce`) REFERENCES `annonce` (`id_Annonce`),
  ADD CONSTRAINT `fk_message_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
