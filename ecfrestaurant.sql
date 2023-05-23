-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 mai 2023 à 10:51
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecfrestaurant`
--
CREATE DATABASE IF NOT EXISTS `ecfrestaurant` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecfrestaurant`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id-admin` int(11) NOT NULL AUTO_INCREMENT,
  `login_admin` varchar(30) NOT NULL,
  `mdp_admin` varchar(30) NOT NULL,
  PRIMARY KEY (`id-admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(80) NOT NULL,
  `email_client` varchar(100) NOT NULL,
  `login_client` varchar(20) NOT NULL,
  `mdp_client` varchar(20) NOT NULL,
  `allergene_client` varchar(50) NOT NULL,
  `arachide_client` varchar(255) NOT NULL,
  `fruitsacoque_client` varchar(255) NOT NULL,
  `laitage_client` varchar(255) NOT NULL,
  `aucuneallergie_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `id_plat` int(11) NOT NULL,
  `genre_plat` int(11) NOT NULL,
  `nom_plat` varchar(100) NOT NULL,
  `img_plat` varchar(30) NOT NULL,
  `prix_plat` int(11) NOT NULL,
  `description_plat` varchar(200) NOT NULL,
  `allergene` int(11) NOT NULL,
  PRIMARY KEY (`id_plat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
