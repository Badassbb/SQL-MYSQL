-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 jan. 2023 à 15:26
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(3) NOT NULL AUTO_INCREMENT,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

DROP TABLE IF EXISTS `details_commande`;
CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(3) NOT NULL AUTO_INCREMENT,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL,
  PRIMARY KEY (`id_details_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(3) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL COMMENT 'mot de passe',
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(30) NOT NULL,
  `code_postal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `status`) VALUES
(1, 'John', 'John', 'John', 'John', 'John@gmail.com', 'm', 'Montfaucon', 0000030150, '8 rue de la chocolaterie', 0),
(2, 'Juju', 'soleil', 'Cottet', 'Julien', 'Julien.cottet@gmail.com', 'm', 'Paris', 0000075015, '300 rue de vaugirard', 0),
(3, 'lamarie', 'planete', 'thoyer', 'marie', 'marie.thoyer@yahoo.fr', 'f', 'Lyon', 0000069003, '10 rue paul bert', 0),
(4, 'fab', 'avatar13', 'grand', 'fabrice', 'fabrice.grand@gmail.com', 'm', 'Marseille', 0000013009, '70 rue de la r&eacute;publique', 0),
(5, 'membre', 'membre', 'membre', 'membre', 'membre@exemple.com', 'f', 'Toulouse', 0000031000, '55 rue bayard', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(3) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL COMMENT 'Ce champ correspond à la référence du produit. il sera unique et par conséquent 2 produits ne pourront pas avoir la même référence',
  `categorie` varchar(20) NOT NULL COMMENT 'Ce champ correspond à la catégorie du produit.',
  `titre` varchar(100) NOT NULL COMMENT 'Ce champ correspond au titre du produit.',
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL COMMENT 'Ce champ correspond à la couleur du produit',
  `taille` varchar(5) NOT NULL COMMENT 'Ce champ correspond à la taille du produit.',
  `public` enum('m','f','mixte') NOT NULL COMMENT 'Ce champ détermine à quel public est destiné ce produit. Les choix possibles sont Homme (M), Femme (f) ou mixte (M).',
  `photo` varchar(250) NOT NULL COMMENT 'Ce champ correspond au chemin de la photo qui sera enregistré pour représenter le produit. Ce ne sera pas le fichier image, mais bien son chemin qui sera enregistré.',
  `prix` int(3) NOT NULL COMMENT 'Ce champ correspond au prix du produit.',
  `stock` int(3) NOT NULL COMMENT 'Ce champ correspond au stock restant du produit.',
  PRIMARY KEY (`id_produit`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
